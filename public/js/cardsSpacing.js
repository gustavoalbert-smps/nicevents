function cardSpacing() {
  const cards = document.querySelectorAll('#event-card');
  const targetElement = document.getElementById('cards-container');

  var countCards = cards.length;

  if (countCards > 4) {
    targetElement.classList.add("justify-content-between");
  } else {
    cards.forEach(card => card.classList.add("mr-4"));
  }
}

function featuredCardSpacing() {
  const cards = document.querySelectorAll('#featured-event-card');
  const targetElement = document.getElementById('featured-cards-container');

  var countCards = cards.length;

  if (countCards > 4) {
    targetElement.classList.add("justify-content-between");
  } else {
    cards.forEach(card => card.classList.add("mr-4"));
  }
}

featuredCardSpacing();
cardSpacing();