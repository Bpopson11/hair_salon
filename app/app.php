<?php
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Stylist.php";
    require_once __DIR__."/../src/Client.php";

    $app = new Silex\Application();

    $server = 'mysql:host=localhost;dbname=hair_salon';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);


  	use Symfony\Component\HttpFoundation\Request;
  	Request::enableHttpMethodParameterOverride();

    $app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/../views'
    ));

	 $app['debug'] = true;

    //Home page to show stylists

    $app->get("/", function() use ($app)
  	{
    		return $app['twig']->render('index.html.twig', array('stylists' => Stylist::getAll()));
  	});

    $app->post("/stylists", function() use ($app)
  	{
    		$stylist = new Stylist($_POST['name'], $_POST['specialty'], $_POST['email']);
    		$stylist->save();
    		return $app['twig']->render('index.html.twig', array('stylists' => Stylist::getAll()));
  	});

    $app->post("/delete_all_stylists", function() use ($app)
    {
        Stylist::deleteAll();
        return $app['twig']->render('index.html.twig', array('stylists' => null));
    });

    //clients

    $app->get("/clients", function() use ($app)
    {
        return $app['twig']->render('client.html.twig', array('clients' => Client::getAll()));
    });

    $app->post("/clients", function() use ($app)
    {
        $client = new Client($_POST['name']);
        $client->save();
        return $app['twig']->render('client.html.twig', array('clients' => Client::getAll()));
    });

    $app->post("/delete_all_clients", function() use ($app)
    {
        Client::deleteAll();
        return $app['twig']->render('client.html.twig', array('clients' => null));
    });


      return $app;


?>
