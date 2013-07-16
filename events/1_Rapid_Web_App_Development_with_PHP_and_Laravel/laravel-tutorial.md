# Rapid Web App Development with PHP and Laravel

[Laravel](http://laravel.com/) is a great PHP framework that has gained a strong following in the PHP community. This tutorial will walk you through everything you need to get started with Laravel. We will be building a todo list sample app for illustration purposes.

## Prerequisites

You should have a web server (Apache, Nginx, etc), MySQL, and  PHP installed and configured on your machine. If you don't, try these bundles:

- OS X: [MAMP](http://www.mamp.info/)
- Windows: [XAMPP](http://www.apachefriends.org/en/xampp.html)

You will also need a PHP package manager called composer. Get it [here](http://getcomposer.org/download/).

We need a database and a database user, so have those ready. Call your database tododb and your user todouser.

## 1. Installing Laravel

With composer, this step is super simple. Open a console window in the folder where you want to create your project, then run the following command:

```composer create-project laravel/laravel todoapp --prefer-dist```

This step will create your new project directory, download the Laravel framework, and install all the necessary dependencies.

## 2. Introducing Artisan - Laravel's CLI

Artisan is the name of the command-line interface included with Laravel. It provides a number of helpful commands for your use while developing your application.

List the available commands using: ```php artisan list```

## 3. Install Laravel 4 Generators

Jeffrey Way is a huge Laravel fan and he has written some great custom artisan commands that perform code generation tasks. These will help us in building our todo app. Go [here](https://github.com/JeffreyWay/Laravel-4-Generators) for instructions on installing and configuring the generators.

## 4. App Directory Tour

All your code will go in the ```app``` directory. Let's take a quick look at what we find here.

- /commands: Any [custom artisan commands](http://laravel.com/docs/commands#building-a-command) you write
- /config: Configuration files
- /controllers: Classes organizing route behaviors
- /database: DB Migrations and seeding
- /lang: Localization files
- /models: Classes representing your DB tables
- /start: Laravel startup files
- /storage: cache, logs, etc
- /tests: Tests
- /views: Views
- filters.php: Request lifecycle manipulation
- routes.php: Url path mapping

## 5. Configure Laravel DB Connection

Open the ```app/config/database.php``` file. Look at the connections array and edit the 'mysql' section to match our tododb and todouser that you created earlier.

Reading Bonus: [Environments](http://laravel.com/docs/configuration#environment-configuration)

## 6. Intro to Routes and Views

Routes let you perform actions based on the url requested by the user. Let's look at the out-of-the box route in ```app/routes.php```.

```
Route::get('/', function()
{
	return View::make('hello');
});
```

Laravel's syntax is pretty easy to read so we can clearly see that this route maps to a get request at the site root. When that request comes across, a function is executed that returns a view called 'hello'.

We can located the hello view here: ```app/views/hello.php``` Taking a look inside, we can see it is just a plain HTML file. Laravel includes a templating engine called Blade. All Blade templates will end with '.blade.php'.

Read more about [Routing with Parameters](http://laravel.com/docs/routing#route-parameters), and [Blade Templating](http://laravel.com/docs/templates#other-blade-control-structures).

Here is where we pick up the pace…

## It's Go Time!

Get ready because we are about to use the awesome power of the Laravel Generators to create the entire skeleton of our app in only a couple commands. It's quite mind blowing.

```php artisan generate:scaffold todo --fields="name:string, completed:boolean"```

Whoa, let's take a look at what that did.

We need to clean up a couple things. First, we need to default completed to false in the db migration.

Change: ```$table->boolean('completed');``` to ```$table->boolean('completed')->default(false);``` in the file generated under ```app/migrations```.

Next, we need to remove the validation rule on the completed field from the model. Find the ```app/models/Todo.php``` file and remove the line that says: ```'completed' => 'required'```.

Ok, now we need to migrate our database. Run the following command:

```php artisan migrate```

Migrations are powerful and provide a great way to version control changes to your database. Read more [here](http://laravel.com/docs/migrations).

Ok, go check out your new web app @ [http://localhost/todos](http://localhost/todos)

## Homework

- Add a 'Clear Completed' button to the ```todos/index.blade.php``` view along with the associated route and controller action.
- Add a 'Mark Completed' button next to each todo in the ```todos/index.blade.php``` view along with the associated route and controller action.
- Change the output of 'completed' to a nice icon in the ```todos/index.blade.php``` view.
- Add [pagination](http://laravel.com/docs/pagination) of todo items in the ```todos/index.blade.php``` view.


