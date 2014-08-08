.PHONY:	install wordpress clean test optimize help

install: clean wordpress tests/.env.php
	git submodule init
	git submodule update
	@echo "\nNOTICE: You may need to configure a MySQL database for your Wordpress installation. Just run:"
	@echo " mysql -u root -p -e 'CREATE DATABASE IF NOT EXISTS example_db;'\n"

wordpress: latest.tar.gz	
	tar -zxvf latest.tar.gz
	rm -rf wordpress/wp-content
	mv wordpress/* ./
	rm -rf latest.tar.gz wordpress license.txt readme.html

latest.tar.gz: 
	curl -O http://wordpress.org/latest.tar.gz

tests/.env.php:
	cp tests/.env.sample.php tests/.env.php

clean: 
	rm -rf wp-admin wp-includes readme.html license.txt wp-activate.php wp-config-sample.php wp-login.php wp-trackback.php wp-blog-header.php wp-cron.php wp-mail.php wp-comments-post.php wp-links-opml.php wp-settings.php wp-load.php wp-signup.php xmlrpc.php index.php
	rm -rf latest.tar.gz wordpress

test:
	codecept run

optimize:
	yuicompressor wp-content/themes/example-theme/assets/vendor/foundation/css/foundation.css -o wp-content/themes/podcast-network/assets/vendor/foundation/css/foundation.css 
	# optipng wp-content/themes/example-theme/assets/img/*.png
	# svgo wp-content/themes/example-theme/assets/img/example.svg

deploy:
	git push production master

help:
	@echo "Makefile usage:"
	@echo " make \t\t Get Wordpress application files"
	@echo " make clean \t Delete Wordpress files"
	@echo " make test \t Run Codeception unit and acceptance tests"
	@echo " make optimize \t Compress CSS assets with YUI Compressor and optimize images"
