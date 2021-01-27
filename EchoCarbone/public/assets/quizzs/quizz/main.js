(function(){
    function buildQuiz(){
      // variable to store the HTML output
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
              `<label>
                <input type="radio" name="question${questionNumber}" value="${letter}">
                ${letter} :
                ${currentQuestion.answers[letter]}
              </label>`
            );
          }
  
          // ajoute une question et ses reponses
          output.push(
            `<div class="question"> ${currentQuestion.question} </div>
            <div class="answers"> ${answers.join('')} </div><br><br>`
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
          a: "Des armoires",
          b: "Des instruments de musique",
          c: "D'autres bouteilles"
        },
        correctAnswer: "c"
      },
      {
        question: "2- Où finissent la plupart de nos déchets ?",

        
        answers: {
          a: "Dans l'océan",
          b: "Dans l'espace",
          c: "Dans les caniveaux"
        },
        correctAnswer: "a"
      },
      {
        question: "3- Pour réduire les déchets, il vaut mieux:",
        answers: {
          a: "Des produits sans emballage",
          b: "Des lingettes",
          c: "Des verres en plastique"
        },
        correctAnswer: "a"
      },
      {
        question: "4- Parmi ces déchets, lequel est biodégradable?",
        answers: {
          a: "Le reste de purée",
          b: "Un chewin-gum",
          c: "Un stylo-bille"
        },
        correctAnswer: "a"
      },
      {
        question: "5- Au lieu de jeter les jouets dont tu ne te sers plus, tu peux: ",
        answers: {
          a: "Les donner",
          b: "Les brûler",
          c: "Les mettre au grenier"
        },
        correctAnswer: "a"
      },
      {
        question: "6- Parmi ces déchets, lequel n'est pas recyclable?",
        answers: {
          a: "Un sac plastique",
          b: "Une bouteille de shampoing",
          c: "Un emballage en carton de céréales"
        },
        correctAnswer: "a"
      },
      {
        question: "7- Qu'est-ce que le compostage?",
        answers: {
          a: "Un service de la poste pour transporter le courrier rapidement",
          b: "L'utilisation de déchets pour enrichir les terres",
          c: "Le fait de poinçonner son ticket de métro ou de bus"
        },
        correctAnswer: "b"
      },
      {
        question: "8- Comment appelle-t-on les gros déchets comme les télés, les frigos, les ordinateurs?",
        answers: {
          a: "Les gênants",
          b: "Les encombrants",
          c: "Les embêtants"
        },
        correctAnswer: "b"
      },
      {
        question: "9- Parmi ces pays, lequel produit le plus de déchets?",
        answers: {
          a: "La France",
          b: "La Roumanie",
          c: "Le Danemark"
        },
        correctAnswer: "c"
      },
      {
        question: "10- Il existe dans l'océan Pacifique une immense nappe de déchets, elle fait la taille: ",
        answers: {
          a: "D'un stade de foot",
          b: "De la France",
          c: "De l'Europe"
        },
        correctAnswer: "b"
      }
    ];
  
    // appel de la fonction
    buildQuiz();
  
    // Event listeners
    submitButton.addEventListener('click', showResults);
  })();