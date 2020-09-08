Shopping Cart 
===
Shopping Cart is a  solution that look into many Items and display results from 
all the available Categories and Brands, add Shopping Cart items and save as order
 
## Requirements
The project is based on the version `7.x` of the Laravel framework, 
so make sure that you are satisfying the requirements
listed in the [framework's documentation](https://laravel.com/docs/6.x#server-requirements)

## Installation
Run the following commands in order to get a ready to use clone of the application:

1. Clone the repository 
```bash
git clone  https://github.com/Abdallah-Ashraf/ShoppingCart.git
```
2. Get into the directory 
```bash
cd ShoppingCart
```
3. Check that your environment satisfy the requirements 
```bash
composer check-platform-reqs
```
4. Install composer dependencies 
```bash
composer install
```
5. Setup your envorinment 
```bash
cp .env.example .env
```
6. Generate app secret key 
```bash
php artisan key:generate
```
7. import Database
```bash
generate Mysql Database name="shopping_cart" user="root" password="" import shopping_cart.sql file from repository
``` 
feel free to change Database name or user or password  but ensure you add correct value in .env file

Now you have a ready to use clone of the application.

## How To?



### Start The Development Server
In order to run the development server you need to run the following command:
```bash
php artisan serve
```

### Use The Solution

You can use Example
simply make a get request to the following :
```
http://127.0.0.1:8000/
```


