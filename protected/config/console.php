<?php

// This is the configuration for yiic console application.
// Any writable CConsoleApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Eicjs JST API',

	// preloading 'log' component
	'preload'=>array('log'),

	// application components
	'components'=>array(
        'db' => array(
            'connectionString' => 'mysql:host=10.168.6.174;dbname=ids5',
            'emulatePrepare' => true,
            'username' => 'sync',
            'password' => 'q1w2e3r4t5',
            'charset' => 'utf8',
        ),
        'cache' => array(
            'class' => 'system.caching.CMemCache',
            'servers' => array(
                array('host' => '127.0.0.1', 'port' => 11211),
            ),
        )
	),
);