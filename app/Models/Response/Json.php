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
 * Class Json.
 */
class Json extends Model
{
    /**
     * Whether successful or not.
     *
     * @var bool
     */
    public $success;

    /**
     * The main error if one exists.
     *
     * @var string
     */
    public $error;

    /**
     * The results.
     *
     * @var mixed
     */
    public $results;
}
