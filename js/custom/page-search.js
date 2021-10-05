document.addEventListener('DOMContentLoaded', () => {
  const icons = document.querySelectorAll('.search-no-results #walkway svg');
  if ( icons.length ) { initWalkway('.search-no-results #walkway svg', '1000'); }
});