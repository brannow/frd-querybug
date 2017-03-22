<?php
namespace FRD\FrdQuerybug\Controller;

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

use FRD\FrdQuerybug\Domain\Model\City;
use FRD\FrdQuerybug\Domain\Model\Store;
use FRD\FrdQuerybug\Domain\Model\Zone;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use TYPO3\CMS\Extbase\Persistence\Generic\PersistenceManager;

class QueryTestController extends ActionController
{
    /**
     * @var \FRD\FrdQuerybug\Domain\Repository\CityRepository
     * @inject
     */
    protected $cityRepository;

    /**
     * @var \FRD\FrdQuerybug\Domain\Repository\StoreRepository
     * @inject
     */
    protected $storeRepository;

    /**
     * Simple Test
     */
    public function indexAction()
    {
        /** @var Store $storeA */
        $stores = $this->storeRepository->findAll()->toArray();

        $store = null;
        if(!empty($stores)) {
            $randStoreIndex = array_rand($stores);
            $store = $stores[$randStoreIndex];
        }


        // default
        $cities = $this->cityRepository->globalMode()->findByStore($store);
        $this->view->assign('cities', $cities);
        $this->view->assign('expectedCities', array_unique($cities->toArray()));
    }

    /**
     *
     */
    public function createAction()
    {
        /** @var PersistenceManager $pm */
        $pm = $this->objectManager->get(PersistenceManager::class);

        $stores = [];
        for ($i = 0; $i < rand(2, 6); ++$i) {
            $stores[] = $this->createStore();
        }

        for ($i = 0; $i < rand(2, 6); ++$i) {
            $city = $this->createCity();
            for ($a = 0; $a < rand(2, 5); ++$a) {
                $city->addInnerZone($this->createZone(...$stores));
            }
            for ($a = 0; $a < rand(2, 5); ++$a) {
                $city->addOuterZone($this->createZone(...$stores));
            }

            $pm->add($city);
        }
        $pm->persistAll();
        $this->redirect('index');
    }

    /**
     * @return Store
     */
    protected function createStore(): Store
    {
        /** @var Store $store */
        $store = GeneralUtility::makeInstance(Store::class);
        $store->setTitle('store_' . uniqid());
        return $store;
    }

    /**
     * @return City
     */
    protected function createCity(): City
    {
        /** @var City $city */
        $city = GeneralUtility::makeInstance(City::class);
        $city->setTitle('city_' . uniqid());
        return $city;
    }

    /**
     * @param Store[] ...$stores
     * @return Zone
     */
    protected function createZone(Store ...$stores): Zone
    {
        /** @var Zone $zone */
        $zone = GeneralUtility::makeInstance(Zone::class);
        $zone->setTitle('zone_' . uniqid());
        foreach ($stores as $store) {
            $zone->addStore($store);
        }
        return $zone;
    }
}
