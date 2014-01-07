module.exports = function(grunt) {

  // Project configuration
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),
    cssmin: {
      options: {
        banner: "/* dncake css */"
      },
      minify: {
        src: 'app/webroot/css/darkneuss.css',
        dest: 'app/webroot/css/min/darkneuss.min.css'
      }
    }
  });

  // Load the plugin that provides the "cssmin" task.
  grunt.loadNpmTasks('grunt-contrib-cssmin');
  
  // Default tasks
  grunt.registerTask('default', ['cssmin']);

}