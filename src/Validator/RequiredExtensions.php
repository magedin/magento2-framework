<?php
/**
 * MagedIn Technology
 *
 * Do not edit this file if you want to update this module for future new versions.
 *
 * @category  MagedIn
 * @copyright Copyright (c) 2025 MagedIn Technology.
 *
 * @author    MagedIn Support <support@magedin.com>
 */

declare(strict_types=1);

namespace MagedIn\Framework\Magento2\Validator;

use MagedIn\Framework\Magento2\Module\Manager\AvailabilityChecker;
use Magento\Framework\Exception\LocalizedException;

/**
 * DocBlock for RequiredExtensions class.
 */
class RequiredExtensions
{
    /**
     * @var array
     */
    private array $requiredExtensions = [];

    /**
     * @var AvailabilityChecker
     */
    private AvailabilityChecker $availabilityChecker;

    /**
     * @param AvailabilityChecker $availabilityChecker
     * @param array $requiredExtensions
     */
    public function __construct(
        AvailabilityChecker $availabilityChecker,
        array $requiredExtensions = []
    ) {
        $this->requiredExtensions = $requiredExtensions;
        $this->availabilityChecker = $availabilityChecker;
    }

    /**
     * DocBlock for method.
     *
     * @return void
     * @throws LocalizedException
     */
    public function areRequiredExtensionsEnabled(): void
    {
        foreach ($this->requiredExtensions as $extension) {
            $extension = base64_decode($extension);
            $this->availabilityChecker->isModuleEnabled($extension);
        }
    }

    /**
     * DocBlock for method.
     *
     * @return string
     */
    public function getIdentifier(): string
    {
        $identifier = 'bWFnZWRpbl9pbmFjdGl2ZV9leHRlbnNpb25zX21lc3NhZ2U=';
        return base64_decode($identifier);
    }
}
