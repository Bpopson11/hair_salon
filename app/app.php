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

    $app->get("/stylist/update/{id}", function($id) use ($app)
  	{
        $stylist = Stylist::findStylist($id);
    		return $app['twig']->render('stylist_update.html.twig', array('stylist' => $stylist));
  	});

    $app->post("/stylist/update/{id}", function($id) use ($app)
    {
      $stylist = Stylist::findStylist($id);
      $stylist->updateStylistName($_POST['name']);
      $stylist->updateStylistSpecialty($_POST['specialty']);
      $stylist->updateStylistEmail($_POST['email']);
      return $app['twig']->render('stylist_update.html.twig', array('stylist' => $stylist));
    });

    $app->post("/stylist/delete/{id}", function($id) use ($app)
    {
      $stylist = Stylist::findStylist($id);
      $stylist->deleteStylist();
      return $app['twig']->render('index.html.twig', array('stylist' => $stylist));
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

    $app->post("/clients", function() use ($app) {
        $name = $_POST['name'];
        $stylist_id = $_POST['stylist_id'];
        $client = new Client($name, $id = null, $stylist_id);
        $client->save();
        $stylist = Stylist::findStylist($stylist_id);
        return $app['twig']->render('client.html.twig', array('stylist' => $stylist, 'clients' => $stylist->getClients()));
      });

    $app->post("/delete_all_clients", function() use ($app)
    {
        Client::deleteAll();
        return $app['twig']->render('index.html.twig', array('stylists' => Stylist::getAll()));
    });

    //stylist client ineraction

    $app->get("/stylists/{id}", function($id) use ($app)
    {
        $stylist = Stylist::findStylist($id);
        return $app['twig']->render('stylist.html.twig', array('stylist' => $stylist, 'clients' => $stylist->getClients()));
    });


      return $app;


?>
