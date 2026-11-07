<?php

$EM_CONF[$_EXTKEY] = [
	'title' => 'Address List',
	'description' => 'Displays a list of addresses from an address table on the page.',
	'category' => 'plugin',
	'state' => 'stable',
	'version' => '3.0.0',
	'constraints' => [
		'depends' => [
			'typo3' => '13.4.0-13.4.99',
        ],
		'conflicts' => [
        ],
    ],
    'autoload' =>
        [
            'classmap' => ['Classes']
        ],
];
