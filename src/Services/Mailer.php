<?php

namespace App\Services;

use App\Entity\Contact;

class Mailer
{
    protected $mailer;
    protected $template;

    private $from;

    public function __construct(\Swift_Mailer $mailer, \Twig_Environment $template)
    {
        $this->mailer = $mailer;
        $this->template = $template;
        $this->from = 'no-reply@mb-megeve.com';
    }

    public function sendMessage(Contact $contact)
    {
        $mail = (new \Swift_Message('Nouveau Message depuis le site jim-appay.fr'))
            ->setFrom($this->from)
            ->setTo('ji.appay@gmail.com')
            ->setSubject('Message de '.$contact->getName().'')
            ->setBody($this->template->render(
                'email.html.twig',
                [
                    'name' => $contact->getName(),
                    'email' => $contact->getEmail(),
                    'phone' => $contact->getPhone(),
                    'message' => $contact->getMessage(),
                ]))
            ->setReplyTo($contact->getEmail())
            ->setContentType('text/html');

        $this->mailer->send($mail);
    }
}