// Load plugins
var gulp = require('gulp'),
    sass = require('gulp-ruby-sass'),
    autoprefixer = require('gulp-autoprefixer'),
    minifycss = require('gulp-minify-css'),
    jshint = require('gulp-jshint'),
    uglify = require('gulp-uglify'),
    imagemin = require('gulp-imagemin'),
    rename = require('gulp-rename'),
    clean = require('gulp-clean'),
    concat = require('gulp-concat'),
    cache = require('gulp-cache'),
    livereload = require('gulp-livereload'),
    lr = require('tiny-lr'),
    server = lr();

  // Styles
  gulp.task('styles', function() {
      gulp.src('sass/main.scss')
          .pipe(sass({ 
            style: 'expanded',
            noCache: true
          }))
          .pipe(autoprefixer('last 2 version', 'safari 5', 'ie 8', 'ie 9', 'opera 12.1', 'ios 6', 'android 4'))
          .pipe(gulp.dest('css'))
          .pipe(rename({suffix: '.min'}))
          .pipe(minifycss())
          .pipe(gulp.dest('css'))
          .pipe(livereload(server));
  });

  // Scripts
  gulp.task('scripts', function() {  
      gulp.src(['js/*.js', '!js/vendor/**', '!js/main.min.js'])
          .pipe(concat('main.min.js'))
          .pipe(uglify())
          .pipe(gulp.dest('js/'))
          .pipe(livereload(server));
  });

  // Images
  gulp.task('images', function() {
    gulp.src(['img/original/*.png', 'img/original/*.jpg'])
      .pipe(cache(imagemin({ optimizationLevel: 3, progressive: true, interlaced: true })))
      .pipe(gulp.dest('img/'))
      .pipe(livereload(server));
  });

  // Clean - not used for now
  gulp.task('clean', function() {
    return gulp.src(['dist/styles', 'dist/scripts', 'dist/images'], {read: false})
      .pipe(clean());
  });

  // Default task
  gulp.task('default', function() {
      // Listen on port 35729
      server.listen(35729, function (err) {
        if (err) {
          return console.log(err)
        };

      gulp.run('scripts', 'styles', 'images');

      // Watch .scss files
      gulp.watch('sass/*.scss', function(event) {
        gulp.run('styles');
      });

      // Watch .js files
      gulp.watch('js/*.js', function(event) {
        gulp.run('scripts');
      });

      // Watch image files
      gulp.watch('img/original/*', function(event) {
        gulp.run('images');
      });
  });



});