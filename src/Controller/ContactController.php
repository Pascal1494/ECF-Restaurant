<?php

namespace App\Controller;

use App\Form\ContactType;
use App\Service\MailerService;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ContactController extends AbstractController
{
    #[Route('/contact', name: 'app_contact')]
    public function index(Request $request, MailerService $mailer): Response
    {
        $form = $this->createForm(ContactType::class);
        $form->handleRequest($request);
        dd($form);

        if ($form->isSubmitted() && $form->isValid()) {
            $contactFormData = $form->getData();
            $mailer->sendEmail($contactFormData);


            return $this->redirectToRoute('app_contact_succes');
        }

        return $this->render('contact/index.html.twig', [
            'form' => $form->createView()
        ]);
    }


    #[Route('/contact/succes', name: 'app_contact_succes')]
    public function Contact_succes(): Response

    {


        return $this->render('contact/contact_succes.html.twig');
    }
}