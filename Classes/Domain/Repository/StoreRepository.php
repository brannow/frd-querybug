<?php
namespace FRD\FrdQuerybug\Domain\Repository;

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
use FRD\FrdQuerybug\Domain\Model\Store;
use TYPO3\CMS\Extbase\Persistence\QueryResultInterface;
use TYPO3\CMS\Extbase\Persistence\Repository;
use TYPO3\CMS\Extbase\Persistence\QueryInterface;

class StoreRepository extends Repository
{
    /**
     * @var array
     */
   //protected $defaultOrderings = [
    //    'sorting' => QueryInterface::ORDER_ASCENDING
    //];

    /**
     * Ignore storage UID
     *
     * @return CityRepository
     */
    public function globalMode(): self
    {
        $settings = $this->createQuery()->getQuerySettings();
        $settings->setRespectStoragePage(false);
        $this->setDefaultQuerySettings($settings);

        return $this;
    }
}
