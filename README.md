PHP URL Shortener API Client
========================

A simple wrapper for the Nybbl URL Shortener API that requires PHP >= 7.0.

## Requirements

* PHP >= 7.0 with [cURL](http://php.net/manual/en/book.curl.php) extension,

## Installation

The recommended way is using [composer](http://getcomposer.org):

```bash
$ composer require nybbl/url
```

## Basic usage

```php
use Nybbl\Url;

$client = new Url\Client('<my endpoint>', '<my token>');
$response = $client->api('link')->create('https://nybbl.io/');

$client = new Url\Client('<my endpoint>', '<my token>');
$response = $client->api('link')->getOne(1);

$client = new Url\Client('<my endpoint>', '<my token>');
$response = $client->api('link')->getList();
```

## Contributing

Feel free to make any comments, file issues or make pull requests.