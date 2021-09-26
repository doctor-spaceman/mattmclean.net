/**
 * WPGulp Configuration File
 *
 * 1. Edit the variables as per your project requirements.
 * 2. In paths you can add <<glob or array of globs>>.
 *
 * @package WPGulp
 */

module.exports = {

	// Project options.
	projectURL: 'wpgulp.local', // Local project URL of your already running WordPress site. Could be something like wpgulp.local or localhost:3000 depending upon your local WordPress setup.
	productURL: './', // Theme/Plugin URL. Leave it like it is, since our gulpfile.js lives in the root folder.
	browserAutoOpen: false,
	injectChanges: true,

	// Style options.
	styleSRC: './css/sass/*.scss', // Path to main .scss file.
	styleDestination: './css/', // Path to place the compiled CSS file. Default set to root folder.
	outputStyle: 'compact', // Available options → 'compact' or 'compressed' or 'nested' or 'expanded'
	errLogToConsole: true,
	precision: 10,

	// JS Vendor options.
	jsVendorSRC: './js/vendor/*.js', // Path to JS vendor folder.
	jsVendorDestination: './js/', // Path to place the compiled JS vendors file.
	jsVendorFile: 'vendor', // Compiled JS vendors file name. Default set to vendors i.e. vendors.js.

	// JS Custom options.
	jsCustomSRC: './js/custom/*.js', // Path to JS custom scripts folder.
	jsCustomDestination: './js/', // Path to place the compiled JS custom scripts file.
	jsCustomFile: 'custom', // Compiled JS custom file name. Default set to custom i.e. custom.js.

	// JS Slick options.
	jsSliderSRC: './js/slider/*.js', // Path to JS slider scripts folder.
	jsSliderDestination: './js/', // Path to place the compiled JS slider scripts file.
  jsSliderFile: 'slider', // Compiled JS slider file name. Default set to custom i.e. slider.js.
  
  // JS Slick options.
	jsImageGridSRC: './js/image-grid/*.js', // Path to JS image grid scripts folder.
	jsImageGridDestination: './js/', // Path to place the compiled JS image grid scripts file.
	jsImageGridFile: 'image-grid', // Compiled JS image grid file name. Default set to custom i.e. image-grid.js.

	// Images options.
	imgSRC: './img/raw/*', // Source folder of images which should be optimized and watched. You can also specify types e.g. raw/**.{png,jpg,gif} in the glob.
	imgDST: './img/', // Destination folder of optimized images. Must be different from the imagesSRC folder.

	// Watch files paths.
	watchStyles: './css/sass/**/*.scss', // Path to all *.scss files inside css folder and inside them.
	watchJsVendor: './js/vendor/*.js', // Path to all vendor JS files.
  watchJsCustom: './js/custom/*.js', // Path to all custom JS files.
  watchJsSlider: './js/slider/*.js', // Path to all custom JS files.
  watchJsImageGrid: './js/image-grid/*.js', // Path to all custom JS files.
	watchPhp: './**/*.php', // Path to all PHP files.

	// Translation options.
	textDomain: 'WPGULP', // Your textdomain here.
	translationFile: 'WPGULP.pot', // Name of the translation file.
	translationDestination: './languages', // Where to save the translation files.
	packageName: 'WPGULP', // Package name.
	bugReport: 'https://mattmclean.net/contact/', // Where can users report bugs.
	lastTranslator: 'Matt McLean <contact@mattmclean.net>', // Last translator Email ID.
	team: 'Matt McLean <contact@mattmclean.net>', // Team's Email ID.

	// Browsers you care about for autoprefixing. Browserlist https://github.com/ai/browserslist
	// The following list is set as per WordPress requirements. Though, Feel free to change.
	BROWSERS_LIST: [
		'last 2 versions',
		'> 1%',
		'ie 11'
	]
};
