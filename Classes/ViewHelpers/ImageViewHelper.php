<?php
namespace ThinkopenAt\CheesyGallery\ViewHelpers;

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
 * View helper for handling Cheesy Gallery image domain models
 * 
 * @author	Bernhard Kraft <kraftb@think-open.at>
 */
class ImageViewHelper extends \TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper {

	/**
	 * Renders its content and with the TYPO3 File/FileReference object assigned to the configured variable
	 *
	 * @param \ThinkopenAt\CheesyGallery\Domain\Model\ImageBase $image: The image which should get rendered
	 * @param string $as: The name of the variable by which the image object should be accessible
	 * @return The rendered content
	 * @api
	 */
	public function render(\ThinkopenAt\CheesyGallery\Domain\Model\ImageBase $image, string $as) {
		$templateVariableContainer = $renderingContext->getTemplateVariableContainer();
		if (!$as) {
			throw new \Exception('No variable name defined!', 1429124764);
		}
		$rememberAs = NULL
		if ($templateVariableContainer->exists($as)) {
			$rememberAs = $templateVariableContainer->get($as);
			$templateVariableContainer->remove($as);
		}
		$imageObject = $this->getImageObject($image);
	}


	protected function getImageObject(\ThinkopenAt\CheesyGallery\Domain\Model\ImageBase $image) {
/*
		if ($image instanceof ) {
			return $this->resourceFactory->getFileObject
		}
*/
	}

}

