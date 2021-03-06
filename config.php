<?php
Class Config
{
    # App name
    public $app_name = 'Emailer Manager';

    # Initial content to be displayed
    public $default_landing_path = 'videospot';

    # DB
    public $host = 'localhost';
    public $user_name = 'local';
    public $password = 'SI@local';
    public $database = 'emailer_manager';

    # Right click bahaviour
    public $right_click = 1; # disables right-click event on the site if set to 0. default = 1

    # Template
    public $navigation_links = 'includes/links.php'; # this is relative within the actual template's root directory
    public $active_template = 'templata_basic';

    # Email
    public $email_to = 'somebody@somewhere.com';

    # Resources
    public $templata_content_directory = 'content';
    public $templata_images_directory = 'images';
    public $templata_libraries = 'libs';
    public $templata_jquey_path = 'libs/js/jquery';

}

# define application root
define('APP_ROOT_DIR', dirname(__FILE__));
