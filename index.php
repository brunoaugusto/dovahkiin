<?php

define( 'DEVELOPMENT_MODE', 1 );

define( 'DS', DIRECTORY_SEPARATOR );

define( 'TURBO_MODE', TRUE );

if( function_exists( 'init_set' ) ) {

    ini_set( 'display_errors', TRUE );
}

if( function_exists( 'error_reporting' ) ) {

    if( version_compare( PHP_VERSION, '5.3' ) >= 0 &&
        version_compare( PHP_VERSION, '5.4' ) <  0 ) {

        error_reporting( E_ALL | E_STRICT );

    } else {

        error_reporting( E_ALL );
    }
}

set_include_path(

    '.' . PATH_SEPARATOR . realpath( '../../common/next' )
);

require_once 'Next\Loader\AutoLoader.php';
require_once 'Next\Loader\AutoLoader\Stream.php';

$autoloader = new \Next\Loader\AutoLoader;
$autoloader -> registerAutoloader( new \Next\Loader\AutoLoader\Stream );

set_exception_handler(

    ( DEVELOPMENT_MODE >= 1 ?

        array( 'Next\Exception\Handlers', 'development' ) :

        array( 'Next\Exception\Handlers', 'production' )
    )
);

date_default_timezone_set( 'America/Sao_Paulo' );

$applications = new \Next\Application\Chain;

$applications -> add( new application\dovahkiin\application );

if( DEVELOPMENT_MODE == 2 ) {

    $generator = new \Next\Tools\RoutesGenerator(

        new \Next\Tools\RoutesGenerator\Annotations(

            $applications,

            new \Next\DB\Driver\PDO\Adapter\SQLite(

                array( 'dbPath' => 'Data/Routes.sqlite' )
            )
        )
    );

    $generator -> run( TRUE );
}

$front = new \Next\Controller\Front( $applications );

$front -> dispatch();