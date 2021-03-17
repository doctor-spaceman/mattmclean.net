// Homepage hero interactive element
const heroGraphic = document.querySelector('.hero-graphic__morph');

function heroClickResponder(e) {
  let el = e.target;
  let typed;
  const typedStrings = [
    '/JK78/F45/U78/R348/J57/N454/K876/',
    '/THE/OWLS/ARE/NOT/WHAT/THEY/SEEM/',
    '/K78/B676/G565/C454/N669/H6776/',
    '/B789/W26/MN78/N78/H45/JK78/DF45/'
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