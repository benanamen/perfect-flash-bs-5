[![codecov](https://codecov.io/gh/benanamen/perfect-flash-bs-5/graph/badge.svg?token=FDt845yMbG)](https://codecov.io/gh/benanamen/perfect-flash-bs-5)

[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/benanamen/perfect-flash-bs-5/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/benanamen/perfect-flash-bs-5/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/benanamen/perfect-flash-bs-5/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/benanamen/perfect-flash-bs-5/?branch=master)
[![Build Status](https://scrutinizer-ci.com/g/benanamen/perfect-flash-bs-5/badges/build.png?b=master)](https://scrutinizer-ci.com/g/benanamen/perfect-flash-bs-5/build-status/master)
[![Code Intelligence Status](https://scrutinizer-ci.com/g/benanamen/perfect-flash-bs-5/badges/code-intelligence.svg?b=master)](https://scrutinizer-ci.com/code-intelligence)

[![Coverage](https://sonarcloud.io/api/project_badges/measure?project=benanamen_perfect-flash-bs-5&metric=coverage)](https://sonarcloud.io/summary/new_code?id=benanamen_perfect-flash-bs-5)
[![Maintainability Rating](https://sonarcloud.io/api/project_badges/measure?project=benanamen_perfect-flash-bs-5&metric=sqale_rating)](https://sonarcloud.io/summary/new_code?id=benanamen_perfect-flash-bs-5)
[![Code Smells](https://sonarcloud.io/api/project_badges/measure?project=benanamen_perfect-flash-bs-5&metric=code_smells)](https://sonarcloud.io/summary/new_code?id=benanamen_perfect-flash-bs-5)
[![Technical Debt](https://sonarcloud.io/api/project_badges/measure?project=benanamen_perfect-flash-bs-5&metric=sqale_index)](https://sonarcloud.io/summary/new_code?id=benanamen_perfect-flash-bs-5)
[![Quality Gate Status](https://sonarcloud.io/api/project_badges/measure?project=benanamen_perfect-flash-bs-5&metric=alert_status)](https://sonarcloud.io/summary/new_code?id=benanamen_perfect-flash-bs-5)
[![Reliability Rating](https://sonarcloud.io/api/project_badges/measure?project=benanamen_perfect-flash-bs-5&metric=reliability_rating)](https://sonarcloud.io/summary/new_code?id=benanamen_perfect-flash-bs-5)

[![Duplicated Lines (%)](https://sonarcloud.io/api/project_badges/measure?project=benanamen_perfect-flash-bs-5&metric=duplicated_lines_density)](https://sonarcloud.io/summary/new_code?id=benanamen_perfect-flash-bs-5)
[![Vulnerabilities](https://sonarcloud.io/api/project_badges/measure?project=benanamen_perfect-flash-bs-5&metric=vulnerabilities)](https://sonarcloud.io/summary/new_code?id=benanamen_perfect-flash-bs-5)
[![Bugs](https://sonarcloud.io/api/project_badges/measure?project=benanamen_perfect-flash-bs-5&metric=bugs)](https://sonarcloud.io/summary/new_code?id=benanamen_perfect-flash-bs-5)
[![Security Rating](https://sonarcloud.io/api/project_badges/measure?project=benanamen_perfect-flash-bs-5&metric=security_rating)](https://sonarcloud.io/summary/new_code?id=benanamen_perfect-flash-bs-5)


# Bootstrap5FlashMessage

## Description

`Bootstrap5FlashMessage` is a PHP class that provides a simple and effective way to display flash messages in a web application. It uses Bootstrap 5 for styling and allows for optional icons and dismissible alerts.

## Requirements

- PHP 8.0 or higher
- Bootstrap 5.3 or higher

## Installation

Include the `Bootstrap5FlashMessage` class in your project.

## Usage

### Initialization

First, you need to inject a session object that implements `SessionInterface` and an array of messages into the constructor.

```php
use PerfectApp\Session\SessionInterface;
use PerfectApp\Bootstrap5FlashMessage;

$session = new Session();  // This should implement SessionInterface
$messages = [
    'success' => [
        'insert' => 'Record Inserted'
    ],
    'danger' => [
        'failed_login' => 'Invalid Login'
    ]
];

$flash = new Bootstrap5FlashMessage($session, $messages);
```

### Adding a Message

To add a flash message, use the `addMessage` method.

```php
$flash->addMessage('success', 'insert');
```

You can also add an optional icon and make the alert dismissible.

```php
$flash->addMessage('danger', 'failed_login', 'bi-x-circle', true);
```

### Displaying Messages

To display all the flash messages, use the `displayMessages` method.

```php
$flash->displayMessages();
```

This will output Bootstrap 5 styled alerts.

## Testing

Run the following command to execute the unit tests and ensure 100% code coverage:

```bash
php vendor/bin/codecept run --coverage --coverage-html  --coverage-xml
```

## License

This project is licensed under the MIT License.
