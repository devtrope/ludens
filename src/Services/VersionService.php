<?php

namespace App\Services;

use Composer\InstalledVersions;

class VersionService
{
    private const FRAMEWORK = 'devtrope/framework';

    public function getFrameworkVersion(): string
    {
        return InstalledVersions::getPrettyVersion(self::FRAMEWORK);
    }
}
