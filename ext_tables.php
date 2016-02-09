<?php
defined('TYPO3_MODE') or die();

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tt_address');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToInsertRecords('tt_address');

if (\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::isLoaded('vidi')) {

    /** @var \Fab\Vidi\Module\ModuleLoader $moduleLoader */
    $moduleLoader = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\Fab\Vidi\Module\ModuleLoader::class, 'tt_address');

    $objectManager = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Extbase\Object\ObjectManager::class);

    /** @var \TYPO3\CMS\Extensionmanager\Utility\ConfigurationUtility $configurationUtility */
    $configurationUtility = $objectManager->get('TYPO3\CMS\Extensionmanager\Utility\ConfigurationUtility');
    $configuration = $configurationUtility->getCurrentConfiguration('tt_address');

    /** @var \Fab\Vidi\Module\ModuleLoader $moduleLoader */
    $moduleLoader->setIcon('EXT:tt_address/ext_icon.png')
        ->setModuleLanguageFile('LLL:EXT:tt_address/Resources/Private/Language/tt_address.xlf')
        ->setDefaultPid((int)$configuration['default_pid']['value'])
        ->register();
}
