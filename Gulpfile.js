var gulp = require('gulp');

// plugins relacionados ao css
var sass = require('gulp-sass');
var autoprefixer = require('gulp-autoprefixer');
var minifycss = require('gulp-uglifycss');

// plugins relacionados ao javascript
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');
var babelify = require('babelify');
var browserify = require('browserify');
var source = require('vinyl-source-stream');
var buffer = require('vinyl-buffer');
var stripDebug = require('gulp-strip-debug');

// plugins relacionados as imagens
var imagemin = require('gulp-imagemin');

// plugins relacionados ao navegador
var browserSync = require('browser-sync').create();
var reload = browserSync.reload;

// plugins helpers
var rename = require('gulp-rename');
var sourcemaps = require('gulp-sourcemaps');
var notify = require('gulp-notify');
var plumber = require('gulp-plumber');
var options = require('gulp-options');
var gulpif = require('gulp-if');
var livereload = require('gulp-livereload');

// configurações de url
var projectURL = 'http://localhost/projetos/wordpress/leowps-starter';

var styleSRC = './dev/sass/style.scss';
var styleURL = './dist/css/';
var mapURL = './';

var jsSRC = './dev/js/';
var jsFront = 'main.js';
var jsFiles = [jsFront];
var jsURL = './dist/js/';

var imagesSRC = './dev/images/**/*';
var imagesURL = './dist/images/';

var styleWatch = './dev/sass/**/*.scss';
var jsWatch = './dev/js/**/*.js';
var imagesWatch = './dev/images/**/*.*';
var phpWatch = './**/*.php';

gulp.task('browser-sync', function () {
  browserSync.init({
    proxy: projectURL,
    injectChanges: true,
    open: false
  });
});

gulp.task('styles', function () {
  return gulp.src('dev/sass/**/*.scss')
          .pipe(sourcemaps.init())
          .pipe(sass({
            errLogToConsole: true,
            outputStyle: 'nested'
          }))
          .pipe(livereload())
          .on('error', console.error.bind(console))
          .pipe(autoprefixer({browsers: ['last 2 versions', '> 5%', 'Firefox ESR']}))
          .pipe(rename({suffix: '.min'}))
          .pipe(sourcemaps.write(mapURL))
          .pipe(gulp.dest(styleURL))
          .pipe(browserSync.stream());
});

gulp.task('default', ['styles', 'js', 'images'], function () {
  gulp.src(jsURL)
          .pipe(notify({message: 'Arquivos Compilados!'}));
});

gulp.task('js', function () {
  jsFiles.map(function (entry) {
    return browserify({
      entries: [jsSRC + entry]
    })
            .bundle()
            .pipe(source(entry))
            .pipe(rename({
              extname: '.min.js'
            }))
            .pipe(buffer())
            .pipe(gulpif(options.has('production'), stripDebug()))
            .pipe(sourcemaps.init({loadMaps: true}))
            .pipe(uglify())
            .pipe(sourcemaps.write('.'))
            .pipe(gulp.dest(jsURL))
            .pipe(browserSync.stream());
  });
});

gulp.task('images', function () {
  gulp.src('dev/images/*')
          .pipe(imagemin([
            imagemin.optipng({optimizationLevel: 5}),
            imagemin.jpegtran({progressive: true}),
          ]))
          .pipe(livereload())
          .pipe(gulp.dest('dist/images'));
});

function triggerPlumber(src, url) {
  return gulp.src(src)
          .pipe(plumber())
          .pipe(gulp.dest(url));
}

gulp.task('default', ['styles', 'js', 'images'], function () {
  gulp.src(jsURL + 'admin.min.js')
          .pipe(notify({message: 'Assets Compiled!'}));
});

gulp.task('watch', ['default', 'browser-sync'], function () {
  gulp.watch(phpWatch, reload);
  gulp.watch(styleWatch, ['styles']);
  gulp.watch(jsWatch, ['js', reload]);
  gulp.watch(imagesWatch, ['images']);
  livereload.listen();
});
