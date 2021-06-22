<?php
// require __DIR__ . '/vendor/autoload.php';
// Kickstart the framework
$f3 = require 'lib/base.php';

if ((float) PCRE_VERSION < 8.0) {
    trigger_error('PCRE version is out of date');
}

// Load configuration
$subdomain = explode('.', $f3->get('HOST'))[0];

if ($subdomain == 'admin' || $subdomain == "stageadmin") {
    $f3->config('config/config_admin.ini');
    $f3->config('config/routes_admin.ini');
} else {
    $f3->config('config/config.ini');
    $f3->config('config/routes.ini');
    $f3->route('GET /', 'Home->index');
}

// MYSQL Configuration
// $f3->set('DB', new DB\SQL(
//     "mysql:host={$f3->get('DB_SERVER')};port={$f3->get('DB_PORT')};dbname={$f3->get('DB_NAME')}",
//     $f3->get('DB_USER'),
//     $f3->get('DB_PASSW')
// ));

$f3->route('GET /minify/@type', function (Base $f3, $args) {
    $path = $args['type'] . '/';
    $files = str_replace('../', '', $_GET['files']); // close potential hacking attempts
    echo Web::instance()->minify($files, null, true, $path);
}, 3600 * 24);

$f3->route('GET /documents/@filename', function (Base $f3, $args) {
    // send() method returns FALSE if file doesn't exist
    if (!Web::instance()->send('docs/' . $args['filename'], null, 512, false))
    // Generate an HTTP 404
    {
        $f3->error(404);
    }

});
// $f3->route('GET /constants.js', 'App->constantJs');

$f3->run();