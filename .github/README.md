# Lasso Wordpress Theme

Lasso is an ecommerce wordpress theme I developed as a way to get more practice working with wordpress. Built with html, css, jquery, and php. All content is editable with the wordpress customiser.

## Homepage 

I wanted to make a homepage that looks professional but not cookie cutter. I wanted it to have dynamic content and parallax effects without that disorientation feeling of objects flying all over the place. 

https://github.com/jstnlawson/lasso_wp/assets/121266226/b763a14f-ef26-42ce-b2fc-ad7dc469a287

## Product Page

I wanted to find a fun way to display a product and I love the cube swiper from swiper.js. The biggest challenge was incorperating my designs with the Woo-Commerce Plugin and swiper.js.

https://github.com/jstnlawson/lasso_wp/assets/121266226/941fd16b-6be6-49f1-8d6a-460398703e5d

## About Page

Fairly boiler plate stuff here but I did enjoy making it into sort of an ecommerce parody 😆


<img width="887" alt="lasso__about-page" src="https://github.com/jstnlawson/lasso_wp/assets/121266226/a9d2dfd3-5322-4392-8be5-e921884d3cab">



## Technology



**General Tooling**
* [Docker](https://www.docker.com/)
* [Git](https://git-scm.com/)
* [Github](https://github.com/)
* [PHPCS](https://github.com/squizlabs/PHP_CodeSniffer)
* [EditorConfig](https://editorconfig.org/)

**WordPress**

**Front-End**

## Initial Setup

**Helpful Hints Before You Start**

Setup an alias for Docker WP CLI commands to save a bunch of keystrokes. The preferred alias is `wpcli` and is used throughout the documentation below.

`alias wpcli="docker exec wpcli wp"`

**Getting Started**

1. Clone the repository from GitHub
1. Copy `sample.env` file to `.env`

**Configuration**

1. Open the `.env` file in the root directory
1. Confirm the environmental variables for your local development environment
   * `COMPOSE_PROJECT_NAME`
     * Defines the name of the project to be used for the Docker container names
   * `COMPOSE_WP_IMAGE`
     * Defines the WordPress Docker image to be used
     * Consult the [WordPress Docker Hub Documentation](https://hub.docker.com/_/wordpress) for a full list of supported tags
   * `COMPOSE_DB_IMAGE`
     * Defines the MySQL Docker image to be used
     * Consult the [MySQL Docker Hub Documentation](https://hub.docker.com/_/mysql) for a full list of supported tags
   * `COMPOSE_DB_PLATFORM`
     * Defines the platform architecture that MySQL will run on
     * Mac Silicon chips require `linux/amd64` at this time
   * `COMPOSE_DB_NAME`
     * Defines the database name for local development
     * Preferred naming convention includes a `wp_` prefix followed by a unique project name
   * `COMPOSE_DB_USER`
     * Defines the username for the database used for local development
     * Preferred username is `admin`
   * `COMPOSE_DB_PASS`
     * Defines the password for the database used for local development
     * Preferred username is `secret`
1. Confirm the the Docker Configuration is reading environment variables using `docker compose convert`
1. Start Docker using `docker compose up -d`
1. Go fill up your water bottle. If you run the next commands before docker is done getting things set up, things won't work. Seriously. Take a five minute break.
1. Confirm WP CLI is operational using `wpcli --info`

**Install WordPress Core**

1. Install WordPress Core
   * Run `wpcli core install --url=localhost:9000 --title=Example --admin_user=admin --admin_email=wpadmin@little-fork.com --prompt=admin_password --skip-email`
   * Install Options should be set to appropriate values for the new project
   * Consult the [WP CLI Documentation](https://developer.wordpress.org/cli/commands/core/install/) for a full list of installation options
1. Visit the [WordPress Admin Panel](http://localhost:9000/wp-admin) in the browser and login with the admin credentials

**Import the Database**

**Install & Activate Plugins**

Note: 3rd Party Plugins are not stored in source control.

**Install & Activate Themes**

1. If the Lasso Custom Theme is not activated on install, visit the theme page in the WordPress dasboard and activate it.

## Theme Development

**Anatomy of the Theme**

The theme makes heavy use of folders & files to break code into smaller more reusable bits.

Folder Contents:
* `acf-json/` contains json file specifiations for fields used by Advanced Custom Fields.
* `assets/brand/` contains brand specific assets not stored in the WordPress Media Library.
* `assets/css/` contains the source and compiled CSS for the theme.
* `assets/fonts/` contains all font files for the theme.
* `assets/images/` contains theme images not stored in the WordPress Media Library.
* `assets/js/` contains the source and compiled JavaScript for the theme.
* `inc/` contains all necessary theme php which is then loaded by the functions.php file
* `templates-parts` contains php that renders the view layer of the theme.

Important Files:
* `.stylelintignore` contains a list of files/folders to ignore when linting CSS
* `.stylelintrc.json` contains the rule configuration that Style Lint uses when linting CSS
* `footer.php` contains the closing html elements used by all pages on the website.
* `functions.php` contains php code that includes php from the `inc` folder
* `header.php` contains the opening html elements used by all pages on the website. 
* `index.php` contains the general layout used by all pages of on the website. It also includedes routing for loading specific `template-parts`.
* `package.json` contains node package dependencies as well as build commands for the front-end of the theme.
* `postcss.config.js` contains the configuration for PostCSS compilation.

**Building Front-End Assets**

1. Switch the theme directory
1. Run `npm run lint:css` to lint CSS using Style Lint.
1. Run `npm run compile:css` to compile styles using PostCSS.

**Managing Git**

Nearly the entire `app` directory is ignored by git so that Wordpress core files aren't stored in source control. After plugins and themes are installed it's recommended to modify the `.gitignore` to declare specific themes and plugins for inclusion in source control. Additionally any other files that are added to the `app` that should be stored in source control (like favicons) should be add to the `.gitignore` file.

Example:

```
# Ignore most everything in the site
app/*
!app/wp-content/
app/wp-content/*
!app/wp-content/mu-plugins/
app/wp-content/mu-plugins/*
!app/wp-content/plugins/
app/wp-content/plugins/*
!app/wp-content/uploads/
app/wp-content/uploads/*
!app/wp-content/themes/
app/wp-content/themes/*

# Keep Custom Plugins
!app/wp-content/plugins/custom-plugin

# Keep Custom Themes
!app/wp-content/themes/custom-theme
!app/wp-content/themes/custom-theme-child
```

## Deployments

**Deploying to Staging**

TODO

**Deploying to Production**

TODO

