'use strict';

// sass compile
var gulp = require('gulp');
var sass = require('gulp-sass');
var prettify = require('gulp-prettify');
var cleanCSS = require("gulp-clean-css");
var minifyJS = require('gulp-jsmin');
var rename = require("gulp-rename");
var concat = require('gulp-concat');


//*** SASS compiler task
gulp.task('sass', function () {
    gulp.src('./assets/scss/style.scss').pipe(sass()).pipe(gulp.dest('./assets/css'));

});

//*** CSS & JS minify task
gulp.task('minify-css', function () {
    gulp.src(['./assets/css/style.css'])
        .pipe(cleanCSS({
            compatibility: 'ie8',
            keepSpecialComments: '*'
        }))
        .pipe(rename({suffix: '.min'}))
        .pipe(gulp.dest('./assets/css'));
});
gulp.task('minify-js', function () {
    gulp.src(['./assets/js/scripts.js'])
        .pipe(minifyJS())
        .pipe(rename({suffix: '.min'}))
        .pipe(gulp.dest('./assets/js'));
});
gulp.task('combine', function() {
    return gulp.src([
        './assets/js/plugins/jquery.min.js',
        './assets/js/plugins/jquery.blockUI.js',
        './assets/js/plugins/jquery.cookie.js',
        './assets/js/plugins/bootstrap.min.js',
        './assets/js/plugins/add-to-cart.js',
        './assets/js/plugins/woocommerce.min.js',
        './assets/js/plugins/cart-fragments.js',
        './assets/js/plugins/main.js'
    ])
    .pipe(concat('scripts.js'))
    .pipe(gulp.dest('./assets/js/'));
});

gulp.task("watch", function() {
    gulp.watch(["./assets/scss/*.scss"], ["sass"]);
    gulp.watch(["./assets/scss/**/*.scss"], ["sass"]);
    gulp.watch(["./assets/css/style.css"], ["minify-css"]);
});

gulp.task('default', ['sass', 'minify-css', 'combine', 'minify-js'], function () {
    console.info('compilation completed');
});