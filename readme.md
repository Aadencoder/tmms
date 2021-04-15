
# About TMMS

TMMS is a Teacher Module Management System made with laravel and bootstrap.
<br />
>Installation at the bottom 
<br />

<br />
## Screenshots of this app

<p>
  <a href="https://i.ibb.co/X2KjCvY/table.png"><img src="https://i.ibb.co/X2KjCvY/table.png" target="_blank" alt="Capture" border="0" /></a>
  
  <a href="https://i.ibb.co/qF8fDZ4/create.png"><img src="https://i.ibb.co/qF8fDZ4/create.png" target="_blank" alt="Screenshot-23"
      border="0" /></a>


  
  <a href="https://i.ibb.co/smFmBLd/csv.png"><img src="https://i.ibb.co/smFmBLd/csv.png" target="_blank" alt="Screenshot-23"
      border="0" /></a>
 
</p>

## Installations
<br />
## If you receive and error while installation below::

>run composer update instead of composer install 
>also run php artisan key:generate

## 1. Clone the repository
>https://github.com/Aadencoder/tmms.git

<br />

## 2. Set the basic config

>Edit example.env to .env <br />
>Put your db username and password here with DB_DATABASE=nepestate. <br />
''' <br />
    DB_CONNECTION=mysql <br />
    DB_HOST=127.0.0.1 <br />
    DB_PORT=3306 <br /> 
    DB_DATABASE=tmms <br />
    DB_USERNAME=root <br />
    DB_PASSWORD= <br />
'''
<br />

## 3. Install Dependencies
>~composer install  <br />
>~npm install
>~npm run dev
<br />

## 4. Migrate Database
>~php artisan migrate:fresh <br />
<br />

## 5. Serve application
>~php artisan serve <br />



## Docker Installation

* Make a copy of the .env.example file that Laravel includes by default and name the copy .env, which is the file Laravel expects to define its environment:

    - `cp .env.example .env`

* Open the file using nano or your text editor of choice:

    - `nano .env`


DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=mob
DB_USERNAME=root
DB_PASSWORD=

* Start all of the containers, create the volumes, and set up and connect the networks:

    - `docker-compose up -d`

* Once the process is complete, use the following command to list all of the running containers:
    - `docker ps`

    Output
CONTAINER ID        NAMES               IMAGE                             STATUS              PORTS
c31b7b3251e0        db                  mysql:5.7.22                      Up 2 seconds        0.0.0.0:3306->3306/tcp
ed5a69704580        app                 digitalocean.com/php              Up 2 seconds        9000/tcp
5ce4ee31d7c0        webserver           nginx:alpine                      Up 2 seconds        0.0.0.0:80->80/tcp, 0.0.0.0:443->443/tcp

* Generate a key and copy it to your .env file, ensuring that your user sessions and encrypted data remain secure
    
    - `docker-compose exec app php artisan key:generate`

* cache these settings into a file
    - `docker-compose exec app php artisan config:cache`


* As a final step,   visit http://your_server_ip in the browser. You will see the  home page for your Laravel application:

## Creating a User for MySQL

* To create a new user, execute an interactive bash shell on the db container with docker-compose exec:
- `docker-compose exec db bash`

* Inside the container, log into the MySQL root administrative account:
- `mysql -u root -p`

* You will be prompted for the password you set for the MySQL root account during installation in your docker-compose file.

* Run the show databases command to check for existing databases:
-`mysql>show databases;`

* Next, create the user account that will be allowed to access this database

- `GRANT ALL ON database.* TO 'laraveluser'@'%' IDENTIFIED BY 'your_laravel_db_password';` 

* Flush the privileges to notify the MySQL server of the changes
 - `FLUSH PRIVILEGES;`

 * Exit MySQL:
 - `Exit;`

 * Finally, exit the container:
 -`exit`


 * First, test the connection to MySQL by running the Laravel artisan migrate command, which creates a migrations table in the database from inside the container:

 - `docker-compose exec app php artisan migrate`

 * At this point our table is still empty. We need to run the db:seed command to seed the database with our sample places:
 - `docker-compose exec app php artisan db:seed`



