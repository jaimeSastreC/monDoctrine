<?php

namespace AppBundle\Entity;

/*classe Mapping*/
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="AppBundle\Repository\AuteurRepository")
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

    // varcharacter
    /**
     * @ORM\Column(type="string", length=100, name="nom")
     */
    private $nom;

    /**
     * @ORM\Column(type="datetime", name="date_naissance")
     */
    private $dateNaissance;

    /**
     * @ORM\Column(type="datetime", name="date_mort", nullable=true)
     */
    private $dateMort;

    /**
     * @ORM\Column(type="text", name="biographie")
     */
    private $biographie;

    /**
     * @ORM\Column(type="string", length=100, name="pays")
     */
    private $pays;


    //relation vers livres
    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Livre", mappedBy="auteur")
     */
    private $livre;

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
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    /**
     * @return mixed
     */
    public function getDateNaissance()
    {
        return $this->dateNaissance;
    }

    /**
     * @return mixed
     */
    public function getPays()
    {
        return $this->pays;
    }

    /**
     * @param mixed $dateNaissance
     */
    public function setDateNaissance($dateNaissance)
    {
        $this->dateNaissance = $dateNaissance;
    }

    /**
     * @return mixed
     */
    public function getDateMort()
    {
        return $this->dateMort;
    }

    /**
     * @param mixed $dateMort
     */
    public function setDateMort($dateMort)
    {
        $this->dateMort = $dateMort;
    }

    /**
     * @return mixed
     */
    public function getBiographie()
    {
        return $this->biographie;
    }

    /**
     * @param mixed $biographie
     */
    public function setBiographie($biographie)
    {
        $this->biographie = $biographie;
    }



    /**
     * @param mixed $pays
     */
    public function setPays($pays)
    {
        $this->pays = $pays;
    }

    /**
     * @return mixed
     */
    public function getLivre()
    {
        return $this->livre;
    }

    /**
     * @param mixed $livre
     */
    public function setLivre($livre)
    {
        $this->livre = $livre;
    }
}
