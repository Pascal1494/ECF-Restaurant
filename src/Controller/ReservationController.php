<?php

namespace App\Controller;

use DateTimeImmutable;
use App\Entity\Reservation;
use App\Form\ReservationType;
use App\Service\OpenDayService;
use App\Repository\AllergyRepository;
use App\Repository\OpenDayRepository;
use App\Repository\RestaurantRepository;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\ReservationRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ReservationController extends AbstractController
{

    private $entityManager;

    public function __construct(EntityManagerInterface $em)
    {
        $this->entityManager = $em;
    }


    #[Route('/reservation', name: 'app_reservation')]
    public function index(OpenDayService $openDayService,  Request $request): Response
    {
        $openDays = $openDayService->getAllOpenDays();

        $reservation = new Reservation();
        $form = $this->createForm(ReservationType::class, $reservation);
        $form->handleRequest($request);
        // dd($request);
        // dump($openDays);
        // dd($reservation);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->entityManager->persist($reservation);
            $this->entityManager->flush();

            $this->addFlash('success', 'Votre réservation est effective');

            // return $this->redirectToRoute('app_home');
        }




        return $this->render('reservation/index.html.twig', [
            'days' => $openDays,
            'form' => $form->createView(),
        ]);
    }
}
