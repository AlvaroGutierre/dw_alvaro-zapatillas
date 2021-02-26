<?php

namespace App\DataFixtures;


use Faker;
use App\Entity\Zapatilla;
use App\Entity\Categoria;
use App\Entity\ZapatillaUsuario;
use App\Entity\Usuario;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;



class AppFixtures extends Fixture {

    public function load(ObjectManager $manager) {
        //
        for ($i = 0; $i < 20; $i++) {
            $zapatillaFaker = Faker\Factory::create();

            $usuario = new Usuario();
            $usuario->setUsername("usuario_$i");
            $usuario->setPassword("4Vientos");
           
           
            $categoria = new Categoria();      
            $categoria->setNombre("Categoria_$i");
            $categoria->setDescripcion($zapatillaFaker->sentence);
           
           
            $zapatilla = new Zapatilla();
            $zapatilla->setNombre("Zapatilla_$i");
            $zapatilla->setImagen($zapatillaFaker->imageUrl($width = 640, $height = 480));
            $zapatilla->setDescripcion($zapatillaFaker->sentence);    
            $zapatilla->setCategoria($categoria);
            $zapatilla->setPrecio($zapatillaFaker->numberBetween(1,255));
           
            $zapatillaUsuario = new ZapatillaUsuario();
            $zapatillaUsuario->setUsuario($usuario);
            $zapatillaUsuario->setZapatilla($zapatilla);
               
            $manager->persist($categoria);
            $manager->persist($usuario);
            $manager->persist($zapatilla);  
            $manager->persist($zapatillaUsuario);
           
        }

        $manager->flush();
    }

}