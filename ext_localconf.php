<?php
defined('TYPO3_MODE') or die();

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addUserTSConfig('
	options.saveDocNew.tt_address = 1
');

if (TYPO3_MODE === 'BE') {
	$settings = \TYPO3\TtAddress\Utility\SettingsUtility::getSettings();
	if ($settings->isStoreBackwardsCompatName()) {
		$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['t3lib/class.t3lib_tcemain.php']['processDatamapClass'][] =
			'TYPO3\\TtAddress\\Hooks\\DataHandler\\BackwardsCompatibilityNameFormat';
	}
}
