<?php
    include_once __DIR__.'/html/elementHTML.include.php';
    require_once __DIR__."/Controller/SessionFinale.php";
    
    $session = new SessionFinale();
    session_start();
    $session->validerSession();

    $pseudo = $_SESSION['pseudo'];
    $courriel = ObtenirCourrielUserPourForm($pseudo);
    var_dump($courriel);
    $id = filter_input(INPUT_POST,"offre", FILTER_DEFAULT) + 1;

    $infos = ObtenirInfoPourFormulaire($id);
    $prix = $infos["prix"];
    $titre = $infos["titre"];
    $idSite = $infos["idSite"];
    $date = $infos["date"];

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./CSS/styleReservation.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <header>
        <div>
           
        </div>
    </header>

    <div class="navigationForm" >
        <a href="pageprotegee.php">Accueil</a>
        <div class="déroulantForm" >
            <span>Mes réservations&nbsp;</span>

            <div class="déroulantMenuForm">    
                <a href="">Historique de réservations</a>
            </div>
        </div>

        <div class="déroulantForm" >
            <span href="">Gérer mon compte</span>

            <div class="déroulantMenuForm">    
                <a href="">Déconnexion</a>
            </div>
        </div>
    </div>

    <main style="./CSS/styleReservation.css">
        <div class="conteneur">
            <h1>Formulaire de Réservation</h1>
            <?php
                echo '<form action="ajoutReservation.php?idSite='.$idSite.'&date='.$date.'" method="Post">';
            ?>
                <fieldset>
                    <legend>Informations personnelles</legend>
                    <div>
                        <label for="Pseudo">Pseudo :</label>
                        <?php
                            echo '<input type="text" id="pseudo" name="pseudo" value="'.$pseudo.'" required>'
                        ?>     
                    </div>

                    <div>
                        <label for="email">Adresse e-mail :</label>
                        <?php
                            echo'<input type="email" id="email" name= "email" value="'.$courriel.'" required>'
                        ?>
                    </div>
                </fieldset>

                <fieldset>
                    <legend>Précisions</legend>
                    <div>
                        <label for="site">Site :</label>
                        <?php
                            echo '<input type="text" id="site" name="site" value="'.$titre.'" readonly>'
                        ?>
                    </div>

                    <div>
                        <label for="heure">Heure de la visite :</label>
                        <input type="time" id="heure" name="heure" required>
                    </div>
                     
                    <div>
                        <label for="personnes">Nombre de personnes :</label>
                        <input type="number" id="personnes" name="personnes" min="1" required>
                    </div>
                </fieldset>

                <fieldset>
                    <legend>Options supplémentaires</legend>
                    <div>
                    <label for="transport">Transport :</label>
                        <input type="checkbox" id="transport" name="options" value="transport">
                    </div>

                    <div>
                        <label for="repas">Repas inclus :</label>
                        <input type="checkbox" id="repas" name="options" value="repas">
                    </div>
                </fieldset>

                <fieldset>
                    <legend>Paiement</legend>
                    <div>
                        <label for="montant">Montant total :</label>
                        <?php
                            echo '<input type="text" id="montant" name="montant" value="'.$prix.' $CAD" readonly>';
                        ?>
                    </div>

                    <div class="paiement">
                        <label for="paiement">Mode de paiement :</label>
                        <select id="paiement" name="paiement" required>
                            <option value="carte">Carte bancaire</option>
                            <option value="paypal">PayPal</option>
                        </select>
                    </div>
                    
                    <div>
                        <label for="carte">Numéro de carte :</label>
                        <input type="text" id="carte" name="carte" placeholder="Numéro de carte" required>
                    </div>
                </fieldset>
                
                <fieldset class="confirmation">
                    <legend>Confirmation et conditions</legend>
                    <div>
                        <label for="conditions">
                            <input type="checkbox" id="conditions" name="conditions" required>
                            J'accepte les <a href="#">termes et conditions</a> et <a href="#">la politique de confidentialité</a>.
                        </label>
                    </div>

                    <div>
                        <label for="newsletter">
                            <input type="checkbox" id="newsletter" name="newsletter">
                            Recevoir des offres spéciales par e-mail.
                        </label>
                    </div>
                </fieldset>

                <div class="conteneurBtn"><button type="submit">Valider la réservation</button></div>    
            </form>
        </div>
        
    </main>
</body>

<script>

</script>
</html>
