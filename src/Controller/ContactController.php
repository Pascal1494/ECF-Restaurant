<?php

namespace App\Controller;

use App\Form\ContactType;
use App\Service\MailerService;
use App\Service\OpenDayService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    #[Route('/contact', name: 'app_contact')]
    public function index(Request $request, MailerService $mailer, OpenDayService $openDayService)
    {

        $openDays = $openDayService->getAllOpenDays();
        $form = $this->createForm(ContactType::class);
        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()) {
            $contactFormData = $form->getData();
            $subject = 'Demande de contact sur votre site de ' . $contactFormData['email'];
            $content = $contactFormData['name'] . ' vous a envoyé le message suivant: ' . $contactFormData['message'];
            $mailer->sendEmail(subject: $subject, content: $content);
            $this->addFlash('success', 'Votre message a été envoyé');
            return $this->redirectToRoute('app_contact_success');
        }
        return $this->render('contact/index.html.twig', [
            'form' => $form->createView(),
            'days' => $openDays,
        ]);
    }

    #[Route('/contact/success', name: 'app_contact_success')]
    public function success(): Response
    {
        return $this->render('contact/contact_success.html.twig');
    }
}