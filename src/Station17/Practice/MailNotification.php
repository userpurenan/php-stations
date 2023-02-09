<?php

namespace Src\Station17\Practice;

class MailNotification implements NotificationInterface
{
    public function setMessage(string $header, string $message): void
    {
        $this->setHeader($header);
        $this->setBody($message);
    }

    public function sendMessage(): void
    {
        echo "メールを送信\n";
    }

    private function setHeader(string $header): void
    {
        echo $header."を件名にセット\n";
    }

    private function setBody(string $message): void
    {
        echo $message."を本文にセット\n";
    }
}
