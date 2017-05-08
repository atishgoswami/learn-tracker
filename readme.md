# 1: Getting the Code

To get the code on to your local system, you can either:

 **1. Clone it from GITHUB** 
 
 You can directly clone the project repository from GITHUB using GIT

    git clone https://github.com/atishgoswami/notes

 
 **2. Download a ZIP archive**

![GIThub Download Link](https://i.imgur.com/jdfr287.png)

Once the zip archive is download you will have to extract it to your WWW htdocs folder of your (LAMP/MAMP/WAMP) setup.

# 2: Installing Composer

Once you have the project code on to your local machine, we now need to install the laravel dependencies (vendor directory) in order for Laravel framework to work.

To do that we need `composer`installed in your local machine. If you have it that's well and good, if you don't you can follow the setup instruction mentioned [here](https://getcomposer.org/download/).

To find you system specific setting please see this [link](https://getcomposer.org/doc/00-intro.md).

# 3: Install Laravel Dependencies with Composer

Ok, once we got the composer installed and running, now we need to install the Laravel dependencies, which will generate the `vendor` folder.

To do that, find navigate to the project root folder, example:

    cd /var/www/html/notes

Now run `composer install`command:

    composer install // If you have composer installed globally
    
    php composer.phar install // If you have composer installed locally

You should get a similar output once the installation starts
![Composer Install Start](https://i.imgur.com/dLldIAH.png)

Once the installation completes it should output something like this:

![Composer Install Complete](https://i.imgur.com/Y0bxad9.png)

# 4: Configuring the database

Ok, now that the application and its dependencies are all installed, we need to configure a few things before we could fire up the application:

 **1. Configure the application database**

We need a MySQL database for the application to work, so first we create a new databases let say the name be `notes`

We need to connect to MySQL server on our local machine a create a database:

    mysql> create database notes;

Once the database is created successfully we need to connect the application to newly created database. To do we navigation to the root folder of the project and create a `.env` file.

    cd /var/www/html/notes
    
 Now we copy the `.env.example` to rename to  `.env` 

    cp .env.example .env

Next we add the database connection details in the file next to MySQL connection variables

    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=notes
    DB_USERNAME=root
    DB_PASSWORD=secret
   
 Changes the database connection values according to your MySQL connection configuration. Save the file and close it

 **2. Create application cipher key**

Laravel required an app key to perform hashing, which is used in our application for password hashing.
To generate a app key we need to run the following command:

    php artisan key:generate

> Make sure that PHP is available globally on your system, if not then you might need to provide the full executable path for the PHP binary

![Key Generate](https://i.imgur.com/dhWQDL1.png)


 **3. Running Database Migrations**
Once we have the database configured and app key created we can now run migrations which will create all the tables needed by the application inside the database connected.

    php artisan migrate

Once the command ran successfully you should see the following output.

![Laravel Migrate Command](https://i.imgur.com/7mPwjyt.png)

After this you can confirm if the tables got successfully created to the connected database by connecting to MySQL server and switching to the database and checking for its tables.

    mysql> use notes;
    Database changed
    mysql> show tables;
    +------------------------------+
    | Tables_in_notes              |
    +------------------------------+
    | migrations                   |
    | notes                        |
    | users                        |
    +------------------------------+
    3 rows in set (0.00 sec)
   
   You should see something similar.

# 5: Launching the application

**Finally**, we can now local the application. You can use the PHP internally webserver to do so. To start the application PHP server run the following command:

    php artisan serve

You should get a url as an output like `http://127.0.0.1:8000`paste that in your browser 
![Web Server](https://i.imgur.com/i39wCOO.png)

If everything configured properly you should see the home page.

![App Home Page](https://i.imgur.com/pAuhJEp.png)

# 6: Register User

Now you need to register a user to get started. You can navigate to `http://127.0.0.1:8000/register` or you can click the `REGISTER` link on the top right corner of the homepage.

![REGISTER FORM](https://i.imgur.com/uspbl9Q.png)

Fill up the information needed and click "Register", you should be redirected to the dashboard page of the logged in user

![Dashboard](https://i.imgur.com/zX7mTDN.png)
# 7: Adding a note

Click on `Add New Note` button to open the notes add form

![Note Add](https://i.imgur.com/fhApIHn.png)

Fill up the form  and hit `Save` you should be navigated back to the dashboard and it should show a newly added not on the top.

![enter image description here](https://i.imgur.com/6lViXRd.png)

Each note as its own `EDIT` and `DELETE` buttons incase you need to delete or update them.

