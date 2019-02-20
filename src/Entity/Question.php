<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Question
 *
 * @ORM\Table(name="question", indexes={@ORM\Index(name="fk_question_idVerbe_idx", columns={"idVerbe"}), @ORM\Index(name="fk_question_idPartie_idx", columns={"idPartie"})})
 * @ORM\Entity(repositoryClass="App\Repository\QuestionRepository")
 */
class Question
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
     * @ORM\Column(name="reponsePreterit", type="string", length=100, nullable=false)
     */
    private $reponsepreterit;

    /**
     * @var string
     *
     * @ORM\Column(name="reponseParticipePasse", type="string", length=100, nullable=false)
     */
    private $reponseparticipepasse;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateEnvoi", type="datetime", nullable=false, options={"default"="current_timestamp()"})
     */
    private $dateenvoi = 'current_timestamp()';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateReponse", type="datetime", nullable=false, options={"default"="'0000-00-00 00:00:00'"})
     */
    private $datereponse = '\'0000-00-00 00:00:00\'';

    /**
     * @var \Partie
     *
     * @ORM\ManyToOne(targetEntity="Partie")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idPartie", referencedColumnName="id")
     * })
     */
    private $idpartie;

    /**
     * @var \Verbe
     *
     * @ORM\ManyToOne(targetEntity="Verbe")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idVerbe", referencedColumnName="id")
     * })
     */
    private $idverbe;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getReponsepreterit(): ?string
    {
        return $this->reponsepreterit;
    }

    public function setReponsepreterit(string $reponsepreterit): self
    {
        $this->reponsepreterit = $reponsepreterit;

        return $this;
    }

    public function getReponseparticipepasse(): ?string
    {
        return $this->reponseparticipepasse;
    }

    public function setReponseparticipepasse(string $reponseparticipepasse): self
    {
        $this->reponseparticipepasse = $reponseparticipepasse;

        return $this;
    }

    public function getDateenvoi(): ?\DateTimeInterface
    {
        return $this->dateenvoi;
    }

    public function setDateenvoi(\DateTimeInterface $dateenvoi): self
    {
        $this->dateenvoi = $dateenvoi;

        return $this;
    }

    public function getDatereponse(): ?\DateTimeInterface
    {
        return $this->datereponse;
    }

    public function setDatereponse(\DateTimeInterface $datereponse): self
    {
        $this->datereponse = $datereponse;

        return $this;
    }

    public function getIdpartie(): ?Partie
    {
        return $this->idpartie;
    }

    public function setIdpartie(?Partie $idpartie): self
    {
        $this->idpartie = $idpartie;

        return $this;
    }

    public function getIdverbe(): ?Verbe
    {
        return $this->idverbe;
    }

    public function setIdverbe(?Verbe $idverbe): self
    {
        $this->idverbe = $idverbe;

        return $this;
    }


}
