<?php

namespace Ludens\Builder;

use Dotenv\Dotenv;

class Application
{
    /**
     * @var string
     */
    private static string $baseDirectory;

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

        $dotenv = Dotenv::createImmutable($baseDirectory, $envFile);
        $dotenv->load();

        return new Application();
    }
}
