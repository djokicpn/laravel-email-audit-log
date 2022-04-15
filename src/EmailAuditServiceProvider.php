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

        //Publishing migration
        $this->publishes([
            __DIR__ . '/database/migrations/0000_00_00_000000_create_email_audit_log_table.php' =>
                $this->app->databasePath(
                    '/migrations/' . now()->format('Y_m_d_His') . '_create_email_audit_log_table.php'
                )
        ], 'email-audit-log-migrations');

        //Adding event listener for MessageSent
        Event::listen(MessageSent::class, EmailHasBeenSentListener::class);
    }

    public function register()
    {
        //
    }



}
