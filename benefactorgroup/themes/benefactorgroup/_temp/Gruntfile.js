module.exports = function(grunt) {
    var autoprefixer = require('autoprefixer-core');
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),
        // Clean
        clean: {
            build: {
                src: [ '_build' ]
            }
        },
        // Copy
        copy: {
            build: {
                src: [
                    '**',
                    '!**/tests/**',
                    '!**/node_modules/**',
                    '!**/sass/**',
                    '!**/src/**',
                    '!**/tools/**',
                    '!**/.sass-cache/**',
                    '!**/assets/**',
                    '!**/js/lib/**',
                    '!config.rb',
                    '!Gruntfile.js',
                    '!package.json',
                    '!phpunit.xml.dist',
                    '!files',
                    '!wp-tests-config.php',
                    '!_NOTES.txt',
                    '!.gitignore'
                ],
                dot: [
                    '.htaccess'
                ],
                dest: '_build',
                expand: true
            }
        },
        // Concat JS
        concat: {
            dist: {
                src: [
                    'js/lib/no-conflict/no-conflict.js',
                    'js/lib/skip-navigation/skip-navigation.js',
                    'js/lib/mobile-menu/mobile-menu.js',
                    'js/lib/carousel/carousel.js',
                    'js/lib/twitter/twitter.js',
                    'js/lib/faq/faq.js'
                ],
                dest: 'js/lib/dev.main.js',
            },
            ie: {
                src: [
                    'js/lib/html5shiv/html5shiv.js',
                    'js/lib/respond/respond.js',
                ],
                dest: 'js/lib/dev.ie.js',
            }
        },
        jshint: {
            jshint: {
                beforeconcat: ['lib/skip-navigation/skip-navigation.js'],
                afterconcat: ['lib/dev.main.js']
            }
        },
        // Uglify
        uglify: {
            options: {
                mangle: false,
                compress: true,
            },
            build: {
                files: {
                    'js/main.min.js': ['js/lib/dev.main.js']
                }
            },
            ie: {
                files: {
                    'js/ie.min.js': ['js/lib/dev.ie.js']
                }
            }
        },
        // Sass/
        sass: {
            dist: {
              options: {
                style: 'expanded',
                require: 'susy',
                sourcemap: 'none'
              },
              files: {
                'style.css': 'sass/style.scss',
                'css/dev/dev.style.css': 'sass/style.scss'
              }
            }
          },
        postcss: {
            options: {
                processors: [
                  autoprefixer().postcss
                ]
            },
            style: { 
                src: 'style.css'
            }
        },
        // Watch
        watch: {
            options: {
                livereload: true,
            },
            scripts: {
                files: ['js/**/*.js'],
                tasks: ['jshint', 'concat', 'uglify'],
                options: {
                    spawn: false,
                },
            },
            css: {
              files: ['sass/**/*.scss'],
              tasks: ['sass', 'postcss'],
            }
        }
    });

    // Clean
    grunt.loadNpmTasks('grunt-contrib-clean');
    // Copy
    grunt.loadNpmTasks('grunt-contrib-copy');
    // Concat
    grunt.loadNpmTasks('grunt-contrib-concat');
    // Uglify
    grunt.loadNpmTasks('grunt-contrib-uglify');
    // Watch
    grunt.loadNpmTasks('grunt-contrib-watch');
    // Sass
    grunt.loadNpmTasks('grunt-contrib-sass');
    // PostCSS
    grunt.loadNpmTasks('grunt-postcss');
    // JShint
    grunt.loadNpmTasks('grunt-contrib-jshint');

    // Register Plugins
    grunt.registerTask('default', ['concat', 'uglify', 'watch', 'postcss', 'sass', 'jshint']);
    grunt.registerTask('build', ['clean', 'copy']);

};