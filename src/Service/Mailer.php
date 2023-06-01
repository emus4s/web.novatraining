<?php

namespace App\Service;

use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Address;

class Mailer
{
    private MailerInterface $mailer;

    public function __construct(MailerInterface $mailer)
    {
        $this->mailer = $mailer;
    }

    public function sendEmailContact($contactEmail)
    {
        //$contactEmail="info@novatraining.com.ar";
        $contactEmail="emus4s@gmail.com";

        $email = (new TemplatedEmail())
            ->to(new Address($contactEmail))
            //->cc('cc@example.com')
            //->bcc('bcc@example.com')
            //->replyTo('fabien@example.com')
            //->priority(Email::PRIORITY_HIGH)
            ->subject('Nova Training - Consulta Web ')
            ->htmlTemplate('email/registroConsultaWeb.html.twig')
            ->context([
                'titulo' => 'Consulta Web',
            ])
        ;
        try {
            $this->mailer->send($email);
        } catch (TransportExceptionInterface $e) {
            //$this->logger->error($e->getMessage());
            dd($e);
        }

    }
}