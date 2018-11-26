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

class LivreController extends Controller
{

    /**
     * @Route("/livres/{format}", name="livre_format")
     */
    public function requestCountry($format){
        /** @var $repository LivreRepository */
        $repository = $this->getDoctrine()->getRepository(Livre::class);

        /*création d'une méthode spcifique pour une requête ciblé sur les pays -> voir Repository*/
        /** @var $repository LivreRepositoryRepository */
        $livres = $repository->getLivreByFormat($format);
        //var_dump($auteurs);die;
        //retourne la page html auteurs en utiliasnt le twig auteur.html.twig
        return $this->render("@App/Pages/livre.html.twig",
            [
                'livres' => $livres
            ]);
    }


    /**
     * @Route("/livres/ajoutlivre", name="ajout_livre")
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

        return $this->render("@App/Pages/auteur.html.twig",
            [
                'auteur' => $auteur
            ]);
    }
}