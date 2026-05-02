<?php
/**
 * CodeIgniter 3 - General Error View (CLI)
 * 
 * This is a generic error view template for CLI.
 */
defined('BASEPATH') OR exit('No direct script access allowed');
?>
ERROR: <?php echo htmlspecialchars($heading, ENT_QUOTES, 'UTF-8'); ?>
<?php echo str_repeat('-', 60); ?>

<?php echo $message; ?>
