module.exports = function(grunt) {

	// 1. All configuration goes here
	grunt.initConfig({
		pkg: grunt.file.readJSON('package.json'),

		// JavaScript
		concat: {
			dist: {
				src: [
					'bower_components/waypoints/lib/jquery.waypoints.min.js',
					'bower_components/waypoints/lib/shortcuts/inview.min.js',
					'bower_components/featherlight/release/featherlight.min.js',
					'bower_components/imagesloaded/imagesloaded.pkgd.js',
					'bower_components/svgxuse/svgxuse.js',
					'bower_components/DOMPurify/dist/purify.min.js',
					'bower_components/bxslider-4/dist/jquery.bxslider.js',
					'js/main.js'  // This specific file
				],
				dest: 'js/production.js',
				sourceMap: true
			}
		},
		uglify: {
			build: {
				src: 'js/production.js',
				dest: 'js/production.min.js',
				sourceMap: true
			}
		},
		// Style
		copy: {
			getSCSSFromCSS: {
			files: [
				{
				expand: true,
				// add you css files here!!!
				// Then remember to include the copied file in style.scss
				src: ['bower_components/featherlight/release/featherlight.min.css'],
				dest: 'sass/',
				rename: function(dest, src) {
					src = src.split('/').pop();
					// turn the src into just the file name instead of the full path to the source
					return dest + '_' + src.replace(/\.css$/, ".scss");
				}
				}
			]
			}
		},
		sass: {
			dist: {
				files: {
					'style.css': 'sass/style.scss'
				}
			},
			options: {
				sourceMap: true,
				outputStyle: 'nested',
				imagePath: "../img"
			}
		},
		postcss: {
			options: {
				map: true,
				processors: [
					require('autoprefixer')({
						browsers: ['> 1%', 'last 4 versions', 'iOS >=7']
					})
				]
			},
			dist: {
				src: 'style.css'
			}
		},
		watch: {
			css: {
				files: ['sass/*.scss','feature-*/sass/*.scss'],
				tasks: ['sass', 'postcss'],
				options: {
					spawn: false,
				}
			},
			scripts: {
				files: ['js/**/*.js'],
				tasks: ['concat', 'uglify'],
				options: {
					spawn: false,
				}
			}
		},

	});

	// 3. Where we tell Grunt we plan to use this plug-in.
	grunt.loadNpmTasks('grunt-postcss');
	grunt.loadNpmTasks('grunt-contrib-concat');
	grunt.loadNpmTasks('grunt-contrib-copy');
	grunt.loadNpmTasks('grunt-contrib-uglify');
	grunt.loadNpmTasks('grunt-contrib-watch');
	grunt.loadNpmTasks('grunt-sass');

	// 4. Where we tell Grunt what to do when we type "grunt" into the terminal.
	grunt.registerTask('default', ['concat', 'uglify', 'copy:getSCSSFromCSS', 'sass', 'postcss:dist', 'watch']);

};