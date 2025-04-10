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

namespace MagedIn\Framework\Magento2\Ui\DataProvider\Modifier\Field\MetaConfigGenerator;

/**
 * DocBlock for Input class.
 */
class Select extends Field
{
    /**
     * @inheirtDoc
     */
    public function generate(array $config): array
    {
        $baseConfig = [
            'formElement' => 'select',
            'dataType' => 'select',
            'default' => '1',
            'options' => [],
            'valueMap' => [
                'true' => '1',
                'false' => '0',
            ],
        ];
        return array_merge(parent::generate($baseConfig), $config);
    }
}
