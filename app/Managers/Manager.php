<?php

/*
 * This file is part of the App Api Platform.
 *
 * (c) App
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Managers;

use Valkyrja\Model\Model;

/**
 * Interface Manager.
 */
interface Manager
{
    /**
     * Find a model given a unique id.
     *
     * @param mixed $id The id to find
     *
     * @return null|Model
     *  Null if no model exists, model class if exists
     *
     * NOTE: Not typecast with :? Model to avoid php error of similar syntax requirement and allow
     *  flexibility for child interfaces to specify a certain model (:? User as an example).
     */
    public function find($id);

    /**
     * Find a model by a given field.
     *
     * @param string $field The field to search
     * @param mixed  $value The value to search for
     *
     * @return null|Model
     *  Null if no model exists, model class if exists
     *
     * NOTE: Not typecast with :? Model to avoid php error of similar syntax requirement and allow
     *  flexibility for child interfaces to specify a certain model (:? User as an example).
     */
    public function findBy(string $field, $value);

    /**
     * Get all models.
     *
     * @param array $options [optional] Any options to narrow down the result set
     *
     * @return Model[]
     *  Array of models
     */
    public function all(array $options = null): array;

    /**
     * Create a new entry via a model.
     *
     * @param Model $model The model to create
     *
     * @return bool
     *  True if created successfully, False if failure
     *
     * NOTE: Not typecast with (Model $model) to avoid php error of similar syntax requirement and allow
     *  flexibility for child interfaces to specify a certain model (User $user) as an example.
     */
    public function create($model): bool;

    /**
     * Save an existing entry via model updates.
     *
     * @param Model $model The model to save
     *
     * @return bool
     *  True if saved successfully, False if failure
     *
     * NOTE: Not typecast with (Model $model) to avoid php error of similar syntax requirement and allow
     *  flexibility for child interfaces to specify a certain model (User $user) as an example.
     */
    public function save($model): bool;

    /**
     * Delete an existing entry via its unique id.
     *
     * @param mixed $id The entry id to delete
     *
     * @return bool
     *  True if deleted successfully, False if failure
     */
    public function delete($id): bool;
}
