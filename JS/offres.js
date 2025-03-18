
function Filtrer() {
    let bannisTemporaire = [];
    let indexBannis = [];
    let parent = document.getElementById("recherche");
    let filtre = parent.value;
    const offres = document.querySelectorAll(".offres");
    const conteneur = document.querySelectorAll(".conteneurOffres");
    console.log(filtre);

    for (const offre of offres) {
        let titre = offre.children[0].children[1].children[0].children[0].children[0].textContent;

        if (!(titre.toLocaleLowerCase().includes(filtre.toLocaleLowerCase()))) {
            bannisTemporaire.push(offre);
            indexBannis.push(Array.from(offres).indexOf(offre)); 
        }
        else {
            console.log("N'est pas bannie!");
        }
        
    }
    console.log(bannisTemporaire);
    console.log(indexBannis);

    if (bannisTemporaire.length == 0) {
        
        return;
    }

    for (const offre of bannisTemporaire) {
        conteneur[0].removeChild(offre);
    }
   

}

function RecupererLesTitres() {


}

function EnleverLesOptions(identifiant) {
    //let parent = document.getElementById(identifiant);
    let div = document.getElementById(identifiant + "enfant");

    document.removeChild(div);
}