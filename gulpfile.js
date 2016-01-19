// Dependencies
var gulp   = require('gulp'),
    sass   = require('gulp-sass'),
    minify = require('gulp-cssnano'),
    concat = require('gulp-concat'),
    uglify = require('gulp-uglify');

// Static paths
var paths = {
	css  : [
		'bower_components/bootstrap/dist/css/bootstrap.min.css',
		'bower_components/font-awesome/css/font-awesome.min.css',
		'bower_components/bootstrap-switch/dist/css/bootstrap3/bootstrap-switch.min.css'
	],
	js   : [
		'bower_components/jquery/dist/jquery.min.js',
		'bower_components/bootstrap/dist/js/bootstrap.min.js',
		'bower_components/dropzone/dist/min/dropzone.min.js',
		'bower_components/bootstrap-switch/dist/js/bootstrap-switch.min.js'
	],
	fonts: [
		'bower_components/font-awesome/fonts/*'
	]
};

// JS vendors task
gulp.task('js-vendors', function () {
	return gulp.src(paths.js)
		.pipe(concat('vendors.min.js'))
		.pipe(gulp.dest('public/js'));
});

// CSS vendors task
gulp.task('css-vendors', function () {
	return gulp.src(paths.css)
		.pipe(concat('vendors.min.css'))
		.pipe(gulp.dest('public/css'));
});

// Fonts vendors task
gulp.task('fonts-vendors', function () {
	return gulp.src(paths.fonts).pipe(gulp.dest('public/fonts'));
});

// JS task
gulp.task('js', function () {
	return gulp.src('resources/assets/js/**/*.js')
		.pipe(uglify())
		.pipe(concat('master.min.js'))
		.pipe(gulp.dest('public/js'));
});

// CSS vendors task
gulp.task('css', function () {
	return gulp.src('resources/assets/sass/**/*')
		.pipe(sass({onError: console.error.bind(console, 'SASS ERROR')}))
		.pipe(minify())
		.pipe(concat('master.min.css'))
		.pipe(gulp.dest('public/css'));
});

// Watch task
gulp.task('watch', function () {
	gulp.watch('resources/assets/js/**/*.js', ['js']);
	gulp.watch('resources/assets/sass/**/*', ['css']);
});

// Default task
gulp.task('default', ['js-vendors', 'css-vendors', 'fonts-vendors', 'js', 'css']);