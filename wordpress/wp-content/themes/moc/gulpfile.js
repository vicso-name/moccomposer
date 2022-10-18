const {src, dest, watch, series, parallel} = require('gulp');
const sourcemaps = require('gulp-sourcemaps');
const sass = require('gulp-sass')(require('sass'));
const concat = require('gulp-concat');
const uglify = require('gulp-uglify-es').default;
const uglifycss = require('gulp-uglifycss');
const postcss = require('gulp-postcss');
const autoprefixer = require('autoprefixer');
const babel = require('gulp-babel');


// File paths
const files = {
    portfolioCss: 'wp-content/themes/moc/css/portfolio/*.*',
    blogForPortfolio: 'wp-content/themes/moc/css/blog/page-blogpost.css',
    blogForEditor: 'wp-content/themes/moc/css/blog/editor-*.css',
    commonCss: 'wp-content/themes/moc/css/common/*.*',
    headerCss: 'wp-content/themes/moc/css/header/*.*',
    otherCss: 'wp-content/themes/moc/css/other/*.*',
    blogCss: 'wp-content/themes/moc/css/blog/*.*',
    maCss: 'wp-content/themes/moc/css/ma/*.*',
    chatbotsCss: 'wp-content/themes/moc/css/chatbots/*.*',
    servicesCss: 'wp-content/themes/moc/css/services/*.scss',
    careersCss: 'wp-content/themes/moc/css/careers/*.css',
    careersBlogCss: 'wp-content/themes/moc/css/blog/page-blog.css',
    socialCss: 'wp-content/themes/moc/css/social/*.css',
    businessProcessAutomationCss: 'wp-content/themes/moc/css/business-process-automation/*.*',
    aboutUsCss: 'wp-content/themes/moc/css/about-us/*.*',
    webinarsCss: 'wp-content/themes/moc/css/webinars/*.*',
    AiLandingCss: 'wp-content/themes/moc/css/ai-landing/*.*',
    jsChatbots: 'wp-content/themes/moc/js/src/chatbots/*.js',
    jsAiLanding: 'wp-content/themes/moc/js/src/ai-landing/*.js',
    jsPortfolio: 'wp-content/themes/moc/js/src/portfolio/*.js',
    jsLaunch: 'wp-content/themes/moc/js/src/launch/*.js',
    jsBlog: 'wp-content/themes/moc/js/src/blog/*.js',
    jsDesign: 'wp-content/themes/moc/js/src/design/*.js',
    jsCommon: 'wp-content/themes/moc/js/src/common/*.js',
    jsOther: 'wp-content/themes/moc/js/src/other/*.js',
    jsBusinessProcessAutomation: 'wp-content/themes/moc/js/src/business-process-automation/*.js',
    jsAboutUs: 'wp-content/themes/moc/js/src/about-us/*.js'
};

// Sass task: compiles the style.scss file into style.css
function portfolioTask() {
    return src([files.portfolioCss, files.blogForPortfolio])
        .pipe(concat('moc-portfolio.css'))
        .pipe(sourcemaps.init())
        .pipe(sass())
        .pipe(postcss([autoprefixer()]))
        .pipe(uglifycss({
            'maxLineLen': 80,
            'uglyComments': true
        }))
        .pipe(sourcemaps.write('.'))
        .pipe(dest('wp-content/themes/moc/css')
        );
}

function webinarsTask() {
    return src(files.webinarsCss)
        .pipe(concat('moc-webinars.css'))
        .pipe(sourcemaps.init())
        .pipe(sass())
        .pipe(postcss([autoprefixer()]))
        .pipe(uglifycss({
            'maxLineLen': 80,
            'uglyComments': true
        }))
        .pipe(sourcemaps.write('.'))
        .pipe(dest('wp-content/themes/moc/css')
        );
}

function AiLandingTask() {
    return src(files.AiLandingCss)
        .pipe(concat('moc-ai-landing.css'))
        .pipe(sourcemaps.init())
        .pipe(sass())
        .pipe(postcss([autoprefixer()]))
        .pipe(uglifycss({
            'maxLineLen': 80,
            'uglyComments': true
        }))
        .pipe(sourcemaps.write('.'))
        .pipe(dest('wp-content/themes/moc/css')
        );
}

function commonTask() {
    return src(files.commonCss)
        .pipe(concat('moc-common.css'))
        .pipe(sourcemaps.init())
        .pipe(sass())
        .pipe(postcss([autoprefixer()]))
        .pipe(uglifycss({
            'maxLineLen': 80,
            'uglyComments': true
        }))
        .pipe(sourcemaps.write('.'))
        .pipe(dest('wp-content/themes/moc/css')
        );
}

function headerTask() {
    return src(files.headerCss)
        .pipe(concat('moc-header.css'))
        .pipe(sourcemaps.init())
        .pipe(sass())
        .pipe(postcss([autoprefixer()]))
        .pipe(uglifycss({
            'maxLineLen': 80,
            'uglyComments': true
        }))
        .pipe(sourcemaps.write('.'))
        .pipe(dest('wp-content/themes/moc/css')
        );
}

function otherTask() {
    return src(files.otherCss)
        .pipe(concat('moc-other.css'))
        .pipe(sourcemaps.init())
        .pipe(sass())
        .pipe(postcss([autoprefixer()]))
        .pipe(uglifycss({
            'maxLineLen': 80,
            'uglyComments': true
        }))
        .pipe(sourcemaps.write('.'))
        .pipe(dest('wp-content/themes/moc/css')
        );
}

function maTask() {
    return src(files.maCss)
        .pipe(concat('ma-styles.css'))
        .pipe(sourcemaps.init())
        .pipe(sass())
        .pipe(postcss([autoprefixer()]))
        .pipe(uglifycss({
            'maxLineLen': 80,
            'uglyComments': true
        }))
        .pipe(sourcemaps.write('.'))
        .pipe(dest('wp-content/themes/moc/css')
        );
}

function blogTask() {
    return src([files.blogCss, files.socialCss])
        .pipe(concat('moc-blog.css'))
        .pipe(sourcemaps.init())
        .pipe(sass())
        .pipe(postcss([autoprefixer()]))
        .pipe(uglifycss({
            'maxLineLen': 80,
            'uglyComments': true
        }))
        .pipe(sourcemaps.write('.'))
        .pipe(dest('wp-content/themes/moc/css')
        );
}

function editorTask() {
    return src(files.blogForEditor)
        .pipe(concat('editor-style.css'))
        .pipe(sourcemaps.init())
        .pipe(sass())
        .pipe(postcss([autoprefixer()]))
        .pipe(uglifycss({
            'maxLineLen': 80,
            'uglyComments': true
        }))
        .pipe(sourcemaps.write('.'))
        .pipe(dest('wp-content/themes/moc/css')
        );
}

function chatbotsTask() {
    return src([files.chatbotsCss])
        .pipe(concat('moc-chatbots.css'))
        .pipe(sourcemaps.init())
        .pipe(sass())
        .pipe(postcss([autoprefixer()]))
        .pipe(uglifycss({
            'maxLineLen': 80,
            'uglyComments': true
        }))
        .pipe(sourcemaps.write('.'))
        .pipe(dest('wp-content/themes/moc/css')
        );
}

function servicesTask() {
    return src(files.servicesCss)
        .pipe(concat('moc-services.css'))
        .pipe(sourcemaps.init())
        .pipe(sass())
        .pipe(postcss([autoprefixer()]))
        .pipe(uglifycss({
            'maxLineLen': 80,
            'uglyComments': true
        }))
        .pipe(sourcemaps.write('.'))
        .pipe(dest('wp-content/themes/moc/css')
        );
}

function careersTask() {
    return src([files.careersCss, files.careersBlogCss, files.socialCss])
        .pipe(concat('moc-careers.css'))
        .pipe(sourcemaps.init())
        .pipe(sass())
        .pipe(postcss([autoprefixer()]))
        .pipe(uglifycss({
            'maxLineLen': 80,
            'uglyComments': true
        }))
        .pipe(sourcemaps.write('.'))
        .pipe(dest('wp-content/themes/moc/css')
        );
}

function businessProcessAutomationTask() {
    return src([files.businessProcessAutomationCss])
        .pipe(concat('business-process-automation.css'))
        .pipe(sourcemaps.init())
        .pipe(sass())
        .pipe(postcss([autoprefixer()]))
        .pipe(uglifycss({
            'maxLineLen': 80,
            'uglyComments': true
        }))
        .pipe(sourcemaps.write('.'))
        .pipe(dest('wp-content/themes/moc/css')
        );
}

function aboutUsTask() {
    return src([files.aboutUsCss])
        .pipe(concat('about-us.css'))
        .pipe(sourcemaps.init())
        .pipe(sass())
        .pipe(postcss([autoprefixer()]))
        .pipe(uglifycss({
            'maxLineLen': 80,
            'uglyComments': true
        }))
        .pipe(sourcemaps.write('.'))
        .pipe(dest('wp-content/themes/moc/css')
        );
}

function jsChatbotsTask() {
    return src([
        files.jsChatbots
    ])
        .pipe(sourcemaps.init())
        .pipe(babel({
            presets: ['@babel/env']
        }))
        .pipe(concat('moc-chatbots.js'))

        .pipe(uglify())
        .on('error', function (err) {
            gutil.log(gutil.colors.red('[Error]'), err.toString())
        })
        .pipe(sourcemaps.write('.'))
        .pipe(dest('wp-content/themes/moc/js'));
}

function jsAiLandingTask() {
    return src([
        files.jsAiLanding
    ])
        .pipe(sourcemaps.init())
        .pipe(babel({
            presets: ['@babel/env']
        }))
        .pipe(concat('moc-ai-landing.js'))

        .pipe(uglify())
        .on('error', function (err) {
            gutil.log(gutil.colors.red('[Error]'), err.toString())
        })
        .pipe(sourcemaps.write('.'))
        .pipe(dest('wp-content/themes/moc/js'));
}


function jsBlogTask() {
    return src([
        files.jsBlog
    ])
        .pipe(sourcemaps.init())
        .pipe(babel({
            presets: ['@babel/env']
        }))
        .pipe(concat('moc-blog.js'))

        .pipe(uglify())
        .on('error', function (err) {
            gutil.log(gutil.colors.red('[Error]'), err.toString())
        })
        .pipe(sourcemaps.write('.'))
        .pipe(dest('wp-content/themes/moc/js'));
}

function jsPortfolioTask() {
    return src([
        files.jsPortfolio,
        files.jsOther
    ])
        .pipe(sourcemaps.init())
        .pipe(babel({
            presets: ['@babel/env']
        }))
        .pipe(concat('moc-portfolio.js'))

        .pipe(uglify())
        .on('error', function (err) {
            gutil.log(gutil.colors.red('[Error]'), err.toString())
        })
        .pipe(sourcemaps.write('.'))
        .pipe(dest('wp-content/themes/moc/js'));
}

function jsDesignTask() {
    return src([
        files.jsDesign
    ])
        .pipe(sourcemaps.init())
        .pipe(babel({
            presets: ['@babel/env']
        }))
        .pipe(concat('moc-design.js'))

        .pipe(uglify())
        .on('error', function (err) {
            gutil.log(gutil.colors.red('[Error]'), err.toString())
        })
        .pipe(sourcemaps.write('.'))
        .pipe(dest('wp-content/themes/moc/js'));
}

function jsCommonTask() {
    return src([
        files.jsCommon
    ])
        .pipe(sourcemaps.init())
        .pipe(babel({
            presets: ['@babel/env']
        }))
        .pipe(concat('moc-common.js'))

        .pipe(uglify())
        .on('error', function (err) {
            gutil.log(gutil.colors.red('[Error]'), err.toString())
        })
        .pipe(sourcemaps.write('.'))
        .pipe(dest('wp-content/themes/moc/js'));
}

function jsLaunchTask() {
    return src([
        files.jsLaunch
    ])
        .pipe(sourcemaps.init())
        .pipe(babel({
            presets: ['@babel/env']
        }))
        .pipe(concat('moc-launch.js'))

        .pipe(uglify())
        .on('error', function (err) {
            gutil.log(gutil.colors.red('[Error]'), err.toString())
        })
        .pipe(sourcemaps.write('.'))
        .pipe(dest('wp-content/themes/moc/js'));
}

function jsBusinessProcessAutomationTask() {
    return src([
        files.jsBusinessProcessAutomation
    ])
        .pipe(sourcemaps.init())
        .pipe(babel({
            presets: ['@babel/env']
        }))
        .pipe(concat('moc-bpa.js'))

        .pipe(uglify())
        .on('error', function (err) {
            gutil.log(gutil.colors.red('[Error]'), err.toString())
        })
        .pipe(sourcemaps.write('.'))
        .pipe(dest('wp-content/themes/moc/js'));
}

function jsAboutUsTask() {
    return src([
        files.jsAboutUs
    ])
        .pipe(sourcemaps.init())
        .pipe(babel({
            presets: ['@babel/env']
        }))
        .pipe(concat('about-us.js'))

        .pipe(uglify())
        .on('error', function (err) {
            gutil.log(gutil.colors.red('[Error]'), err.toString())
        })
        .pipe(sourcemaps.write('.'))
        .pipe(dest('wp-content/themes/moc/js'));
}

// Watch task: watch SCSS and JS files for changes
// If any change, run scss and js tasks simultaneously
function watchTask() {
    watch([
            files.portfolioCss,
            files.commonCss,
            files.headerCss,
            files.otherCss,
            files.blogCss,
            files.maCss,
            files.chatbotsCss,
            files.servicesCss,
            files.careersCss,
            files.businessProcessAutomationCss,
            files.aboutUsCss,
            files.webinarsCss,
            files.AiLandingCss,
            files.jsChatbots,
            files.jsAiLanding,
            files.jsDesign,
            files.jsPortfolio,
            files.jsOther,
            files.jsBlog,
            files.jsLaunch,
            files.jsCommon,
            files.jsBusinessProcessAutomation,
            files.jsAboutUs
        ],
        parallel(
            headerTask,
            commonTask,
            portfolioTask,
            otherTask,
            blogTask,
            editorTask,
            maTask,
            chatbotsTask,
            jsAiLandingTask,
            servicesTask,
            careersTask,
            businessProcessAutomationTask,
            aboutUsTask,
            webinarsTask,
            AiLandingTask,
            jsChatbotsTask,
            jsBlogTask,
            jsDesignTask,
            jsPortfolioTask,
            jsLaunchTask,
            jsCommonTask,
            jsBusinessProcessAutomationTask,
            jsAboutUsTask));
}

exports.default = series(
    parallel(
        headerTask,
        commonTask,
        portfolioTask,
        otherTask,
        blogTask,
        editorTask,
        maTask,
        chatbotsTask,
        jsAiLandingTask,
        servicesTask,
        careersTask,
        businessProcessAutomationTask,
        aboutUsTask,
        webinarsTask,
        AiLandingTask,
        jsChatbotsTask,
        jsBlogTask,
        jsDesignTask,
        jsPortfolioTask,
        jsLaunchTask,
        jsCommonTask,
        jsBusinessProcessAutomationTask,
        jsAboutUsTask),
    watchTask
);
