<?php
/**
 * CodeIgniter Breadcrumb Helper
 * 
 * Provides functions for generating breadcrumb navigation trails
 */
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Build Breadcrumb Trail
 * 
 * Generates a breadcrumb navigation trail based on the current URI segments
 * 
 * @param	array	$breadcrumbs	Array of breadcrumb titles and URLs
 * @param	string	$divider		Separator between breadcrumbs (default: ' > ')
 * @param	bool	$return			Whether to return or output (default: FALSE)
 * @return	string|void
 */
if ( ! function_exists('breadcrumb'))
{
	function breadcrumb($breadcrumbs = array(), $divider = ' > ', $return = FALSE)
	{
		$output = '';
		
		if (empty($breadcrumbs))
		{
			return '';
		}

		$output = '<ul class="breadcrumb">' . PHP_EOL;
		
		foreach ($breadcrumbs as $url => $title)
		{
			if (is_numeric($url))
			{
				// No URL specified, treat as plain text
				$output .= '<li>' . htmlspecialchars($title, ENT_QUOTES, 'UTF-8') . '</li>' . PHP_EOL;
			}
			else
			{
				// With URL
				$output .= '<li><a href="' . htmlspecialchars($url, ENT_QUOTES, 'UTF-8') . '">' . htmlspecialchars($title, ENT_QUOTES, 'UTF-8') . '</a></li>' . PHP_EOL;
			}
		}
		
		$output .= '</ul>' . PHP_EOL;

		if ($return === TRUE)
		{
			return $output;
		}
		else
		{
			echo $output;
		}
	}
}

/**
 * Simple Breadcrumb String
 * 
 * Generates breadcrumbs as a simple string separated by divider
 * 
 * @param	array	$breadcrumbs	Array of breadcrumb titles and URLs
 * @param	string	$divider		Separator between breadcrumbs (default: ' > ')
 * @param	bool	$return			Whether to return or output (default: FALSE)
 * @return	string|void
 */
if ( ! function_exists('breadcrumb_string'))
{
	function breadcrumb_string($breadcrumbs = array(), $divider = ' > ', $return = FALSE)
	{
		$output = '';
		$count = 0;
		$total = count($breadcrumbs);

		foreach ($breadcrumbs as $url => $title)
		{
			$count++;
			
			if (is_numeric($url))
			{
				// No URL
				$output .= htmlspecialchars($title, ENT_QUOTES, 'UTF-8');
			}
			else
			{
				// With URL
				$output .= '<a href="' . htmlspecialchars($url, ENT_QUOTES, 'UTF-8') . '">' . htmlspecialchars($title, ENT_QUOTES, 'UTF-8') . '</a>';
			}

			// Add divider if not the last item
			if ($count < $total)
			{
				$output .= $divider;
			}
		}

		if ($return === TRUE)
		{
			return $output;
		}
		else
		{
			echo $output;
		}
	}
}

/* End of file breadcrumb_helper.php */
/* Location: ./application/helpers/breadcrumb_helper.php */

	if ( ! function_exists('generateBreadcrumb'))
	{
		/**
		 * generateBreadcrumb
		 *
		 * Backwards-compatible helper used by legacy views. Builds a breadcrumb
		 * trail from the current URI segments when no array is supplied. Always
		 * returns the breadcrumb HTML (does not echo) to avoid accidental
		 * premature output that breaks header() calls.
		 *
		 * @param array|null $breadcrumbs
		 * @param string $divider
		 * @return string
		 */
		function generateBreadcrumb($breadcrumbs = null, $divider = ' &raquo; ')
		{
			if (is_array($breadcrumbs) && ! empty($breadcrumbs)) {
				return breadcrumb($breadcrumbs, $divider, TRUE);
			}

			$CI =& get_instance();
			$segments = $CI->uri->segment_array();

			if (empty($segments)) {
				// No segments — return empty string (or a Home link if desired)
				return '';
			}

			$trail = array();
			$acc = '';
			foreach ($segments as $seg) {
				$acc .= '/'.trim($seg, '/');
				$url = rtrim(base_url($acc), '/');
				$title = ucwords(str_replace(array('-', '_'), ' ', $seg));
				$trail[$url] = $title;
			}

			return breadcrumb($trail, $divider, TRUE);
		}
	}
