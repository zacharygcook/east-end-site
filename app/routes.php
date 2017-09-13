<?php

    // Creating routes

    // Psr-7 Request and Response interfaces
    use Psr\Http\Message\ServerRequestInterface as Request;
    use Psr\Http\Message\ResponseInterface as Response;

    use PHPMailer\PHPMailer\PHPMailer;

    // HOME ROUTE
    // Alternate way we can start doing routes if we want
    // $app->get('/', function (Request $request, Response $response, $args)   {

    //     $vars = [
    //         'page' => [
    //         'title' => 'Welcome - East End Ink',
    //         'description' => 'Welcome to the official page of Alpha Inc.'
    //         ],
    //     ];
    //     return $this->view->render($response, 'home.twig', $vars);

    // })->setName('home');


    // Docs link to 'groups' doc info - https://www.slimframework.com/docs/objects/router.html#route-groups
    $app->group('/', function () {

        $this->get('', function (Request $request, Response $response, $args) {

            $vars = [
                'page' => [
                'title' => 'East End Ink',
                'description' => 'Best apparel company in Austin'
                ],
            ];

            return $this->view->render($response, 'home.twig', $vars);    
        });
        $this->get('index', function (Request $request, Response $response, $args) {

            $vars = [
                'page' => [
                'title' => 'East End Ink',
                'description' => 'Best apparel company in Austin'
                ],
            ];

            return $this->view->render($response, 'home.twig', $vars);    
        });

        $this->get('products', function (Request $request, Response $response, $args) {

            $vars = [
                'page' => [
                'title' => 'East End Ink',
                'description' => 'Best apparel company in Austin'
                ],
            ];
            return $this->view->render($response, 'products.twig', $vars);    
        });

        $this->get('services', function (Request $request, Response $response, $args) {

            $vars = [
                'page' => [
                'title' => 'East End Ink',
                'description' => 'Best apparel company in Austin'
                ],
            ];
            return $this->view->render($response, 'services.twig', $vars);    
        });

        $this->get('designs', function (Request $request, Response $response, $args) {

            $vars = [
                'page' => [
                'title' => 'East End Ink',
                'description' => 'Best apparel company in Austin'
                ],
            ];
            return $this->view->render($response, 'designs.twig', $vars);    
        });

        $this->get('quote-request', function (Request $request, Response $response, $args) {

            $vars = [
                'page' => [
                'title' => 'East End Ink',
                'description' => 'Best apparel company in Austin'
                ],
            ];
            return $this->view->render($response, 'quote-request.twig', $vars);    
        });

        $this->get('email-test', function (Request $request, Response $response, $args) {
            $vars = [
                'page' => [
                'title' => 'East End Ink',
                'description' => 'Best apparel company in Austin'
                ],
            ];

            $mail = new PHPMailer;


            //Server settings
            // $mail->SMTPDebug = 2;                                 // Enable verbose debug output
            // $mail->isSMTP();                                      // Set mailer to use SMTP
            // $mail->Host = 'smtp1.example.com;smtp2.example.com';  // Specify main and backup SMTP servers
            // $mail->SMTPAuth = true;                               // Enable SMTP authentication
            // $mail->Username = 'user@example.com';                 // SMTP username
            // $mail->Password = 'secret';                           // SMTP password
            // $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
            // $mail->Port = 587;                                    // TCP port to connect to

            //Recipients
            $mail->setFrom('from@example.com', 'Mailer');
            $mail->addAddress('zach@zachcookhustles.com', 'Joe User');     // Add a recipient
            $mail->addReplyTo('info@example.com', 'Information');
            $mail->addCC('cc@example.com');
            $mail->addBCC('bcc@example.com');

            //Attachments
            // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
            // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

            // Try to make it faster by not sending via SMTP???
            // Got from this StackOverflow answer:
            // https://stackoverflow.com/questions/27552252/sending-phpmailer-smtp-email-with-gmail-takes-long-time-1-5-seconds
            $mail->IsMail();

            //Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Here is the subject';
            $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            if($mail->send()) {
              echo "Message sent!";
            } else {
              echo "Mailer Error: " . $mail->ErrorInfo;
            }

            return $this->view->render($response, 'quote-request.twig', $vars);          
        });

        $this->post('home-contact-email', function (Request $request, Response $response, $args) {
            $vars = [
                'page' => [
                'title' => 'East End Ink',
                'description' => 'Best apparel company in Austin'
                ],
            ];

            $name = $_POST['name'];
            $email = $_POST['email'];
            $subject = $_POST['subject'];
            $message = $_POST['message'];

            $mail = new PHPMailer;

            //Server settings
            // $mail->SMTPDebug = 2;                                 // Enable verbose debug output
            // $mail->isSMTP();                                      // Set mailer to use SMTP
            // $mail->Host = 'smtp1.example.com;smtp2.example.com';  // Specify main and backup SMTP servers
            // $mail->SMTPAuth = true;                               // Enable SMTP authentication
            // $mail->Username = 'user@example.com';                 // SMTP username
            // $mail->Password = 'secret';                           // SMTP password
            // $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
            // $mail->Port = 587;                                    // TCP port to connect to

            //Recipients
            $mail->setFrom('from@example.com', 'Mailer');
            $mail->addAddress('zach@zachcookhustles.com', 'Joe User');     // Add a recipient
            $mail->addReplyTo('info@example.com', 'Information');
            $mail->addCC('cc@example.com');
            $mail->addBCC('bcc@example.com');

            //Attachments
            // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
            // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

            // Try to make it faster by not sending via SMTP???
            // Got from this StackOverflow answer:
            // https://stackoverflow.com/questions/27552252/sending-phpmailer-smtp-email-with-gmail-takes-long-time-1-5-seconds
            $mail->IsMail();
            
            //Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Here is the subject';
            $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            if($mail->send()) {
              echo "Message sent!";
            } else {
              echo "Mailer Error: " . $mail->ErrorInfo;
            }

            return $this->view->render($response, 'quote-request.twig', $vars);          
        });

    });