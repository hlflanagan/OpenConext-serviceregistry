#!/bin/sh
# Runs the PHP code style fixer on the most important code
PARENT_DIR=$(pwd);
$PARENT_DIR/vendor/bin/php-cs-fixer fix lib
$PARENT_DIR/vendor/bin/php-cs-fixer fix www
$PARENT_DIR/vendor/bin/php-cs-fixer fix templates
