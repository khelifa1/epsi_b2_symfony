<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Entity(repositoryClass="App\Repository\PokemonRepository")
 */
class Pokemon extends Base 
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="smallint")
     */
    private $type;

    /**
     * @ORM\Column(type="integer")
     */
    private $pv;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Attack")
     */
    private $attacks;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\TeamPokemon", mappedBy="Pokemons")
     */
    private $nickname;

    public function __construct()
    {
        parent::__construct();
        $this->attacks = new ArrayCollection();
        $this->nickname = new ArrayCollection();
    }
    
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getType(): ?int
    {
        return $this->type;
    }

    public function setType(int $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getPv(): ?int
    {
        return $this->pv;
    }

    public function setPv(int $pv): self
    {
        $this->pv = $pv;

        return $this;
    }

    /**
     * @return Collection|Attack[]
     */
    public function getAttacks(): Collection
    {
        return $this->attacks;
    }

    public function addAttack(Attack $attack): self
    {
        if (!$this->attacks->contains($attack)) {
            $this->attacks[] = $attack;
        }

        return $this;
    }

    public function removeAttack(Attack $attack): self
    {
        if ($this->attacks->contains($attack)) {
            $this->attacks->removeElement($attack);
        }

        return $this;
    }

    /**
     * @return Collection|TeamPokemon[]
     */
    public function getNickname(): Collection
    {
        return $this->nickname;
    }

    public function addNickname(TeamPokemon $nickname): self
    {
        if (!$this->nickname->contains($nickname)) {
            $this->nickname[] = $nickname;
            $nickname->setPokemons($this);
        }

        return $this;
    }

    public function removeNickname(TeamPokemon $nickname): self
    {
        if ($this->nickname->contains($nickname)) {
            $this->nickname->removeElement($nickname);
            // set the owning side to null (unless already changed)
            if ($nickname->getPokemons() === $this) {
                $nickname->setPokemons(null);
            }
        }

        return $this;
    }
    
}
