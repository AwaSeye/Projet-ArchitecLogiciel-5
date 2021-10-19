<?php
include('./include/enteteEditeur.php');
if (isset($_GET['id']))
{
    $parameter = 
    [
        'id' => (int) $_GET['id']
    ];

    $client = new SoapClient('http://localhost:8080/Manager?wsdl');

    $resultat = $client->__soapCall('supprimerArticle', array($parameter));
    echo $resultat->return;

    header('Location: accueilEditeur.php');
}
else
{?>
    <div class="alert alert-danger" role="alert">Erreur de suppression</div><?php
}

include_once('./include/pied.php');
?>