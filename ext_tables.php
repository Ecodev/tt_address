<?php
defined('TYPO3_MODE') or die();

call_user_func(function () {

    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tt_address');
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToInsertRecords('tt_address');

    if (\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::isLoaded('vidi')) {

        /** @var \Fab\Vidi\Module\ModuleLoader $moduleLoader */
        $moduleLoader = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\Fab\Vidi\Module\ModuleLoader::class, 'tt_address');

        $objectManager = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Extbase\Object\ObjectManager::class);

        $configuration = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(
            \TYPO3\CMS\Core\Configuration\ExtensionConfiguration::class
        )->get('tt_address');

        /** @var \Fab\Vidi\Module\ModuleLoader $moduleLoader */
        $moduleLoader->setIcon('EXT:tt_address/ext_icon.png')
            ->setModuleLanguageFile('LLL:EXT:tt_address/Resources/Private/Language/tt_address.xlf')
            ->setDefaultPid((int)$configuration['default_pid'])
            ->register();
    }

    // Add new sprite icon.
    $icons = [
        'address' => 'EXT:tt_address/ext_icon.png',
    ];
    /** @var \TYPO3\CMS\Core\Imaging\IconRegistry $iconRegistry */
    $iconRegistry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Imaging\IconRegistry::class);
    foreach ($icons as $key => $icon) {
        $iconRegistry->registerIcon('extensions-tt_address-' . $key,
            \TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
            [
                'source' => $icon
            ]
        );
    }
    unset($iconRegistry);
});
