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
 * Abstract base class for form field configuration generators
 */
abstract class AbstractField implements FieldInterface
{
    /**
     * @var string
     */
    protected string $componentType = 'field';

    /**
     * @var string
     */
    protected string $formElement = 'input';

    /**
     * @var string
     */
    protected string $dataType = 'text';

    /**
     * Generate base configuration array for a form field
     *
     * @param string $id Field identifier
     * @param string $label Field label
     * @param mixed $default Default value
     * @param int $sortOrder Field sort order
     * @param string|null $notice Notice text
     * @return array Configuration array
     */
    public function generate(array $config = []): array
    {
        $baseConfig = $this->getBaseConfig();
        $baseConfig = $this->customizeConfig($baseConfig);
        $baseConfig['arguments']['data'] = $this->merge($baseConfig['arguments']['data'], $config);
        return $baseConfig;
    }

    /**
     * DocBlock for method.
     *
     * @param array $array1
     * @param array $array2
     *
     * @return array
     */
    private function merge(array $array1, array $array2): array
    {
        foreach ($array2 as $key => $value) {
            if (is_array($value) && isset($array1[$key]) && is_array($array1[$key])) {
                $array1[$key] = $this->merge($array1[$key], $value);
            } else {
                $array1[$key] = $value;
            }
        }
        return $array1;
    }

    /**
     * Customize configuration array with field-specific settings
     *
     * @param array $config Base configuration array
     * @return array Modified configuration array
     */
    protected function customizeConfig(array $config): array
    {
        return $config;
    }

    /**
     * DocBlock for method.
     *
     * @return array[]
     */
    private function getBaseConfig(): array
    {
        return [
            'arguments' => [
                'data' => [
                    'config' => [
                        'componentType' => $this->componentType,
                        'formElement' => $this->formElement,
                        'dataType' => $this->dataType,
                    ],
                ],
            ],
        ];
    }
}
