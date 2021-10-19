<?php
include('./include/enteteAdmin.php');
?>

<div class="container">

    <?php
    $client = new SoapClient('http://localhost:8080/Manager?wsdl');
    $resultat = $client->__soapCall('listerArticle', array());

    foreach ($resultat->return as $article)
    {
        if($article->id == $_GET['id'])
        {
            if (!isset($_POST['titre'], $_POST['contenu'], $_POST['dateCreation'], $_POST['categorie']))
            {?>
                <form action="" method="post">
                    <div class="form-group">
                        <label for="titre">Titre:</label>
                        <input type="texte" name="titre" class="form-control" id="titre" placeholder="Entrer titre" value="<?php echo $article->titre?>">
                    </div>
                    <div class="form-group">
                        <label for="contenu">Contenu:</label><br>
                        <textarea name="contenu" id="contenu" cols="80" rows="13" placeholder="Entrer le contenu" value="<?php echo $article->contenu?>"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="dateCreation">Date Creation:</label>
                        <input type="date" name="dateCreation" class="form-control" id="dateCreation" placeholder="Entrer dateCreation" value="<?php echo $article->dateCreation?>">
                    </div>
                    <?php
                    $client = new SoapClient('http://localhost:8080/Manager?wsdl');
                    $resultat1 = $client->__soapCall('listerCategorie', array());
                    $resultat2 = $client->__soapCall('listerArticle', array());
                    ?>
                    <div class="form-group">
                        <label for="categorie">Categorie:</label>
                        <select name="categorie" class="form-control" id="categorie" >
                            <?php
                            $categories = is_array($resultat1->return) ? $resultat1->return : [$resultat1->return];
                            $articles = is_array($resultat2->return) ? $resultat2->return : [$resultat2->return];
                            foreach ($articles as $article)
                            {
                                foreach ($categories as $categorie)
                                    {?>
                                        <option value="<?= $categorie->id ?>" <?= (isset($article->categorie) &&  $article->categorie) == $categorie->id  ? 'selected' : '' ?>> <?= $categorie->libelle ?> </option><?php
                                    }
                            }?>
                        </select>   
                    </div>
                    
                    <div align="center">
                        <input type="submit" name="formInscription" class="btn btn-primary" value="Modifier">
                    </div>
                </form><br><?php
            }
            else
            {
                $id = (int) $_GET['id'];
                $titre = htmlentities($_POST['titre']);
                $contenu = htmlentities($_POST['contenu']);
                $dateCreation = htmlentities($_POST['dateCreation']);
                $categorie = htmlentities($_POST['categorie']);

                $parameters =
                [
                    'id' => $id,
                    'titre' => $titre,
                    'contenu' => $contenu,
                    'dateCreation' => $dateCreation,
                    'categorie' => $categorie
                ];

                $client = new SoapClient('http://localhost:8080/Manager?wsdl');
                if (!empty($titre) && !empty($contenu) && !empty($dateCreation) && !empty($categorie))
                {
                    $resultat = $client->__soapCall('modifierArticle', array($parameters));
                    echo $resultat->return;
                    header('Location: accueilAdmin.php');
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



