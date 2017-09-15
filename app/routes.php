<?php

    // Psr-7 Request and Response interfaces
    use Psr\Http\Message\ServerRequestInterface as Request;
    use Psr\Http\Message\ResponseInterface as Response;

    use PHPMailer\PHPMailer\PHPMailer;

    // HOW-TO ERROR LOG: error_log("Quote request template \n $quoteRequestTemplate", 3, "/var/www/html/error_logs/EEI_errors.log");

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
            $decorationLocationOne = $_POST['decorationLocationOne'];
            $numberColorsLocationOne = $_POST['numberColorsLocationOne'];
            $decorationLocationTwo = $_POST['decorationLocationTwo'];
            $numberColorsLocationTwo = $_POST['numberColorsLocationTwo'];
            $designIdeaNotes = $_POST['designIdeaNotes'];
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

            // File Uploads
            $uploadedFiles = $request->getUploadedFiles();
            $directory = $this->get('upload_directory');

            $location_of_file_to_attach_1 = "";
            $location_of_file_to_attach_2 = "";

            $date = new DateTime();
            $timestamp = $date->format('Y-m-dH:i:s');

            if ($knowDesign == 'yes') {
                // Try to upload files from 'designLocationOne' and 'designLocationTwo'
                $location_one_image = $uploadedFiles['designLocationOne'];

                if ($location_one_image->getError() === UPLOAD_ERR_OK) {
                    $location_one_image_fileName = $location_one_image->getClientFilename();
                    // START SIZE AND FILE TYPE CHECKS
                    $mediaType = $location_one_image->getClientMediaType();
                    $getSize = $location_one_image->getSize();
                    $numberOfMegaBytes = number_format($getSize / 1048576, 2);

                    $isOK = false;

                    if ($mediaType = "image/jpeg"){$isOK=true;}
                    elseif ($mediaType = "image/jpg"){$isOK=true;}
                    elseif ($mediaType = "image/pjpeg"){$isOK=true;}
                    elseif ($mediaType = "image/png"){$isOK=true;}
                    elseif ($mediaType = "image/bmp"){$isOK=true;}
                    elseif ($mediaType = "image/gif"){$isOK=true;}
                    elseif ($mediaType = "image/svg+xml"){$isOK=true;}

                    if ($numberOfMegaBytes > 5){$isOK=false;}

                    if ($isOK) {
                        $location_of_file_to_attach_1 = "$directory/". $timestamp . "-" . rand(000,999) . "-$location_one_image_fileName";
                        $location_one_image->moveTo("$location_of_file_to_attach_1");
                    }
                }

                $location_two_image = $uploadedFiles['designLocationTwo'];

                if ($location_two_image->getError() === UPLOAD_ERR_OK) {
                    $location_two_image_fileName = $location_two_image->getClientFilename();
                    // START SIZE AND FILE TYPE CHECKS
                    $mediaType = $location_two_image->getClientMediaType();
                    $getSize = $location_two_image->getSize();
                    $numberOfMegaBytes = number_format($getSize / 1048576, 2);

                    $isOK = false;

                    if ($mediaType = "image/jpeg"){$isOK=true;}
                    elseif ($mediaType = "image/jpg"){$isOK=true;}
                    elseif ($mediaType = "image/pjpeg"){$isOK=true;}
                    elseif ($mediaType = "image/png"){$isOK=true;}
                    elseif ($mediaType = "image/bmp"){$isOK=true;}
                    elseif ($mediaType = "image/gif"){$isOK=true;}
                    elseif ($mediaType = "image/svg+xml"){$isOK=true;}

                    if ($numberOfMegaBytes > 5){$isOK=false;}

                    if ($isOK) {
                        $location_of_file_to_attach_2 = "$directory/". $timestamp . "-" . rand(000,999) . "-$location_two_image_fileName";
                        $location_two_image->moveTo("$location_of_file_to_attach_2");                       
                    }
                }

            }

            if ($knowDesign == 'no') {
                // Try to upload files from 'designIdeaFileOne' and 'designIdeaFileTwo'
                $location_one_image = $uploadedFiles['designIdeaFileOne'];

                if ($location_one_image->getError() === UPLOAD_ERR_OK) {
                    $location_one_image_fileName = $location_one_image->getClientFilename();
                    // START SIZE AND FILE TYPE CHECKS
                    $mediaType = $location_one_image->getClientMediaType();
                    $getSize = $location_one_image->getSize();
                    $numberOfMegaBytes = number_format($getSize / 1048576, 2);

                    $isOK = false;

                    if ($mediaType = "image/jpeg"){$isOK=true;}
                    elseif ($mediaType = "image/jpg"){$isOK=true;}
                    elseif ($mediaType = "image/pjpeg"){$isOK=true;}
                    elseif ($mediaType = "image/png"){$isOK=true;}
                    elseif ($mediaType = "image/bmp"){$isOK=true;}
                    elseif ($mediaType = "image/gif"){$isOK=true;}
                    elseif ($mediaType = "image/svg+xml"){$isOK=true;}

                    if ($numberOfMegaBytes > 5){$isOK=false;}

                    if ($isOK) {
                        $location_of_file_to_attach_1 = "$directory/". $timestamp . "-" . rand(000,999) . "-$location_one_image_fileName";
                        $location_one_image->moveTo("$location_of_file_to_attach_1");                        
                    }
                }

                $location_two_image = $uploadedFiles['designIdeaFileTwo'];

                if ($location_two_image->getError() === UPLOAD_ERR_OK) {
                    $location_two_image_fileName = $location_two_image->getClientFilename();
                    // START SIZE AND FILE TYPE CHECKS
                    $mediaType = $location_two_image->getClientMediaType();
                    $getSize = $location_two_image->getSize();
                    $numberOfMegaBytes = number_format($getSize / 1048576, 2);

                    $isOK = false;

                    if ($mediaType = "image/jpeg"){$isOK=true;}
                    elseif ($mediaType = "image/jpg"){$isOK=true;}
                    elseif ($mediaType = "image/pjpeg"){$isOK=true;}
                    elseif ($mediaType = "image/png"){$isOK=true;}
                    elseif ($mediaType = "image/bmp"){$isOK=true;}
                    elseif ($mediaType = "image/gif"){$isOK=true;}
                    elseif ($mediaType = "image/svg+xml"){$isOK=true;}

                    if ($numberOfMegaBytes > 5){$isOK=false;}

                    if ($isOK) {
                        $location_of_file_to_attach_2 = "$directory/". $timestamp . "-" . rand(000,999) . "-$location_two_image_fileName";
                        $location_two_image->moveTo("$location_of_file_to_attach_2");                        
                    }    
                }

            }

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


            if ($location_of_file_to_attach_1 !== "") {
                $mail->AddAttachment("$location_of_file_to_attach_1");
            }
            if ($location_of_file_to_attach_2 !== "") {
                $mail->AddAttachment("$location_of_file_to_attach_2");
            }

            //Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = "Quote Request from - $name";
            $mail->Body    = "$quoteRequestTemplate";

            // if($mail->send()) {
            //     $timestamp = $date->format('U = Y-m-dH:i:s');
            //     error_log("Email sent successfully at" . $timestamp . "\n", 3, "/var/www/html/error_logs/EEI_errors.log");
            // } else {
            //     error_log("Email failed at" . $timestamp, 3, "/var/www/html/error_logs/EEI_errors.log");
            //     error_log("Error details: " . $mail->ErrorInfo, 3, "/var/www/html/error_logs/EEI_errors.log");
            //     echo "Mailer Error: " . $mail->ErrorInfo;
            // }


            return $this->view->render($response, 'email/quote-request-email.twig', $vars);          
        });

    });