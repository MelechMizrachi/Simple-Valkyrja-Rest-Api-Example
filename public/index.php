<?php

/**
 * Valkyrja - PHP framework.
 *
 * @author Melech Mizrachi
 */

// Set a global constant for when the application as a whole started
define('APP_START', microtime(true));

/*
 *-------------------------------------------------------------------------
 * Composer Auto Loader Assemble!
 *-------------------------------------------------------------------------
 *
 * Autoload all the application namespaces, dependencies, and files using
 * composer to both manage all dependencies as well as register everything
 * for us to use within the application.
 *
 */

require_once __DIR__ . '/../vendor/autoload.php';

/*
 *-------------------------------------------------------------------------
 * Set The Base Directory
 *-------------------------------------------------------------------------
 *
 * Let's set the base directory within the web server for our application
 * so that when we locate directories and files within the application
 * we have a standard location from which to do so.
 *
 */

Valkyrja\Support\Directory::$BASE_PATH = __DIR__ . '/../';

/*
 *-------------------------------------------------------------------------
 * Setup The Application
 *-------------------------------------------------------------------------
 *
 * Let's setup the application by bootstrapping it. This will set the
 * correct environment class file to use, and appropriate the config
 * that should be loaded by the application. In dev you'll want to
 * use the default config out of the root config directory, but
 * when you're on a production environment definitely have
 * your config cached and the flag set in your env class.
 *
 */

// Here we'll set the env file to use
Valkyrja\Valkyrja::setEnv(config\Env::class);

/*
 *-------------------------------------------------------------------------
 * Start Up The Application
 *-------------------------------------------------------------------------
 *
 * Let's start up the application by creating a new instance of the
 * application class. This is going to bind all the various
 * components together into a singular hub.
 *
 */

$app = new Valkyrja\Valkyrja();

/*
 *-------------------------------------------------------------------------
 * Run The Application
 *-------------------------------------------------------------------------
 *
 * Now that the application has been bootstrapped and setup correctly
 * with all our requirements lets run it!
 *
 */

$app->kernel()->run();
