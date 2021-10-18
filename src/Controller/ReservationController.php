<?php

namespace App\Controller;

use App\Entity\Reservation;
use App\Form\ReservationType;
use Carbon\Carbon;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ReservationController extends AbstractController
{
    /**
     * @Route ("/new", name="new_reservation")
     */
    public function index(Request $request, EntityManagerInterface $entityManager): Response

    {
        //default settings
        $defaultReservation= new Reservation();
        $defaultReservation->setStartAt(Carbon::now());
        $defaultReservation->setEndAt(Carbon::now()->addHour());

        //make form
        $form= $this->createForm(ReservationType::class,$defaultReservation);
        $form->handleRequest($request);
        if ($form->isSubmitted()){

            /**
             * @var $bla Reservation
             */

            $bla= $form->getData();
            $bla->setCreatedAt(Carbon::now());
            $entityManager->persist($bla);
            $entityManager->flush();
            return $this->redirectToRoute('app_home');
        }
        return $this->render('reservation/index.html.twig', [
            'controller_name' => 'HomeController',
            'form'=>$form->createView(),
        ]);
    }
}
