function cardSpacing() {
  const cards = document.querySelectorAll('#event-card');
  const targetElement = document.getElementById('cards-container');

  var countCards = cards.length;

  console.log(countCards);

  if (countCards > 2) {
    targetElement.classList.add("justify-content-between");
  } else if (countCards == 2 ) {
    cards.forEach(card => card.classList.add("mr-4"));
  }
}

cardSpacing();