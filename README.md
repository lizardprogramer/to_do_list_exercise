# To Do List

![Alt text](/public/images/APP2.gif)


## Description:

Simple web app where registered user is able to post tasks to his to-do list. User is able to "check" (if task is completed), edit and delete any task in his/her list. This web app was developed as an excercise for Laravel programming environment. 

## Instalation and usage

### Database
- postgreSQL (v 15.0)
- To use postgreSQL, make sure you install it, setup a database and then add your db credentials(database, username and password) to the .env.example file and rename it to .env
- To use something different, open up config/Database.php and change the default driver.

### Migrations
To create all the nessesary tables and columns, run the following
```
php artisan migrate
```

### Running Then App
Upload the files to your document root, Valet folder or run 
```
php artisan serve
```

## License

[MIT license](https://opensource.org/licenses/MIT).
