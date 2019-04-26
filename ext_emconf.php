<?php

$EM_CONF[$_EXTKEY] = [
	'title' => 'Address List',
	'description' => 'Displays a list of addresses from an address table on the page.',
	'category' => 'plugin',
	'state' => 'stable',
	'version' => '3.0.0-dev',
	'constraints' => [
		'depends' => [
			'typo3' => '9.5.0-9.5.99'
        ],
		'conflicts' => [
        ],
		'suggests' => [
			'vidi' => '0.0.0-0.0.0',
        ],
    ],
	'suggests' => [
    ],
    'autoload' =>
        [
            'classmap' => ['Classes']
        ],
];
