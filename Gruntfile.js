module.exports = function(grunt) {
    grunt.initConfig({
           less: {
              development: {
                options: {
                },
                files: {
                    "style.css": "less/style.less"
                }
              }
            },
            watch: {
                styles: {
                    options: {
                        spawn: false
                    },
                    files: [ "less/*.less"],
                    tasks: [ "less" ]
                }
            }
    });

    grunt.loadNpmTasks('grunt-contrib-less');
    grunt.loadNpmTasks('grunt-contrib-watch');

    // the default task can be run just by typing "grunt" on the command line
    grunt.registerTask('default', ['watch']);
};