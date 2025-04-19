
const offresBackup = document.querySelectorAll(".offres");
const conteneur = document.querySelectorAll(".conteneurOffres");
let bannisTemporaire = [];
let indexBannis = [];

function Filtrer() {
    let parentFiltre = document.getElementById("recherche");
    let filtre = parentFiltre.value;
    const offres = document.querySelectorAll(".offres");
    console.log(filtre);

    if (filtre == null) {
        offres = offresBackup;
        while (conteneur[0].firstChild) {
            conteneur[0].removeChild(lastChild);
        }
        
        for (const offre of offres) {
            conteneur[0].appendChild(lastChild)
        }
    }

    for (const offre of offres) {
        let titre = offre.children[0].children[1].children[0].children[0].children[0].textContent;

        if (!(titre.toLocaleLowerCase().includes(filtre.toLocaleLowerCase()))) {
            bannisTemporaire.push(offre);
            indexBannis.push(Array.from(offres).indexOf(offre)); 
        }
        
    }
    console.log(bannisTemporaire);
    console.log(indexBannis);

    if (bannisTemporaire.length == offres.length) {
        
        alert("Nous n'avons pas d'offres pour cette recherche!!!");
        return;
    }

    for (const offre of bannisTemporaire) {
        conteneur[0].removeChild(offre);
    }
    bannisTemporaire = [];

}

function EnleverLesOptions(identifiant) {
    //let parent = document.getElementById(identifiant);
    let div = document.getElementById(identifiant + "enfant");

    document.removeChild(div);
}