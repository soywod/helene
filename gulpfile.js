var gulp = require('gulp'),
	sass = require('gulp-sass'),
	minify = require('gulp-cssnano'),
	concat = require('gulp-concat'),
	uglify = require('gulp-uglify');

var paths = {
	css: [
		'bower_components/bootstrap/dist/css/bootstrap.min.css',
		'bower_components/font-awesome/css/font-awesome.min.css'
	],
	js: [
		'bower_components/jquery/dist/jquery.min.js'
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