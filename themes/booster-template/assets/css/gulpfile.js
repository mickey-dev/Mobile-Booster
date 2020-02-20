var gulp = require('gulp');
var sass = require('gulp-sass');

gulp.task('mobile', function() {
    gulp.src('sass/**/*.scss')
        .pipe(sass().on('error', sass.logError))
        .pipe(gulp.dest('./'))
        console.log('Mobile Booster couk !')
});

//Watch task
gulp.task('cok',function() {
    gulp.watch('sass/**/*.scss',['mobile']);
});
