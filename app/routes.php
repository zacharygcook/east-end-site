<?php

    // Creating routes

    // Psr-7 Request and Response interfaces
    use Psr\Http\Message\ServerRequestInterface as Request;
    use Psr\Http\Message\ResponseInterface as Response;

    // HOME ROUTE
    // Alternate way we can start doing routes if we want
    // $app->get('/', function (Request $request, Response $response, $args)   {

    //     $vars = [
    //         'page' => [
    //         'title' => 'Welcome - Brand Builders',
    //         'description' => 'Welcome to the official page of Alpha Inc.'
    //         ],
    //     ];
    //     return $this->view->render($response, 'home.twig', $vars);

    // })->setName('home');


    // Docs link to 'groups' doc info - https://www.slimframework.com/docs/objects/router.html#route-groups
    $app->group('/', function () {


        $this->get('designs', function (Request $request, Response $response, $args) {

            $vars = [
                'page' => [
                'title' => 'Products - Brand Builders',
                'description' => 'We offer all of these products!'
                ],
            ];
            return $this->view->render($response, 'designs.twig', $vars);    
        });

        $this->get('', function (Request $request, Response $response, $args) {

            $vars = [
                'page' => [
                'title' => 'Products - Brand Builders',
                'description' => 'We offer all of these products!'
                ],
            ];

            return $this->view->render($response, 'home.twig', $vars);    
        });
    });