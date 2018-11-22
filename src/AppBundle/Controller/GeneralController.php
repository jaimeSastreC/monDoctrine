<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Auteur;
use AppBundle\Entity\Livre;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
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
     * @Route("auteurs" , name="auteurs")
     */
    public function auteursAppelAction(){
        // cherche tous les auteur avec instance de getDoctrine -> méthode get Repository
        // puis ->findAll  tous les livres
        //var_dump('test'); die;
        $repository = $this->getDoctrine()->getRepository(Auteur::class);
        $auteurs = $repository->findAll();
        return $this->render("@App/Pages/accueil.html.twig",
            [
                'auteurs' => $auteurs
            ]);
        //var_dump($auteurs); die;
    }
}
