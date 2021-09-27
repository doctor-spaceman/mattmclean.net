document.addEventListener('DOMContentLoaded', () => {
  const icons = document.querySelectorAll('.search-no-results #walkway svg');

  if ( icons.length ) {
    const svg = new Walkway({
      selector: '.search-no-results #walkway svg',
      duration: '1000',
      easing: t => t // linear
    });
    svg.draw();
  }
});