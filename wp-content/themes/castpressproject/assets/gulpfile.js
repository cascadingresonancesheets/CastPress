const { src, dest, task, series, watch, parallel } = require("gulp");
// const rm = require("gulp-rm");
const concat = require("gulp-concat");
const sourcemaps = require("gulp-sourcemaps");
const sass = require("gulp-sass")(require("sass"));
const sassGlob = require("gulp-sass-glob");
const autoprefixer = require("gulp-autoprefixer");
const gcmq = require("gulp-group-css-media-queries");
const cleanCSS = require("gulp-clean-css");
const uglify = require("gulp-uglify");
const browserSync = require("browser-sync").create();
const reload = browserSync.reload;
const gulpif = require("gulp-if");

const env = process.env.NODE_ENV;

// task("clean", () => {
//   return src("public/**/*", { read: false }).pipe(rm());
// });

task("styles", () => {
  return src("./src/scss/style.scss")
    .pipe(gulpif(env === "dev", sourcemaps.init()))
    .pipe(sassGlob())
    .pipe(sass().on("error", sass.logError))
    .pipe(
      autoprefixer({
        cascade: true,
      })
    )
    .pipe(gulpif(env === "dev", sourcemaps.write()))
    .pipe(dest("public"))
    .pipe(reload({ stream: true }));
});

task("styles-min", () => {
  return src("./src/scss/style.scss")
    .pipe(concat("style.min.css"))
    .pipe(sassGlob())
    .pipe(sass().on("error", sass.logError))
    .pipe(
      autoprefixer({
        cascade: false,
      })
    )
    .pipe(gcmq())
    .pipe(cleanCSS())
    .pipe(dest("public"));
});

task("scripts", () => {
  return src("./src/js/*.js")
    .pipe(sourcemaps.init())
    .pipe(concat("main.js"))
    .pipe(uglify())
    .pipe(sourcemaps.write())
    .pipe(dest("public"))
    .pipe(reload({ stream: true }));
});

// task("server", () => {
//   browserSync.init({
//     proxy: "castpress.loc",
//     open: false,
//   });
// });

task("watch", () => {
  watch("./src/scss/**/*.scss", series("styles"));
  watch("./src/js/*.js", series("scripts"));
});

task("default", series(parallel("styles", "scripts"), parallel("watch")));
task("build", series(parallel("styles", "styles-min", "scripts")));
