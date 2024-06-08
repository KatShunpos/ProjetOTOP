<?php
session_start();
//securisation des acces a la page admin
if(!isset($_SESSION['KI3ydh638DH'])){
header("Location: ../login.php");
}
if(empty($_SESSION['KI3ydh638DH'])){
    header("Location:../login.php");
}


require("../config/commandes.php");
$Produits = afficher();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/259f41835c.js" crossorigin="anonymous"></script> 
    <title>Document</title>
</head>

<body id="body" style="background-color: #FFF5F7;">
    <section class="py-5 text-center container">
        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                <!-- ajout de la method post au formulaire -->
                <form method="post">
                    <div class="mb-3">

                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">id produit</label>
                            <input type="number" class="form-control" name="idproduit" required>
                        </div>


                        <button type="submit" name="valider" class="btn btn-primary">supprimer un produit</button>
                </form>
                <?php foreach ($Produits as $produit) : ?>
                    
                        <div class="container">
                            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                                <div class="col">
                                    <div class="card shadow-sm">
                                        <title><?= $produit->idproduit ?></title>
                                        <rect width="200px" height="200px" fill="#55595c" /><img src=<?= $produit->image ?> <div class="card-body">
                                        <small class="text-muted"><?= $produit->id?></small>
                                    </div>                              
                                </div>
                            </div>
                         </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
                                            ///////////////////CODE WILLIAM////////////////
    <section>
    <article id="champinscription">
    <div class="container" >
        <div class="row">
            <div class="col d-flex justify-content-center">
                <img  id="logo" style="width: 40%; margin-bottom: 5%; margin-top: 2%;" src="/HTML/OTOP-noir.png"><br>
            </div>
            <div>
                <h1 style="margin-bottom: 5%; margin-left: 27%; color: grey;" id="titre">Voulez vous supprimer un produit?</h1>
            </div>
        </div>
        <div style="width: 60%; margin-bottom: 3%; margin-left: 20%;" id="champinscription" class="d-flex justify-content-center">
                <label class="visually-hidden" for="autoSizingInputGroup">Id Produit</label><br>
                <div class="input-group">
                    <div class="input-group-text" style="background-color: rosybrown;" id="fondicone"><i style="color: #FFF5F7;" class="fa-solid fa-key"></i></div>
                    <input type="number" class="form-control" id="autoSizingInputGroup" name="idproduit"placeholder="Id Produit" required>
                </div>
        </div>
        <div style="width: 60%; margin-bottom: 3%; margin-left: 20%;" id="champinscription" id="bouton" class=""> 
            <div class="d-flex justify-content-center">
                <br><a href=""><button type="button" id="boutonformulaire" name="valider" class="btn btn btn-secondary btn-lg"><h4 style="color: rosybrown;">Supprimer</h4></button></a>
            </div><br>
            <div id="boutonsupp">
                <div class="d-flex justify-content-center">
                    <a href="#"><button type="button" id="boutonformulaire" class="btn btn btn-secondary btn-lg"><h4 style="color: rosybrown;">Retour</h4></button></a>
                </div>
            </div>
        </div>
    </div>

    </div>
    </article>
</section>
                                             ///////////////////CODE WILLIAM////////////////
</body>

</html>
<?php
// verification du remplisage du formulaire et mise en base de donne avec la method post
if (isset($_POST['valider'])) {
    //verification du remplisage
    if (isset($_POST['idproduit'])) {
        //recuperation des donné du formulaire
        if (!empty($_POST['idproduit'])) {
            $idproduit = htmlspecialchars(strip_tags($_POST['idproduit']));
            //apelle de la fonction supprimer
            supprimer($idproduit);
        }
    }
}
?>
