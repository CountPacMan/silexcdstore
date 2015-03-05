<?php
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/cd.php";

    session_start();
    if (empty($_SESSION['cds'])) {
        $_SESSION['cds'] = [];
        require_once __DIR__."/../src/cdData.php";
    }

    $app = new Silex\Application();
    // Registerung twig in Silex
    $app->register(new Silex\Provider\TwigServiceProvider(), array('twig.path' => __DIR__.'/../views'));

    $app->get("/", function() use ($app) {
       return $app['twig']->render('cdList.twig', array('cds' => CD::getCDs()));
    });

    $app->get("/cdInput", function() use ($app) {
        return $app['twig']->render('cdInput.twig');
    });

    $app->post("/cdInputed", function() use ($app) {
        $newCD = new CD($_POST['title'], $_POST['artist'], $_POST['cover_art'], $_POST['price']);
        $newCD->save();
        return $app['twig']->render('cdInputed.twig', array('album' => $newCD));;
    });

    $app->get("/searchbyartist", function() use ($app) {
        return $app['twig']->render('search.twig');
    });

    return $app;
?>
