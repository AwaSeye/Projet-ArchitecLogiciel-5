<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="./fichierCSS.css">
    <title>SEN NEWS</title>
</head>
<body>

<div class="entete">
    <nav class="navbar navbar-inverse">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand"> SITE D'ACTUALITE </a>
        </div>
        <ul class="nav navbar-nav">
          <li class="active"><a href="#">Accueil</a></li>
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

<div class="container">
    <center><i><h2>LES INFORMATIONS A TEMPS REEL</h2></i></center>
    <?php
    // $client = new SoapClient('http://localhost:8080/Manager?wsdl');
    // $resultat = $client->__soapCall('listerCategorie', array());
    if ($_GET['id'] == '3')
    {?>
        <div class="row">
            <div class="firstcolumn">
                <div class="card">
                    <p>
                        La COVID-19 affecte les individus de différentes manières. La plupart des personnes infectées développent une forme légère à modérée de la maladie et guérissent sans hospitalisation.
                        Le 11 février, l'OMS a donné un nom à la maladie caussée par ce nouveau coronavirus : Covid-19. Le 11 mars, l'OMS a requalifié l'épidémie en pandémie.</br></br>
                        La COVID-19 affecte les individus de différentes manières. La plupart des personnes infectées développent une forme légère à modérée de la maladie et guérissent sans hospitalisation.
                        Le 11 février, l'OMS a donné un nom à la maladie caussée par ce nouveau coronavirus : Covid-19. Le 11 mars, l'OMS a requalifié l'épidémie en pandémie.</br></br>

                        <a href="https://www.sante.gouv.sn/">Cliquez pour plus de details----></a>
                    </p>
                </div>
            </div>
            <div class="secondcolumn">
                <div class="card">
                    <img src="./image/image.png" width= "25%" >
                </div>
            </div>
        </div>
    <?php
    }
    else if ($_GET['id'] == '1')
    {?>
        <div class="row">
            <div class="secondcolumn">
                <div class="card">
                    <h5>Le Sénégal et l'Afrique du Sud se sont affrontés à 9 reprises, le bilan étant en faveur des sénégalais (4 victoires, 4 nuls, 1 défaite. Une dixième rencontre)</h5>
                    <center><img src="./image/image2.png" width= "50%" ></center>
                </div>
            </div>
            <div class="firstcolumn">
                <div class="card">
                    <p>
                        Le Sénégal et l'Afrique du Sud se sont affrontés à 9 reprises, le bilan étant en faveur des sénégalais (4 victoires, 4 nuls, 1 défaite. Une dixième rencontre, initialement remportée par les sud-africains a eu lieu en 2016 dans le cadre des éliminatoires de la coupe du monde 2018. <br>Après avoir découvert que le match avait été truqué par l'arbitre Joseph Lamptey, la FIFA l'a suspendu à vie et a fait rejouer le match

                        <a href="https://www.onzemondial.com/">Vectoire contre la cote d'ivoire</a>
                    </p>
                </div>
            </div>
        </div>
    <?php
    }  
    else if ($_GET['id'] == '2')
    {?>
        <div class="row">
            <div class="secondcolumn">
                <div class="card">
                    <p>
                        <a>L'élection présidentielle mauritanienne de 2019 a lieu le 22 juin 2019 afin d'élire le président de la République pour un mandat de cinq ans.</a><br><br> La constitution mauritanienne limitant à deux le nombre de mandats présidentiels, <br>le président sortant Mohamed Ould Abdel Aziz n'est pas candidat à sa réélection1,2.

                        Si les opposants prêtent à ce dernier l'ambition d'un scénario à la russe destiné à lui permettre de revenir au pouvoir après un mandat de son dauphin Mohamed Ould Ghazouani, le scrutin présidentiel est néanmoins jugé historique3,4. <br><br>Pour la première fois depuis l'indépendance du pays en 1960, une passation de pouvoir a lieu de manière pacifique sans coup d’État, bien qu'entre deux ex-militaires5,6,7.

                        Mohamed Ould Ghazouani est élu dès le premier tour. L'ex-général et ministre de la Défense recueille ainsi 52,00 % des suffrages, <br>devant le militant anti-esclavagiste Biram Dah Abeid, qui en recueille 18,59 %.
                    </p>
                    <center><img src="./image/image3.png" width= "35%" ></center>
                </div>
            </div>
        </div>
    <?php
    }        
    ?>
</div>
</body>
</html>
