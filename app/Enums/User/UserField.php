<?php

/*
 * This file is part of the App Api Platform.
 *
 * (c) App
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Enums\User;

use Valkyrja\Enum\Enum;

/**
 * Enum Controller.
 */
final class UserField extends Enum
{
    public const ID           = 'id';
    public const USERNAME     = 'username';
    public const EMAIL        = 'email';
    public const BADGES_COUNT = 'badgesCount';
    public const FOLLOWERS    = 'followers';
    public const FOLLOWING    = 'following';
}
