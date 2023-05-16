<?php

namespace App\Controller;

use App\Entity\Reservation;
use App\Form\ReservationType;
use App\Service\OpenDayService;
use App\Repository\RestaurantRepository;
use Doctrine\ORM\EntityManagerInterface;
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
    public function index(OpenDayService $openDayService,  Request $request, RestaurantRepository $restaurantRepository): Response
    {
        $openDays = $openDayService->getAllOpenDays();
        $reservation = new Reservation();
        $form = $this->createForm(ReservationType::class, $reservation);
        $form->handleRequest($request);
        // dd($request);
        // dump($openDays);
        // dd($reservation);

        if ($form->isSubmitted() && $form->isValid()) {
            // $restaurantName = $form->get('restaurant')->getData();
            // if (!$restaurant) {
            //     throw $this->createNotFoundException('Restaurant non trouvé');
            // }
            if ($reservation->getNbGuests() > 50) {
                $this->addFlash('danger', 'Vous ne pouvez pas réserver, le restaurant est complet à cette date');
                return $this->redirectToRoute('app_reservation');
            }



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