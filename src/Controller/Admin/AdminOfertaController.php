<?php

namespace App\Controller\Admin;
use App\Entity\Oferta;
use App\Entity\Empresa;
use App\Form\OfertaType;

use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\EntityManager;

use App\Entity\Task;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\Routing\Annotation\Route;

class AdminOfertaController extends AbstractController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index()
    {

        $ofertas = $this->getDoctrine()
        ->getRepository(Oferta::class)
        ->findAll();

        
        
        return $this->render('admin/adminOferta.html.twig', [
            'ofertas' => $ofertas,
        ]);
    }

    /** 
    * @Route("/admin/oferta/{id}", name="admin_oferta_modif")
    */

    public function modifOferta (int $id, Request $request){
        $oferta = $this->getDoctrine()
        ->getRepository(Oferta::class)
        ->find($id);

        $form = $this->createForm(OfertaType::class, $oferta);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $manager->persist($oferta);
            $manager->flush();
            return $this->redirectToRoute("admin_oferta");
        }

        return $this->render('admin/modifOferta.html.twig', ["oferta" => $oferta,"form" => $form-> createView()]);
    }

    /** 
    * @Route("/admin/oferta/", name="admin_oferta_anyadir")
    */
    public function anyadirfOferta (Request $request){

        $form = $this->createForm(OfertaType::class);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $oferta = $form->getData();
            $manager->persist($oferta);
            $manager->flush();
            return $this->redirectToRoute("admin");
        }

        return $this->render('admin/anyadirOferta.html.twig', ["form" => $form-> createView()]);
    }

        /** 
    * @Route("/admin/oferta/", name="admin_oferta_borrar")
    */
    public function borrarfOferta (int $id){
            $manager->remove($id);
            $manager->flush();
            return $this->redirectToRoute("admin");
    }

}
