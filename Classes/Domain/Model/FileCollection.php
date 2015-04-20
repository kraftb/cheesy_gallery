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
 * Repository for images from collections
 *
 * @api
 */
class FileCollection extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * The type of the collection
	 *
	 * @var string
	 */
	protected $type = '';

	/**
	 * The title of the collection
	 *
	 * @var string
	 */
	protected $title = '';

	/**
	 * The description of the collection
	 *
	 * @var string
	 */
	protected $description = '';

	/**
	 * Returns the type of the file collection
	 *
	 * @return string The type of the file collection
	 */
	public function getType() {
		return $this->type;
	}

	/**
	 * Sets the type of the file collection
	 *
	 * @param string $type: The type which should get set
	 * @return void
	 */
	public function setType($type) {
		$this->type = $type;
	}

	/**
	 * Returns the title of the file collection
	 *
	 * @return string The title of the file collection
	 */
	public function getTitle() {
		return $this->title;
	}

	/**
	 * Sets the title of the file collection
	 *
	 * @param string $title: The title which should get set
	 * @return void
	 */
	public function setTitle($title) {
		$this->title = $title;
	}

	/**
	 * Returns the description of the file collection
	 *
	 * @return string The description of the file collection
	 */
	public function getDescription() {
		return $this->description;
	}

	/**
	 * Sets the description of the file collection
	 *
	 * @param string $description: The description which should get set
	 * @return void
	 */
	public function setDescription($description) {
		$this->description = $description;
	}

}

