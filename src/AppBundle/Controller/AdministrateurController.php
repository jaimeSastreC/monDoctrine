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

//use Symfony\Component\Routing\Annotation\Route;

class AdministrateurController extends Controller
{

    /**
     * @Route("/admin/auteurs" , name="admin_auteurs")
     */
    public function listAdminAuteursAction(){
        // cherche tous les auteur avec instance de getDoctrine -> méthode get Repository
        // puis ->findAll  tous les livres

        $repository = $this->getDoctrine()->getRepository(Auteur::class);

        //appel de l'ensemble des auteurs
        $auteurs = $repository->findAll();

        //retourne la page html auteurs en utiliasnt le twig auteur.html.twig
        return $this->render("@App/Pages/auteurs_administrateur.html.twig",
            [
                'auteurs' => $auteurs
            ]);
    }

    /**
     * @Route("/admin/ajouter_auteur", name="admin_ajout_auteur")
     */
    public function registerAdminAuthorAction(){
        // je récupère l'entity manager de doctrine
        $entityManager = $this->getDoctrine()->getManager();

        // je créé une nouvelle instance de l'entité livre, pour créer un auteur entity
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

    /**
     * @Route("/admin/modifier_auteur/{id}", name="admin_modif_auteur")
     */
    public function modifierAuteurAction($id){
        // je genère le Repository de Doctrine
        $auteurRepository = $this->getDoctrine()->getRepository(Auteur::class);
        // je récupère l'entity manager de doctrine
        $entityManager = $this->getDoctrine()->getManager();

        //avec le repository je récupère dans la BD l'auteur sous forme d'Identity (instance)
        $auteur= $auteurRepository->find($id);

        //on modifie ce qu'on veut
        $auteur->setNom('Tata');

        // j'enregistre en base de donnée
        $entityManager->persist($auteur);
        $entityManager->flush();

        return $this->render("@App/Pages/auteur.html.twig",
            [
                'auteur' => $auteur
            ]);
    }


    /**
     * @Route("/admin/suprimmer_auteur/{id}", name="admin_supp_auteur")
     */
    public function supprAdminAuteurAction($id){

        /** @var $repository LivreRepository */
        $repository = $this->getDoctrine()->getRepository(Auteur::class);

        $entityManager = $this->getDoctrine()->getManager();

        $auteur = $repository->find($id);

        $entityManager->remove($auteur);
        $entityManager->flush();

        // Important : redirige vers la route demandée, avec name = 'auteurs_administrateur'
        return $this->redirectToRoute('admin_auteurs');
    }

    /******************************** Livres ********************************/


    /**
     * @Route("/admin/livres" , name="admin_livres")
     */
    public function listAdminLivresAction()
    {
        // cherche tous les auteur avec instance de getDoctrine -> méthode get Repository
        // puis ->findAll  tous les livres

        $repository = $this->getDoctrine()->getRepository(Livre::class);

        //appel de l'ensemble des auteurs
        $livres = $repository->findAll();

        //retourne la page html auteurs en utiliasnt le twig auteur.html.twig
        return $this->render("@App/Pages/livres_administrateur.html.twig",
            [
                'livres' => $livres
            ]
        );
    }


    /**
     * @Route("/admin/ajoutlivre", name="admin_ajout_livre")
     * @return Response
     */
    public function ajouterLivreAction(){
        // je récupère l'entity manager de doctrine
        $entityManager = $this->getDoctrine()->getManager();

        $auteurRepository = $this->getDoctrine()->getRepository(Auteur::class);
        $auteur= $auteurRepository->find(27);

        // je créé une nouvelle instance de l'entité livre, pour créer un livre entity
        $livre = new Livre();

        // j'utilise les setters de mon entité pour y ajouter la valeur souhaité, attention champs obligatoires doivent être présents
        $livre->setTitre("titre depuis Controller");
        $livre->setAuteur($auteur);
        $livre->setPages(300);
        $livre->setGenre("polar");
        $livre->setFormat("Gallimard");
        //var_dump($livre);die;
        // j'enregistre en base de donnée
        $entityManager->persist($livre);
        $entityManager->flush();

        return $this->render("@App/Pages/livre.html.twig",
            [
                'livre' => $livre
            ]);
    }


    /**
     * @Route("/admin/modifier_livre/{id}", name="admin_modif_livre")
     */
    public function modifierLivreAction($id){
        $auteurRepository = $this->getDoctrine()->getRepository(Auteur::class);
        $auteur= $auteurRepository->find(27);

        // cherche un livre avec instance de getDoctrine -> méthode get Repository
        // puis ->find( un livre )
        $repository = $this->getDoctrine()->getRepository(Livre::class);
        $livre = $repository->find($id);

        // j'utilise les setters de mon entité pour y ajouter la valeur souhaité, attention champs obligatoires doivent être présents
        // tout ne doit pas être modifié
        $livre->setTitre("Titre modifié");
        $livre->setAuteur($auteur);
        $livre->setPages(600);
        $livre->setGenre("Polar");
        $livre->setFormat("Poche");

        // je récupère l'entity manager de doctrine
        $entityManager = $this->getDoctrine()->getManager();

        // j'enregistre en base de donnée
        $entityManager->persist($livre);
        $entityManager->flush();

        return $this->redirectToRoute('admin_livres');
    }

    /**
     * @Route("/admin/suprimmer_livre/{id}", name="admin_supp_livre")
     */
    public function supprAdminLivreAction($id){

        /** @var $repository LivreRepository */
        $repository = $this->getDoctrine()->getRepository(Livre::class);

        $entityManager = $this->getDoctrine()->getManager();

        $livre = $repository->find($id);

        $entityManager->remove($livre);
        $entityManager->flush();

        // Important : redirige vers la route demandée, avec name = 'auteurs_administrateur'
        return $this->redirectToRoute('admin_livres');
    }


}