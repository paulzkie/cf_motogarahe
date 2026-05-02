<?php
/**
 * CodeIgniter 3 Error View - HTML
 * 
 * This view displays PHP errors in a user-friendly HTML format.
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
	<h1><?php echo htmlspecialchars($severity, ENT_QUOTES, 'UTF-8'); ?></h1>
	<div class="error-details">
		<?php echo htmlspecialchars($message, ENT_QUOTES, 'UTF-8'); ?>
	</div>
	<?php if (defined('ENVIRONMENT') && ENVIRONMENT !== 'production'): ?>
		<p><strong>File:</strong> <code><?php echo htmlspecialchars($filepath, ENT_QUOTES, 'UTF-8'); ?></code></p>
		<p><strong>Line:</strong> <code><?php echo $line; ?></code></p>
	<?php endif; ?>
</body>
</html>