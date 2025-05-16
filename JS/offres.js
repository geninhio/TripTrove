

const offresBackup = document.getElementsByClassName("offres");
console.log(offresBackup);
const conteneur = document.getElementsByClassName("conteneurOffres");
let indexBannis = [];

function Filtrer() {

    let permisTemporaire = [];
    let parentFiltre = document.getElementById("recherche");
    let filtre = parentFiltre.value;
    const offres = offresBackup;
    let grandConteneur = conteneur;
    console.log(filtre);
    console.log(grandConteneur[0]);
    console.log(offres);

    // if (filtre == null) {
    //     offres = offresBackup;
    //     while (conteneur[0].firstChild) {
    //         conteneur[0].removeChild(lastChild);
    //     }
        
    //     for (const offre of offres) {
    //         conteneur[0].appendChild(lastChild)
    //     }
    // }

    let div = document.createElement("div");
    div.setAttribute("class", "conteneurOffres");

    if (!(filtre == null)) {
        
        for (const offre of offres) {
            let titre = offre.children[0].children[1].children[0].children[0].children[0].textContent;
    
            if ((titre.toLocaleLowerCase().includes(filtre.toLocaleLowerCase()))) {

                permisTemporaire.push(offre);
                // indexBannis.push(Array.from(offres).indexOf(offre)); 
            }
            
        }

        if (permisTemporaire.length != 0) {
            
            for (const offre of permisTemporaire) {
                
                div.appendChild(offre);
            }
            
        }
        else{
            for (const offre of offres) {

                div.appendChild(offre);
            }
            alert("Nous n'avons pas d'offres pour cette recherche!!!");
        }

        grandConteneur[0].parentNode.replaceChild(div, grandConteneur[0]);
    
        // for (const offre of bannisTemporaire) {
        //     conteneur[0].removeChild(offre);
        // } 
    }
 
}


function EnleverLesOptions(identifiant) {
    //let parent = document.getElementById(identifiant);
    let div = document.getElementById(identifiant + "enfant");

    document.removeChild(div);
}