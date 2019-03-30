const gulp      = require('gulp'),
    shell       = require('gulp-shell'),
    _           = require('lodash'),
    sass        = require('gulp-sass'),
    sourcemaps  = require('gulp-sourcemaps'),
    browserSync = require('browser-sync').create(),
    del         = require('del'),
    cssnano     = require('gulp-cssnano'),
    runSequence = require('run-sequence'),
    themeInfo   = require('./theme.json');

//Config
const config = {
    public: {
        path: "../../public"
    },
    theme: {
        name: themeInfo.name.toLowerCase(),
        path: "../../public/themes/" + themeInfo.name.toLowerCase()
    },
    asset: {
        path: "assets"
    },
    resource: {
        path:   "resources",
        assets: "resources/assets",
        vendor: "resources/vendor"
    },
    maps: true
};


//Paths
let path = {
    css     : "/css",
    js      : "/js",
    sass    : "/scss",
    image   : "/images",
    fonts   : "/fonts",
    vendor  : "/vendor",
};

let theme,
    asset,
    resource = {};

theme = _.mapValues(path, function(value){
   return config.theme.path + value;
});

asset = _.mapValues(path, function(value){
    return config.asset.path + value;
});

resource = _.mapValues(path, function(value){
    return config.resource.assets + value;
});

//// Assets Tasks
gulp.task('clean:dist', function () {
    return del.sync(config.asset.path, {force:true});
});

gulp.task('clean:theme', function () {
   return del.sync(config.theme.path + '/**', {force:true});
});

//// Resource Tasks
gulp.task('sass', function(){
    return gulp.src([
        resource.sass + '/**/*.scss'
    ])
        .pipe(sourcemaps.init({
            loadMaps : config.maps
        }))
        .pipe(sass.sync({outputStyle: 'compressed'}).on('error', sass.logError))
        .pipe(sourcemaps.write('maps'))
        .pipe(gulp.dest( resource.css ))
        .pipe(browserSync.reload({
            stream: true
        }));
});

gulp.task('sass:public', function(){
    return gulp.src([
        resource.sass + '/**/*.scss'
    ])
        .pipe(sourcemaps.init({
            loadMaps : config.maps
        }))
        .pipe(sass.sync({outputStyle: 'compressed'}).on('error', sass.logError))
        .pipe(sourcemaps.write('maps'))
        .pipe(gulp.dest( theme.css ))
        .pipe(browserSync.reload({
            stream: true
        }));
});

gulp.task('css', function(){
    return gulp.src(resource.css + '/**')
        .pipe(gulp.dest(asset.css));
});

gulp.task('images', function(){
   return gulp.src(resource.image + '/**/*')
       .pipe(gulp.dest(asset.image));
});

gulp.task('fonts', function(){
    return gulp.src(resource.fonts + '/**')
        .pipe(gulp.dest(asset.fonts));
});

gulp.task('js', function(){
    return gulp.src(resource.js + '/**')
        .pipe(gulp.dest(asset.js));
});

gulp.task('js:public', function(){
    return gulp.src(resource.js + '/**')
        .pipe(gulp.dest(theme.js));
});

//Vendors Copy
let vendors = {
  src: [
      config.resource.vendor + '/select2/dist/**',
      config.resource.vendor + '/fotorama/**'
  ],
  dest: [
      resource.vendor + '/select2',
      resource.vendor + '/fotorama'
  ]
};

gulp.task('vendor:clean', function () {
   return del.sync(resource.vendor);
});

gulp.task('vendor:copy', function(){
    for (var i = 0; i < vendors.src.length; i++) {
        var task = gulp.src(vendors.src[i])
            .pipe(gulp.dest(vendors.dest[i]));
    }
    return task;
});

gulp.task('vendor:dist', ['vendor:copy'], function(){
   return gulp.src(resource.vendor + '/**')
       .pipe(gulp.dest(asset.vendor));
});

gulp.task('stylistPublish', function(){
    return gulp.src("").pipe(shell("php ../../artisan stylist:publish " + themeInfo.name));
});

//Build
gulp.task('default', function(callback){
   runSequence('clean:dist',
       ['sass', 'css', 'images', 'fonts', 'js', 'vendor:dist'],
       ['stylistPublish'],
       callback
   );
});


// Configure the proxy server for livereload
gulp.task('browser-sync', function() {
    browserSync.init({
        proxy: "http://dev.zirve.com",
        files: 'views/**/*.php',
        ghostMode: {
            clicks: true,
            location: true,
            forms: true,
            scroll: true
        },
        notify: true,
        open: false
    });
});

gulp.task('watch', ['browser-sync'], function () {
    gulp.watch([resource.sass + '/**/*.scss'], ['sass:public']);
    gulp.watch([resource.js + '/**/*.js'], ['js:public']);
    gulp.watch('views/**/*.php', browserSync.reload);
});
