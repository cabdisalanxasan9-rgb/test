<?php

/**
 * Vercel Entry Point for Laravel
 * This file serves as the bridge between Vercel and Laravel.
 */

// 1. Fix for Vercel's Read-Only Filesystem
// Laravel needs to write to storage/framework/views and cache.
// Vercel only allows writing to /tmp.
$storagePath = '/tmp/storage';
$viewPath = '/tmp/storage/framework/views';

if (!is_dir($viewPath)) {
    mkdir($viewPath, 0755, true);
}

// 2. Set Environment Variables for Vercel
// These ensure Laravel uses /tmp for things it needs to write.
putenv("VIEW_COMPILED_PATH=$viewPath");
putenv("SESSION_DRIVER=cookie"); // Sessions can't be file-based on Vercel
putenv("LOG_CHANNEL=stderr");    // Logs should go to Vercel logs

if (!getenv('APP_URL') && getenv('VERCEL_URL')) {
    putenv('APP_URL=https://' . getenv('VERCEL_URL'));
}

// 3. Load Laravel's public/index.php
require __DIR__ . '/../public/index.php';
