<?php
include('./include/enteteEditeur.php');
?>

<div class="container">

    <?php
    $client = new SoapClient('http://localhost:8080/Manager?wsdl');
    $resultat = $client->__soapCall('listerCategorie', array());

    foreach ($resultat->return as $categorie)
    {
        if($categorie->id == $_GET['id'])
        {
            if (!isset($_POST['libelle']))
            {?>
                <form action="" method="post"><br>
                    <div class="form-group">
                        <label for="libelle">Libelle:</label>
                        <input type="texte" name="libelle" class="form-control" id="libelle" placeholder="Entrer libelle" value="<?php echo $categorie->libelle ?>">
                    </div>
                    
                    <div align="center">
                        <input type="submit" name="formInscription" class="btn btn-primary" value="Modifier">
                    </div>
                </form><br><?php
            }
            else
            {
                $id = (int) $_GET['id'];
                $libelle = htmlentities($_POST['libelle']);

                $parameters =
                [
                    'id' => $id,
                    'libelle' => $libelle
                ];

                $client = new SoapClient('http://localhost:8080/Manager?wsdl');
                if (!empty($libelle))
                {
                    $libelleLength = strlen($libelle);
                    if ($libelleLength <= 255)
                    {
                        
                            $resultat = $client->__soapCall('modifierCategorie', array($parameters));
                            echo $resultat->return;
                            header('Location: accueilEditeur.php');
                        
                    }
                    else
                    {
                        $erreur = "Votre libelle ne doit pas depasser 255 caracteres !!!";
                    }
                }
                else
                {
                    $erreur = "Tous les champs doivent etre remplis !!";
                }       

            }
        }
    }
    ?>
</div>
<?php
if (isset($erreur))
{
    echo '<font color="red" class="alert alert-danger" role="alert">'.$erreur."</font>";
}
?>

<?php
include_once('./include/pied.php');
?>



