<!DOCTYPE html>
<html>
<head>
  <title>SITE_ACTUALITE</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="fichierCSS.css">
  <style type="text/css">
      form
      {
        max-width: 800px;
        margin: auto;
        margin-bottom: 290px;
      }
	  </style>
</head>
<body>

<div class="entete">
    <nav class="navbar navbar-inverse">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand"> SITE D'ACTUALITE </a>
        </div>
        <ul class="nav navbar-nav">
          <li class="active"><a href="connexion.php">Accueil</a></li>
        </ul>
      </div>
    </nav>
</div>

<div class="container">
    <?php
    if (isset($_POST['formConnexion']))
    {
        $loginConnect = htmlspecialchars($_POST['loginConnect']);
        $passwordConnect = $_POST['passwordConnect'];
        
        if (!empty($loginConnect) && !empty($passwordConnect))
        {
            $client = new SoapClient('http://localhost:8080/Manager?wsdl');
            $resultat = $client->__soapCall('lister', array());
            $utilisateurs = $resultat->return;
            foreach ($utilisateurs as $utilisateur)
            {
                $loginExistant = $utilisateur->login;
                $passwordExistant = $utilisateur->password;
                $admin = "admin";
                $editeur = "editeur";
                $visiteur = "visiteur";   
                if ($loginExistant == $loginConnect && $passwordExistant == $passwordConnect)
                {
                    if($utilisateur->profil == $admin)
                    {
                        header("Location: Admin/accueilAdmin.php?".$utilisateur->profil);
                    }
                    else if($utilisateur->profil == $editeur)
                    {
                        header("Location: Editeur/accueilEditeur.php?".$utilisateur->profil);
                    }
                    else
                    {
                        echo"Page erreurr";
                    }
                }
                else if ($loginExistant == $loginConnect && $passwordExistant == sha1($passwordConnect))
                {
                    if($utilisateur->profil == $visiteur)
                    {
                        header("Location: pageVisiteur.php?".$utilisateur->profil);
                    }
                    else
                    {
                        echo"Page erreurr";
                    }
                }
                else
                {
                   $erreur = "Mauvais mail ou mot de passe !";
                }
            }
        }
        else
        {
            $erreur = "Tous les champs doivent etre remplis !!";
        }
    }
    ?>

    <form action="" method="post"><br>
        <fieldset><br>
            <legend><center>Connexion</center></legend>
            <div class="form-group">
                <input type="text" name="loginConnect" class="form-control" id="loginConnect" placeholder="Entrer Login" value="<?php if (isset($loginConnect)) { echo $loginConnect ; } ?>">
            </div>
            <div class="form-group">
                <input type="password" name="passwordConnect" class="form-control" id="password" placeholder="Entrer mot de passe">
            </div>
            <div align="center">
                 <input type="submit" name="formConnexion" class="btn btn-primary" value="Se connecter">
            </div>
        </fieldset>
        <a href="inscription.php">Incrivez-vous! Si vous n'avez pas de compte</a><br><br>
        <?php 
        if (isset($erreur))
        {
            echo '<font color="red" class="alert alert-danger" role="alert">'.$erreur."</font>";
        }?>
    </form><br>
</div>

<div class="footer">
  <h6>Copyright @DGI 2021</h6>
</div>

</body>
</html>