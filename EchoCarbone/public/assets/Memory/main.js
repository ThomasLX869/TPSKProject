const divResultat = document.querySelector("#resultat");

//création du tableau composé de 8 paires et initialisé à zéro
//les chiffres correspondront aux index des images
let tabJeu = [
[0,0,0,0],
[0,0,0,0],
[0,0,0,0],
[0,0,0,0]
];

//va générer un tableau aléatoire pour que les image ne soient pas toujours placées au même 
//index à chaque partie

let tabResultat = genereTableauAleatoire();

let oldSelection = [];
let nbAffiche= 0;
let ready = true;

afficherTableau();

function afficherTableau(){

  let txt ="";

  for(let i=0; i < tabJeu.length ; i++){
    txt += "<div>";
    for(let j=0; j < tabJeu[i].length ; j++){
      if(tabJeu[i][j] === 0){
        txt +="<button class='col-2 btn btn-vert mx-3 my-3' style='width:100px;height:100px' onClick = 'verif (\""+i+"-"+j+"\")'><span>?</span></button>";
      }
      else {
        txt += "<img src='"+getImage(tabJeu[i][j])+"' style='width:100px;height:100px' class='m-2'>";
      }
    }
  }

  divResultat.innerHTML = txt;
}
{/* <i class="fas fa-recycle"></i> */} 

//on attribue un index entre 1 et 8 pour chaque image
function getImage(valeur){
  let imgTxt = "image/";
  switch(valeur){
    case 1 : imgTxt += "arbre.png";
    break;
    case 2 : imgTxt += "eau.png";
    break;
    case 3 : imgTxt += "robinet.png";
    break;
    case 4 : imgTxt += "fleur.png";
    break;
    case 5 : imgTxt += "ampoule.png";
    break;
    case 6 : imgTxt += "planete.png";
    break;
    case 7 : imgTxt += "poubelle.png";
    break;
    case 8 : imgTxt += "renouvelable.png";
    break;
    default : console.log("cas non pris en compte")

  }

//correspond au chemin de l'image récupérée selon le cas
  return imgTxt;
}

function verif(bouton){
  if(ready){
    nbAffiche++;

    let ligne = bouton.substr(0,1);
    let colonne = bouton.substr(2,1);

    tabJeu[ligne][colonne] = tabResultat[ligne][colonne];
    afficherTableau();

    if (nbAffiche > 1){
      ready = false;
      setTimeout(() => {

        if (tabJeu[ligne][colonne] !== tabResultat[oldSelection[0]][oldSelection[1]]){
          tabJeu[ligne][colonne] = 0;
          tabJeu[oldSelection[0]][oldSelection[1]]  = 0;

       }
       afficherTableau();
       ready = true;
       nbAffiche = 0;
       oldSelection = [ligne,colonne];

     },500)

    } else {

      oldSelection = [ligne,colonne];
    }


  }
}

function genereTableauAleatoire(){

  let tab = [];
  let nbImagePosition = [0,0,0,0,0,0,0,0];


  for (let i = 0; i < 4; i++){
    let ligne = [];

    for (let j = 0; j < 4; j++){
      let fin = false;

      while(!fin){

        let randomImage = Math.floor(Math.random() * 8);
        if (nbImagePosition[randomImage] < 2) {
          ligne.push(randomImage+1);
          nbImagePosition[randomImage]++;

          fin = true;
        } 
      }
    }
    tab.push(ligne);
  }
  return tab;
}










