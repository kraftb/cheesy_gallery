<?php
namespace ThinkopenAt\CheesyGallery\Domain\Repository;

/***************************************************************
*  Copyright notice
*
*  (c) 2018 Bernhard Kraft (kraftb@think-open.at)
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

use \TYPO3\CMS\Core\Utility\GeneralUtility;
use \TYPO3\CMS\Extbase\Object\ObjectManager;
use \TYPO3\CMS\Core\Resource\ResourceStorage;
use \TYPO3\CMS\Core\Resource\StorageRepository;
use \TYPO3\CMS\Core\Resource\Folder;
use \TYPO3\CMS\Core\Resource\File as FileObject;
use \ThinkopenAt\CheesyGallery\Domain\Model\FileCollection;


/**
 * Repository for images from folder collections
 *
 * Images from static collection need a special repository because
 * static collection contain file references rather than directly files.
 *
 * @api
 */
class ImageFromFolderCollectionRepository extends \TYPO3\CMS\Extbase\Persistence\Repository {

    /**
     * Retrieves all files in the given folder collection.
     *
     * @param FileCollection $collection The folder/collection from which to retrieve files
     * @return Array<File> All files in the given folder (and eventually sub folders)
     */
	public function findByFolderCollection(FileCollection $collection) {
        if ($collection->getType() !== 'folder') {
            throw new \Exception('Invalid collection for this repository!');
        }

        $storageUid = $collection->getStorage();
        $storageRepository = GeneralUtility::makeInstance(ObjectManager::class)->get(StorageRepository::class);
        $storage = $storageRepository->findByUid( (int) $storageUid );
        if (! $storage instanceof ResourceStorage) {
            throw new \Exception('No resource storage set for collection "' . $collection->getTitle() . '".');
        }

        $folder = $storage->getFolder($collection->getFolder());
        if (! $folder instanceof Folder) {
            throw new \Exception('');
        }

        return $storage->getFilesInFolder($folder, 0, 0, true, $collection->getRecursive(), 'tstamp', true);
	}

}

