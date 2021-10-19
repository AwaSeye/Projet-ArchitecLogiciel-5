<?php
include('./include/enteteEditeur.php');
?>

<div class="container">
    <?php
    if (!isset($_POST['nom'], $_POST['prenom'], $_POST['profil'], $_POST['login'], $_POST['password'], $_POST['password2']))
    {?>
        <br><br><br><br>
        <form action="" method="post"><br>
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
                    <option value="admin">Administrateur</option>
                    <option value="editeur">Editeur</option>
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
                 <input type="submit" name="formAjouter" class="btn btn-primary" value="Ajouter">
            </div>
        </form><br><?php
    }
    else
    {
        $nom = htmlentities($_POST['nom']);
        $prenom = htmlentities($_POST['prenom']);
        $profil = htmlentities($_POST['profil']);
        $login = htmlentities($_POST['login']);
        $password = htmlentities($_POST['password']);
        $password2 = htmlentities($_POST['password2']);

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
        if (!empty($nom) && !empty($prenom) && !empty($profil) && !empty($login) && !empty($password) && !empty($password2))
        {
            $loginlength = strlen($login);
            if ($loginlength <= 255)
            {
                if ($password == $password2)
                {
                    $resultat = $client->__soapCall('ajouter', array($parameters));
                    echo $resultat->return;
    
                    header('Location: accueilEditeur.php');
                }
                else
                {
                    $erreur = "Vos mots de passe ne correspondent pas !!!";
                }
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



