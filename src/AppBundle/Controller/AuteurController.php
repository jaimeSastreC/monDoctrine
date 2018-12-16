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
     * @Route("/auteurs", name="auteurs")
     */
    public function listAuteursAction(){
        // cherche tous les auteur avec instance de getDoctrine -> méthode get Repository
        // puis ->findAll  tous les livres

        $repository = $this->getDoctrine()->getRepository(Auteur::class);

        //appel de l'ensemble des auteurs
        $auteurs = $repository->findAll();

        //retourne la page html auteurs en utiliasnt le twig auteur.html.twig
        return $this->render("@App/Pages/auteurs.html.twig",
            [
                'auteurs' => $auteurs
            ]);
    }

    //!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
    //méthode puissante qui fait une recherche à partir d'un mot clé sur Twig> Form > name -> requete get
    /**
     * @Route("/auteurs/searchName", name="search_name")
     */
    public function searchAuteurAction(Request $request){
        //Request $request crée l'objet, géré par Symfony
        //récupère dans le Form le GET.
        //var_dump($request);
        $name = $request->query->get('searchName');

        //var_dump($name);die; //ok
        /** @var $repository LivreRepository */
        $repository = $this->getDoctrine()->getRepository(Auteur::class);

        // méthode crée puissante => voir repository!!
        $auteurs = $repository->getNameBiography($name);

        //var_dump($auteurs);die;
        //retourne la page html auteurs en utiliasnt le twig auteur.html.twig
        return $this->render("@App/Pages/auteurs.html.twig",
            [
                'auteurs' => $auteurs
            ]);
    }

    /**
     * @Route("/auteur/{id}", name="auteur" )
     * */
    // le placeholder {id} est utilisé comme paramètre $id pour la requete doctrine
    public function auteurAction($id){
        // cherche un auteur avec instance de getDoctrine -> méthode get Repository
        // puis ->find de un livre selon $id

        $repository = $this->getDoctrine()->getRepository(Auteur::class);

        //choix de l'auteur avec la méthode find et la variable $id
        $auteur = $repository->find($id);


        //retourne la page html auteur en utiliasnt le twig auteur.html.twig
        return $this->render("@App/Pages/auteur.html.twig",
            [
                'auteur' => $auteur
            ]);
    }

    /**
     * @Route("/auteurs/{country}", name="country")
     */
    public function requestCountry($country){
        /** @var $repository LivreRepository */
        $repository = $this->getDoctrine()->getRepository(Auteur::class);

        /*création d'une méthode spcifique pour une requête ciblé sur les pays -> voir Repository*/
        /** @var $repository AuteurRepository */
        $auteurs = $repository->getAuteurByCountry($country);
        //var_dump($auteurs);die;
        //retourne la page html auteurs en utiliasnt le twig auteur.html.twig
        return $this->render("@App/Pages/auteurs.html.twig",
            [
                'auteurs' => $auteurs
            ]);
    }


}