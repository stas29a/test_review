<?php
namespace src_refactored\Integration;

use DateTime;
use Exception;
use Psr\Cache\CacheItemPoolInterface;
use Psr\Log\LoggerInterface;


class CachedDataProvider implements IDataProvider
{
    /** @var CacheItemPoolInterface  */
    private $cache;

    /** @var LoggerInterface  */
    private $logger;

    /** @var   */
    private $dataProvider;

    /**
     * CachedDataProvider constructor.
     * @param CacheItemPoolInterface $cache
     * @param LoggerInterface $logger
     * @param DataProvider $dataProvider
     */
    public function __construct(CacheItemPoolInterface $cache, LoggerInterface $logger, DataProvider $dataProvider)
    {
        $this->dataProvider = $dataProvider;
        $this->cache = $cache;
        $this->logger = $logger;
    }

    /**
     * @param Request $request
     * @return null|Response
     */
    public function get(Request $request): ?Response
    {
        try {
            $cacheKey = $this->getCacheKey($request);
            $cacheItem = $this->cache->getItem($cacheKey);
            if ($cacheItem->isHit()) {
                return $cacheItem->get();
            }

            $result = $this->dataProvider->get($request);

            $cacheItem
                ->set($result)
                ->expiresAt(
                    (new DateTime())->modify('+1 day')
                );

            return $result;
        } catch (Exception $e) {
            $this->logger->critical('Error');
        }

        return null;
    }


    /**
     * @param Request $input
     * @return string
     */
    private function getCacheKey(Request $input)
    {
        return json_encode($input);
    }
}