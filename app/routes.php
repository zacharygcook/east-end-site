<?php

    // Psr-7 Request and Response interfaces
    use Psr\Http\Message\ServerRequestInterface as Request;
    use Psr\Http\Message\ResponseInterface as Response;

    // Adding PHPMailer from 'the global namespace' or something
    use PHPMailer\PHPMailer\PHPMailer;

    $emailBodyTemplate = file_get_contents('./resource/views/quote-request-email.html');

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
            
            // Contact Info
            $name = $_POST['fullName'];
            $organization = $_POST['orgName'];
            $email = $_POST['emailAddress'];
            $phone = $_POST['phoneNumber'];

            // About Your Gear
            $apparelType = $_POST['apparelType'];
            $desiredQuantity = $_POST['desiredQuantity'];
            $colorOfItems = $_POST['colorOfItems'];

            $knowDesign = $_POST['knowWhatDesignOrNot'];

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

            // Delivery / Budget Info
            $deliveryMonth = $_POST['deliveryMonth'];
            $deliveryDay = $_POST['deliveryDay'];
            $deliveryYear = $_POST['deliveryYear'];

            $priceRange = $_POST['priceRange'];

            $deliveryMethod = $_POST['pickingUpOrShipping'];
            $deliveryAddress = $_POST['deliveryAddress'];
            $deliveryCity = $_POST['deliveryCity'];
            $deliveryState = $_POST['deliveryState'];
            $deliveryZip = $_POST['deliveryZip'];

            $quoteRequestNotes = $_POST['quoteRequestNotes'];

            if (isset($_POST['submit'])) {
                $name = mysql_real_escape_string($name);
                $organization = mysql_real_escape_string($organization);
                $email = mysql_real_escape_string($email);
                $phone = mysql_real_escape_string($phone);
                $apparelType = mysql_real_escape_string($apparelType);
                $desiredQuantity = mysql_real_escape_string($desiredQuantity);
                $colorOfItems = mysql_real_escape_string($colorOfItems);
                $decorationLocationOne = mysql_real_escape_string($decorationLocationOne);
                $numberColorsLocationOne = mysql_real_escape_string($numberColorsLocationOne);
                $decorationLocationTwo = mysql_real_escape_string($decorationLocationTwo);
                $numberColorsLocationTwo = mysql_real_escape_string($numberColorsLocationTwo);
                $designIdeaNotes = mysql_real_escape_string($designIdeaNotes);
                $deliveryMonth = mysql_real_escape_string($deliveryMonth);
                $deliveryDay = mysql_real_escape_string($deliveryDay);
                $deliveryYear = mysql_real_escape_string($deliveryYear);
                $priceRange = mysql_real_escape_string($priceRange);
                $deliveryAddress  = mysql_real_escape_string($deliveryAddress );
                $deliveryCity = mysql_real_escape_string($deliveryCity);
                $deliveryState = mysql_real_escape_string($deliveryState);
                $deliveryZip = mysql_real_escape_string($deliveryZip);
                $deliveryMethod = mysql_real_escape_string($deliveryMethod);
                $quoteRequestNotes = mysql_real_escape_string($quoteRequestNotes);
                $knowDesign = mysql_real_escape_string($knowDesign);
            }

            $vars = [
                'name' => $name,
                'orgName' => $organization,
                'email' => $email,
                'phone' => $phone,
                'apparelType' => $apparelType,
                'desiredQuantity' => $desiredQuantity,
                'colorOfItems' => $colorOfItems,
                'decorationLocationOne' => $decorationLocationOne,
                'numberColorsLocationOne' => $numberColorsLocationOne,
                'decorationLocationTwo' => $decorationLocationTwo,
                'numberColorsLocationTwo' => $numberColorsLocationTwo,
                'designIdeaNotes' => $designIdeaNotes,
                'deliveryMonth' => $deliveryMonth,
                'deliveryDay' => $deliveryDay,
                'deliveryYear' => $deliveryYear,
                'priceRange' => $priceRange,
                'deliveryAddress'  >= $deliveryAddress ,
                'deliveryCity' => $deliveryCity,
                'deliveryState' => $deliveryState,
                'deliveryZip' => $deliveryZip,
                'quoteRequestNotes' => $quoteRequestNotes,
                'knowDesign' => $knowDesign,
                'deliveryMethod' => $deliveryMethod,

            ];

            // DO EMAIL STUFF
            $quoteRequestTemplate = $this->view->fetch('email/quote-request-email.twig', $vars);

            $mail = new PHPMailer;

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

            //Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = "Quote Request from - $name";
            $mail->Body    = "$quoteRequestTemplate";

            $date = new DateTime();

            // if($mail->send()) {
            //     $timestamp = $date->format('U = Y-m-dH:i:s');
            //     error_log("Email sent successfully at" . $timestamp, 3, "/var/www/html/error_logs/EEI_errors.log");
            // } else {
            //     error_log("Email failed at" . $timestamp, 3, "/var/www/html/error_logs/EEI_errors.log");
            //     error_log("Error details: " . $mail->ErrorInfo, 3, "/var/www/html/error_logs/EEI_errors.log");
            //     echo "Mailer Error: " . $mail->ErrorInfo;
            // }

            // PROOF loading the template above works: error_log("Quote request template \n $quoteRequestTemplate", 3, "/var/www/html/error_logs/EEI_errors.log");

            // USEFUL LINKS FOR EMAIL TEMPLATING
            // https://stackoverflow.com/questions/40695157/slim-framework-and-email-template-rendering-issue-with-phpmailer
            // http://www.xeweb.net/2009/12/31/sending-emails-the-right-way-using-phpmailer-and-email-templates/
            // https://stackoverflow.com/questions/38158181/send-html-emails-using-phpmailer-and-html-templates
            // http://www.phpdevtips.com/2014/07/using-phpmailer-spectacular-php-emails/


            return $this->view->render($response, 'email/quote-request-email.twig', $vars);          
        });

    });