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
putenv("CACHE_STORE=array");     // Avoid database cache requirement on serverless
putenv("QUEUE_CONNECTION=sync"); // Avoid database queue requirement on serverless

if (!getenv('APP_URL') && getenv('VERCEL_URL')) {
    putenv('APP_URL=https://' . getenv('VERCEL_URL'));
}

if (!getenv('APP_KEY')) {
    // 32-byte deterministic key for serverless fallback. Prefer setting APP_KEY in Vercel env.
    $seed = getenv('VERCEL_PROJECT_PRODUCTION_URL') ?: (getenv('VERCEL_URL') ?: 'laravel-vercel-fallback');
    $rawKey = hash('sha256', $seed, true);
    putenv('APP_KEY=base64:' . base64_encode($rawKey));
}

// 3. Load Laravel's public/index.php
require __DIR__ . '/../public/index.php';
