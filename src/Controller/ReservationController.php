<?php

namespace App\Controller;

use App\Entity\Reservation;
use App\Form\ReservationType;
use App\Repository\ReservationRepository;
use App\Service\OpenDayService;
use App\Service\RestaurantMaxCapacityService;
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
    public function index(OpenDayService $openDayService, Request $request, RestaurantMaxCapacityService $restaurantMaxCapacityService, ReservationRepository $reservationRepository): Response
    {
        $openDays = $openDayService->getAllOpenDays();
        // dd($openDays);


        $reservation = new Reservation();
        $form = $this->createForm(ReservationType::class, $reservation);




        // $openDay = $entityManager->getRepository(OpenDay::class)->find($id);
        // dd($openDay);

        // $resto = $restaurantRepository->findAll();
        // // dump($reservation);
        // dd($resto);

        // On récupère les données du formulaire
        $form->handleRequest($request);
        $day = $reservation->getDate($reservation);
        dump($day);
        $hour = $reservation->getTime($reservation);
        dump($hour);
        $persons = $reservation->getNbGuests($reservation);
        // dd($persons);

        if ($form->isSubmitted() && $form->isValid()) {
            // On récupère le nombre de places maximum du restaurant 
            $restaurantCode = 1;
            $maxCapacity = $restaurantMaxCapacityService
                ->findMaxCapacityByRestaurant($restaurantCode);
            // dd($maxCapacity)

            //On récupère le nombre de personnes ayant réservé au même créneau
            $numberOfReservation = $reservationRepository
                ->findNumberOfReservationsAtSameTime($day, $hour);

            // On vérifie si $numberOfReservation est null et on défini une valeur par défaut à 0
            $numberOfReservation = $numberOfReservation ?? 0;

            // dd($numberOfReservation);


            //On additionne le nombre de convive duformulaire avec le volume total des réservations déjà en Bdd
            $volPersons = $numberOfReservation + $persons;




            if ($volPersons > $maxCapacity) {
                // dump($volPersons);
                // dump($this);
                // dd($maxCapacity);
                $this->addFlash('danger', 'Vous ne pouvez pas réserver, le restaurant est complet à cette date');
            } else {
                // dump($volPersons);
                // dump($this);
                // dd($maxCapacity);
                $this->entityManager->persist($reservation);
                $this->entityManager->flush();
                $this->addFlash('success', 'Votre réservation est effective');

                // Réinitialiser l'objet Reservation
                $reservation = new Reservation();

                // Recréer le formulaire avec l'objet réinitialisé
                $form = $this->createForm(ReservationType::class, $reservation);
            }
        }

        return $this->render('reservation/index.html.twig', [
            'days' => $openDays,
            'form' => $form->createView(),
        ]);
    }
}
