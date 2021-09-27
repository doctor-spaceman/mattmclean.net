document.addEventListener('DOMContentLoaded', () => {
  const icons = document.querySelectorAll('.error404 #walkway svg');

  if ( icons.length ) {
    const svg = new Walkway({
      selector: '.error404 #walkway svg',
      duration: '1000',
      easing: t => t // linear
    });
    svg.draw();
  }
});