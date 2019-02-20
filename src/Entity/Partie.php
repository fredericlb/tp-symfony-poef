<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Partie
 *
 * @ORM\Table(name="partie", indexes={@ORM\Index(name="fk_partie_idJoueur_idx", columns={"idJoueur"})})
 * @ORM\Entity(repositoryClass="App\Repository\PartieRepository")
 */
class Partie
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \Joueur
     *
     * @ORM\ManyToOne(targetEntity="Joueur")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idJoueur", referencedColumnName="id")
     * })
     */
    private $idjoueur;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdjoueur(): ?Joueur
    {
        return $this->idjoueur;
    }

    public function setIdjoueur(?Joueur $idjoueur): self
    {
        $this->idjoueur = $idjoueur;

        return $this;
    }


}
