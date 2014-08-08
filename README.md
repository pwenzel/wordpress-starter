# Wordpress Starter

* Uses a Makefile for installation and other tasks. 
* Includes starter `.gitignore`. Does not include Wordpress core files in project.
* Includes Codeception bootstrap and some helpers
* Uses Bower to import front-end dependencies, such as Zurb Foundation
* Uses TGM Plugin Activation to import required plugins
* Does not use Composer, sorry.

## Development

### Grab Source Code

	git clone http://path/to/example.git ~/Sites/example
	cd ~/Sites/example
	make

# Typical Setup 

* Create a development domain, e.g. http://example.dev
* Point your Apache instance to ~/Sites/example
* Create a MySQL database for your Wordpress installation
* Run http://example.dev in your browser
* Perform the guided Wordpress setup
* Activate your theme
* Activate your plugins and any remaining configuration

Add this to your wp-config.php

	define('WP_DEBUG', true);
	define('WP_HOME','http://example.dev');
	define('WP_SITEURL','http://example.dev');

Optional: Update URLs in the database with the RELOCATE method:

	define('RELOCATE',true);	