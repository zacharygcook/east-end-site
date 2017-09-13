<?php

// Get the container
$container = $app->getContainer();

// Twig view dependency
$container['view'] = function ($c) {

    $cf = $c->get('settings')['view'];
    $view = new \Slim\Views\Twig($cf['path'], $cf['twig']);
    $view->addExtension(new \Slim\Views\TwigExtension(
        $c->router,
        $c->request->getUri()
    ));

    return $view;
};


// $container['mailer'] = function ($container) {
// 	$mailer = new PHPMailer;

// 	$mailer->Host = 'your.host.com';  // your email host, to test I use localhost and check emails using test mail server application (catches all  sent mails)
// 	$mailer->SMTPAuth = true;                 // I set false for localhost
// 	$mailer->SMTPSecure = 'ssl';              // set blank for localhost
// 	$mailer->Port = your host smtp port;                           // 25 for local host
// 	$mailer->Username = 'your@email.address';    // I set sender email in my mailer call
// 	$mailer->Password = 'yourPassword';
// 	$mailer->isHTML(true);

// 	return new \App\Mail\Mailer($container->view, $mailer);
// };