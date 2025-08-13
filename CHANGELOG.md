# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [1.4.0] - 2025-08-13

### Added
- **CronExpression Validator**: New comprehensive cron expression validator class with support for:
  - Standard 5-field cron format validation (minute, hour, day, month, weekday)
  - Range validation for all fields with proper min/max values
  - Special character support (*, -, /, ?, comma-separated values)
  - Month and day name aliases (jan, feb, sun, mon, etc.)
  - Step expression validation (*/5, 1-10/2)
  - Range expression validation (1-5, 10-15)
  - Comprehensive error reporting with detailed validation messages
- **CronExpression Unit Tests**: Complete test coverage for the cron expression validator

### Changed
- **Copyright Updates**: Updated copyright information across all framework files to 2025
- **Module Update Notice**: Added standardized module update notice in all PHP class headers
- **Code Modernization**: Refactored `TitleProvider::getPageTitleBlockInstance()` to use null coalescing operator for cleaner code
- **AbstractLocator Improvements**: 
  - Removed unused `$escaper` dependency for better performance
  - Improved class docblocks with clearer descriptions
  - Enhanced `LocatorInterface` documentation for better developer experience

### Improved
- **Documentation**: Enhanced PHPDoc comments throughout the framework for better IDE support and developer experience
- **Code Quality**: Applied consistent coding standards and modern PHP practices across all files
- **Performance**: Optimized dependency injection patterns by removing unused dependencies

### Technical Details
- Updated registration.php and phpunit.xml with proper copyright headers
- Standardized copyright notices across 25+ framework files
- Enhanced validation utilities with robust cron expression support
- Improved locator pattern implementation with cleaner abstractions

## [1.3.0] - 2025-04-18

### Added
- Initial framework release with comprehensive utility classes
- DataObject utilities and copy mechanisms
- Module metadata providers and availability checkers  
- Performance profiling tools with memory monitoring
- DateTime utilities (AbstractDateTime, Week, Year classes)
- String processing helpers and formatters
- Brazilian data validators (CPF/CNPJ) with normalizers
- UI component meta configuration generators
- Brazilian postal code and data formatting utilities

### Technical Implementation
- Full PHP 8.x compatibility with strict type declarations
- PSR-12 compliant codebase with comprehensive docblocks
- Unit test coverage for critical components
- Dependency injection patterns throughout
- Magento 2.3.x and 2.4.x compatibility

### Documentation
- Comprehensive README with installation and usage instructions
- Detailed inline code documentation
- Release notes with technical specifications