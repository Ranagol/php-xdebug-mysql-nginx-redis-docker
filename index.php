<?php

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


// USING BLADES****************************************************
use Illuminate\View\Compilers\BladeCompiler;
use Illuminate\Filesystem\Filesystem;

// Set up Blade
$cachePath = __DIR__ . '/resources/views/cache'; // Adjust this to your cache directory
$templatePath = __DIR__ . '/resources/views/templates'; // Adjust this to your template directory
$compiledPath = __DIR__ . '/resources/views/compiled'; // Adjust this to your compiled templates directory

$bladeCompiler = new BladeCompiler(new Filesystem, $cachePath);

// Compile Blade templates
$bladeCompiler->compile($templatePath, $compiledPath);


// Include the compiled template
require_once 'compiled/welcome.blade.php'; // Adjust this to your compiled template path

// Use the template
// echo welcome(['name' => 'John']);


// function renderBlade($template, $data = []) {
//     extract($data);
//     ob_start();
//     require_once "compiled/$template.blade.php";
//     return ob_get_clean();
// }

// // Use the renderBlade function
// echo renderBlade('welcome', ['name' => 'John']);


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
