<?php

$x = 4;

//Failed loading /usr/local/lib/php/extensions/no-debug-non-zts-20190902/xdebug.so:  /usr/local/lib/php/extensions/no-debug-non-zts-20190902/xdebug.so: cannot open shared object file: No such file or directory
xdebug_info();

// xdebug_break() : bool
// xdebug_connect_to_client() : bool
// xdebug_is_debugger_active() : bool
// xdebug_notify();

// AUTOLOAD****************************************************
require __DIR__ . '/vendor/autoload.php';

// DOTENV****************************************************
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();
// Use the $_ENV global variable to access things from .env file
echo $_ENV['DB_CONNECTION'];



// DEBUGBAR****************************************************
use DebugBar\StandardDebugBar;
$debugbar = new StandardDebugBar();
$debugbarRenderer = $debugbar->getJavascriptRenderer();

$debugbar["messages"]->addMessage("hello world!");

// GUZZLE****************************************************

use GuzzleHttp\Client;

$client = new Client([
    'base_uri' => 'https://api.chucknorris.io/jokes/random',
    'timeout'  => 2.0,
]);

$response = $client->request('GET');
// var_dump(json_decode($response->getBody(), true));

// MONOLOG****************************************************
use Monolog\Level;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

// create a log channel
$log = new Logger('name');
$log->pushHandler(new StreamHandler('storage/logs/logs.log', Level::Warning));


// add records to the log
$log->warning('Foo');
$log->error('Bar');





// ROUTER****************************************************
// Create Router instance
$router = new \Bramus\Router\Router();
// Custom 404 Handler
$router->set404(function () {
    header($_SERVER['SERVER_PROTOCOL'] . ' 404 Not Found');
    echo '404, route not found!';
});

// Static route: / (homepage)
$router->get('/', function () {
    echo 'Homepage';
});


// Run it!
$router->run();

// ELOQUENT****************************************************

use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule;

$capsule->addConnection([
    'driver'    => $_ENV['DB_CONNECTION'],
    'host'      => $_ENV['DB_HOST'],
    'database'  => $_ENV['DB_DATABASE'],
    'username'  => $_ENV['DB_USERNAME'],
    'password'  => $_ENV['DB_PASSWORD'],
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
]);

// Set the event dispatcher used by Eloquent models... (optional)
use Illuminate\Events\Dispatcher;
use Illuminate\Container\Container;
$capsule->setEventDispatcher(new Dispatcher(new Container));

// Make this Capsule instance available globally via static methods... (optional)
$capsule->setAsGlobal();

// Setup the Eloquent ORM... (optional; unless you've used setEventDispatcher())
$capsule->bootEloquent();

// Capsule::schema()->create('users', function ($table) {
//     $table->increments('id');
//     $table->string('email')->unique();
//     $table->timestamps();
// });

class User extends Illuminate\Database\Eloquent\Model {}

$users = User::all()->toArray();

// var_dump($users);


// TWIG****************************************************
$loader = new \Twig\Loader\FilesystemLoader(__DIR__ . '/resources/views');
$twig = new \Twig\Environment($loader);

echo $twig->render('hello.twig', ['name' => 'John Doe']);


?>



<!-- HTML ****************************************************** -->
<html>
<head>
    <?php echo $debugbarRenderer->renderHead() ?>
</head>
<body>
    ...
    <?php echo $debugbarRenderer->render() ?>
</body>
</html>
