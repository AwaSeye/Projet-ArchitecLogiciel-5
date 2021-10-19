<?php
//Formulaire d'inscription
if (isset($_POST['formInscription']))
{
    $nom = htmlspecialchars($_POST['nom']);
    $prenom = htmlspecialchars($_POST['prenom']);
    $profil = htmlspecialchars($_POST['profil']);
    $login = htmlspecialchars($_POST['login']);
    $password = sha1($_POST['password']);
    $password2 = sha1($_POST['password2']);

    $parameters =
        [
            'nom' => $nom,
            'prenom' => $prenom,
            'profil' => $profil,
            'login' => $login,
            'password' => $password,
            'password2' => $password2
        ];
    $client = new SoapClient('http://localhost:8080/Manager?wsdl');

    if (!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['profil']) && !empty($_POST['login']) && !empty($_POST['password']) && !empty($_POST['password2']))
    {
        $pseudolength = strlen($pseudo);
        if ($pseudolength <= 255)
        { 
            if ($password == $password2)
            {
                $resultat = $client->__soapCall('ajouter', array($parameters));
                echo $resultat->return;

                header('Location: connexion.php');
            }
            else
            {
                $erreur = "Vos mots de passe ne correspondent pas !";
            }        
        }
        else
        {
            $erreur = "Votre Pseudo ne doit pas depasser 255 caracteres !";
        }
    }
    else
    {
        $erreur = "Tous les champs doivent etre remplis !!";
    }
}
?>
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
    <form action="" method="post"><br>
        <fieldset><br>
            <legend>Inscription</legend>
            <div class="form-group">
                <label for="nom">Nom:</label>
                <input type="texte" name="nom" class="form-control" id="nom" placeholder="Entrer nom" value="<?php if (isset($nom)) { echo $nom ; } ?>">
            </div>
            <div class="form-group">
                <label for="prenom">Prenom:</label>
                <input type="texte" name="prenom" class="form-control" id="prenom" placeholder="Entrer prenom" value="<?php if (isset($prenom)) { echo $prenom ; } ?>">
            </div>
            <div class="form-group">
                <label for="profil">Profil:</label>
                <select name="profil" class="form-control" id="profil" >
                    <option value="visiteur">Visiteur</option> 
                </select>   
            </div>
            <div class="form-group">
                <label for="login">Login:</label>
                <input type="texte" name="login" class="form-control" id="login" placeholder="Entrer login" value="<?php if (isset($login)) { echo $login ; } ?>">
            </div>
            <div class="form-group">
                <label for="password">Mot de passe:</label>
                <input type="password" name="password" class="form-control" id="password" placeholder="Entrer mot de passe">
            </div>
            <div class="form-group">
                <label for="password2">Confirmation mot de passe:</label>
                <input type="password" name="password2" class="form-control" id="password2" placeholder="Confirmer mot de passe">
            </div>
            
            <div align="center">
                 <input type="submit" name="formInscription" class="btn btn-primary" value="Je m'inscris">
            </div>
        </fieldset><br><br>
        <?php
        if (isset($erreur))
        {
            echo '<font color="red" class="alert alert-danger" role="alert">'.$erreur."</font>";
        }
        ?>
    </form><br>
    </div>
<
<div class="footer">
  <h6>Copyright @DGI 2021</h6>
</div>

</body>
</html>