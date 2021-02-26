<?php

namespace App\Entity;

use App\Repository\ZapatillaUsuarioRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ZapatillaUsuarioRepository::class)
 */
class ZapatillaUsuario
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Zapatilla::class, inversedBy="usuarios")
     */
    private $zapatilla;

    /**
     * @ORM\ManyToOne(targetEntity=Usuario::class, inversedBy="zapatillas")
     */
    private $usuario;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getZapatilla(): ?Zapatilla
    {
        return $this->zapatilla;
    }

    public function setZapatilla(?Zapatilla $zapatilla): self
    {
        $this->zapatilla = $zapatilla;

        return $this;
    }

    public function getUsuario(): ?Usuario
    {
        return $this->usuario;
    }

    public function setUsuario(?Usuario $usuario): self
    {
        $this->usuario = $usuario;

        return $this;
    }
    
    public function __toString(): string
    {
        return   $this->getUsuario();
    }
}
