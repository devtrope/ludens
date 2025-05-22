<?php

namespace Ludens\Builder;

class Application
{
    /**
     * @var string
     */
    private static string $baseDirectory;

    /**
     * @var string
     */
    private const DEFAULT_CONTROLLER = 'home';

    /**
     * @var string
     */
    private const DEFAULT_METHOD = 'index';

    /**
     * Adds the environment variables to the application.
     *
     * @param string $baseDir
     * @return Application
     */
    public static function setup(string $baseDirectory): Application
    {
        self::$baseDirectory = $baseDirectory;
        $envFile = file_exists(self::$baseDirectory . '/.env')
            ? '.env'
            : '.env.example';

        $dotenv = \Dotenv\Dotenv::createImmutable($baseDirectory, $envFile);
        $dotenv->load();

        return new Application();
    }

    /**
     * Returns the base directory of the application.
     *
     * @return string
     */
    public static function getBaseDir(): string
    {
        return self::$baseDirectory;
    }

    /**
     * Returns the default controller of the application.
     *
     * @return string
     */
    public static function getDefaultController(): string
    {
        return self::DEFAULT_CONTROLLER;
    }

    /**
     * Returns the default method of the application.
     *
     * @return string
     */
    public static function getDefaultMethod(): string
    {
        return self::DEFAULT_METHOD;
    }

    /**
     * Runs the application.
     *
     * @return void
     */
    public function run()
    {
        Kernel::handle(new \Ludens\Http\Request());
    }
}
