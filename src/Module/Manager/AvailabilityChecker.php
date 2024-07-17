<?php
/**
 * MagedIn Technology
 *
 * Do not edit this file if you want to update this module for future new versions.
 *
 * @category  MagedIn
 * @copyright Copyright (c) 2024 MagedIn Technology.
 *
 * @author    MagedIn Support <support@magedin.com>
 */

declare(strict_types=1);

namespace MagedIn\Framework\Magento2\Module\Manager;

use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Module\Manager;

/**
 * DocBlock for AvailabilityChecker class.
 */
class AvailabilityChecker
{
    /**
     * @var Manager
     */
    private Manager $moduleManager;

    /**
     * @param Manager $moduleManager
     */
    public function __construct(
        Manager $moduleManager
    ) {
        $this->moduleManager = $moduleManager;
    }

    /**
     * DocBlock for method.
     *
     * @param string $moduleName
     * @param bool $graceful
     *
     * @return bool
     * @throws LocalizedException
     */
    public function isModuleEnabled(string $moduleName, bool $graceful = false): bool
    {
        if (!$this->moduleManager->isEnabled($moduleName)) {
            if (true === $graceful) {
                return false;
            }
            $message = base64_decode('UGxlYXNlIGFjdGl2YXRlIHRoZSAlMSBtb2R1bGUu');
            throw new LocalizedException(__($message, $moduleName));
        }
        return true;
    }
}
