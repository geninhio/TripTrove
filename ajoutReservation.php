<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./CSS/styleReservation.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <main>
        <div class="conteneur">
            <h1>Formulaire de Réservation</h1>

            <form action="">
                <fieldset>
                    <legend>Informations personnelles</legend>
                    <div>
                        <label for="nom">Nom :</label>
                        <input type="text" id="nom" name="nom" required>
                    </div>

                    <div>
                        <label for="prenom">Prenom :</label>
                        <input type="text" id="prenom" name="prenom" required>
                    </div>

                    <div>
                        <label for="email">Adresse e-mail :</label>
                        <input type="email" id="email" name="email" required>
                    </div>
                </fieldset>

                <fieldset>
                    <legend>Précisions</legend>
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
                        <input type="checkbox" id="transport" name="options" value="transport" required>
                    </div>

                    <div>
                        <label for="repas">Repas inclus :</label>
                        <input type="checkbox" id="repas" name="options" value="repas" required>
                    </div>
                </fieldset>

                <fieldset>
                    <legend>Paiement</legend>
                    <div>
                        <label for="montant">Montant total :</label>
                        <input type="text" id="montant" name="montant" value="100 $CAD" readonly>
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
                            J'accepte les <a href="#">termes et conditions</a> et la politique de confidentialité.
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
</html>