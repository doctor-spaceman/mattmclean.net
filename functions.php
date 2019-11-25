<?php
  // Standard Functions (not theme specific)
  include_once 'functions/standards/helpers.php';
  include_once 'functions/standards/admin-adjustments.php';
  include_once 'functions/standards/theme-adjustments.php';
  // END / Standard Functions

  // Theme Functions
  require_once 'functions/enqueue-scripts.php'; // Theme scripts and styles
  require_once 'functions/theme-functions.php'; // Theme functions
  require_once 'functions/cpt.php';             // Custom post types
  require_once 'functions/shortcodes.php';      // Shortcodes
  // END / Theme Functions