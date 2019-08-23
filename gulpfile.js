/**
 * Mi archivo gulp NICHOPRESS
 */

'use strict';

/**
 * cargar plugins
 */
var gulp = require('gulp'),
   sass = require('gulp-sass'),
   browser = require('browser-sync').create();


/**
* Tareas normales
*/

// Crear server con Browsersync
gulp.task('server', function(){
    browser.init({
        proxy: "http://nichopress.local", 
         //injectar css
        injectChanges: true,
        //que servir
        /*server: {
            baseDir: './'
        },*/
        //port: 80

    });
    gulp.watch(['./**/*.php','*.html','./css/admin.css'],['watch-php']);

    gulp.watch("./sass/*.scss", ['sass']);
});

//pegar sass
gulp.task('sass', function() {
   return gulp.src('sass/*.scss')
    .pipe(sass().on('error', sass.logError))
    .pipe(sass({
           'outputStyle': 'compressed'
       }))
       .pipe(gulp.dest('./css'))
       .pipe(browser.stream());
});


/**
 * watches
 */

 gulp.task('watch-php',function(done){
     browser.reload();
     done();
 });
// gulp.task('watch-php', [aqui puedo poner si necesito que corra otra tarea primero], function)



/**
 * Tarea principal
 */

gulp.task('default',['server'])