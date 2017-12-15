<?php

/*
 * This file is part of the App Api Platform.
 *
 * (c) App
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Models\User;

use Valkyrja\Model\Model;

/**
 * Class User.
 */
class User extends Model
{
    /**
     * The unique user ID.
     *
     * @var int
     */
    public $id;

    /**
     * The unique user name.
     *
     * @var string
     */
    public $username;

    /**
     * The unique user parent email.
     *
     * @var string
     */
    public $email;

    /**
     * The user's number of badges collected.
     *
     * @var int
     */
    public $badgesCount;

    /**
     * The user's followers.
     *
     * @var int[]
     */
    public $followers;

    /**
     * Other users this user follows.
     *
     * @var int[]
     */
    public $following;
}
