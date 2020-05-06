<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Oferta;
use App\Entity\Empresa;

class OfertaController extends AbstractController
{


    /**
     * @Route("/", name="oferta")
     */
    public function index()
    {

        // look for *all* Product objects
        $ofertas = $this->getDoctrine()
        ->getRepository(Oferta::class)
        ->findAll();

        return $this->render('oferta/index.html.twig', [
            'ofertas' => $ofertas,
        ]);
    }

    /**
     * @Route("/{id}", name="info")
     */

    public function datosInfo(int $id)
    {

        // look for *all* Product objects
        $oferta = $this->getDoctrine()
        ->getRepository(Oferta::class)
        ->find($id);

        $empresa = $this->getDoctrine()
        ->getRepository(Empresa::class)
        ->find($oferta->getIdEmpresa()->getId());

        return $this->render('oferta/info.html.twig', [
            'datosOferta' => $oferta,
            'datosEmpresa' => $empresa,
        ]);
    }

    /**
     * @Route("/{id}/{nom}", name="empresa")
    */

    public function infoEmpresa(int $id, string $nom)
    {

        $oferta = $this->getDoctrine()
        ->getRepository(Oferta::class)
        ->find($id);

        $empresa = $this->getDoctrine()
        ->getRepository(Empresa::class)
        ->find($oferta->getIdEmpresa()->getId());

        return $this->render('oferta/empresa.html.twig', [
            'datosEmpresa' => $empresa,
        ]);
    }

}
