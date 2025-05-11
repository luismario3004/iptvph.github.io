const gulp = require('gulp');
const uglify = require('gulp-uglify');
const concat = require('gulp-concat');

// Define a simple task to minify and concatenate JavaScript files
gulp.task('scripts', () => {
    return gulp.src('src/index.php')  // All JS files in the src/js directory
        .pipe(concat('index.php'))       // Concatenate into 'main.js'
        .pipe(uglify())                // Minify the JS
        .pipe(gulp.dest('dist/php'));    // Output to 'dist/js' directory
});

// Run the task
gulp.task('default', gulp.series('scripts'), () => {
    console.log('Build completed!');
});
