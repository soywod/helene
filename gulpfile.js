var gulp   = require('gulp'),
    sass   = require('gulp-sass'),
    minify = require('gulp-cssnano'),
    concat = require('gulp-concat'),
    uglify = require('gulp-uglify');

var paths = {
	css  : [
		'bower_components/bootstrap/dist/css/bootstrap.min.css',
		'bower_components/font-awesome/css/font-awesome.min.css'
	],
	js   : [
		'bower_components/jquery/dist/jquery.min.js',
		'bower_components/bootstrap/dist/js/bootstrap.min.js',
		'bower_components/masonry/dist/masonry.pkgd.min.js',
		'bower_components/dropzone/dist/min/dropzone.min.js'
	],
	fonts: [
		'bower_components/font-awesome/fonts/*'
	]
};

gulp.task('js-vendors', function () {
	return gulp.src(paths.js)
		.pipe(concat('vendors.min.js'))
		.pipe(gulp.dest('public/js'))
});

gulp.task('css-vendors', function () {
	return gulp.src(paths.css)
		.pipe(concat('vendors.min.css'))
		.pipe(gulp.dest('public/css'))
});

gulp.task('js-master', function () {
	return gulp.src('resources/assets/js/**/*.js')
		.pipe(uglify())
		.pipe(concat('master.min.js'))
		.pipe(gulp.dest('public/js'))
});

gulp.task('css-master', function () {
	return gulp.src('resources/assets/sass/**/*.sass')
		.pipe(sass({onError: console.error.bind(console, 'SASS ERROR')}))
		.pipe(minify())
		.pipe(concat('master.min.css'))
		.pipe(gulp.dest('public/css'))
});

gulp.task('watch', function () {
	gulp.watch('resources/assets/js/**/*.js', ['js-master']);
	gulp.watch('resources/assets/sass/**/*.sass', ['css-master']);
});

gulp.task('default', ['js-vendors', 'css-vendors', 'js-master', 'css-master']);