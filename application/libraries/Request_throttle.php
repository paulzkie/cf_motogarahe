<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Request_throttle {
	private $storage_path;

	public function __construct()
	{
		$this->storage_path = APPPATH . 'cache' . DIRECTORY_SEPARATOR . 'rate_limits';
		if (!is_dir($this->storage_path)) {
			mkdir($this->storage_path, 0775, true);
		}
	}

	public function hit($bucket, $key, $max_attempts, $window_seconds)
	{
		$now = time();
		$timestamps = $this->read_timestamps($bucket, $key);
		$timestamps = array_values(array_filter($timestamps, function ($timestamp) use ($now, $window_seconds) {
			return is_int($timestamp) && $timestamp > ($now - $window_seconds);
		}));

		if (count($timestamps) >= $max_attempts) {
			$retry_after = max(1, $window_seconds - ($now - $timestamps[0]));
			$this->write_timestamps($bucket, $key, $timestamps);
			return array(
				'allowed' => false,
				'retry_after' => $retry_after,
			);
		}

		$timestamps[] = $now;
		$this->write_timestamps($bucket, $key, $timestamps);

		return array(
			'allowed' => true,
			'retry_after' => 0,
		);
	}

	public function hit_login_buckets($bucket, $ip_address, $identifier, $window_seconds = 900, $ip_max_attempts = 25, $identifier_max_attempts = 5)
	{
		$identifier = strtolower(trim((string) $identifier));
		if ($identifier === '') {
			$identifier = 'anonymous';
		}

		$ip_result = $this->hit($bucket . '_ip', $ip_address, $ip_max_attempts, $window_seconds);
		if (!$ip_result['allowed']) {
			return $ip_result;
		}

		return $this->hit($bucket . '_identity', $ip_address . '|' . $identifier, $identifier_max_attempts, $window_seconds);
	}

	public function clear($bucket, $key)
	{
		$file_path = $this->get_file_path($bucket, $key);
		if (is_file($file_path)) {
			unlink($file_path);
		}
	}

	public function clear_login_buckets($bucket, $ip_address, $identifier)
	{
		$identifier = strtolower(trim((string) $identifier));
		if ($identifier === '') {
			$identifier = 'anonymous';
		}

		$this->clear($bucket . '_ip', $ip_address);
		$this->clear($bucket . '_identity', $ip_address . '|' . $identifier);
	}

	private function read_timestamps($bucket, $key)
	{
		$file_path = $this->get_file_path($bucket, $key);
		if (!is_file($file_path)) {
			return array();
		}

		$content = file_get_contents($file_path);
		if ($content === false || $content === '') {
			return array();
		}

		$data = json_decode($content, true);
		return is_array($data) ? $data : array();
	}

	private function write_timestamps($bucket, $key, array $timestamps)
	{
		file_put_contents($this->get_file_path($bucket, $key), json_encode(array_values($timestamps)), LOCK_EX);
	}

	private function get_file_path($bucket, $key)
	{
		return $this->storage_path . DIRECTORY_SEPARATOR . preg_replace('/[^a-z0-9_\-]/i', '_', $bucket) . '_' . sha1($key) . '.json';
	}
}