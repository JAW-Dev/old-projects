module.exports = function(grunt) {
	// Project configuration.
	grunt.initConfig({
		pkg: grunt.file.readJSON('package.json'),
		// Sass
		sass: {
			dist: {
				options: {
					style: 'expanded',
          sourcemap: 'none' 
				},
				files: {
					'admin/css/styles.css': 'admin/css/global.scss',
          'admin/css/dev.css': 'admin/css/global.scss',
          'includes/css/styles.css': 'includes/css/global.scss',
          'includes/css/dev.css': 'includes/css/global.scss',
				}
			}
		},
    //PostCSS
    postcss: {
      options: {
        processors: [
          require('autoprefixer')(),
          require('rucksack-css')({ fallbacks: true })
        ]
      },
      dist: {
        src: 'admin/css/styles.css',
        dest: 'admin/css/styles.css'
      },
      dev: {
        src: 'includes/css/styles.css',
        dest: 'includes/css/styles.css'
      },
      dist: {
        src: 'admin/css/dev.css',
        dest: 'admin/css/dev.css'
      },
      dev: {
        src: 'includes/css/dev.css',
        dest: 'includes/css/dev.css'
      },
    },
		// CSSmin
    cssmin: {
			target: {
				files: {
					'includes/css/styles.css': 'includes/css/styles.css',
          'includes/css/styles.css': 'includes/css/styles.css',
				}
			}
    },
		// Concat JS
    concat: {
      admin: {
        src: [
          'admin/js/lib/no-conflict.js',
          'admin/js/lib/video-dropdown.js',
        ],
        dest: 'admin/js/scripts.js'
      },
      includes: {
    	 src: [
          'includes/js/lib/no-conflict.js',
          'includes/js/lib/picture.js',
          'includes/js/lib/svg-support.js',
          'includes/js/vendor/retina.js',
          'includes/js/vendor/picturefill.js',
        ],
        dest: 'includes/js/scripts.js'
      }
    },
    // Jshint
    jshint: {
      files: [
      	'admin/js/scripts.js',
      	'includes/js/scripts.js'
      ],
			options: {
				scripturl: true,
				globals: {
					jQuery: true
				}
			}
    },
		// Uglify
    uglify: {
      options: {
        mangle: false,
        compress: true,
        quoteStyle: 3
      },
      dist: {
        files: {
        	'admin/js/scripts.min.js' : 'admin/js/scripts.js',
          'includes/js/scripts.min.js' : 'includes/js/scripts.js'
        }
      }
    },

    // Watch
    watch: {
      scripts: {
        files: [
          'admin/js/**/*.js',
          'includes/js/**/*.js',
        ],
        tasks: ['concat', 'uglify'],
        options: {
          spawn: false
        }
      },
      css: {
        files: [
          'admin/css/**/*.scss',
          'includes/css/**/*.scss'
        ],
        tasks: ['sass', 'postcss', 'cssmin']
      }
    },
	});
	// PostCSS
	grunt.loadNpmTasks('grunt-postcss');
  // Concat
  grunt.loadNpmTasks('grunt-contrib-concat');
  // CSSmin
  grunt.loadNpmTasks('grunt-contrib-cssmin');
  // Jshint
  grunt.loadNpmTasks('grunt-contrib-jshint');
  // JSValidate
  grunt.loadNpmTasks('grunt-jsvalidate');
  // Uglify
  grunt.loadNpmTasks('grunt-contrib-uglify');
  // Watch
  grunt.loadNpmTasks('grunt-contrib-watch');
  // Sass
  grunt.loadNpmTasks('grunt-contrib-sass');
  // Watch Task
  grunt.registerTask('default', ['watch']);
};