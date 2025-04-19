# MagedIn Framework - Release Notes

## Version 1.3.0

*Release Date: April 18, 2025*

We're excited to announce version 1.3.0 of the MagedIn Framework, featuring significant improvements, new utilities, and enhanced performance. This update introduces several new components while improving existing functionality.

### New Features

#### DataObject Enhancements
- **New DataObject Copy Utility**: Added a specialized `Copy` class that allows for efficient transfer of specified fields between DataObjects. This utility makes it easier to selectively copy data between objects without manually mapping each field.
- **Improved Type Safety**: Enhanced type handling across all DataObject extensions for better compatibility with PHP 8.x.

#### Enhanced Module Management
- **Module Metadata Provider**: Added robust module version detection with multiple fallback mechanisms:
  - Retrieves version from module setup version
  - Falls back to composer.json within the module
  - Checks composer lock file as a last resort
  - Provides clear indication when a module is installed in app/code
- **Advanced Availability Checker**: New functionality to verify module dependencies and validate extension requirements.

#### Performance Tools
- **Profiler Utility**: Added a powerful profiling tool that provides:
  - Fine-grained execution time tracking
  - Memory usage monitoring with multiple format options (bytes, KB, MB, GB)
  - Unique session identifiers for concurrent profiling
  - Reset capabilities for clean measurements

#### DateTime Utilities
- **AbstractDateTime**: New foundation class for date and time operations
- **Week Class**: Added specialized handling for week-based calculations
- **Year Class**: Added utilities for year-based date ranges and comparisons

#### String Processing
- **StringHelper**: New utility for common string manipulation operations
- **Added String Formatters**:
  - `OnlyNumber`: Extracts only numeric characters from strings
  - `StringSize`: Safely handles string size operations
  - `Postcode`: Standardizes postal code formatting

#### Brazilian Data Validators
- **CPF Validator**: Added validation for Brazilian individual taxpayer registry numbers
- **CNPJ Validator**: Added validation for Brazilian business registry numbers
- **Normalizers**: Complementary normalizer classes for standardizing CPF/CNPJ formats

#### UI Components
- **Meta Config Generator**: Enhanced UI component builders with support for:
  - Dynamic field configuration
  - Consistent button styling
  - Improved form field generation
  - Support for various input types (select, multiselect, date, etc.)

### Improvements

- **PHP 8.x Compatibility**: Full compatibility with PHP 8.0 and 8.1, including support for new features
- **PSR Compliance**: Enhanced adherence to PSR-12 coding standards
- **Performance Optimizations**: Reduced memory usage and improved execution time across core components
- **Code Maintainability**: Improved dependency injection patterns and reduced hard dependencies
- **Exception Handling**: More granular exception types and improved error messages
- **Documentation**: Comprehensive docblocks for all classes and methods

### Technical Improvements

- **Type Hinting**: Added return type declarations across the framework
- **Strict Types**: Enabled strict type checking in all files for improved reliability
- **Reduced Dependencies**: Minimized external dependencies for better maintainability
- **Unit Tests**: Expanded test coverage, especially for critical components
- **Dependency Injection**: Improved constructor-based dependency injection patterns

### Bug Fixes

- Fixed incorrect datetime conversion when handling timezone-specific dates
- Resolved memory leak in repetitive object instantiation patterns
- Fixed string encoding issues in multilingual environments
- Corrected numeric precision handling in specific edge cases
- Addressed potential race conditions in concurrent operations

### Compatibility

- Compatible with Magento 2.3.x, 2.4.x
- Requires PHP 7.4 or higher (PHP 8.0 and 8.1 supported)
- Backward compatible with previous versions of MagedIn Framework

### Installation & Upgrade

To upgrade to this version, run:

```bash
composer require magedin/magento2-framework:1.3.0
bin/magento setup:upgrade
```

### Documentation

For detailed documentation on new features and APIs, please refer to the inline code documentation and our developer portal at [https://docs.magedin.com/framework](https://docs.magedin.com/framework).

---

## Previous Versions

### Version 1.2.3

*Release Date: January 15, 2025*

- Bug fixes and minor improvements
- Performance optimizations for core components
- Added compatibility with Magento 2.4.6

### Version 1.2.2

*Release Date: November 20, 2024*

- Enhanced validation utilities
- Fixed compatibility issues with PHP 8.0
- Improved error handling and reporting