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
var_dump(json_decode($response->getBody(), true));




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
