<?php

// AUTOLOAD****************************************************
require __DIR__ . '/vendor/autoload.php';



// DEBUGBAR****************************************************
use DebugBar\StandardDebugBar;
$debugbar = new StandardDebugBar();
$debugbarRenderer = $debugbar->getJavascriptRenderer();

$debugbar["messages"]->addMessage("hello world!");



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
