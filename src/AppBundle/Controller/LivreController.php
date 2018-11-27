<?php
/**
 * Created by PhpStorm.
 * User: lapiscine
 * Date: 23/11/2018
 * Time: 14:11
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

class LivreController extends Controller
{
    /**
     * @Route("/livre/{id}", name="livre")
     * */
    public function livreAction($id){
        // cherche un livre avec instance de getDoctrine -> méthode get Repository
        // puis ->find( un livre
        //var_dump('test'); die;
        $repository = $this->getDoctrine()->getRepository(Livre::class);
        $livre = $repository->find($id);
        return $this->render("@App/Pages/livre.html.twig",
            [
                'livre' => $livre
            ]);
    }

    /**
     * @Route("/livres" , name="livres")
     */
    public function listLivresAction(){

        // cherche tous les livres avec instance de getDoctrine -> méthode get Repository
        $livresRepository = $this->getDoctrine()->getRepository(Livre::class);

        //appel de l'ensemble des livres
        $livres = $livresRepository->findAll();

        //retourne la page html auteurs en utiliasnt le twig auteur.html.twig
        return $this->render("@App/Pages/livres.html.twig",
            [
                'livres' => $livres
            ]);
    }


    /**
     * @Route("/livres/{genre}", name="livres_genre")
     * */
/*    public function requestGenreAction($genre){
        // cherche un livre avec where genre == (genre} ; méthode : Repository
        // puis ->find( un livre
        //var_dump('test'); die;

        /** @var $repository LivreRepository */
   /*     $repository = $this->getDoctrine()->getRepository(Livre::class);

        $livre = $repository->getBooksByGenre($genre);

        var_dump($livre); die;
    }*/

    /**
     * @Route("/livres/{format}", name="livres_format")
     */
    public function requeteLivresAction($format){

        /** @var $repository LivreRepository */
        $livreRepository = $this->getDoctrine()->getRepository(Livre::class);

        /*création d'une méthode spcifique pour une requête ciblé sur les pays -> voir Repository*/
        /** @var $repository LivreRepositoryRepository */
        $livres = $livreRepository->getLivreByFormat($format);

        //var_dump($livres);die;
        //retourne la page html auteurs en utiliasnt le twig auteur.html.twig
        return $this->render("@App/Pages/livres.html.twig",
            [
                'livres' => $livres
            ]);
    }




}