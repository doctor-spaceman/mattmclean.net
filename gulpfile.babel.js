/**
 * Gulpfile.
 *
 * Gulp with WordPress.
 *
 * Implements:
 *      1. Live reloads browser with BrowserSync.
 *      2. CSS: Sass to CSS conversion, error catching, Autoprefixing, Sourcemaps,
 *         CSS minification, and Merge Media Queries.
 *      3. JS: Concatenates & uglifies Vendor and Custom JS files.
 *      4. Images: Minifies PNG, JPEG, GIF and SVG images.
 *      5. Watches files for changes in CSS or JS.
 *      6. Watches files for changes in PHP.
 *      7. Corrects the line endings.
 *      8. InjectCSS instead of browser page reload.
 *      9. Generates .pot file for i18n and l10n.
 *
 * @tutorial https://github.com/ahmadawais/WPGulp
 * @author Ahmad Awais <https://twitter.com/MrAhmadAwais/>
 */

/**
 * Load WPGulp Configuration.
 *
 * TODO: Customize your project in the wpgulp.js file.
 */
const config = require( './wpgulp.config.js' );

/**
 * Load Plugins.
 *
 * Load gulp plugins and passing them semantic names.
 */
const gulp = require( 'gulp' ); // Gulp, of course.

// CSS related plugins.
const sass = require( 'gulp-sass' ); // Gulp plugin for Sass compilation.
const csso = require( 'gulp-csso' ); // Minifies CSS files.
const autoprefixer = require( 'gulp-autoprefixer' ); // Autoprefixing magic.
const mmq = require( 'gulp-merge-media-queries' ); // Combine matching media queries into one.
const rtlcss = require( 'gulp-rtlcss' ); // Generates RTL stylesheet.

// JS related plugins.
const concat = require( 'gulp-concat' ); // Concatenates JS files.
const uglify = require( 'gulp-uglify' ); // Minifies JS files.
const babel = require( 'gulp-babel' ); // Compiles ESNext to browser compatible JS.

// Image related plugins.
const imagemin = require( 'gulp-imagemin' ); // Minify PNG, JPEG, GIF and SVG images with imagemin.

// Utility related plugins.
const rename = require( 'gulp-rename' ); // Renames files E.g. style.css -> style.min.css.
const lineec = require( 'gulp-line-ending-corrector' ); // Consistent Line Endings for non UNIX systems. Gulp Plugin for Line Ending Corrector (A utility that makes sure your files have consistent line endings).
const sourcemaps = require( 'gulp-sourcemaps' ); // Maps code in a compressed file (E.g. style.css) back to it’s original position in a source file (E.g. structure.scss, which was later combined with other css files to generate style.css).
const wpPot = require( 'gulp-wp-pot' ); // For generating the .pot file.
const sort = require( 'gulp-sort' ); // Recommended to prevent unnecessary changes in pot-file.
const cache = require( 'gulp-cache' ); // Cache files in stream for later use.
const remember = require( 'gulp-remember' ); //  Adds all the files it has ever seen back into the stream.

/**
 * Task: `styles`.
 *
 * Compiles Sass, Autoprefixes it and Minifies CSS.
 *
 * This task does the following:
 *    1. Gets the source scss file
 *    2. Compiles Sass to CSS
 *    3. Writes Sourcemaps for it
 *    4. Autoprefixes it and generates style.css
 *    5. Renames the CSS file with suffix .min.css
 *    6. Minifies the CSS file and generates style.min.css
 */
gulp.task( 'styles', () => {
	return gulp
		.src( config.styleSRC, { allowEmpty: true })
		.pipe( sourcemaps.init() )
		.pipe(
			sass({
				errLogToConsole: config.errLogToConsole,
				outputStyle: config.outputStyle,
				precision: config.precision
			})
		)
		.on( 'error', sass.logError )
		.pipe( autoprefixer( config.BROWSERS_LIST ) )
		.pipe( sourcemaps.write( './' ) )
		.pipe( lineec() ) // Consistent Line Endings for non UNIX systems.
		.pipe( gulp.dest( config.styleDestination ) )
		.pipe( mmq({ log: true }) ) // Merge Media Queries only for .min.css version.
    .pipe( rename({ suffix: '.min' }) )
    .pipe( csso() ) // Minification
		.pipe( lineec() ) // Consistent Line Endings for non UNIX systems.
		.pipe( gulp.dest( config.styleDestination ) )
});

/**
 * Task: `stylesRTL`.
 *
 * Compiles Sass, Autoprefixes it, Generates RTL stylesheet, and Minifies CSS.
 *
 * This task does the following:
 *    1. Gets the source scss file
 *    2. Compiles Sass to CSS
 *    4. Autoprefixes it and generates style.css
 *    5. Renames the CSS file with suffix -rtl and generates style-rtl.css
 *    6. Writes Sourcemaps for style-rtl.css
 *    7. Renames the CSS files with suffix .min.css
 *    8. Minifies the CSS file and generates style-rtl.min.css
 */
gulp.task( 'stylesRTL', () => {
	return gulp
		.src( config.styleSRC, { allowEmpty: true })
		.pipe( sourcemaps.init() )
		.pipe(
			sass({
				errLogToConsole: config.errLogToConsole,
				outputStyle: config.outputStyle,
				precision: config.precision
			})
		)
		.on( 'error', sass.logError )
		//.pipe( sourcemaps.write({ includeContent: false }) )
		//.pipe( sourcemaps.init({ loadMaps: true }) )
		.pipe( autoprefixer( config.BROWSERS_LIST ) )
		.pipe( lineec() ) // Consistent Line Endings for non UNIX systems.
		.pipe( rename({ suffix: '-rtl' }) ) // Append "-rtl" to the filename.
		.pipe( rtlcss() ) // Convert to RTL.
		.pipe( sourcemaps.write( './' ) ) // Output sourcemap for style-rtl.css.
		.pipe( gulp.dest( config.styleDestination ) )
		.pipe( mmq({ log: true }) ) // Merge Media Queries only for .min.css version.
		.pipe( rename({ suffix: '.min' }) )
		.pipe( lineec() ) // Consistent Line Endings for non UNIX systems.
		.pipe( gulp.dest( config.styleDestination ) )
});

/**
 * Task: `vendorsJS`.
 *
 * Concatenate vendor JS scripts.
 *
 * This task does the following:
 *     1. Gets the source folder for minified JS vendor files
 *     2. Concatenates all the files and generates vendor.min.js
 */
gulp.task( 'vendorsJS', () => {
	return gulp
		.src( config.jsVendorSRC, { since: gulp.lastRun( 'vendorsJS' ) }) // Only run on changed files.
		.pipe( remember( config.jsVendorSRC ) ) // Bring all files back to stream.
		.pipe( concat( config.jsVendorFile + '.min.js' ) )
		.pipe( lineec() ) // Consistent Line Endings for non UNIX systems.
		.pipe( gulp.dest( config.jsVendorDestination ) )
});

/**
 * Task: `customJS`.
 *
 * Concatenate and uglify custom JS scripts.
 *
 * This task does the following:
 *     1. Gets the source folder for JS custom files
 *     2. Concatenates all the files and generates custom.js
 *     3. Renames the JS file with suffix .min.js
 *     4. Uglifes/Minifies the JS file and generates custom.min.js
 */
gulp.task( 'customJS', () => {
	return gulp
		.src( config.jsCustomSRC, { since: gulp.lastRun( 'customJS' ) }) // Only run on changed files.
		.pipe(
			babel({
				presets: [
					[
						'@babel/preset-env', // Preset to compile your modern JS to ES5.
						{
							targets: { browsers: config.BROWSERS_LIST } // Target browser list to support.
						}
					]
				]
			})
		)
		.pipe( remember( config.jsCustomSRC ) ) // Bring all files back to stream.
		.pipe( concat( config.jsCustomFile + '.js' ) )
		.pipe( lineec() ) // Consistent Line Endings for non UNIX systems.
		.pipe( gulp.dest( config.jsCustomDestination ) )
		.pipe(
			rename({
				basename: config.jsCustomFile,
				suffix: '.min'
			})
		)
		.pipe( uglify() )
		.pipe( lineec() ) // Consistent Line Endings for non UNIX systems.
		.pipe( gulp.dest( config.jsCustomDestination ) )
});

/**
 * Task: `sliderJS`.
 *
 * Concatenate and uglify custom JS scripts.
 *
 * This task does the following:
 *     1. Gets the source folder for JS custom files
 *     2. Concatenates all the files and generates custom.js
 *     3. Renames the JS file with suffix .min.js
 *     4. Uglifes/Minifies the JS file and generates custom.min.js
 */
gulp.task( 'sliderJS', () => {
	return gulp
		.src( config.jsSliderSRC, { since: gulp.lastRun( 'sliderJS' ) }) // Only run on changed files.
		.pipe(
			babel({
				presets: [
					[
						'@babel/preset-env', // Preset to compile your modern JS to ES5.
						{
							targets: { browsers: config.BROWSERS_LIST } // Target browser list to support.
						}
					]
				]
			})
		)
		.pipe( remember( config.jsSliderSRC ) ) // Bring all files back to stream.
		.pipe( concat( config.jsSliderFile + '.js' ) )
		.pipe( lineec() ) // Consistent Line Endings for non UNIX systems.
		.pipe( gulp.dest( config.jsSliderDestination ) )
		.pipe(
			rename({
				basename: config.jsSliderFile,
				suffix: '.min'
			})
		)
		.pipe( uglify() )
		.pipe( lineec() ) // Consistent Line Endings for non UNIX systems.
		.pipe( gulp.dest( config.jsSliderDestination ) )
});

/**
 * Task: `imageGridJS`.
 *
 * Concatenate and uglify custom JS scripts.
 *
 * This task does the following:
 *     1. Gets the source folder for JS custom files
 *     2. Concatenates all the files and generates custom.js
 *     3. Renames the JS file with suffix .min.js
 *     4. Uglifes/Minifies the JS file and generates custom.min.js
 */
gulp.task( 'imageGridJS', () => {
	return gulp
		.src( config.jsImageGridSRC, { since: gulp.lastRun( 'imageGridJS' ) }) // Only run on changed files.
		.pipe(
			babel({
				presets: [
					[
						'@babel/preset-env', // Preset to compile your modern JS to ES5.
						{
							targets: { browsers: config.BROWSERS_LIST } // Target browser list to support.
						}
					]
				]
			})
		)
		.pipe( remember( config.jsImageGridSRC ) ) // Bring all files back to stream.
		.pipe( concat( config.jsImageGridFile + '.js' ) )
		.pipe( lineec() ) // Consistent Line Endings for non UNIX systems.
		.pipe( gulp.dest( config.jsImageGridDestination ) )
		.pipe(
			rename({
				basename: config.jsImageGridFile,
				suffix: '.min'
			})
		)
		.pipe( uglify() )
		.pipe( lineec() ) // Consistent Line Endings for non UNIX systems.
		.pipe( gulp.dest( config.jsImageGridDestination ) )
});

/**
 * Task: `images`.
 *
 * Minifies PNG, JPEG, GIF and SVG images.
 *
 * This task does the following:
 *     1. Gets the source of images raw folder
 *     2. Minifies PNG, JPEG, GIF and SVG images
 *     3. Generates and saves the optimized images
 *
 * This task will run only once, if you want to run it
 * again, do it with the command `gulp images`.
 *
 * Read the following to change these options.
 * @link https://github.com/sindresorhus/gulp-imagemin
 */
gulp.task( 'images', () => {
	return gulp
		.src( config.imgSRC )
		.pipe(
			cache(
				imagemin([
					imagemin.gifsicle({ interlaced: true }),
					imagemin.jpegtran({ progressive: true }),
					imagemin.optipng({ optimizationLevel: 3 }), // 0-7 low-high.
					imagemin.svgo({
						plugins: [ { removeViewBox: true }, { cleanupIDs: false } ]
					})
				])
			)
		)
		.pipe( gulp.dest( config.imgDST ) )
});

/**
 * Task: `clear-images-cache`.
 *
 * Deletes the images cache. By running the next "images" task,
 * each image will be regenerated.
 */
gulp.task( 'clearCache', function( done ) {
	return cache.clearAll( done );
});

/**
 * WP POT Translation File Generator.
 *
 * This task does the following:
 * 1. Gets the source of all the PHP files
 * 2. Sort files in stream by path or any custom sort comparator
 * 3. Applies wpPot with the variable set at the top of this file
 * 4. Generate a .pot file of i18n that can be used for l10n to build .mo file
 */
gulp.task( 'translate', () => {
	return gulp
		.src( config.watchPhp )
		.pipe( sort() )
		.pipe(
			wpPot({
				domain: config.textDomain,
				package: config.packageName,
				bugReport: config.bugReport,
				lastTranslator: config.lastTranslator,
				team: config.team
			})
		)
		.pipe( gulp.dest( config.translationDestination + '/' + config.translationFile ) )
});

/**
 * Watch Tasks.
 *
 * Watches for file changes and runs specific tasks.
 */
gulp.task(
	'watch',
	gulp.parallel( 'styles', 'vendorsJS', 'customJS', 'sliderJS', 'imageGridJS', /*'images',*/ () => {
		gulp.watch( config.watchStyles, gulp.parallel( 'styles' ) ); // Reload on SCSS file changes.
		gulp.watch( config.watchJsVendor, gulp.series( 'vendorsJS' ) ); // Reload on vendorsJS file changes.
    gulp.watch( config.watchJsCustom, gulp.series( 'customJS' ) ); // Reload on customJS file changes.
    gulp.watch( config.watchJsSlider, gulp.series( 'sliderJS' ) ); // Reload on sliderJS file changes.
    gulp.watch( config.watchJsImageGrid, gulp.series( 'imageGridJS' ) ); // Reload on sliderJS file changes.
		/* gulp.watch( config.imgSRC, gulp.series( 'images' ) ); // Reload on image file changes. */
	})
);

gulp.task('default', gulp.series( 'styles','vendorsJS', 'customJS', 'sliderJS', 'imageGridJS', /*'images' */) );