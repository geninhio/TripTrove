function Filtrer() {
    let parent = document.getElementById("recherche");
    let filtre = parent.value;
    console.log(filtre);

}

function AjouterLesOptions(identifiant) {
    let parent = document.getElementById(identifiant + "enfant");

    if (identifiant == "Réservation") {
        let optionA = document.createElement('a');
        let optionB = document.createElement('a');

        optionA.setAttribute('href', 'index.php');
        optionB.setAttribute('href', 'base.php');
        //optionA.setAttribute('class', 'options');
        //optionB.setAttribute('class', 'options');

        let textA = document.createTextNode("Nouvelle Réservation");
        let textB = document.createTextNode("Historique de Réservations");

        optionA.appendChild(textA);
        optionB.appendChild(textB);

        parent.appendChild(optionA);
        parent.appendChild(optionB);
    }
}

function EnleverLesOptions(identifiant) {
    //let parent = document.getElementById(identifiant);
    let div = document.getElementById(identifiant + "enfant");

    document.removeChild(div);
}