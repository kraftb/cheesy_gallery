<?php
namespace ThinkopenAt\CheesyGallery\Controller;

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

use TYPO3\CMS\Core\Utility\GeneralUtility;

/**
 * Controller for displaying the gallery
 *
 * @api
 */
class GalleryController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {

	/**
	 * Repository for retrieving file collections
	 *
	 * @var \ThinkopenAt\CheesyGallery\Domain\Repository\FileCollectionRepository
	 * @inject
	 */
	protected $fileCollectionRepository = NULL;

	/**
	 * Repository for retrieving images of collections
	 *
	 * @var \ThinkopenAt\CheesyGallery\Domain\Repository\ImageFromCollectionRepository
	 * @inject
	 */
	protected $imageFromCollectionRepository = NULL;

	public function indexAction() {
		$collectionsData = $this->fileCollectionRepository->findAll();
		$collections = array();
		foreach ($collectionsData as $collection) {
			$collectionUid = $collection->getUid();
			$collections[$collectionUid] = array(
				'collection' => $collection,
				'images' => $this->imageFromCollectionRepository->findByCollection($collection),
			);
		}
		$this->view->assign('collections', $collections);
	}

	public function listAction(\TYPO3\CMS\Core\Resource\Collection\AbstractFileCollection $collection = NULL) {
		if ($collection === NULL) {
			$this->forward('index');
		}
		$collectionUid = $collection->getUid();
		$collections = array(
			$collectionUid => array(
				'collection' => $collection,
				'images' => $this->imageFromCollectionRepository->findByCollection($collection),
			)
		);
		$this->view->assign('collections', $collections);
	}

	public function detailAction(\TYPO3\CMS\Core\Resource\AbstractFile $image) {
		if ($image->getType !== \TYPO3\CMS\Core\Resource\AbstractFile::FILETYPE_IMAGE) {
			throw new \Exception('Detail action called for a non-image file!', 1429073545);
		}
		$this->view->assign('image', $image);
	}

	public function latestAction() {
		$amountLatest = intval($this->settings['latest']['amount']) ? : 5;
		$collectionTypes = array();
		$fromCollectionTypes = GeneralUtility::trimExplode(',', $this->settings['latest']['fromCollectionTypes'], TRUE);
		foreach ($fromCollectionTypes as $collectionType) {
			$collectionTypes[] = $this->imageFromCollectionRepository->getCollectionTypeByString($collectionType);
		}
		$this->view->assign('images', $this->imageFromCollectionRepository->findLatest($amountLatest, $collectionTypes));
	}

}

