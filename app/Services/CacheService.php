<?php

/*
 * This file is part of the App Api Platform.
 *
 * (c) App
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Services;

/**
 * Interface CacheService.
 *
 * NOTE: EXAMPLE NOT TO BE TAKEN LITERALLY
 *
 * @Service(id = App\Services\CacheService)
 * @ServiceAlias(id = App\Services\CacheService, name = cacheService)
 */
interface CacheService
{
    /**
     * Find results via given criteria
     *
     * @param array $criteria Criteria for the service to use to find results
     *
     * @return array
     */
    public function find(array $criteria): array;

    public function create(array $contents): bool;

    public function save(array $contents): bool;

    public function delete(array $criteria): bool;
}
