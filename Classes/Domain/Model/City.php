<?php
namespace FRD\FrdQuerybug\Domain\Model;

/***
 *
 * This file is part of the "Query Test" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *  (c) 2017 Benjamin Rannow <b.rannow@familie-redlich.de>, Familie Redlich Digital
 *
 ***/

/**
 * City
 */
class City extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{
    /**
     * title
     *
     * @var string
     */
    protected $title = '';

    /**
     * innerZone
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\FRD\FrdQuerybug\Domain\Model\Zone>
     * @cascade remove
     */
    protected $innerZone = null;

    /**
     * outerZone
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\FRD\FrdQuerybug\Domain\Model\Zone>
     * @cascade remove
     */
    protected $outerZone = null;

    /**
     * __construct
     */
    public function __construct()
    {
        //Do not remove the next line: It would break the functionality
        $this->initStorageObjects();
    }

    /**
     * Initializes all ObjectStorage properties
     * Do not modify this method!
     * It will be rewritten on each save in the extension builder
     * You may modify the constructor of this class instead
     *
     * @return void
     */
    protected function initStorageObjects()
    {
        $this->innerZone = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $this->outerZone = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
    }

    /**
     * Returns the title
     *
     * @return string $title
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Sets the title
     *
     * @param string $title
     * @return void
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * Adds a Zone
     *
     * @param \FRD\FrdQuerybug\Domain\Model\Zone $innerZone
     * @return void
     */
    public function addInnerZone(\FRD\FrdQuerybug\Domain\Model\Zone $innerZone)
    {
        $this->innerZone->attach($innerZone);
    }

    /**
     * Removes a Zone
     *
     * @param \FRD\FrdQuerybug\Domain\Model\Zone $innerZoneToRemove The Zone to be removed
     * @return void
     */
    public function removeInnerZone(\FRD\FrdQuerybug\Domain\Model\Zone $innerZoneToRemove)
    {
        $this->innerZone->detach($innerZoneToRemove);
    }

    /**
     * Returns the innerZone
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\FRD\FrdQuerybug\Domain\Model\Zone> $innerZone
     */
    public function getInnerZone()
    {
        return $this->innerZone;
    }

    /**
     * Sets the innerZone
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\FRD\FrdQuerybug\Domain\Model\Zone> $innerZone
     * @return void
     */
    public function setInnerZone(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $innerZone)
    {
        $this->innerZone = $innerZone;
    }

    /**
     * Adds a Zone
     *
     * @param \FRD\FrdQuerybug\Domain\Model\Zone $outerZone
     * @return void
     */
    public function addOuterZone(\FRD\FrdQuerybug\Domain\Model\Zone $outerZone)
    {
        $this->outerZone->attach($outerZone);
    }

    /**
     * Removes a Zone
     *
     * @param \FRD\FrdQuerybug\Domain\Model\Zone $outerZoneToRemove The Zone to be removed
     * @return void
     */
    public function removeOuterZone(\FRD\FrdQuerybug\Domain\Model\Zone $outerZoneToRemove)
    {
        $this->outerZone->detach($outerZoneToRemove);
    }

    /**
     * Returns the outerZone
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\FRD\FrdQuerybug\Domain\Model\Zone> $outerZone
     */
    public function getOuterZone()
    {
        return $this->outerZone;
    }

    /**
     * Sets the outerZone
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\FRD\FrdQuerybug\Domain\Model\Zone> $outerZone
     * @return void
     */
    public function setOuterZone(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $outerZone)
    {
        $this->outerZone = $outerZone;
    }
}
