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
        $this->loadMigrationsFrom(__DIR__ . '/database/migrations');
        Event::listen(MessageSent::class, EmailHasBeenSentListener::class);
    }

    public function register()
    {
        //
    }
}
