<?php
namespace ThinkopenAt\CheesyGallery\Domain\Model;

/***************************************************************
*  Copyright notice
*
*  (c) 2015 Bernhard Kraft (kraftb@think-open.at)
*  All rights reserved
*
*  This script is part of the TYPO3 project. The TYPO3 project is
*  free software; you can redistribute it and/or modify
*  it under the terms of the GNU General Public License as published by
*  the Free Software Foundation; either version 2 of the License, or
*  (at your option) any later version.
*
*  The GNU General Public License can be found at
*  http://www.gnu.org/copyleft/gpl.html.
*
*  This script is distributed in the hope that it will be useful,
*  but WITHOUT ANY WARRANTY; without even the implied warranty of
*  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
*  GNU General Public License for more details.
*
*  This copyright notice MUST APPEAR in all copies of the script!
***************************************************************/


/**
 * Domain model for images from a collection
 *
 * @api
 */
class ImageFromCollection extends ImageBase {

	/**
	 * The TYPO3 resource factory which is required to retrieve the FAL file reference object
	 *
	 * @var \TYPO3\CMS\Core\Resource\ResourceFactory
	 * @transient
	 */
	protected static $resourceFactory = NULL;

	/**
	 * Retrieves the file reference object for this domain model
	 *
	 * @return \TYPO3\CMS\Core\Resource\FileReference
	 */
	public function getFile() {
		if (static::$resourceFactory === NULL) {
			static::$resourceFactory = GeneralUtility::makeInstance('TYPO3\CMS\Core\Resource\ResourceFactory');
		}
		return static::$resourceFactory->getFileObject($this->uid);
	}

}

