<?php
namespace ThinkopenAt\CheesyGallery\Domain\Repository;

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

use \ThinkopenAt\CheesyGallery\Domain\Model\FileCollection;

/**
 * Repository for images from static collections
 *
 * Images from static collection need a special repository because
 * static collection contain file references rather than directly files.
 *
 * @api
 */
class ImageFromStaticCollectionRepository extends \TYPO3\CMS\Extbase\Persistence\Repository {

	public function initializeObject() {
		$querySettings = $this->createQuery()->getQuerySettings();
		$querySettings->setRespectStoragePage(FALSE);
//		$querySettings->setRespectSysLanguage(FALSE);
		$this->setDefaultQuerySettings($querySettings);
	}

	public function findByStaticCollection(FileCollection $collection) {
		$query = $this->createQuery();
		$query->matching($query->logicalAnd(
			$query->equals('tablenames', 'sys_file_collection'),
			$query->equals('fieldname', 'files'),
			$query->equals('uidForeign', $collection->getUid())
		));
				
		$query->setOrderings(array(
			'sortingForeign' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING,
		));

		return $query->execute();
	}

	/**
	 * Finds the latest images from static collections
	 *
	 * @param integer $amount: The number of images to find
	 * @return array<Integer, \ThinkopenAt\CheesyGallery\Domain\Model\ImageFromCollection> An array with timestamps as key and images as values
	 */
	public function findLatest($amount) {
		$query = $this->createQuery();
		$query->matching($query->logicalAnd(
			$query->equals('tablenames', 'sys_file_collection'),
			$query->equals('fieldname', 'files')
		));
				
		$query->setOrderings(array(
			'lastChangeTime' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_DESCENDING,
		));
		$query->setLimit($amount);
		$matching = $query->execute();
		$result = array();
		foreach ($matching as $item) {
			$result[$item->getLastChangeTime()][] = $item;
		}
		return $result;
	}

}

