<?php

namespace App\Entity;

use App\Repository\UsuarioRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UsuarioRepository::class)
 */
class Usuario
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $username;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $password;

    /**
     * @ORM\OneToMany(targetEntity=ZapatillaUsuario::class, mappedBy="usuario")
     */
    private $zapatillas;

    public function __construct()
    {
        $this->zapatillas = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @return Collection|ZapatillaUsuario[]
     */
    public function getZapatillas(): Collection
    {
        return $this->zapatillas;
    }

    public function addZapatilla(ZapatillaUsuario $zapatilla): self
    {
        if (!$this->zapatillas->contains($zapatilla)) {
            $this->zapatillas[] = $zapatilla;
            $zapatilla->setUsuario($this);
        }

        return $this;
    }

    public function removeZapatilla(ZapatillaUsuario $zapatilla): self
    {
        if ($this->zapatillas->removeElement($zapatilla)) {
            // set the owning side to null (unless already changed)
            if ($zapatilla->getUsuario() === $this) {
                $zapatilla->setUsuario(null);
            }
        }

        return $this;
    }
    public function __toString(): string
    {
        return   $this->getUsername();
    }
}
