// tri isotpe de type de media dans la card en boutton
// const $grid = $(".media");
// $grid.isotope({ filter: "*" });

// $("button")
//   .eq(2)
//   .on("click", () => {
//     console.log("tous");
//     $grid.isotope({ filter: "*" });
//   });

// $("button")
//   .eq(3)
//   .on("click", () => {
//     console.log("article");
//     $grid.isotope({ filter: ".article" });
//   });

// $("button")
//   .eq(4)
//   .on("click", () => {
//     console.log("game");
//     $grid.isotope({ filter: ".game" });
//   });

// $("button")
//   .eq(5)
//   .on("click", () => {
//     console.log("video");
//     $grid.isotope({ filter: ".video" });
//   });

// $("button")
//   .eq(6)
//   .on("click", () => {
//     console.log("quizz");
//     $grid.isotope({ filter: ".quizz" });
//   });

// tri isotope de type de media dans la card
const $grid = $(".grid");
$grid.isotope({ filter: "*" });

$("option")
  .eq(0)
  .on("click", () => {
    console.log("tous");
    $grid.isotope({ filter: "*" });
  });

$("option")
  .eq(1)
  .on("click", () => {
    console.log("article");
    $grid.isotope({ filter: ".article" });
  });

$("option")
  .eq(2)
  .on("click", () => {
    console.log("game");
    $grid.isotope({ filter: ".game" });
  });

$("option")
  .eq(3)
  .on("click", () => {
    console.log("video");
    $grid.isotope({ filter: ".video" });
  });

$("option")
  .eq(4)
  .on("click", () => {
    console.log("quizz");
    $grid.isotope({ filter: ".quizz" });
  });

// tri isotope de categories et age dans la card

// Récupération du nombre de category et de l'age
let valeurCategory = document.getElementById("lengthCategory").classList[1];
// console.log(valeurCategory);
let valeurAgeRange = document.getElementById("lengthAgeRange").classList[1];
// console.log(valeurAgeRange);

$("option")
  .eq(5)
  .on("click", () => {
    console.log("category" + "tout");
    $grid.isotope({ filter: "*" });
  });
let type = 5;
console.log(valeurCategory);
for (let i = 1; i <= valeurCategory; i++) {
  $("option")
    .eq(i + type)
    .on("click", () => {
      console.log("category" + i);
      $grid.isotope({ filter: ".category" + i });
    });
}
type = type + parseInt(valeurCategory);
// type = type + 2;
i = 1;
console.log(type);
$("option")
  .eq(type + i)
  .on("click", () => {
    console.log("age" + "tout");
    $grid.isotope({ filter: "*" });
  });

type = type + 1;

for (let i = 1; i <= valeurAgeRange; i++) {
  $("option")
    .eq(type + i)
    .on("click", () => {
      console.log("age" + i);
      $grid.isotope({ filter: ".ageRange" + i });
    });
}
