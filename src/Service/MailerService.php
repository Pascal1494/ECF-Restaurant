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
        $to = 'contact-lqa@hotmail.fr',
        $subject = 'This is the Mail subject !',
        $content = '',
        $text = ''
    ): void {
        $email = (new Email())
            ->from('lqa-contact@lequaianthique.fr')
            ->to($to)
            ->subject($subject)
            ->text($text)
            ->html($content);
        $this->mailer->send($email);
    }
}
