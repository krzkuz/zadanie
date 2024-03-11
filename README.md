## How to run this project locally

- first you need to git clone repository or download all files
- create new database named "zadanie_rekrutacyjne" in phpMyAdmin (I am using xampp to do this)
- inside of project main folder change file name from ".env.example" to ".env"
- run command "composer install" inside of project main folder
- in the same folder run command "php artisan init:database". This command will create all necessary database tables and seed them with 30 authors and 200 articles (you can change that in file DatabaseSeeder.php)
- in the same folder run command "php artisan key:generate"
- lastly run command "php artisan serve" to run project locally

## Teting API endpoints

To test those endpoints you can just paste urls provided below into your searchbar, or use program like Postman. 

- get article by id http://127.0.0.1:8000/api/article/{requestedId}
- get all articles by author id http://127.0.0.1:8000/api/author-articles/{requsetedAuthorId}
- get 3 top authors from last week http://127.0.0.1:8000/api/top-authors


## Full CRUD functionality for both entities with simple HTML templates

You can test it at url http://127.0.0.1:8000
