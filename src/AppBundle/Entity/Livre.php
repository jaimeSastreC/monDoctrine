<?php

namespace AppBundle\Entity;

/*classe Mapping*/
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="AppBundle\Repository\LivreRepository")
 * @ORM\Table(name="livre")
 */
class Livre
{

    //Id est la clé primaire !!! Annotation qui aide à gérer tables Doctrine
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    // varcharacter
    /**
     * @ORM\Column(type="string", length=100, name="titre")
     */
    private $titre;

    // varcharacter
    //lien many to one création clé étrangère
    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Auteur", inversedBy="livre")
     */
    private $auteur;

    /**
     * @ORM\Column(type="integer", name="pages")
     * */
    private $pages;


    /**
     * @ORM\Column(type="string", length=100, name="genre")
     * */
    private $genre;

    /**
     * @ORM\Column(type="string", length=100, name="format")
     * */
    private $format;


    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * @param mixed $titre
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;
    }

    /**
     * @return mixed
     */
    public function getAuteur()
    {
        return $this->auteur;
    }

    /**
     * @param mixed $auteur
     */
    public function setAuteur($auteur)
    {
        $this->auteur = $auteur;
    }

    /**
     * @return mixed
     */
    public function getPages()
    {
        return $this->pages;
    }

    /**
     * @param mixed $pages
     */
    public function setPages($pages)
    {
        $this->pages = $pages;
    }

    /**
     * @return mixed
     */
    public function getGenre()
    {
        return $this->genre;
    }

    /**
     * @param mixed $genre
     */
    public function setGenre($genre)
    {
        $this->genre = $genre;
    }

    /**
     * @return mixed
     */
    public function getFormat()
    {
        return $this->format;
    }

    /**
     * @param mixed $format
     */
    public function setFormat($format)
    {
        $this->format = $format;
    }

}