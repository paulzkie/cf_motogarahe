<?php
/**
 * CodeIgniter 3 - General Error View (HTML)
 * 
 * This is a generic error view template.
 */
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Error</title>
	<style>
		body { background-color: #fff; color: #222; font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", "Helvetica Neue", sans-serif; margin: 40px; }
		h1 { color: #d00; border-bottom: 1px solid #ddd; padding-bottom: 0.5rem; margin-top: 0; }
		p { color: #666; }
		code { background-color: #f5f5f5; border: 1px solid #ddd; border-radius: 4px; padding: 4px 6px; font-family: "Monaco", "Courier New", monospace; font-size: 0.85rem; }
		.error-details { background-color: #f9f9f9; border-left: 4px solid #d00; padding: 1rem; margin: 1rem 0; }
		strong { color: #000; }
	</style>
</head>
<body>
	<h1><?php echo htmlspecialchars($heading, ENT_QUOTES, 'UTF-8'); ?></h1>
	<div class="error-details">
		<?php echo $message; ?>
	</div>
</body>
</html>