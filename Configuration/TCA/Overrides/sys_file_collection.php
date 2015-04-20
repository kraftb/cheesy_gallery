<?php
defined('TYPO3_MODE') or die();

$GLOBALS['TCA']['sys_file_collection']['columns']['description'] = array(
	'label' => 'LLL:EXT:cheesy_gallery/Resources/Private/Language/locallang.xlf:FileCollection_Description',
	'config' => array(
		'type' => 'text',
		'cols' => '50',
		'rows' => '6',
	)
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes('sys_file_collection', 'description', '', 'after:title');

