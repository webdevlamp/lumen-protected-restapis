# Lumen Protected Rest APIs

This is simple example of how to develop protected restapis using lumen micro framework.
It contains TodosController (CRUD operation), UsersController (Aunthentication).

# Steps to get it working

1. Clone lumen-protected-restapis repository into your web directory
2. Change directory to lumen-protected-restapis and rename example.env to .env
3. Adjust .env file to point to correct database and related credentials
4. Go to command line and run command "php -S localhost:8000 -t public" you will get your application served at port 8000
5. Manually make an entry into users table by specifying username, email, password etc. This is going to be used to perform first time login from postman or any other tool that you use to test. Focust was not to provide the complete user management, please take note of it.
6. Use Postman or any other requesting tool that you like, try out various Api endpoints like login, create todo, get todo(s), update todo, delete todo etc.

GET http://localhost:8000/api/login/?email=youremail@test.com&password=xxxxxxxx

In response you will receive success message along with api_token, which you will need to use with further requests to perform CRUD operations on todos.
Like:
POST http://localhost:8000/api/todo
Request Header: 
  Content-Type = application/json
  Authorization = "bearer [token_received_in_response_from_login_api_request]"
Request Body: 
  {
    "todo": "example todo title",
    "user_id": 1,
    "category": "example general category",
    "description": "exampel my todo description"
  }
Response:
  {
    "status":"success"
  }

Enjoy integrating!

# Lumen PHP Framework

[![Build Status](https://travis-ci.org/laravel/lumen-framework.svg)](https://travis-ci.org/laravel/lumen-framework)
[![Total Downloads](https://img.shields.io/packagist/dt/laravel/framework)](https://packagist.org/packages/laravel/lumen-framework)
[![Latest Stable Version](https://img.shields.io/packagist/v/laravel/framework)](https://packagist.org/packages/laravel/lumen-framework)
[![License](https://img.shields.io/packagist/l/laravel/framework)](https://packagist.org/packages/laravel/lumen-framework)

Laravel Lumen is a stunningly fast PHP micro-framework for building web applications with expressive, elegant syntax. We believe development must be an enjoyable, creative experience to be truly fulfilling. Lumen attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as routing, database abstraction, queueing, and caching.

## Official Documentation

Documentation for the framework can be found on the [Lumen website](https://lumen.laravel.com/docs).

## Contributing

Thank you for considering contributing to Lumen! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Security Vulnerabilities

If you discover a security vulnerability within Lumen, please send an e-mail to Taylor Otwell at taylor@laravel.com. All security vulnerabilities will be promptly addressed.

## License

The Lumen framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
