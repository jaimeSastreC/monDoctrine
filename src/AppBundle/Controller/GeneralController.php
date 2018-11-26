<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\Auteur;
use AppBundle\Entity\Livre;
use AppBundle\Repository\LivreRepository;
use AppBundle\Repository\AuteurRepository;

use Symfony\Component\Routing\Annotation\Route;

class GeneralController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }

    /**
     * @Route("/livre", name="livre")
     * */
    public function livreTest(){
        // cherche un livre avec instance de getDoctrine -> méthode get Repository
        // puis ->find( un livre
        //var_dump('test'); die;
        $repository = $this->getDoctrine()->getRepository(Livre::class);
        $livre = $repository->find(1);
        var_dump($livre); die;
    }

    /**
     * @Route("/auteurs" , name="auteurs")
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
     * @Route("/livres/{genre}", name="genre")
     * */
    public function requestGenre($genre){
        // cherche un livre avec where genre == (genre} ; méthode : Repository
        // puis ->find( un livre
        //var_dump('test'); die;

        /** @var $repository LivreRepository */
        $repository = $this->getDoctrine()->getRepository(Livre::class);

        $livre = $repository->getBooksByGenre($genre);

        var_dump($livre); die;
    }

    /**
     * @Route("/auteurs/{country}", name="country")
     */
    public function requestCountry($country){
        /** @var $repository LivreRepository */
        $repository = $this->getDoctrine()->getRepository(Auteur::class);

        /*création d'une méthode spcifique pour une requête ciblé sur les pays -> voir Repository*/
        /** @var $repository AuteurRepositoryRepository */
        $auteurs = $repository->getBooksByCountry($country);
        //var_dump($auteurs);die;
        //retourne la page html auteurs en utiliasnt le twig auteur.html.twig
        return $this->render("@App/Pages/auteurs.html.twig",
            [
                'auteurs' => $auteurs
            ]);
    }

    //méthode puissante qui fait une recherche à partir d'un mot clé sur Twig> Form > name -> requete get
    /**
     * @Route("/searchName", name="search_name")
     */
    public function searchName(Request $request){
        //Request $request crée l'objet, géré par Symfony
        //récupère dans le Form le GET.
        //var_dump($request);
        $name = $request->query->get('searchName');

        //var_dump($name);die; //ok
        /** @var $repository LivreRepository */
        $repository = $this->getDoctrine()->getRepository(Auteur::class);

        $auteurs = $repository->getNameBiography($name);

        //var_dump($auteurs);die;
        //retourne la page html auteurs en utiliasnt le twig auteur.html.twig
        return $this->render("@App/Pages/auteurs.html.twig",
            [
                'auteurs' => $auteurs
            ]);
    }


    // AJOUTER UNE LIGNE DANS BASE DE DONNE TABLE

    /**
     * @Route("/auteurs/ajoutlivre", name="ajout_livre")
     * @return Response
     */
    public function ajouterLivreAction(){

        // je récupère l'entity manager de doctrine
        $entityManager = $this->getDoctrine()->getManager();

        // je créé une nouvelle instance de l'entité livre, pour créer un livre entity
        $livre = new Livre();

        // j'utilise les setters de mon entité pour y ajouter la valeur souhaité, attention champs obligatoires doivent être présents
        $livre->setTitre("titre depuis Controller");
        $livre->setAuteur("Auteur Livre");
        $livre->setPages(300);
        $livre->setGenre("genre");
        $livre->setFormat("edition");

        // j'enregistre en base de donnée
        $entityManager->persist($livre);
        $entityManager->flush();

        return $this->render("@App/Pages/livre.html.twig",
            [
                'livre' => $livre
            ]);
    }

/*    /**
     * @Route("/suprimmerlivre", name="livre_supp")
     */
    /*public function supprLivreAction(){
        $repository = $this->getDoctrine()->getRepository(Livre::class);
        $entityManager = $this->getDoctrine()->getManager();

        $livre = $repository->find('11');

        $entityManager->remove($livre);
        $entityManager->flush();

        return new Response('c\'est tout bon!');
    }*/

}
