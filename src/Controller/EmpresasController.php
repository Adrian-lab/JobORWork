<?php

namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Oferta;
use App\Entity\Empresa;


class EmpresasController extends AbstractController
{

    /**
     * @Route("/empresas", name="empresas")
    */

    public function empresas()
    {

        $empresas = $this->getDoctrine()
        ->getRepository(Empresa::class)
        ->findAll();

        return $this->render('oferta/empresas.html.twig', [
            'empresas' => $empresas,
        ]);
    }

}
