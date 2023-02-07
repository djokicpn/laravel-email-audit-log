<?php

namespace Djokicpn\LaravelEmailAuditLog;

use Djokicpn\LaravelEmailAuditLog\Listeners\EmailHasBeenSentListener;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Mail\Events\MessageSent;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;

class EmailAuditServiceProvider extends ServiceProvider
{
    use Dispatchable, SerializesModels;

    public function boot()
    {
        //Loading views
        //$this->loadViewsFrom(__DIR__ . '/views', 'LaravelEmailAuditLog');
//        Publishing migration
        $this->publishes([
            __DIR__ . '/database/migrations/2023_01_01_205101_djokicpn_create_email_audit_log_table.php' =>
                $this->app->databasePath(
                    '/migrations/2023_01_01_205101_djokicpn_create_email_audit_log_table.php'
                )
        ], 'email-audit-log-migrations');

        $this->publishes([
            __DIR__ . '/database/migrations/2023_01_01_205102_djokicpn_add_user_id_to_log_table.php' =>
                $this->app->databasePath(
                    '/migrations/2023_01_01_205102_djokicpn_add_user_id_to_email_audit_log_table.php'
                )
        ], 'email-audit-log-migrations');

        $this->loadMigrationsFrom(__DIR__ . '/database/migrations');

        //Adding event listener for MessageSent
        Event::listen(MessageSent::class, EmailHasBeenSentListener::class);
    }

    public function register()
    {
        //
    }



}
