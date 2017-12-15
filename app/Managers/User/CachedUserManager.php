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

use App\Enums\User\UserField;
use App\Models\User\User;
use App\Services\CacheService;

/**
 * Class CachedUserManager.
 *
 * @Service(id = App\Managers\User\UserManager)
 * @ServiceAlias(id = App\Managers\User\UserManager, name = userManager)
 */
class CachedUserManager implements UserManager
{
    /**
     * The cache service.
     *
     * @var CacheService
     */
    protected $cacheService;

    /**
     * The MySQL User Manager.
     *
     * @var MySQLUserManager
     */
    protected $mySQLUserManager;

    /**
     * CachedUserManager constructor.
     *
     * @param CacheService     $cacheService     The cache service
     * @param MySQLUserManager $mySQLUserManager The MySQL User Manager
     */
    public function __construct(CacheService $cacheService, MySQLUserManager $mySQLUserManager)
    {
        $this->cacheService     = $cacheService;
        $this->mySQLUserManager = $mySQLUserManager;
    }

    /**
     * Find a model given a unique id.
     *
     * @param int $id The id to find
     *
     * @return null|User
     *  Null if no model exists, model class if exists
     */
    public function find(int $id):? User
    {
        // Attempt to get the results from the cache service
        if (null === $cachedUser = $this->cacheService->find(['id' => $id])) {
            // Create a new user object
            $user = new User();

            // Set all the properties
            $user->id          = $id;
            $user->username    = $cachedUser[UserField::USERNAME];
            $user->email       = $cachedUser[UserField::EMAIL];
            $user->badgesCount = $cachedUser[UserField::BADGES_COUNT];
            $user->followers   = $cachedUser[UserField::FOLLOWERS];
            $user->following   = $cachedUser[UserField::FOLLOWING];

            return $user;
        }

        // Attempt to get the results from mysql
        $mysqlUser = $this->mySQLUserManager->find($id);

        // If there are results
        if (null !== $mysqlUser) {
            // Store the results in cache to avoid having to go to mysql again
            $this->cacheService->save((array) $mysqlUser);
        }

        return $mysqlUser;
    }

    /**
     * Find a model by a given field.
     *
     * @param string $field The field to search
     * @param mixed  $value The value to search for
     *
     * @return null|User
     *  Null if no model exists, model class if exists
     */
    public function findBy(string $field, $value):? User
    {
    }

    /**
     * Get all models.
     *
     * @param array $options [optional] Any options to narrow down the result set
     *
     * @return User[]
     *  Array of models
     */
    public function all(array $options = null): array
    {
    }

    /**
     * Create a new entry via a model.
     *
     * @param User $user The model to create
     *
     * @return bool
     *  True if created successfully, False if failure
     */
    public function create(User $user): bool
    {
    }

    /**
     * Save an existing entry via model updates.
     *
     * @param User $user The model to save
     *
     * @return bool
     *  True if saved successfully, False if failure
     */
    public function save(User $user): bool
    {
    }

    /**
     * Delete an existing entry via its unique id.
     *
     * @param int $id The entry id to delete
     *
     * @return bool
     *  True if deleted successfully, False if failure
     */
    public function delete(int $id): bool
    {
    }

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
    public function isFollowing(int $userId, int $followingId): bool
    {
    }

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
    public function isFollower(int $userId, int $followerId): bool
    {
    }

    /**
     * Check if a give user has followers.
     *
     * @param int $userId The user id
     *
     * @return bool
     *  True if the user has followers, False if no followers
     */
    public function hasFollowers(int $userId): bool
    {
        return !empty($this->getFollowers($userId));
    }

    /**
     * Get followers for a given user id.
     *
     * @param int $userId The user id
     *
     * @return null|int[]
     *  Array of user models of followers
     *  Null if error
     */
    public function getFollowers(int $userId):? array
    {
        $user = $this->find($userId);

        if (null === $user) {
            return [];
        }

        return $user->followers;
    }

    /**
     * Get users a given user is following.
     *
     * @param int $userId The user id
     *
     * @return null|int[]
     *  Array of user models of other users the given user is following
     *  Null if error
     */
    public function getFollowing(int $userId):? array
    {
        $user = $this->find($userId);

        if (null === $user) {
            return [];
        }

        return $user->following;
    }
}
