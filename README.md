# Cv generator and collector

You can easaly create you're cv, edit it and store it, as well as push tje button 'view' to see print preview in a nice cv template.

## Steps to get this project running locally on you're machine:

### 1. Clone GitHub repo using the repository url.

Find a directory (folder)on your computer where you want to store the project. I make use of Laragon, so all my projects are inside a folder called www/, that is where I run the following command, which will pull the project from github and create a copy of it on my local computer at the “www” directory.

`git clone https://github.com/janis-j/cv-generator-collector.git`

To get the link to the repo, just visit the github page and click on the green “clone or download” button on the right hand side. This will reveal a url that you will replace in the Repository_url part of the snippet above.

### 2. cd into your project

To execute the rest of the commands, you will need to be inside that project . Type cd projectName to move to the working location of the project file we just created.

### 3. Install Composer Dependencies

Running composer, checks the composer.json file which is submitted to the github repo and lists all of the composer (PHP) packages that your repo requires.

`composer install`

### 4. Install NPM Dependencies

Just like step 4, where we installed the composer PHP packages, installing the Javascript (or Node) packages is required. All packages that a repo requires is listed in the packages.json file which is submitted to the github repo.

`npm install`

### 5. Create a copy of your .env file

`.env` files are not committed to source control for security reasons. But there is a `.env.example` which is a template of the `.env` file that the project have. So we will make a copy of the `.env.example` file and create a `.env` file from it.

`cp .env.example .env`

### 6. Generate an app encryption key

Every laravel project requires an app encryption key which is generally randomly generated and stored in your .env file. The app will use this encryption key to encode various elements of your application from cookies to password hashes and more.

`php artisan key:generate`

### 7. Create an empty database for our application

Create an empty database for your project, your database name should correspond with your project name.

### 8. Add database information to allow Laravel to connect to the database.

In the `.env` file fill in the `DB_HOST`, `DB_PORT`, `DB_DATABASE`, `DB_USERNAME`, and `DB_PASSWORD` options to match the details of the database you just created. This will allow us to run migrations and seed the database if there is any table to seed.

### 9. Migrate the database

After filling the details in the `.env` type this

`php artisan migrate`

### 10. Run you're local server

`php artisan serve`

And you are good to go!
