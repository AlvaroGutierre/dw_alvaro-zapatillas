<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Entity\Zapatilla;

class DefaultController extends AbstractController {

    /**
     * @Route("/default", name="default")
     */
    public function indexAction(Request $request) {
        $zapatillas = $this->getDoctrine()
                ->getRepository(Zapatilla::class)
                ->findAllActive();
        return $this->render('default/index.html.twig', array(
                    'zapatillas' => $zapatillas,
        ));
    }

}
