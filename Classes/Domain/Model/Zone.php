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
 * Zone
 */
class Zone extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{
    /**
     * title
     *
     * @var string
     */
    protected $title = '';

    /**
     * stores
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\FRD\FrdQuerybug\Domain\Model\Store>
     */
    protected $stores = null;

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
        $this->stores = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
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
     * Adds a Store
     *
     * @param \FRD\FrdQuerybug\Domain\Model\Store $store
     * @return void
     */
    public function addStore(\FRD\FrdQuerybug\Domain\Model\Store $store)
    {
        $this->stores->attach($store);
    }

    /**
     * Removes a Store
     *
     * @param \FRD\FrdQuerybug\Domain\Model\Store $storeToRemove The Store to be removed
     * @return void
     */
    public function removeStore(\FRD\FrdQuerybug\Domain\Model\Store $storeToRemove)
    {
        $this->stores->detach($storeToRemove);
    }

    /**
     * Returns the stores
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\FRD\FrdQuerybug\Domain\Model\Store> $stores
     */
    public function getStores()
    {
        return $this->stores;
    }

    /**
     * Sets the stores
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\FRD\FrdQuerybug\Domain\Model\Store> $stores
     * @return void
     */
    public function setStores(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $stores)
    {
        $this->stores = $stores;
    }
}
