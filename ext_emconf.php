<?php

$EM_CONF[$_EXTKEY] = [
	'title' => 'Address List',
	'description' => 'Displays a list of addresses from an address table on the page.',
	'category' => 'plugin',
	'state' => 'stable',
	'author' => 'Ingo Renner',
	'author_email' => 'typo3@ingo-renner.com',
	'author_company' => 'ingo-renner.com',
	'version' => '3.0.0-dev',
	'constraints' => [
		'depends' => [
			'typo3' => '6.2.2-8.7.99'
        ],
		'conflicts' => [
        ],
		'suggests' => [
			'vidi' => '',
        ],
    ],
	'suggests' => [
    ],
    'autoload' =>
        [
            'classmap' => ['Classes']
        ],
];
