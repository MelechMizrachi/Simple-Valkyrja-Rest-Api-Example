<?php

/*
 *-------------------------------------------------------------------------
 * Routing Configuration
 *-------------------------------------------------------------------------
 *
 * A pretty big part of getting a user what they've requested is being
 * able to properly route a request through your application. In
 * order to do that you'll need to configure it. Lucky for you
 * all the configurations for routing can be found here.
 *
 */
return [
    /*
     *-------------------------------------------------------------------------
     * Routing Use Trailing Slash
     *-------------------------------------------------------------------------
     *
     * //
     *
     */
    'trailingSlash'             => env('ROUTING_TRAILING_SLASH', false),

    /*
     *-------------------------------------------------------------------------
     * Routing Use Absolute Urls
     *-------------------------------------------------------------------------
     *
     * //
     *
     */
    'useAbsoluteUrls'           => env('ROUTING_USE_ABSOLUTE_URLS', false),

    /*
     *-------------------------------------------------------------------------
     * Routing Middleware
     *-------------------------------------------------------------------------
     *
     * //
     *
     */
    'middleware'                => env('ROUTING_MIDDLEWARE', []),

    /*
     *-------------------------------------------------------------------------
     * Routing Middleware Groups
     *-------------------------------------------------------------------------
     *
     * //
     *
     */
    'middlewareGroups'          => env('ROUTING_MIDDLEWARE_GROUPS', []),

    /*
     *-------------------------------------------------------------------------
     * Routing Use Annotations
     *-------------------------------------------------------------------------
     *
     * //
     *
     */
    'useAnnotations'            => env('ROUTING_USE_ANNOTATIONS', false),

    /*
     *-------------------------------------------------------------------------
     * Routing Use Annotations Exclusively
     *-------------------------------------------------------------------------
     *
     * //
     *
     */
    'useAnnotationsExclusively' => env('ROUTING_USE_ANNOTATIONS_EXCLUSIVELY', false),

    /*
     *-------------------------------------------------------------------------
     * Routing Annotation Classes
     *-------------------------------------------------------------------------
     *
     * //
     *
     */
    'controllers'               => env('ROUTING_CONTROLLERS', []),

    /*
     *-------------------------------------------------------------------------
     * Routing Bootstrap File Path
     *-------------------------------------------------------------------------
     *
     * //
     *
     */
    'filePath'                  => env('ROUTING_FILE_PATH', routesPath('routes.php')),

    /*
     *-------------------------------------------------------------------------
     * Routing Cache File Path
     *-------------------------------------------------------------------------
     *
     * //
     *
     */
    'cacheFilePath'             => env('ROUTING_CACHE_FILE_PATH', cachePath('routes.php')),

    /*
     *-------------------------------------------------------------------------
     * Routing Use Cache File
     *-------------------------------------------------------------------------
     *
     * //
     *
     */
    'useCache'                  => env('ROUTING_USE_CACHE_FILE', false),
];
