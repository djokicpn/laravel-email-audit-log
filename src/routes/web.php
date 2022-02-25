<?php
use Illuminate\Support\Facades\Mail;

Route::get('email-audits', function() {
    Mail::raw('Hi, welcome user!', function ($message) {
        $message->to('support@ctg.us')
    ->subject('test!');
    });
    return 'Yes!';
});
