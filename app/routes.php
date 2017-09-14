<?php

    // Psr-7 Request and Response interfaces
    use Psr\Http\Message\ServerRequestInterface as Request;
    use Psr\Http\Message\ResponseInterface as Response;

    // Adding PHPMailer from 'the global namespace' or something
    use PHPMailer\PHPMailer\PHPMailer;

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

            // error_log("Check it out", 3, "/var/www/html/error_logs/EEI_errors.log");

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
            // $mail->Host = 'smtp.sendgrid.net';                    // Specify main and backup SMTP servers
            // $mail->SMTPAuth = true;                               // Enable SMTP authentication
            // $mail->Username = 'apikey';                 // SMTP username
            // $mail->Password = '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';                           // SMTP password
            // $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
            // $mail->Port = 25;                                    // TCP port to connect to

            $mail->SMTPDebug = 0;                                 // Enable verbose debug output
            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = 'smtp.gmail.com';                    // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = 'zach@zachcookhustles.com';                 // SMTP username
            $mail->Password = '2017theyeariwin';                           // SMTP password
            $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 465;                                    // TCP port to connect to

            //Recipients
            $mail->setFrom('from@example.com', 'Mailer');
            $mail->addAddress('zach@zachcookhustles.com', 'Joe User');     // Add a recipient
            $mail->addReplyTo('info@example.com', 'Information');

            //Attachments
            // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
            // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

            // Try to make it faster by not sending via SMTP???
            // Got from this StackOverflow answer:
            // https://stackoverflow.com/questions/27552252/sending-phpmailer-smtp-email-with-gmail-takes-long-time-1-5-seconds
            // $mail->IsMail();

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

            // error_log("Hit home-contact-email \n", 3, "/var/www/html/error_logs/EEI_errors.log");

            $name = $_POST['name'];
            $email = $_POST['email'];
            $subject = $_POST['subject'];
            $message = $_POST['message'];

            // error_log("Vars: " . $name . $email . $subject . $message . "...DONE \n", 3, "/var/www/html/error_logs/EEI_errors.log");

            $mail = new PHPMailer;

            // GMAIL SMTP Server settings
            // $mail->SMTPDebug = 0;                                 // Enable verbose debug output
            // $mail->isSMTP();                                      // Set mailer to use SMTP
            // $mail->Host = 'smtp.gmail.com';                    // Specify main and backup SMTP servers
            // $mail->SMTPAuth = true;                               // Enable SMTP authentication
            // $mail->Username = 'zach@zachcookhustles.com';                 // SMTP username
            // $mail->Password = '2017theyeariwin';                           // SMTP password
            // $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
            // $mail->Port = 465;                                    // TCP port to connect to

            $mail->SMTPDebug = 0;                                 // Enable verbose debug output
            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = 'mail.smtp2go.com';                    // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = 'zach@zachcookhustles.com';                 // SMTP username
            $mail->Password = 'GPdTLeziBEuu';                           // SMTP password
            $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 2525;                                    // TCP port to connect to

            //Recipients
            $mail->setFrom("$email", "$name");
            $mail->addAddress('zach@zachcookhustles.com', 'Zachary Cook');     // Add a recipient
            $mail->addReplyTo("$email", "$name");
            // $mail->addCC('cc@example.com');
            // $mail->addBCC('bcc@example.com');

            //Attachments
            // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
            // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

            // Try to make it faster by not sending via SMTP???
            // Got from this StackOverflow answer:
            // https://stackoverflow.com/questions/27552252/sending-phpmailer-smtp-email-with-gmail-takes-long-time-1-5-seconds
            $mail->IsMail();
            
            //Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = "$subject";
            $mail->Body    = '<b>What the customer wants to say: </b> ' . "$message";

            if($mail->send()) {
              echo "Message sent!";
            } else {
              echo "Mailer Error: " . $mail->ErrorInfo;
            }

            return $this->view->render($response, 'quote-request.twig', $vars);          
        });

        $this->post('quote-request-submit', function (Request $request, Response $response, $args) {
            $vars = [
                'page' => [
                'title' => 'East End Ink',
                'description' => 'Best apparel company in Austin'
                ],
            ];

            // error_log("Hit home-contact-email \n", 3, "/var/www/html/error_logs/EEI_errors.log");

            // Contact Info
            $name = $_POST['fullName'];
            $organization = $_POST['orgName'];
            $email = $_POST['emailAddress'];
            $phone = $_POST['phoneNumber'];
            // echo "<p>Name: $name, Organization Name: $organization, Email Address: $email, Phone Number: $phone </p> \n";


            // About Your Gear
            $apparelType = $_POST['apparelType'];
            $desiredQuantity = $_POST['desiredQuantity'];
            $colorOfItems = $_POST['colorOfItems'];

            // TODO: Add something to collect whether they know what design they want or not

            // If yes, know about they're design
            $decorationLocationOne = $_POST['decorationLocationOne'];
            $numberColorsLocationOne = $_POST['numberColorsLocationOne'];
            // TODO: put in file upload for 'designLocationOne'
            $decorationLocationTwo = $_POST['decorationLocationTwo'];
            $numberColorsLocationTwo = $_POST['numberColorsLocationTwo'];
            // TODO: put in file upload for 'designLocationTwo'

            // If no, don't know what design they want
            $designIdeaNotes = $_POST['designIdeaNotes'];
            // TODO: put in file upload for 'designIdeaFileOne'
            // TODO: put in file upload for 'designIdeaFileTwo'
            // echo "<p>Apparel Type: $apparelType, Desired Quantity: $desiredQuantity, Color Of Items: $colorOfItems, Design Idea Notes: $designIdeaNotes </p>\n";
            // echo "<p>Decoration Loc One: $decorationLocationOne, # Colors Loc 1: $numberColorsLocationOne, Decoration Loc 2: $decorationLocationTwo, " . 
            // "# Colors Loc 2: $numberColorsLocationTwo </p> \n";


            // Delivery / Budget Info
            $deliveryMonth = $_POST['deliveryMonth'];
            $deliveryDay = $_POST['deliveryDay'];
            $deliveryYear = $_POST['deliveryYear'];

            $priceRange = $_POST['priceRange'];

            // TODO: Add something to collect pickup or delivery

            $deliveryAddress = $_POST['deliveryAddress'];
            $deliveryCity = $_POST['deliveryCity'];
            $deliveryState = $_POST['deliveryState'];
            $deliveryZip = $_POST['deliveryZip'];

            $quoteRequestNotes = $_POST['quoteRequestNotes'];

            // echo "<p>Delivery Date: $deliveryMonth $deliveryDay, $deliveryYear, Price Range: $priceRange</p>\n" .
            //    "<p>Delivery Address: $deliveryAddress $deliveryCity, $deliveryState $deliveryZip </p>\n" .
            //    "<p>Quote Request General Notes: $quoteRequestNotes </p>\n";

            // Got all the variables collected!!!

            return $this->view->render($response, 'quote-request.twig', $vars);          
        });

    });