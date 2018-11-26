<?php
/**
 * Created by PhpStorm.
 * User: lapiscine
 * Date: 23/11/2018
 * Time: 15:52
 */

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\Auteur;
use AppBundle\Entity\Livre;
use AppBundle\Repository\LivreRepository;
use AppBundle\Repository\AuteurRepository;

use Symfony\Component\Routing\Annotation\Route;

class AdministrateurController extends Controller
{

    /**
     * @Route("/auteurs-administrateur" , name="auteurs_administrateur")
     */
    public function listAuteursAction(){
        // cherche tous les auteur avec instance de getDoctrine -> méthode get Repository
        // puis ->findAll  tous les livres

        $repository = $this->getDoctrine()->getRepository(Auteur::class);

        //appel de l'ensemble des auteurs
        $auteurs = $repository->findAll();

        //retourne la page html auteurs en utiliasnt le twig auteur.html.twig
        return $this->render("@App/Pages/auteurs-administrateur.html.twig",
            [
                'auteurs' => $auteurs
            ]);
    }

    /**
     * @Route("/auteurs-administrateur/suprimmerauteur/{id}", name="auteur_supp")
     */
    public function supprAuteurAction($id){

        /** @var $repository LivreRepository */
        $repository = $this->getDoctrine()->getRepository(Auteur::class);

        $entityManager = $this->getDoctrine()->getManager();

        $auteur = $repository->find($id);

        $entityManager->remove($auteur);
        $entityManager->flush();

        // Important : redirige vers la route demandée, avec name = 'auteurs_administrateur'
        return $this->redirectToRoute('auteurs_administrateur');
    }
}