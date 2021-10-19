<!DOCTYPE html>
<html>
<head>
  <title>SITE_ACTUALITE</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="./fichierCSS.css">
</head>
<body>

<div class="entete">
    <nav class="navbar navbar-inverse">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand"> SITE D'ACTUALITE </a>
        </div>
        <ul class="nav navbar-nav">
          <li class="active"><a href="accueilAdmin.php">Accueil</a></li>
          <li><a href="./ajouterArticle.php">Ajouter Article</a></li>
          <li><a href="./ajouterCategorie.php">Ajouter Catégorie</a></li>
          <li><a href="./ajouterUtilisateur.php">Ajouter Utilisateur</a></li>
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
            <a href="../deconnexion.php">Se deconnecter</a>
          </button>
        </form>
      </div>
    </nav>
</div>