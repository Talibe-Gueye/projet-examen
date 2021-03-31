<?php

namespace App\Controller;

use App\Entity\Cv;
use App\Entity\Offre;
use App\Form\CvType;
use App\Form\OffreType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends AbstractController
{
    #[Route('/Accueil', name: 'home')]
    public function index(): Response
    {
        return $this->render('accueil.html.twig');
    }

    #[Route('/', name: 'app_accueil')]
    public function accueil(): Response
    {
        return $this->render('accueil.html.twig');
    }

    #[Route('/ajoutOffre', name: 'app_offre')]
    public function ajouterOffre(Request $request): Response
    {
        $offre = new Offre();
        $form = $this->createForm(OffreType::class, $offre);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($offre);
            $entityManager->flush();

            return $this->redirectToRoute('app_offre');
        }
        return $this->render('offre.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/listeOffre', name: 'app_liste_offre')]
    public function listeOffre(): Response
    {
        $em = $this->getDoctrine()->getManager();
        $data['offres'] = $em->getRepository(Offre::class)->findAll();
        return $this->render('liste_offre.html.twig', $data);
    }

    #[Route('/postuler', name: 'app_postuler')]
    public function postuler(Request $request): Response
    {
        $cv = new Cv();
        $form = $this->createForm(CvType::class, $cv);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($cv);
            $em->flush();
            return $this->redirectToRoute('home');
        }
        return $this->render('postuler.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/Demandeur/liste', name: 'app_liste_demandeur')]
    public function listeDemandeur(): Response
    {
        $em = $this->getDoctrine()->getManager();
        $data['demandeurs'] = $em->getRepository(Cv::class)->findAll();
        return $this->render('liste_demandeur.html.twig', $data);
    }
}
