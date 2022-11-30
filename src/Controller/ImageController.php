<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Messenger\Stamp\RedeliveryStamp;
use Symfony\Component\Routing\Annotation\Route;

class ImageController extends AbstractController{

    public function afficher(){
        $LeChemin = __DIR__."/../../photo/";
        $LesFichiers = scandir($LeChemin);
        foreach($LesFichiers as $TestDir){
            if(is_dir($TestDir)){
                continue;
            }
            else{
                $TabPhoto[] = $TestDir;
            }
        }
        return $this->render('ImgMenu.html.twig',['Photo'=>$TabPhoto]);
    }

    #[Route('/image/{img}', name: 'client_image')]
    public function Image($img){
        return $this->render('MonTemplate.html.twig',['image'=>$img]);
    }

    #[Route('/photo/{MonImg}', name: 'client_photo')]
    public function photo($MonImg){
        return new BinaryFileResponse(__DIR__."/../../photo/$MonImg");
    }
}

?>