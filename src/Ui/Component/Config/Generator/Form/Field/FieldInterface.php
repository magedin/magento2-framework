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

namespace MagedIn\Framework\Magento2\Ui\Component\Config\Generator\Form\Field;

/**
 * Interface for all form field configuration generators
 */
interface FieldInterface
{
    /**
     * Generate configuration for a form field
     *
     * @param string $id Field identifier
     * @param string $label Field label
     * @param mixed $default Default value
     * @param int $sortOrder Field sort order
     * @param string|null $notice Notice text
     * @return array Configuration array
     */
    public function generate(array $config): array;
}
