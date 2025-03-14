function AfficherLesOptions(identifiant) {
    let parent = document.getElementById(identifiant);

    if (document.getElementById(identifiant + "enfant") != null) {
        return;
    }

    let div = document.createElement('div');
    div.setAttribute('id', identifiant + "enfant");
    //div.setAttribute('style', './CSS/styleOptions.css');
    //div.setAttribute('class', 'options');
    let positionX = parent.offsetLeft;
    let positionY = parent.offsetTop;


    div.offsetLeft = positionX;
    div.offsetTop = positionY + document.getElementsByTagName('nav').offetHeight
    AjouterLesOptions(identifiant);

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