<?php

use App\Controller\MonPremierController;
use Symfony\Component\Routing\Loader\Configurator\RoutingConfigurator;

return function(RoutingConfigurator $routes){
    $routes->add('client_php_prenom','/client/php/prenom/{nom}')
        ->controller([MonPremierController::class,'info'])
        ->requirements(['nom'=>'[a-zA-Z-]*']);
}

?>
