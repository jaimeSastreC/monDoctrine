<?php

namespace AppBundle\Entity;

/*classe Mapping*/
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

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
     *  @Assert\Length(
     *  min = 3,
     *  max = 50,
     * minMessage = "Your first name must be at least {{ limit }} characters long",
     * maxMessage = "Your first name cannot be longer than {{ limit }} characters"
     * )
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
     *
     * @Assert\Type(
     *     type="integer",
     *     message="The value {{ value }} is not a valid {{ type }}."
     * )
     * @Assert\GreaterThan(
     *     value = 5,
     *     message="The value {{ value }} must be greater than {{ compared_value }}."
     *     )
     * */
    private $pages;


    /**
     * @ORM\Column(type="string", length=100, name="genre")
     *  *  @Assert\Length(
     *  min = 3,
     *  max = 20,
     * minMessage = "Your first name must be at least {{ limit }} characters long",
     * maxMessage = "Your first name cannot be longer than {{ limit }} characters"
     * )
     * */
    private $genre;

    /**
     * @ORM\Column(type="string", length=100, name="format")
     *  *  @Assert\Length(
     *  min = 3,
     *  max = 10,
     * minMessage = "Your first name must be at least {{ limit }} characters long",
     * maxMessage = "Your first name cannot be longer than {{ limit }} characters"
     * )
     * */
    private $format;

    /**
     * @ORM\Column(type="string", nullable=true)
     */

    private $image;


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

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param mixed $image
     */
    public function setImage($image)
    {
        $this->image = $image;
    }


}
