<?php

namespace App\Service;

use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

class MailerService
{
    public function __construct(private MailerInterface $mailer)
    {
    }

    public function sendEmail(
        $to = 'lqa-resto@hotmail.fr',
        $subject = 'Sujet du mail !',
        $content = '',
        $text = ''
    ): void {
        $email = (new Email())
            ->from('no-reply-lqa-resto@gmail.com')
            ->to($to)
            ->subject($subject)
            ->text($text)
            ->html($content);
        $this->mailer->send($email);
    }
}
