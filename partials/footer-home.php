<footer class="sticky-footer">
  <div class="wrapper wrapper--large flex--center flex--space footer">
    <?php if ( $footerElements['footer_attribution'] ) : ?>
    <div class="footer__attribution">
      <?php echo $footerElements['footer_attribution']; ?>
    </div>
    <?php endif; ?>
    <div class="flex--center site-mode-toggle">
      <button aria-label="Toggle dark mode">
        Mode:
      </button>
      <svg role="img" class="site-mode-toggle__icon--dark w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><title>Dark Mode Active</title><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"></path></svg>
      <svg role="img" class="site-mode-toggle__icon--light w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><title>Light Mode Active</title><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
    </div>
  </div>
</footer>