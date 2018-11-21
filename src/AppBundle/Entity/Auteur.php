<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="auteur")
 */
class Auteur
{
    //Id est la clé primaire !!! Annotation qui aide à gérer tables Doctrine
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $auteur;

    /**
     * @ORM\Column(type="datetime", name="date_naissance")
     */
    private $date_naissance;

    /**
     * @ORM\Column(type="datetime", name="date_mort", nullable=true)
     */
    private $date_mort;

     /**
      * @ORM\Column(type="integer")
      */
    private $pages;

    /**
     * @ORM\Column(type="text")
     */
    private $biographie;


}