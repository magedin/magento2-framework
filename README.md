# MagedIn Framework for Magento 2

A comprehensive framework that provides utilities, helpers, and extensions to facilitate Magento 2 development. This library offers a set of reusable components designed to standardize common tasks, improve code quality, and accelerate development across MagedIn modules.

## Features

### Module Management
- **Metadata Provider**: Retrieve module version and metadata information
- **Availability Checker**: Verify module dependencies and requirements

### Data Handling
- **DataObject Extensions**: Utilities for manipulating and transferring data between objects
- **Validators**: Validations for common data formats including Brazilian CPF/CNPJ

### Time & Date
- **DateTime Utilities**: Flexible date/time manipulation classes
- **Week/Year Handling**: Specialized classes for week and year operations

### Performance
- **Profiler**: Track execution time and memory usage with minimal overhead
- **Optimized Operations**: Efficient implementations of common operations

### UI Components
- **MetaConfigGenerator**: Standardized UI component configuration
- **Form Elements**: Reusable form elements and buttons for admin interfaces
- **Version Label**: Display module version information in admin panels

### String Processing
- **Formatters**: Format strings for display and storage
- **Normalizers**: Standardize data formats (postal codes, numbers, etc.)
- **StringHelper**: Common string manipulation operations

## Installation

### Via Composer (recommended)

```bash
composer require magedin/magento2-framework
bin/magento setup:upgrade
```

### Manual Installation

1. Create the following directory: `app/code/MagedIn/Framework`
2. Download the latest version from our repository
3. Extract files to the directory you created
4. Run the following commands:

```bash
bin/magento setup:upgrade
bin/magento cache:clean
```

## Usage Examples

### Using the Profiler

```php
use MagedIn\Framework\Magento2\Profiler;

// Start profiling a section
$profileId = Profiler::start('my-operation');

// Your code here
// ...

// Stop profiling and get results
Profiler::stop($profileId);
$duration = Profiler::getDuration($profileId);
$memory = Profiler::getMemory($profileId, Profiler::MEMORY_FORMAT_MB);

echo "Operation took {$duration} seconds and used {$memory}MB of memory";
```

### Getting Module Version

```php
use MagedIn\Framework\Magento2\Module\ModuleMetadataProvider;

class MyClass
{
    private ModuleMetadataProvider $metadataProvider;

    public function __construct(ModuleMetadataProvider $metadataProvider)
    {
        $this->metadataProvider = $metadataProvider;
    }

    public function getModuleVersion(): string
    {
        return $this->metadataProvider->getVersion('MagedIn_MyModule');
    }
}
```

### Using DataObject Copy

```php
use MagedIn\Framework\Magento2\DataObject\Copy;
use Magento\Framework\DataObject;

class DataTransfer
{
    private Copy $copy;

    public function __construct(Copy $copy)
    {
        $this->copy = $copy;
    }

    public function transferData(DataObject $source, DataObject $target): void
    {
        $this->copy->copy(
            $source,
            $target,
            ['name', 'email', 'customer_id']
        );
    }
}
```

## Module Structure

```
├── src/
│   ├── Block/              # Block classes for rendering
│   ├── DataObject/         # DataObject extensions
│   ├── DateTime/           # Date and time utilities
│   ├── Formatter/          # String and data formatters
│   ├── Helper/             # Helper classes
│   ├── Layout/             # Layout-related functionality
│   ├── Message/            # Message handling
│   ├── Model/              # Models and business logic
│   ├── Module/             # Module management
│   ├── Normalizer/         # Data normalizers
│   ├── Ui/                 # UI components
│   ├── Validator/          # Validation classes
│   └── Profiler.php        # Performance profiling utility
├── tests/                  # Unit tests
├── composer.json           # Composer configuration
├── phpunit.xml             # PHPUnit configuration
└── registration.php        # Magento module registration
```

## Compatibility

- Magento 2.3.x, 2.4.x
- PHP 7.4, 8.0, 8.1
- MySQL 5.7+

## Development

### Running Tests

```bash
cd app/code/MagedIn/Framework
composer install
vendor/bin/phpunit
```

### Coding Standards

This project follows PSR-12 coding standards. To check your code:

```bash
composer run-script phpcs
```

## Contributing

We welcome contributions to the MagedIn Framework. Please follow these steps:

1. Fork the repository
2. Create a feature branch
3. Make your changes
4. Run tests and ensure coding standards
5. Submit a pull request

## License

This package is licensed under the proprietary MagedIn Technology license.

## Support

For questions, issues, or support requests, please contact:

- Email: support@magedin.com
- Website: https://www.magedin.com

## Changelog

See the [RELEASE-NOTES.md](RELEASE-NOTES.md) file for a detailed changelog.