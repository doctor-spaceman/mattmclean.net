// Homepage hero interactive element
const heroGraphic = document.querySelector('.hero-graphic__morph');

function heroClickResponder(e) {
  let el = e.target;
  let typed;
  const typedStrings = [
    'weeks crash by, unseeing', 
    'festooned in metal', 
    'in the limbo of a long sleep',
    'life is a renegotiation',
    'the sizes of infinity',
    'thought without voice',
    'clouds like a page-edge',
    'the story spilt out',
    'the earth, capped, touches light',
    'watching atoms drift by',
    'a steady pulling across',
    'bookended by oceans',
    'a dream unending',
    'the fire-smoke of memories'
  ];
  let typedString;

  // Don't allow subsequent clicks while the response is being displayed
  heroGraphic.removeEventListener('click', heroClickResponder);

  el.classList.add('hero-graphic__morph--clicked');

  // Select a string at random
  typedString = typedStrings[Math.floor(Math.random() * typedStrings.length)]

  // Create typed.js instance
  typed = new Typed('.typed', {
    showCursor: false,
    strings: [typedString],
    typeSpeed: 40  
  });
  
  setTimeout(() => {
    typed.destroy();
    el.classList.remove('hero-graphic__morph--clicked');

    // Re-enable click listener
    heroGraphic.addEventListener('click', heroClickResponder);
  },3000);
}
if ( heroGraphic ) {
  heroGraphic.addEventListener('click', heroClickResponder);
}
// END / Homepage hero interactive element