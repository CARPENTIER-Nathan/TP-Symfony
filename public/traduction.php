<?php

use Symfony\Component\Translation\Loader\XliffFileLoader;
use Symfony\Component\Translation\Translator;

require_once "../vendor/autoload.php";

$translator = new Translator('fr');
$translator->addLoader('xlf', new XliffFileLoader());
$translator->addResource(
    'xlf',
    __DIR__.'/../translations/validators.fr.xlf',
    'fr'
);

echo $translator->trans("One case can't be blank.");
?>