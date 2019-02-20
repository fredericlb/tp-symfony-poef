<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Verbe
 *
 * @ORM\Table(name="verbe")
 * @ORM\Entity(repositoryClass="App\Repository\VerbeRepository")
 */
class Verbe
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
     * @ORM\Column(name="baseVerbale", type="string", length=100, nullable=false)
     */
    private $baseverbale;

    /**
     * @var string
     *
     * @ORM\Column(name="preterit", type="string", length=100, nullable=false)
     */
    private $preterit;

    /**
     * @var string
     *
     * @ORM\Column(name="participePasse", type="string", length=100, nullable=false)
     */
    private $participepasse;

    /**
     * @var string
     *
     * @ORM\Column(name="traduction", type="string", length=100, nullable=false)
     */
    private $traduction;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBaseverbale(): ?string
    {
        return $this->baseverbale;
    }

    public function setBaseverbale(string $baseverbale): self
    {
        $this->baseverbale = $baseverbale;

        return $this;
    }

    public function getPreterit(): ?string
    {
        return $this->preterit;
    }

    public function setPreterit(string $preterit): self
    {
        $this->preterit = $preterit;

        return $this;
    }

    public function getParticipepasse(): ?string
    {
        return $this->participepasse;
    }

    public function setParticipepasse(string $participepasse): self
    {
        $this->participepasse = $participepasse;

        return $this;
    }

    public function getTraduction(): ?string
    {
        return $this->traduction;
    }

    public function setTraduction(string $traduction): self
    {
        $this->traduction = $traduction;

        return $this;
    }


}
