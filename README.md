# Laravel SMS Gateway for MTN Syria

[![Latest Version on Packagist](https://img.shields.io/packagist/v/alhelwany/laravel-mtn.svg?style=flat-square)](https://packagist.org/packages/alhelwany/laravel-mtn)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/alhelwany/laravel-mtn/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/alhelwany/laravel-mtn/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/alhelwany/laravel-mtn/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/alhelwany/laravel-mtn/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/alhelwany/laravel-mtn.svg?style=flat-square)](https://packagist.org/packages/alhelwany/laravel-mtn)

A simple Laravel notification Channel that utilizes MTN Syria services to send SMS

## Installation

You can install the package via composer:

```bash
composer require alhelwany/laravel-mtn
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="laravel-mtn-config"
```

This is the contents of the published config file:

```php
return [
    'url' => env('MTN_GATEWAY_URL', 'https://services.mtnsyr.com:7443/General/MTNSERVICES/ConcatenatedSender.aspx'),
    'username' => env('MTN_USERNAME', null),
    'password' => env('MTN_PASSWORD', null),
    'from' => env('MTN_FROM', null),
];
```

## Usage

```php
use Alhelwany\LaravelMtn\Enums\Lang;
use Alhelwany\LaravelMtn\Interfaces\MTNNotification;
use Illuminate\Notifications\Notification;
use Alhelwany\LaravelMtn\Channels\MTNChannel;

class MyNotification extends Notification implements MTNNotification{
	
	public function via(object $notifiable): array
    {
        return [MTNChannel::class];
    }

	public function toText(): string
	{
		reutrn "Hello";
	}

    public function getLang(): Lang
	{
		return Lang::EN;
	}
}
```


```php
use Illuminate\Database\Eloquent\Model;
use Alhelwany\LaravelMtn\Interfaces\MTNNotifiable;

class User extends Model implements MTNNotifiable{

	public function getPhone(): string
	{
		return $this->phone;
	}
}
```

```php
	$user->notify(new MyNotification);
```




## Testing

```bash
composer test
```

## Credits

- [Mhd Ghaith Alhelwany](https://github.com/115778766+alhelwany)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
