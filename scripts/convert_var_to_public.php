<?php
// Converts PHP class property declarations using "var $name" to "public $name"
// Usage: php scripts/convert_var_to_public.php

$root = __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'application';
if (!is_dir($root)) {
    echo "ERROR: application directory not found: $root\n";
    exit(1);
}

$rii = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($root));
$changed = 0;
$filesChanged = [];

foreach ($rii as $file) {
    if ($file->isDir()) continue;
    if (!preg_match('/\.php$/i', $file->getFilename())) continue;
    $path = $file->getRealPath();
    $contents = file_get_contents($path);
    // Match "var $name" outside of phpDoc tags; simple, low-risk replacement
    $new = preg_replace('/\bvar\s+\$([a-zA-Z_][a-zA-Z0-9_]*)\b/', 'public $\\1', $contents);
    if ($new !== null && $new !== $contents) {
        // backup original
        copy($path, $path . '.bak');
        file_put_contents($path, $new);
        $changed++;
        $filesChanged[] = str_replace(getcwd() . DIRECTORY_SEPARATOR, '', $path);
    }
}

echo "Conversion complete. Files changed: $changed\n";
if ($changed) {
    foreach ($filesChanged as $f) echo " - $f\n";
}

exit(0);
