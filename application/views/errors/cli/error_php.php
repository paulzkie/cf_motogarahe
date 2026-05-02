<?php
/**
 * CodeIgniter 3 Error View - CLI
 * 
 * This view displays PHP errors in CLI format (for command-line execution).
 */
defined('BASEPATH') OR exit('No direct script access allowed');
?>
ERROR <?php echo htmlspecialchars($severity, ENT_QUOTES, 'UTF-8'); ?>
<?php echo str_repeat('-', 40); ?>

<?php echo htmlspecialchars($message, ENT_QUOTES, 'UTF-8'); ?>

File: <?php echo htmlspecialchars($filepath, ENT_QUOTES, 'UTF-8'); ?>
Line: <?php echo $line; ?>
