[![Latest Version](https://img.shields.io/github/release/djokicpn/laravel-email-audit-log)](https://github.com/djokicpn/laravel-email-audit-log/releases)
[![Issues](https://img.shields.io/github/issues/djokicpn/laravel-email-audit-log)](https://github.com/djokicpn/laravel-email-audit-log/issues)
[![Stars](https://img.shields.io/github/stars/djokicpn/laravel-email-audit-log)](hhttps://github.com/djokicpn/laravel-email-audit-log/stargazers)

## Laravel Email Audit Log

This service provider will monitor all emails that has been sent out of your system. Sent emails will be stored in email_audit_log table


## Help and docs

We use GitHub issues only to discuss bugs and new features. For support please refer to:

- [Laravel Documentation](http://laravel.com)
- [Laravel Stack Overflow](http://stackoverflow.com/questions/tagged/laravel)
- [Autor's Linkdin](https://www.linkedin.com/in/aleksandar-djokic-713339167)

## Installing Laravel Audit Log

The recommended way to install Laravel Audit Log is through
[Composer](https://getcomposer.org/).

```bash
composer require djokicpn/laravel-email-audit-log
```


## Post install steps
We will have to install migrations

```
php artisan migrate
```

## Usage and reports
There is already aliased eloquent model
```php
use Djokicpn\LaravelEmailAuditLog\Models\EmailAudit;

EmailAudit::all();
```
Will return collection of models.

