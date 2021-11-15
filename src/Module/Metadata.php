<?php
/**
 * MagedIn Technology
 *
 * Do not edit this file if you want to update this module for future new versions.
 *
 * @category  MagedIn
 * @copyright Copyright (c) 2021 MagedIn Technology.
 *
 * @author    MagedIn Support <support@magedin.com>
 */

declare(strict_types=1);

namespace MagedIn\Framework\Magento2\Module;

use Magento\Framework\Module\PackageInfo;

class Metadata
{
    /**
     * @var PackageInfo
     */
    private PackageInfo $packageInfo;

    /**
     * @param PackageInfo $packageInfo
     */
    public function __construct(
        PackageInfo $packageInfo
    ) {
        $this->packageInfo = $packageInfo;
    }

    /**
     * @param string $packageName
     * @return string
     */
    public function getVersion(string $packageName): string
    {
        return $this->getPackageVersion($packageName);
    }

    /**
     * Get package version.
     *
     * @param string $packageName
     * @return string
     */
    private function getPackageVersion(string $packageName): string
    {
        $moduleName = $this->convertToModuleName($packageName);
        $moduleVersion = $this->packageInfo->getVersion($moduleName);

        if ($moduleVersion) {
            return $moduleVersion;
        }

        /** If nothing is returned from either composer or local modules, we return an unknown version message. */
        return (string) __('Unknown Module Version');
    }

    /**
     * Converts package name to module name. If the $packageName is already the module name, return it as it is.
     *
     * @param string $packageName
     * @return string
     */
    private function convertToModuleName(string $packageName): string
    {
        if (strpos($packageName, '/') !== false) {
            return $this->packageInfo->getModuleName($packageName);
        }
        return $packageName;
    }
}
