<?php
defined ('TYPO3_MODE') or die ('Access denied.');

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'ThinkopenAt.CheesyGallery',
	'Gallery',
	array(
		'Gallery' => 'index,list,detail,latest',
	)
);

