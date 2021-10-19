<?php
require_once('./connexionBD.php');
require_once('./Model/gestionUser.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Page d'accueil</title>   
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="./View/fichierCSS.css">
</head>
<body>

<div class="entete">
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand"> ACTUALITES POLYTECHNICIENNES </a>
            </div>
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">Accueil</a></li>
            </ul>    
        </div>
    </nav>
</div>

<div class="container">
    <form action="" method="post"><br>
        <fieldset><br>
            <legend>Inscription</legend>
            <div class="form-group">
                <label for="pseudo">Pseudo:</label>
                <input type="texte" name="pseudo" class="form-control" id="pseudo" placeholder="Entrer pseudo" value="<?php if (isset($pseudo)) { echo $pseudo ; } ?>">
            </div>
            <div class="form-group">
                <label for="mail">Mail:</label>
                <input type="email" name="mail" class="form-control" id="mail" placeholder="Entrer mail" value="<?php if (isset($mail)) { echo $mail ; } ?>">
            </div>
            <div class="form-group">
                <label for="profil">Profil:</label>
                <select name="profil" class="form-control" id="profil" >
                    <option value="visiteur">Visiteur</option> 
                </select>   
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
        </fieldset>
    </form><br>
</div>
<?php
if (isset($erreur))
{
    echo '<font color="red" class="alert alert-danger" role="alert">'.$erreur.'</font>';
}
?>
</body>
</html>