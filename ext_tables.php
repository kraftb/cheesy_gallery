<?php
defined ('TYPO3_MODE') or die ('Access denied.');

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	'ThinkopenAt.CheesyGallery',
	'Gallery',
	'LLL:EXT:cheesy_gallery/Resources/Private/Language/locallang.xlf:CheesyGallery_PluginName',
//	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Resources/Public/Images/GalleryIcon.png';
	'EXT:cheesy_gallery/Resources/Public/Images/GalleryIcon.png'
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile('cheesy_gallery', 'Configuration/TypoScript', 'Cheesy Gallery');

