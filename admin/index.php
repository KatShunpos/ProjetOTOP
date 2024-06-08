<?php 
session_start();
    //securisation des acces a la page admin
    if(!isset($_SESSION['KI3ydh638DH'])){
    header("Location: ../login.php");
    }
    if(empty($_SESSION['KI3ydh638DH'])){
        header("Location:../login.php");
    }

    require("../config/commandes.php")
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

<body>
    <section class="py-5 text-center container">
        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                <!-- ajout de la method post au formulaire -->
                <form method="post">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">titre de l'image</label>
                        <input type="name" class="form-control" name="image" required>

                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Nom du produit</label>
                            <input type="text" class="form-control" name="nom" required>
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Prix</label>
                            <input type="number" class="form-control" name="prix" required>
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">description</label>
                            <textarea class="form-control" name="desc" required></textarea>
                        </div>


                        <button type="submit" name="valider" class="btn btn-primary">ajouter un nouveau produit</button>
                </form>
            </div>
        </div>
    </section>
/////////////////////////////////////CODE WILLIAM///////////////////////////////////
    <section>
    <article id="champinscription">
    <div class="container" >
        <div class="row">
            <div class="col d-flex justify-content-center">
                <img  id="logo" style="width: 40%; margin-bottom: 2%; margin-top: 2%;" src="/HTML/OTOP-noir.png"><br>
            </div>
            <div>
                <h1 style="margin-bottom: 2%; margin-left: 45%; color: grey;" id="titre">ADMIN</h1>
            </div>
        </div>
        <div style="width: 60%; margin-bottom: 3%; margin-left: 20%;" id="champinscription" class="d-flex justify-content-center">
                <label class="visually-hidden" for="autoSizingInputGroup">Titre De L'Image</label><br>
                <div class="input-group">
                    <div class="input-group-text" style="background-color: rosybrown;" id="fondicone"><i style="color: #FFF5F7;" class="fa-solid fa-image"></i></div>
                    <input type="name" class="form-control" id="autoSizingInputGroup" name="image" placeholder="Titre De L'Image" required>
                </div>
        </div>
        <div style="width: 60%; margin-bottom: 3%; margin-left: 20%;" id="champinscription" class="d-flex justify-content-center">
                <label class="visually-hidden" for="autoSizingInputGroup">Nom du produit</label><br>
                <div class="input-group">
                    <div class="input-group-text" style="background-color: rosybrown;" id="fondicone"><i style="color: #FFF5F7;" class="fa-solid fa-pen"></i></div>
                    <input type="text" class="form-control" id="autoSizingInputGroup" name="nom" placeholder="Nom du produit" required>
                </div>
        </div>
        <div style="width: 60%; margin-bottom: 3%; margin-left: 20%;" id="champinscription" class="d-flex justify-content-center">
                <label class="visually-hidden" for="autoSizingInputGroup">Prix</label><br>
                <div class="input-group">
                    <div class="input-group-text" style="background-color: rosybrown;" id="fondicone"><i style="color: #FFF5F7;" class="fa-solid fa-money-check-dollar"></i></i></div>   
                    <input type="number" class="form-control" id="autoSizingInputGroup" name="prix" placeholder="Prix" required>
                </div>
        </div>
        <div style="width: 60%; margin-bottom: 3%; margin-left: 20%;" id="champinscription" class="d-flex justify-content-center">
                <label class="visually-hidden" for="autoSizingInputGroup">Description Du >Produit</label><br>
                <div class="input-group">
                    <div class="input-group-text" style="background-color: rosybrown;" id="fondicone"><i style="color: #FFF5F7;" class="fa-solid fa-pen"></i></div>
                    <textarea class="form-control" name="desc" id="autoSizingInputGroup" placeholder="Description Du produit" required></textarea>
                </div>
        </div>
        <div style="width: 60%; margin-bottom: 3%; margin-left: 20%;" id="champinscription" id="bouton" class="">
            <div class="d-flex justify-content-center">
                <br><a href=""><button type="button" id="boutonformulaire" class="btn btn btn-secondary btn-lg"><h4 style="color: rosybrown;">Retour</h4></button></a>
                <a href=""><button type="button" id="boutonformulaire"  class="btn btn btn-secondary btn-lg"><h4 style="color: rosybrown;">Valider</h4></button></a>
            </div><br>
            <div id="boutonsupp">
                <div class="d-flex justify-content-center">
                    <a href="#"><button type="button" id="boutonformulaire" class="btn btn btn-secondary btn-lg"><h4 style="color: rosybrown;">Supprimer</h4></button></a>
                </div>
            </div>
        </div>
    </div>

    </div>
    </article>
</section>
///////////////////////////CODE WILLIAM//////////////////////////////

                    
</body>

</html>
<?php 
// verification du remplisage du formulaire et mise en base de donne avec la method post
 if(isset($_POST['valider']))
 {
    //verification du remplisage
    if(isset($_POST['image']) AND isset($_POST['nom']) AND isset($_POST['prix']) AND isset($_POST['desc']))
    {
        //recuperation des donné du formulaire
        if(!empty($_POST['image']) AND !empty($_POST['nom']) AND !empty($_POST['prix']) AND !empty($_POST['desc']))
        {
            $image= htmlspecialchars(strip_tags($_POST['image']));
            $nom= htmlspecialchars(strip_tags($_POST['nom']));
            $prix= htmlspecialchars(strip_tags($_POST['prix']));
            $desc= htmlspecialchars(strip_tags($_POST['desc']));

            //ajout des donné dans la base de donner et sur le site
            ajouter($image, $nom, $prix, $desc);
            }
        }
    }
?>
