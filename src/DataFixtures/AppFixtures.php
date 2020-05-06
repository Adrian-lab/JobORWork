<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Empresa;
use App\Entity\Candidato;
use App\Entity\Candidat;
use App\Entity\Oferta;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {

        $emp1 = new Empresa();
        $emp1 ->setCorreu("em1@giam.cat")
            ->setLogo("logo1.png")
            ->setTipus("tecnologica")
            ->setNom("Impulse_Barcelona");
        $manager -> persist($emp1);

        $of1 = new Oferta();
        $of1 -> setDataPub(new \DateTime())
            -> setDescripcio("desemvolupador web")
            -> setIdEmpresa($emp1)
            -> setTitol("DAW");
        $manager -> persist($of1);
        
        $ca1 = new Candidat();
        $ca1 -> setNom ("Lola")
            -> setCognoms("Ruiz")
            -> setTelefon("1111")
            -> setOferta($of1);
        $manager -> persist($ca1);

        // $product = new Product();
        // $manager->persist($product);

        $manager->flush();
    }
}
