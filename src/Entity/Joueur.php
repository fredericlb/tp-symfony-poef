<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Joueur
 *
 * @ORM\Table(name="joueur", indexes={@ORM\Index(name="fk_joueur_idVille_idx", columns={"idVille"})})
 * @ORM\Entity(repositoryClass="App\Repository\JoueurRepository")
 */
class Joueur
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
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=200, nullable=false)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=100, nullable=false)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=100, nullable=false)
     */
    private $prenom;

    /**
     * @var string
     *
     * @ORM\Column(name="motDePasse", type="string", length=20, nullable=false)
     */
    private $motdepasse;

    /**
     * @var string
     *
     * @ORM\Column(name="niveau", type="string", length=100, nullable=false)
     */
    private $niveau;

    /**
     * @var Ville
     *
     * @ORM\ManyToOne(targetEntity="Ville")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idVille", referencedColumnName="id")
     * })
     */
    private $idville;

  /**
   * @return int
   */
  public function getId(): int
  {
    return $this->id;
  }

  /**
   * @param int $id
   */
  public function setId(int $id): void
  {
    $this->id = $id;
  }

  /**
   * @return string
   */
  public function getEmail(): string
  {
    return $this->email;
  }

  /**
   * @param string $email
   */
  public function setEmail(string $email): void
  {
    $this->email = $email;
  }

  /**
   * @return string
   */
  public function getNom(): string
  {
    return $this->nom;
  }

  /**
   * @param string $nom
   */
  public function setNom(string $nom): void
  {
    $this->nom = $nom;
  }

  /**
   * @return string
   */
  public function getPrenom(): string
  {
    return $this->prenom;
  }

  /**
   * @param string $prenom
   */
  public function setPrenom(string $prenom): void
  {
    $this->prenom = $prenom;
  }

  /**
   * @return string
   */
  public function getMotdepasse(): string
  {
    return $this->motdepasse;
  }

  /**
   * @param string $motdepasse
   */
  public function setMotdepasse(string $motdepasse): void
  {
    $this->motdepasse = $motdepasse;
  }

  /**
   * @return string
   */
  public function getNiveau(): string
  {
    return $this->niveau;
  }

  /**
   * @param string $niveau
   */
  public function setNiveau(string $niveau): void
  {
    $this->niveau = $niveau;
  }

  /**
   * @return Ville
   */
  public function getIdville(): Ville
  {
    return $this->idville;
  }

  /**
   * @param Ville $idville
   */
  public function setIdville(Ville $idville): void
  {
    $this->idville = $idville;
  }


}
