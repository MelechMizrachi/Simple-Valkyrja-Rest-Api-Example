<?php

namespace tests;

use config\EnvTest;
use PHPUnit\Framework\TestCase as PHPUnitTestCase;
use tests\traits\TestRequest;
use Valkyrja\Valkyrja;
use Valkyrja\Support\Directory;

/**
 * Class TestCase.
 */
class TestCase extends PHPUnitTestCase
{
    use TestRequest;

    /**
     * @var \Valkyrja\Application
     */
    protected $app;

    /**
     * Setup the test environment.
     *
     * @throws \Valkyrja\Exceptions\InvalidContainerImplementation
     * @throws \Valkyrja\Exceptions\InvalidDispatcherImplementation
     * @throws \Valkyrja\Exceptions\InvalidEventsImplementation
     *
     * @return void
     */
    public function setUp(): void
    {
        Directory::$BASE_PATH = __DIR__ . '/../';

        Valkyrja::setEnv(EnvTest::class);

        $this->app = new Valkyrja();
    }
}
