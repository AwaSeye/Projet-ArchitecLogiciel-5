<?php
include_once('./include/enteteEditeur.php');
?>
<div class="container">
<br><br>
    <h2>Liste des articles</h2>
    <br>
    <?php  
        $client = new SoapClient('http://localhost:8080/Manager?wsdl');
        $resultat = $client->__soapCall('listerArticle', array());

        if (!isset($resultat->return))
        {
            echo "Oupss!! aucun article enregistré";
        }
        else
        {
    ?>
        <table class="table table-striped">
            <tr>
                <th>ID</th>
                <th>Titre</th>
                <th>Contenu</th>
                <th>Date Creation</th>
                <th colspan="3">Actions</th>
            </tr><?php
            $articles = is_array($resultat->return) ? $resultat->return : [$resultat->return];
            foreach ($articles as $article)
            {?>
                <tr>
                    <td><?= $article->id ?></td>
                    <td><?= $article->titre ?></td>
                    <td><?= substr($article->contenu, 0, 80).'...' ?></td>
                    <td><?= $article->dateCreation ?></td>
                    <td><a href="../showArticle.php?id=<?= $article->id ?>">Consulter</a></td>
                    <td><a href="./modifierArticle.php?id=<?= $article->id ?>">Modifier</a></td>
                    <td><a href="./supprimerArticle.php?id=<?= $article->id ?>">Supprimer</a></td>
                </tr><?php 
            }?>
        </table>
        <?php
        }
    ?>

<br><br>
    <h2>Liste des categories</h2>
    <br>
    <?php  
        $client = new SoapClient('http://localhost:8080/Manager?wsdl');
        $resultat = $client->__soapCall('listerCategorie', array());

        if (!isset($resultat->return))
        {
            echo "Oupss!! aucun article enregistré";
        }
        else
        {
    ?>
        <table class="table table-striped">
            <tr>
                <th>ID</th>
                <th>Libelle</th>
                <th colspan="3">Actions</th>
            </tr><?php
            $categories = is_array($resultat->return) ? $resultat->return : [$resultat->return];
            foreach ($categories as $categorie)
            {?>
                <tr>
                    <td><?= $categorie->id ?></td>
                    <td><?= $categorie->libelle ?></td>
                    <td><a href="./modifierCategorie.php?id=<?= $categorie->id ?>">Modifier</a></td>
                    <td><a href="./supprimerCategorie.php?id=<?= $categorie->id ?>">Supprimer</a></td>
                </tr><?php 
            }?>
        </table>
        <?php
        }
    ?>
</div>

<?php
include_once('./include/pied.php');
?>
