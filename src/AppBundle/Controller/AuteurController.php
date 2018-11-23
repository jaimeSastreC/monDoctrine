<?php
/**
 * Created by PhpStorm.
 * User: lapiscine
 * Date: 23/11/2018
 * Time: 14:11
 */

namespace AppBundle\Controller;

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\Auteur;
use AppBundle\Entity\Livre;
use AppBundle\Repository\LivreRepository;
use AppBundle\Repository\AuteurRepository;

use Symfony\Component\Routing\Annotation\Route;

class AuteurController extends Controller
{

    /**
     * @Route("/ajoutauteur", name="ajout_auteur")
     */
    public function registerAuthorAction(){
        // je récupère l'entity manager de doctrine
        $entityManager = $this->getDoctrine()->getManager();

        // je créé une nouvelle instance de l'entité livre, pour créer un livre entity
        $auteur = new Auteur();

        // j'utilise les setters de mon entité pour y ajouter la valeur souhaité, attention champs obligatoires doivent être présents
        $auteur->setNom("titre depuis Controller");
        $auteur->setDateNaissance(new \DateTime('1995-05-23'));
        //$auteur->setDateMort();
        $auteur->setBiographie("Lorem ZZZZZZZZ");
        $auteur->setPays("pays");

        // j'enregistre en base de donnée
        $entityManager->persist($auteur);
        $entityManager->flush();

        return new Response("livre enregistré");
    }
}