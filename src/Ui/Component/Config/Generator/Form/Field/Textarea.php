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
 * Textarea field configuration generator
 */
class Textarea extends AbstractField
{
    /**
     * @var string
     */
    protected string $formElement = 'textarea';

    /**
     * @var string
     */
    protected string $dataType = 'text';

    /**
     * Customize configuration array with textarea-specific settings
     *
     * @param array $config Base configuration array
     * @return array Modified configuration array
     */
    protected function customizeConfig(array $config): array
    {
        $config['arguments']['data']['config']['rows'] = 5;
        return $config;
    }
}
