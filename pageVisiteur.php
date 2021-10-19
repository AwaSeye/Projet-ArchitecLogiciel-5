<?php
if (isset($_GET['categorie']))
    {
        $idCategorie = (int) $_GET['categorie'];
        if($idCategorie > 0)
        {
          $client = new SoapClient('http://localhost:8080/Manager?wsdl');
          $resultat = $client->__soapCall('listArticlesByCategory', array());
          $articleCats = $resultat->return;
          //var_dump($articleCats);die();
          foreach ($articleCats as $articleCat)
          {?>
            <div class="articleCatPage">
              <h2><a class="link" href="showarticleCat.php?id= <?= $articleCat->id ?>" ><?= $articleCat->titre ?></a></h2>
              <p><?= substr($articleCat->contenu, 0, 300).'...' ?></p>
            </div>
          <?php  
          }
        }
        else
        {
            echo"ERREEUURRR";
        }
    }
?>
<!DOCTYPE html>
<html>
<head>
  <title>Journal-ESP</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="./fichierCSS.css">
</head>
<body>

<div class="header">
  <i><h1>BIENVENUE SUR VOTRE SITE D'ACTUALITES</h1></i>
</div>

<div class="entete">
    <nav class="navbar navbar-inverse">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand"> ACTUALITES POLYTECHNICIENNES </a>
        </div>
        <ul class="nav navbar-nav">
          <li class="active"><a href="pageVisiteur.php">Accueil</a></li>
            <?php
                $client = new SoapClient('http://localhost:8080/Manager?wsdl');

                $resultat1 = $client->__soapCall('listerCategorie', array());
                $categories =$resultat1->return;

                foreach ($categories as $categorie)
                {
            ?>
                    <li><a href="./pageVisiteur.php?categorie= <?= $categorie->id ?>" ><?= $categorie->libelle ?> </a></li>
            <?php
                }
            ?>
        </ul>
        <form class="navbar-form navbar-left" action="/action_page.php">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Search" name="search">
            <div class="input-group-btn">
              <button class="btn btn-default" type="submit">
                <i class="glyphicon glyphicon-search"></i>
              </button>
            </div>
          </div>
          <button>
            <a href="deconnexion.php">Se deconnecter</a>
          </button>
        </form>
      </div>
    </nav>
</div>

<div class="container">
  <div class="row">
    <div class="firstcolumn">
      <div class="card">
          <div>
          <?php  
            $client = new SoapClient('http://localhost:8080/Manager?wsdl');
            $resultat = $client->__soapCall('listerArticle', array());

            if (!isset($resultat->return))
            {
                echo "Oupss!! aucun article enregistré";
            }
            else
            {   
                $articles = is_array($resultat->return) ? $resultat->return : [$resultat->return];
                foreach ($articles as $article)
                {?>
                  <div class="articlePage">
                    <h2><a class="link" href="showArticle.php?id= <?= $article->id ?>" ><?= $article->titre ?></a></h2>
                    <p><?= substr($article->contenu, 0, 300).'...' ?></p>
                  </div>
                <?php  
                }
            }?>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="footer">
  <h6>Copyright @DGI 2021</h6>
</div>

</body>
</html>
