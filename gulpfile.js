/* File: gulpfile.js */

// grab our packages
var gulp   = require('gulp'),
    pug = require('gulp-pug'),
    sass = require('gulp-sass'),
    rename = require('gulp-rename');

//true anstatt false schreiben, um Anmeldungen zu aktivieren    
var anmeldungen = false;
var anmeldungenPath = anmeldungen ? 'anmeldungenOffen.php':'anmeldungenGeschlossen.php';
//kompiliert die .pug Dateien in .html Dateien
gulp.task('pug', function buildHTML() {
  return gulp.src('src/*.pug')
  .pipe(pug())
  .pipe(gulp.dest('public/'));
});

//kompiliert die .sass und .scss Dateien in eine .css Datei
gulp.task('sass', function () {
  return gulp.src('src/sass/style.sass')
  .pipe(sass({outputStyle: 'compressed'}).on('error', sass.logError))
  .pipe(gulp.dest('public/css/'));
});

//kopiert Inhalte aus src/media in public/media
gulp.task('assets', function () {
    return gulp.src('src/media/**/*')
    .pipe(gulp.dest('public/media'));
});

//kopiert die JavaScript-Dateien in den public/ Ordner
gulp.task('js', function () {
    return gulp.src('src/js/*.js')
    .pipe(gulp.dest('public/js'));
});

//kopiert die Dateien für das Favicon in den public/ Ordner
gulp.task('favicon', function () {
    return gulp.src('src/favicon/*.*')
    .pipe(gulp.dest('public'));
});

//ändert die anmeldungen.php Datei, je nachdem ob Variable gesetzt
gulp.task('anmeldungen', function () {
    return gulp.src('src/php/' + anmeldungenPath)
        .pipe(rename('anmeldungen.php'))
        .pipe(gulp.dest('public/'));
});

//standard Gulp Task, führt alle anderen Aufgaben aus wenn gulp Befehl ausgeführt
gulp.task('default', ['pug', 'sass', 'assets', 'js', 'favicon', 'anmeldungen']);
