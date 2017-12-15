<?php

/*
 *-------------------------------------------------------------------------
 * Logger Configuration
 *-------------------------------------------------------------------------
 *
 * Logging is very helpful in understanding what occurs within your
 * application when its deployed and used by multiple users aside
 * from you and your developers. Configure that helpfulness here.
 *
 */
return [
    /*
     *-------------------------------------------------------------------------
     * Logger Log Name
     *-------------------------------------------------------------------------
     *
     * //
     *
     */
    'name'     => env('LOGGER_NAME', 'ApplicationLog'),

    /*
     *-------------------------------------------------------------------------
     * Logger Log File Path
     *-------------------------------------------------------------------------
     *
     * //
     *
     */
    'filePath' => env('LOGGER_FILE_PATH', storagePath('logs/valkyrja.log')),
];
