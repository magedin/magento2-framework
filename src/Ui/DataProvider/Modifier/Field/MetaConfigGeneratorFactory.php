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

namespace MagedIn\Framework\Magento2\Ui\DataProvider\Modifier\Field;

use Magento\Framework\Exception\InvalidArgumentException;
use Magento\Framework\ObjectManager\ObjectManager;

/**
 * DocBlock for MetaConfigGeneratorFactory class.
 */
class MetaConfigGeneratorFactory
{
    /**
     * @var array|string[]
     */
    private array $baseGeneratorsMapping = [
        'field' => MetaConfigGenerator\Field::class,
        'fieldset' => MetaConfigGenerator\Fieldset::class,
        'input' => MetaConfigGenerator\Input::class,
        'checkbox' => MetaConfigGenerator\Checkbox::class,
        'toggle' => MetaConfigGenerator\Toggle::class,
        'select' => MetaConfigGenerator\Select::class,
        'multiselect' => MetaConfigGenerator\Multiselect::class,
        'textarea' => MetaConfigGenerator\Textarea::class,
        'button' => MetaConfigGenerator\Button::class,
        'password' => MetaConfigGenerator\Password::class,
        'hidden' => MetaConfigGenerator\Hidden::class,
        'number' => MetaConfigGenerator\Number::class,
        'date' => MetaConfigGenerator\Date::class,
        'fileUploader' => MetaConfigGenerator\FileUploader::class,
        'insertListing' => MetaConfigGenerator\InsertListing::class,
    ];

    /**
     * @var array
     */
    private array $instances = [];

    /**
     * @var ObjectManager
     */
    private ObjectManager $objectManager;

    /**
     * @var array
     */
    private array $generatorsMapping = [];

    /**
     * @param ObjectManager $objectManager
     * @param array $generatorsMapping
     */
    public function __construct(
        ObjectManager $objectManager,
        array $generatorsMapping = []
    ) {
        $this->objectManager = $objectManager;
        $this->generatorsMapping = array_merge($this->baseGeneratorsMapping, $generatorsMapping);
    }

    /**
     * Create an instance of the MetaConfigGenerator based on the provided type.
     *
     * @param string $type The type of MetaConfigGenerator to create.
     *
     * @return MetaConfigGeneratorInterface
     * @throws InvalidArgumentException
     */
    public function create(string $type): MetaConfigGeneratorInterface
    {
        $instanceClass = $this->generatorsMapping[$type] ?? null;
        if (!$instanceClass) {
            throw new InvalidArgumentException(__('Invalid type "%s" provided for MetaConfigGenerator.', $type));
        }

        if (isset($this->instances[$type])) {
            return $this->instances[$type];
        }

        $this->instances[$type] = $this->objectManager->create($instanceClass);
        return $this->instances[$type];
    }
}
