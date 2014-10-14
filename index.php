<?php

define( 'DEVELOPMENT_MODE', 1 );
define( 'TURBO_MODE', TRUE );

if( function_exists( 'init_set' ) ) ini_set( 'display_errors', TRUE );

if( function_exists( 'error_reporting' ) ) {

    if( version_compare( PHP_VERSION, '5.3' ) >= 0 && version_compare( PHP_VERSION, '5.4' ) <  0 ) {

        error_reporting( E_ALL | E_STRICT );

    } else {

        error_reporting( E_ALL );
    }
}

set_include_path(

    '.' . PATH_SEPARATOR . realpath( '../../common/next' )
);

require_once 'Next/Loader/AutoLoader.php';
require_once 'Next/Loader/AutoLoader/Stream.php';

$autoloader = new Next\Loader\AutoLoader;
$autoloader -> registerAutoloader( new Next\Loader\AutoLoader\Stream );

Next\Components\Debug\Handlers::register( 'exception' );
Next\Components\Debug\Handlers::register( 'error' );

date_default_timezone_set( 'America/Sao_Paulo' );

$applications = new Next\Application\Chain;

$applications -> add( new application\dovahkiin\application );

// Should I regenerate the Application Routes?

if( DEVELOPMENT_MODE == 2 ) {

    $generator = new Next\Tools\RoutesGenerator\Annotations(

        $applications, 'data/routes.sqlite'
    );

    // Should I delete everything first?

    $generator -> reset();

    // Okidoki ^^

    $generator -> find() -> save();
}

$front = new Next\Controller\Front( $applications );

$front -> dispatch();