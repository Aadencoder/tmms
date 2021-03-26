
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
>~php artisan db:seed <br />
<br />

## 5. Serve application
>~php artisan serve <br />




