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
        $this->loadRoutesFrom(__DIR__ .     '/routes/web.php');
        $this->loadViewsFrom(__DIR__ .      '/views', 'LaravelEmailAuditLog');
        $this->loadMigrationsFrom(__DIR__ . '/database/migrations');
        Event::listen(MessageSent::class, EmailHasBeenSentListener::class);
    }

    public function register()
    {
        //
    }
}
