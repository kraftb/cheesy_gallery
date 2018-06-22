<?php
namespace ThinkopenAt\CheesyGallery\Domain\Repository;

/***************************************************************
*  Copyright notice
*
*  (c) 2015-2018 Bernhard Kraft (kraftb@think-open.at)
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
 * Repository for images from collections
 *
 * @api
 */
class ImageFromCollectionRepository extends \TYPO3\CMS\Extbase\Persistence\Repository {

	const TYPE_categories = 1;
	const TYPE_folder = 2;
	const TYPE_static = 4;
	const TYPE_custom = 8;

	/**
	 * The TYPO3 core file collection repository
	 *
	 * @var TYPO3\CMS\Core\Resource\FileCollectionRepository
	 * @inject
	 */
	protected $collectionRepository = NULL;

	/**
	 * The repository for static collections
	 *
	 * @var \ThinkopenAt\CheesyGallery\Domain\Repository\ImageFromFolderCollectionRepository
	 * @inject
	 */
	protected $folderCollectionRepository = NULL;

	/**
	 * The repository for static collections
	 *
	 * @var \ThinkopenAt\CheesyGallery\Domain\Repository\ImageFromStaticCollectionRepository
	 * @inject
	 */
	protected $staticCollectionRepository = NULL;


	public function initializeObject() {
		$querySettings = $this->createQuery()->getQuerySettings();
		$querySettings->setRespectStoragePage(FALSE);
//		$querySettings->setRespectSysLanguage(FALSE);
		$this->setDefaultQuerySettings($querySettings);
	}

	/**
	 * Returns the appropriate class constant for the passed collection type string
	 *
	 * @param string $collectionType: One of "categories", "folder", "static" or "custom"
	 */
	public function getCollectionTypeByString($collectionType) {
		switch ($collectionType) {
			case 'categories':
				return static::TYPE_categories;

			case 'folder':
				return static::TYPE_folder;

			case 'static':
				return static::TYPE_static;

			case 'custom':
				return static::TYPE_custom;

			default:
				throw new \Exception('Invalid collection type "' . $collectionType . '"!', 1429562417);
		}
	}

	public function findByCollection(FileCollection $collection) {
		switch ($collection->getType()) {
			case 'categories':
				return $this->findByCategoryCollection($collection);

			case 'folder':
				return $this->folderCollectionRepository->findByFolderCollection($collection);

			case 'static':
				return $this->staticCollectionRepository->findByStaticCollection($collection);

			default:
				return $this->findByCustomCollection($collection);
		}
	}

	public function findByCategoryCollection(FileCollection $collection) {
		echo "Category\n";
		var_dump($collection);
		exit();
//		$query = $this->createQuery();
//		$query->matching();
	}

	public function findByCustomCollection(FileCollection $collection) {
		$collectionObject = $this->collectionRepository->findByUid($collection->getUid());
		$collectionObject->loadContents();
		print_r($collectionObject->toArray());
		exit();
		foreach ($collection as $item) {
			echo get_class($item);
			exit();
		}
	}

}

