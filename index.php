<?php
/**
 * Global controller
 */
try {
    // nginx: fastcgi_param SITE_CONFIG /<path to conf dir>/settings.json;
    $filename = \filter_input(
        \INPUT_SERVER,
        'SITE_CONFIG',
        \FILTER_SANITIZE_STRING
    );
    if (empty($filename)) {
        throw new \Exception('Config is empty');
    }
    $json = \file_get_contents($filename);
    if (empty($json)) {
        throw new \Exception('File is empty');
    }
    $settings = \json_decode($json);
    if (empty($settings)) {
        throw new \Exception('Cannot parse settings');
    }
    
    if ($settings->debug > \LOG_ERR) {
        \error_reporting(\E_ALL);
        \ini_set('display_errors', true);
    } else {
        \ini_set('display_errors', false);
    }
    $app  = $settings->app->package;
    $path = $settings->path->lib;
    $flag = \spl_autoload_register(function($class) use ($app, $path) {
        $swp = \explode('\\', $class);
        $filename = \sprintf(
            'phar://%s%s.phar%s%s.php',
            $path,
            $app,
            \DIRECTORY_SEPARATOR,
            \implode(\DIRECTORY_SEPARATOR, $swp)
        );
        if (\file_exists($filename)) {
            require_once $filename;
        } else { echo '<h1>Cannot find ' , $filename , '</h1>'; }
    });
    if (! $flag) {
        throw new \Exception('Cannot create __autoload');
    }
    (new $settings->app->entry($settings))->run();
} catch (\Exception $e) {
    if (empty($e->getCode())) {
        \http_response_code(500);
    } else {
        \http_response_code($e->getCode());
    }
}

exit(0);
