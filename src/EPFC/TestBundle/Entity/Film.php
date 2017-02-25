<?php

namespace EPFC\TestBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Film
 *
 * @ORM\Table(name="film")
 * @ORM\Entity(repositoryClass="EPFC\TestBundle\Repository\FilmRepository")
 */
class Film
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="titre", type="string", length=255)
     * @Assert\NotBlank()
     * @Assert\Length(
     *      min=3,
     *      minMessage = "Veuillez entrer au moins {{ limit }} caractères."
     * )
     */
    private $titre;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", length=500)
     */
    private $description;
    
    /**
     * @ORM\ManyToOne(targetEntity="Genre", inversedBy="films")
     * @ORM\JoinColumn(name="genre_id", referencedColumnName="id")
     * @Assert\NotBlank()
     */
    private $genre;

    /**
     * @ORM\ManyToMany(targetEntity="Acteur")
     * 
     */
    private $acteurs;
    
    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set titre
     *
     * @param string $titre
     *
     * @return Film
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get titre
     *
     * @return string
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Film
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set genre
     *
     * @param \EPFC\TestBundle\Entity\Genre $genre
     *
     * @return Film
     */
    public function setGenre(\EPFC\TestBundle\Entity\Genre $genre = null)
    {
        $this->genre = $genre;

        return $this;
    }

    /**
     * Get genre
     *
     * @return \EPFC\TestBundle\Entity\Genre
     */
    public function getGenre()
    {
        return $this->genre;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->acteurs = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add acteur
     *
     * @param \EPFC\TestBundle\Entity\Acteur $acteur
     *
     * @return Film
     */
    public function addActeur(\EPFC\TestBundle\Entity\Acteur $acteur)
    {
        $this->acteurs[] = $acteur;

        return $this;
    }

    /**
     * Remove acteur
     *
     * @param \EPFC\TestBundle\Entity\Acteur $acteur
     */
    public function removeActeur(\EPFC\TestBundle\Entity\Acteur $acteur)
    {
        $this->acteurs->removeElement($acteur);
    }

    /**
     * Get acteurs
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getActeurs()
    {
        return $this->acteurs;
    }
}
