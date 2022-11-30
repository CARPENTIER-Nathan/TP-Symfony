<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/client')]
class MonPremierController{

    #[Route('/annotation/prenom/{nom}', name: 'client_annotation_prenom', requirements: ['nom'=>'[a-zA-Z-]*'])]
    public function info($nom){
        return new Response("Le prenom est : $nom");
    }
}

?>  