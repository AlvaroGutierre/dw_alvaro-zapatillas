<?php

namespace App\Entity;

use App\Repository\CategoriaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CategoriaRepository::class)
 */
class Categoria
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
    private $nombre;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $descripcion;

    /**
     * @ORM\OneToMany(targetEntity=Zapatilla::class, mappedBy="categoria")
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

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getDescripcion(): ?string
    {
        return $this->descripcion;
    }

    public function setDescripcion(string $descripcion): self
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * @return Collection|Zapatilla[]
     */
    public function getZapatillas(): Collection
    {
        return $this->zapatillas;
    }

    public function addZapatilla(Zapatilla $zapatilla): self
    {
        if (!$this->zapatillas->contains($zapatilla)) {
            $this->zapatillas[] = $zapatilla;
            $zapatilla->setCategoria($this);
        }

        return $this;
    }

    public function removeZapatilla(Zapatilla $zapatilla): self
    {
        if ($this->zapatillas->removeElement($zapatilla)) {
            // set the owning side to null (unless already changed)
            if ($zapatilla->getCategoria() === $this) {
                $zapatilla->setCategoria(null);
            }
        }

        return $this;
    }
}
