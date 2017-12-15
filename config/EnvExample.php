<?php

namespace config;

use Valkyrja\Config\Env as ValkyrjaEnv;

/**
 * Class Env.
 */
class Env extends ValkyrjaEnv
{
    public const APP_ENV      = 'local';
    public const APP_DEBUG    = true;
    public const APP_URL      = 'localhost';
    public const APP_TIMEZONE = 'UTC';
    public const APP_VERSION  = '1 (ALPHA)';
}
