<?php
$settings = \TYPO3\TtAddress\Utility\SettingsUtility::getSettings();


$configuration = [];
if (isset($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['tt_address'])) {
    $configuration = unserialize($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['tt_address']);
}

$isCategorizable = empty($configuration['isCategorizable']) ? (bool)$configuration['isCategorizable'] : false;

$tca = [
    'ctrl' => [
        'label' => 'name',
        'label_alt' => 'email',
        'default_sortby' => 'ORDER BY last_name, first_name, middle_name',
        'tstamp' => 'tstamp',
        'prependAtCopy' => 'LLL:EXT:lang/locallang_general.xml:LGL.prependAtCopy',
        'delete' => 'deleted',
        'title' => 'LLL:EXT:tt_address/locallang_tca.xml:tt_address',
        'thumbnail' => 'image',
        'enablecolumns' => [
            'disabled' => 'hidden'
        ],
        'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath('tt_address') . 'ext_icon.png',
        'searchFields' => 'name, first_name, middle_name, last_name, email',
        'dividers2tabs' => 1,
    ],
    'interface' => [
        'showRecordFieldList' => 'first_name, middle_name, last_name, address, building, room, city, zip, region, country, phone, fax, email, www, title, company, image'
    ],
    'columns' => [
        'hidden' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.hidden',
            'config' => [
                'type' => 'check'
            ]
        ],
        'gender' => [
            'label' => 'LLL:EXT:tt_address/locallang_tca.xml:tt_address.gender',
            'config' => [
                'type' => 'radio',
                'default' => 'm',
                'items' => [
                    ['LLL:EXT:tt_address/locallang_tca.xml:tt_address.gender.m', 'm'],
                    ['LLL:EXT:tt_address/locallang_tca.xml:tt_address.gender.f', 'f']
                ]
            ]
        ],
        'title' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.title_person',
            'config' => [
                'type' => 'input',
                'size' => '8',
                'eval' => 'trim',
                'max' => '255'
            ]
        ],
        'name' => [
            'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.name',
            'config' => [
                'type' => 'input',
                'readOnly' => $settings->isReadOnlyNameField(),
                'size' => '40',
                'eval' => 'trim',
                'max' => '255'
            ]
        ],
        'first_name' => [
            'exclude' => 0,
            'label' => 'LLL:EXT:tt_address/locallang_tca.xml:tt_address.first_name',
            'config' => [
                'type' => 'input',
                'size' => '20',
                'eval' => 'trim',
                'max' => '255'
            ]
        ],
        'middle_name' => [
            'exclude' => 0,
            'label' => 'LLL:EXT:tt_address/locallang_tca.xml:tt_address.middle_name',
            'config' => [
                'type' => 'input',
                'size' => '20',
                'eval' => 'trim',
                'max' => '255'
            ]
        ],
        'last_name' => [
            'exclude' => 0,
            'label' => 'LLL:EXT:tt_address/locallang_tca.xml:tt_address.last_name',
            'config' => [
                'type' => 'input',
                'size' => '20',
                'eval' => 'trim',
                'max' => '255'
            ]
        ],
        'birthday' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:tt_address/locallang_tca.xml:tt_address.birthday',
            'config' => [
                'type' => 'input',
                'eval' => 'date',
                'size' => '8',
                'max' => '20'
            ]
        ],
        'default_language' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:tt_address/locallang_tca.xml:tt_address.default_language',
            'config' => [
                'type' => 'input',
                'eval' => 'trim',
                'size' => '20',
            ]
        ],
        'address' => [
            'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.address',
            'config' => [
                'type' => 'text',
                'cols' => '20',
                'rows' => '3'
            ]
        ],
        'building' => [
            'label' => 'LLL:EXT:tt_address/locallang_tca.xml:tt_address.building',
            'config' => [
                'type' => 'input',
                'eval' => 'trim',
                'size' => '20',
                'max' => '20'
            ]
        ],
        'room' => [
            'label' => 'LLL:EXT:tt_address/locallang_tca.xml:tt_address.room',
            'config' => [
                'type' => 'input',
                'eval' => 'trim',
                'size' => '5',
                'max' => '15'
            ]
        ],
        'phone' => [
            'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.phone',
            'config' => [
                'type' => 'input',
                'eval' => 'trim',
                'size' => '20',
                'max' => '30'
            ]
        ],
        'fax' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.fax',
            'config' => [
                'type' => 'input',
                'size' => '20',
                'eval' => 'trim',
                'max' => '30'
            ]
        ],
        'mobile' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:tt_address/locallang_tca.xml:tt_address.mobile',
            'config' => [
                'type' => 'input',
                'eval' => 'trim',
                'size' => '20',
                'max' => '30'
            ]
        ],
        'www' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.www',
            'config' => [
                'type' => 'input',
                'eval' => 'trim',
                'size' => '20',
                'max' => '255',
                'wizards' => [
                    '_PADDING' => 2,
                    'link' => [
                        'type' => 'popup',
                        'title' => 'LLL:EXT:cms/locallang_ttc.xml:header_link_formlabel',
                        'icon' => 'link_popup.gif',
                        'module' => [
                            'name' => 'wizard_element_browser',
                            'urlParameters' => [
                                'mode' => 'wizard',
                                'act' => 'url|page'
                            ]
                        ],
                        'params' => [
                            'blindLinkOptions' => 'mail,file,spec,folder',
                        ],
                        'JSopenParams' => 'height=300,width=500,status=0,menubar=0,scrollbars=1',
                    ],
                ]
            ]
        ],
        'email' => [
            'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.email',
            'config' => [
                'type' => 'input',
                'size' => '20',
                'eval' => 'trim',
                'max' => '255'
            ]
        ],
        'skype' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:tt_address/locallang_tca.xml:tt_address.skype',
            'config' => [
                'type' => 'input',
                'size' => '20',
                'eval' => 'trim',
                'max' => '50',
                'placeholder' => 'johndoe'
            ]
        ],
        'twitter' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:tt_address/locallang_tca.xml:tt_address.twitter',
            'config' => [
                'type' => 'input',
                'size' => '20',
                'eval' => 'trim',
                'max' => '50',
                'placeholder' => '@johndoe'
            ]
        ],
        'facebook' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:tt_address/locallang_tca.xml:tt_address.facebook',
            'config' => [
                'type' => 'input',
                'size' => '20',
                'eval' => 'trim',
                'max' => '50',
                'placeholder' => '/johndoe'
            ]
        ],
        'linkedin' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:tt_address/locallang_tca.xml:tt_address.linkedin',
            'config' => [
                'type' => 'input',
                'size' => '20',
                'eval' => 'trim',
                'max' => '50',
                'placeholder' => 'johndoe'
            ]
        ],
        'company' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:tt_address/locallang_tca.xml:tt_address.organization',
            'config' => [
                'type' => 'input',
                'eval' => 'trim',
                'size' => '20',
                'max' => '255'
            ]
        ],
        'position' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:tt_address/locallang_tca.xml:tt_address.position',
            'config' => [
                'type' => 'input',
                'size' => '20',
                'eval' => 'trim',
                'max' => '255'
            ]
        ],
        'city' => [
            'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.city',
            'config' => [
                'type' => 'input',
                'size' => '20',
                'eval' => 'trim',
                'max' => '255'
            ]
        ],
        'zip' => [
            'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.zip',
            'config' => [
                'type' => 'input',
                'eval' => 'trim',
                'size' => '10',
                'max' => '20'
            ]
        ],
        'region' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:tt_address/locallang_tca.xml:tt_address.region',
            'config' => [
                'type' => 'input',
                'size' => '10',
                'eval' => 'trim',
                'max' => '255'
            ]
        ],
        'country' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.country',
            'config' => [
                'type' => 'input',
                'size' => '20',
                'eval' => 'trim',
                'max' => '128'
            ]
        ],
        'image' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.image',
            'config' => [
                'type' => 'group',
                'internal_type' => 'file',
                'allowed' => $GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext'],
                'max_size' => '1000',
                'uploadfolder' => 'uploads/pics',
                'show_thumbs' => '1',
                'size' => '3',
                'maxitems' => 6,
                'minitems' => '0'
            ]
        ],
        'description' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.description',
            'config' => [
                'type' => 'text',
                'rows' => 5,
                'cols' => 48
            ]
        ],
        'categories' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:lang/locallang_tca.xlf:sys_category.categories',
            'config' => \TYPO3\CMS\Core\Category\CategoryRegistry::getTcaFieldConfiguration('tt_address')
        ]
    ],
    'types' => [
        '0' => ['showitem' =>
            'hidden,
            --palette--;LLL:EXT:tt_address/locallang_tca.xml:tt_address_palette.name;name,
            default_language, image, description,
            --div--;LLL:EXT:tt_address/locallang_tca.xml:tt_address_tab.contact,
            --palette--;LLL:EXT:tt_address/locallang_tca.xml:tt_address_palette.address;address_usa,
            --palette--;LLL:EXT:tt_address/locallang_tca.xml:tt_address_palette.contact;contact,
            --palette--;LLL:EXT:tt_address/locallang_tca.xml:tt_address_palette.social;social,
            '
        ]
    ],
    'palettes' => [
        'name' => [
            'showitem' => 'gender, title, --linebreak--,
							first_name, last_name, --linebreak--,
							name',
            'canNotCollapse' => 1
        ],

        'organization' => [
            'showitem' => 'position, company',
            'canNotCollapse' => 1
        ],

        'address_usa' => [
            'showitem' => 'address, --linebreak--,
							city, zip, region, --linebreak--,
							country',
            'canNotCollapse' => 1
        ],

        'address_germany' => [
            'showitem' => 'address, --linebreak--,
							zip, city, --linebreak--,
							country, region',
            'canNotCollapse' => 1
        ],

        'building' => [
            'showitem' => 'building, room',
            'canNotCollapse' => 1
        ],

        'contact' => [
            'showitem' => 'email, --linebreak--,
							phone, --linebreak--,
							mobile, --linebreak--,
							www',
            'canNotCollapse' => 1
        ],

        'social' => [
            'showitem' => 'skype, --linebreak--,
							twitter, --linebreak--,
							facebook, --linebreak--,
							linkedin',
            'canNotCollapse' => 1
        ],
    ],
    'grid' => [
        'facets' => [
            'uid',
            'first_name',
            'default_language',
            'last_name',
            'email',
        ],
        'columns' => [
            '__checkbox' => [
                'renderer' => \Fab\Vidi\Grid\CheckBoxRenderer::class,
            ],
            'uid' => [
                'visible' => false,
                'label' => 'LLL:EXT:tt_address/Resources/Private/Language/tt_address.xlf:uid',
                'width' => '5px',
            ],
            'first_name' => [
                'editable' => true,
            ],
            'last_name' => [
                'editable' => true,
            ],
            'email' => [
                'editable' => true,
            ],
            '__buttons' => [
                'renderer' => \Fab\Vidi\Grid\ButtonGroupRenderer::class,
            ],
        ]
    ]
];


if ($isCategorizable) {
    $tca['types'][0]['showitem'] .= '--div--;LLL:EXT:lang/locallang_tca.xlf:sys_category.tabs.category, categories';
}

return $tca;