(function(){
    function buildQuiz(){
      // variable pour stocker la sortie HTML
      const output = [];
  
      // pour chaque question
      myQuestions.forEach(
        (currentQuestion, questionNumber) => {
  
          // variable pour stocker la liste des réponses possible
          const answers = [];
  
          // et pour chaque réponse disponible
          for(letter in currentQuestion.answers){
  
            // ajoute un bouton radio html
            answers.push(

              `<p><label>
                <input type="radio" name="question${questionNumber}" value="${letter}">
                ${letter} :
                ${currentQuestion.answers[letter]}
              </label></p>`
            );
          }
  
          // ajoute une question et ses réponses
          output.push(
            `<div class="question"> ${currentQuestion.question} </div><br>
            <div class="answers ml-3"> ${answers.join('')} </div><br>`
          );
        }
      );
  
      // finally combine our output list into one string of HTML and put it on the page
      quizContainer.innerHTML = output.join('');
    }
  
    function showResults(){
  
      // rassemble des conteneur de réponses à partir de notre quiz
      const answerContainers = quizContainer.querySelectorAll('.answers');
  
      // pour garder une trace des réponses des utilisateurs
      let numCorrect = 0;
  
      // pour chaque question..
      myQuestions.forEach( (currentQuestion, questionNumber) => {
  
        // trouve la réponse sélectionnée
        const answerContainer = answerContainers[questionNumber];
        const selector = `input[name=question${questionNumber}]:checked`;
        const userAnswer = (answerContainer.querySelector(selector) || {}).value;
  
        // si la réponse est correct
        if(userAnswer === currentQuestion.correctAnswer){
          // ajoute-la au nombre de réponses correctes
          numCorrect++;
  
          // colore la en vert
          answerContainers[questionNumber].style.color = 'lightgreen';
        }
        // si la réponse est fausse ou non renseignée
        else{
          // colore la en rouge
          answerContainers[questionNumber].style.color = 'red';
        }
      });
  
      // montre le nombre de bonnes réponses final
      resultsContainer.innerHTML = `${numCorrect} bonnes réponses sur ${myQuestions.length}`;
    }
  
    const quizContainer = document.getElementById('quiz');
    const resultsContainer = document.getElementById('results');
    const submitButton = document.getElementById('submit');
    const myQuestions = [
      {
        question: "1- Que peut-on fabriquer à partir de bouteilles en plastique recyclées ?",

        
        answers: {
          A: "Des armoires",
          B: "Des instruments de musique",
          C: "D'autres bouteilles"
        },
        correctAnswer: "C"
      },
      {
        question: "2- Où finissent la plupart de nos déchets ?",

        
        answers: {
          A: "Dans l'océan",
          B: "Dans l'espace",
          C: "Dans les caniveaux"
        },
        correctAnswer: "A"
      },
      {
        question: "3- Pour réduire les déchets, il vaut mieux:",
        answers: {
          A: "Des produits sans emballage",
          B: "Des lingettes",
          C: "Des verres en plastique"
        },
        correctAnswer: "A"
      },
      {
        question: "4- Parmi ces déchets, lequel est biodégradable?",
        answers: {
          A: "Le reste de purée",
          B: "Un chewin-gum",
          C: "Un stylo-bille"
        },
        correctAnswer: "A"
      },
      {
        question: "5- Au lieu de jeter les jouets dont tu ne te sers plus, tu peux: ",
        answers: {
          A: "Les donner",
          B: "Les brûler",
          C: "Les mettre au grenier"
        },
        correctAnswer: "A"
      },
      {
        question: "6- Parmi ces déchets, lequel n'est pas recyclable?",
        answers: {
          A: "Un sac plastique",
          B: "Une bouteille de shampoing",
          C: "Un emballage en carton de céréales"
        },
        correctAnswer: "A"
      },
      {
        question: "7- Qu'est-ce que le compostage?",
        answers: {
          A: "Un service de la poste pour transporter le courrier rapidement",
          B: "L'utilisation de déchets pour enrichir les terres",
          C: "Le fait de poinçonner son ticket de métro ou de bus"
        },
        correctAnswer: "B"
      },
      {
        question: "8- Comment appelle-t-on les gros déchets comme les télés, les frigos, les ordinateurs?",
        answers: {
          A: "Les gênants",
          B: "Les encombrants",
          C: "Les embêtants"
        },
        correctAnswer: "B"
      },
      {
        question: "9- Parmi ces pays, lequel produit le plus de déchets?",
        answers: {
          A: "La France",
          B: "La Roumanie",
          C: "Le Danemark"
        },
        correctAnswer: "C"
      },
      {
        question: "10- Il existe dans l'océan Pacifique une immense nappe de déchets, elle fait la taille: ",
        answers: {
          A: "D'un stade de foot",
          B: "De la France",
          C: "De l'Europe"
        },
        correctAnswer: "B"
      }
    ];
  
    // appel de la fonction
    buildQuiz();
  
    // Event listeners
    submitButton.addEventListener('click', showResults);
  })();