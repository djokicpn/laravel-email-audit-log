<?php

namespace Djokicpn\LaravelEmailAuditLog\Listeners;

use Djokicpn\LaravelEmailAuditLog\Models\EmailAudit;
use Illuminate\Mail\Events\MessageSent;

class EmailHasBeenSentListener
{
    public function handle(MessageSent $event)
    {
        $subject        = $event->message->getSubject();
        $toArr          = $this->parseAddresses($event->message->getTo());
        $ccArr          = $this->parseAddresses($event->message->getCc());
        $from           = $event->message->getFrom()[0]->getAddress();
        $body           = $this->parseBodyText($event->message->getTextBody());
        $user           = auth()->id() ?? NULL;

        EmailAudit::create([
            'user_id'   => $user,
            'from'      => $from,
            'to'        => json_encode($toArr),
            'cc'        => $ccArr ? json_encode($ccArr) : NULL,
            'subject'   => $subject,
            'body'      => $body,
        ]);

        return false;
    }

    private function parseAddresses(array $array): array
    {
        $parsed = [];
        foreach($array as $address) {
            $parsed[] = $address->getAddress();
        }
        return $parsed;
    }

    private function parseBodyText($body): string
    {
        return preg_replace('~[\r\n]+~', '<br>', $body);
    }
}
