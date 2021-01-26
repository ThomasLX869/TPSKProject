const divResultat = document.querySelector("#resultat");


let tabJeu = [
[0,0,0,0],
[0,0,0,0],
[0,0,0,0],
[0,0,0,0]
];


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
        txt +="<button class='img-fluid col-2 btn btn-vert mx-2 my-3 h-100 px-3' onClick = 'verif (\""+i+"-"+j+"\")'><span>?</span></button>";
      }
      else {
        txt += "<img src='"+getImage(tabJeu[i][j])+"' style='width:6.23vh;height:6.23vh' class='m-3'>";
      }
    }
  }

  divResultat.innerHTML = txt;
}
{/* <i class="fas fa-recycle"></i> */} 
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









