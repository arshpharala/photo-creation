const gulp = require('gulp');
const less = require('gulp-less');
const cleanCss = require('gulp-clean-css');
const gulpRename = require('gulp-rename');
//const watchLess = require('gulp-watch-less');
//const rename = require('rename');
//const debug = require('gulp-debug');
//const lessChanged = require('gulp-less-changed');

const OutputPath = 'src/style/';
const MinifiedExtension = '.min.css';


 function lessCompile() {
  // body omitted
  return gulp.src('src/style/less/main.less')
        .pipe(less())    // convert to css
		.pipe(gulp.dest(OutputPath))
        .pipe(cleanCss())
        .pipe(gulpRename({ extname: MinifiedExtension }))
        .pipe(gulp.dest(OutputPath));
}

function watchstyle()
{
    //"src/style/less/*.less",
	return gulp.watch("src/style/less/**/*.less",{ ignoreInitial: false },lessCompile);
}

exports.myless = lessCompile;
exports.run_my_less = watchstyle;
