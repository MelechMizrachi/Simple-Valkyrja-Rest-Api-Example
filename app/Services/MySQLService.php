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
 * Interface MySQLService.
 *
 * NOTE: EXAMPLE NOT TO BE TAKEN LITERALLY
 *
 * @Service(id = App\Services\MySQLService)
 * @ServiceAlias(id = App\Services\MySQLService, name = mySQLService)
 */
interface MySQLService
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
