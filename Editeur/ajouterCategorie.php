<?php
include('./include/enteteEditeur.php');
?>

<div class="container">
    <?php
    if (!isset($_POST['libelle']))
    {?>
        <br><br><br><br>
        <form action="" method="post"><br>
            <div class="form-group">
                <label for="libelle">Libelle:</label>
                <input type="texte" name="libelle" class="form-control" id="libelle" placeholder="Entrer libelle" value="<?php if (isset($libelle)) { echo $libelle ; } ?>">
            </div>
           
            <div align="center">
                 <input type="submit" name="formAjouter" class="btn btn-primary" value="Ajouter">
            </div>
        </form><br><?php
    }
    else
    {
        $libelle = htmlentities($_POST['libelle']);

        $parameters =
        [
            'libelle' => $libelle
        ];

        $client = new SoapClient('http://localhost:8080/Manager?wsdl');
        if (!empty($libelle))
        {
            $libelleLength = strlen($libelle);
            if ($libelleLength <= 255)
            {
                $resultat = $client->__soapCall('ajouterCategorie', array($parameters));
                echo $resultat->return;
    
                header('Location: accueilEditeur.php');
            }
            else
            {
                $erreur = "Votre Login ne doit pas depasser 255 caracteres !!!";
            }
        }
        else
        {
            $erreur = "Tous les champs doivent etre remplis !!";
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



