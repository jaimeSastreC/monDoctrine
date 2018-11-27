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
    //racine
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


}


    // AJOUTER UNE LIGNE DANS BASE DE DONNE TABLE



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


