<?php

/*
 * This file is part of the App Api Platform.
 *
 * (c) App
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Managers\User;

use App\Managers\Manager;
use App\Models\User\User;

/**
 * Interface FollowManager.
 */
interface UserManager extends Manager
{
    /**
     * Find a model given a unique id.
     *
     * @param int $id The id to find
     *
     * @return null|User
     *  Null if no model exists, model class if exists
     */
    public function find(int $id):? User;

    /**
     * Find a model by a given field.
     *
     * @param string $field The field to search
     * @param mixed $value The value to search for
     *
     * @return null|User
     *  Null if no model exists, model class if exists
     */
    public function findBy(string $field, $value):? User;

    /**
     * Get all models.
     *
     * @param array $options [optional] Any options to narrow down the result set
     *
     * @return User[]
     *  Array of models
     */
    public function all(array $options = null): array;

    /**
     * Create a new entry via a model.
     *
     * @param User $user The model to create
     *
     * @return bool
     *  True if created successfully, False if failure
     */
    public function create(User $user): bool;

    /**
     * Save an existing entry via model updates.
     *
     * @param User $user The model to save
     *
     * @return bool
     *  True if saved successfully, False if failure
     */
    public function save(User $user): bool;

    /**
     * Delete an existing entry via its unique id.
     *
     * @param int $id The entry id to delete
     *
     * @return bool
     *  True if deleted successfully, False if failure
     */
    public function delete(int $id): bool;

    /**
     * Check if a given user is following another user.
     *
     * @param int $userId      The user id
     * @param int $followingId The id of the potential followed user
     *
     * @return bool
     *  True if the given user is following the other user id
     *  False if the given user if following the other user id
     */
    public function isFollowing(int $userId, int $followingId): bool;

    /**
     * Check if a given user if being followed by another user.
     *
     * @param int $userId     The user id
     * @param int $followerId The id of the potential follower
     *
     * @return bool
     *  True if the follower is following the given user id
     *  False if the follower is not following the given user id
     */
    public function isFollower(int $userId, int $followerId): bool;

    /**
     * Check if a give user has followers.
     *
     * @param int $userId The user id
     *
     * @return bool
     *  True if the user has followers, False if no followers
     */
    public function hasFollowers(int $userId): bool;

    /**
     * Get followers for a given user id.
     *
     * @param int $userId The user id
     *
     * @return null|int[]
     *  Array of user models of followers
     *  Null if error
     */
    public function getFollowers(int $userId):? array;

    /**
     * Get users a given user is following.
     *
     * @param int $userId The user id
     *
     * @return null|int[]
     *  Array of user models of other users the given user is following
     *  Null if error
     */
    public function getFollowing(int $userId):? array;
}
