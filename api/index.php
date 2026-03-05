<?php

/**
 * Vercel Entry Point for Laravel
 * This file serves as the bridge between Vercel and Laravel.
 */

// 1. Fix for Vercel's Read-Only Filesystem
// Laravel needs writable runtime folders. On Vercel only /tmp is writable.
$storagePath = '/tmp/storage';

$requiredDirs = [
    $storagePath,
    $storagePath . '/framework',
    $storagePath . '/framework/cache',
    $storagePath . '/framework/cache/data',
    $storagePath . '/framework/sessions',
    $storagePath . '/framework/testing',
    $storagePath . '/framework/views',
    $storagePath . '/logs',
    '/tmp/bootstrap/cache',
];

foreach ($requiredDirs as $dir) {
    if (!is_dir($dir)) {
        mkdir($dir, 0755, true);
    }
}

// 2. Set Environment Variables for Vercel
// These ensure Laravel uses /tmp for things it needs to write.
putenv("LARAVEL_STORAGE_PATH=$storagePath");
putenv("VIEW_COMPILED_PATH=$storagePath/framework/views");
putenv("SESSION_DRIVER=cookie"); // Sessions can't be file-based on Vercel
putenv("LOG_CHANNEL=stderr");    // Logs should go to Vercel logs
putenv("CACHE_STORE=array");     // Avoid database cache requirement on serverless
putenv("QUEUE_CONNECTION=sync"); // Avoid database queue requirement on serverless
putenv("APP_CONFIG_CACHE=/tmp/bootstrap/cache/config.php");
putenv("APP_ROUTES_CACHE=/tmp/bootstrap/cache/routes-v7.php");
putenv("APP_EVENTS_CACHE=/tmp/bootstrap/cache/events.php");
putenv("APP_PACKAGES_CACHE=/tmp/bootstrap/cache/packages.php");
putenv("APP_SERVICES_CACHE=/tmp/bootstrap/cache/services.php");

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
