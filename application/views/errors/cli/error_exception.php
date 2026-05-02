<?php
/**
 * CodeIgniter 3 Error View - Exception (CLI)
 * 
 * This view displays uncaught exceptions in CLI format.
 */
defined('BASEPATH') OR exit('No direct script access allowed');
?>
EXCEPTION: <?php echo htmlspecialchars(get_class($exception), ENT_QUOTES, 'UTF-8'); ?>
<?php echo str_repeat('-', 60); ?>

<?php echo htmlspecialchars($message, ENT_QUOTES, 'UTF-8'); ?>

File: <?php echo htmlspecialchars($exception->getFile(), ENT_QUOTES, 'UTF-8'); ?>
Line: <?php echo $exception->getLine(); ?>
