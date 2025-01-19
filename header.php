<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Whitekraaft</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- <link rel="stylesheet" type="text/css" href="css/slick.css"> -->
    <link href="css/style.css" rel="stylesheet">
    <link rel="shortcut icon" href="img/favicon.png" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?&family=Outfit:wght@100..900&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>

<body>
    <main>
        <header class="header">
            <?php $a=  $_SERVER['REQUEST_URI']; ?>

            <div class="container">
                <div class="row">
                    <div class="col-lg-2 position-relative d-flex align-items-center">
                        <div class="logo px-3 d-flex align-items-center h-100">
                            <a href="./"><img src="img/logo.png" class="img-fluid" alt="logo"></a>
                        </div>
                        <div class="navbar-toggler d-block d-lg-none" data-bs-toggle="collapse"
                            data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="#65b44c"
                                class="bi bi-list" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5" />
                            </svg>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <nav class="navbar navbar-expand-lg p-0 ">
                            <div class="container-fluid">
                                <div class="navbar-collapse justify-content-center collapse" id="navbarNav">
                                    <ul class="navbar-nav align-items-center">
                                        <li class="nav-item">
                                            <a class="nav-link <?php if($a == "/whitekraaft/")   echo "active";?>"
                                                aria-current="page" href="./">Home</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link <?php if($a == "/whitekraaft/services.php")  echo "active";?>"
                                                href="services.php">Our Services</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link <?php if($a == "/whitekraaft/team.php")  echo "active";?>"
                                                href="team.php">Our Team</a>
                                        </li>
                                        <li class="nav-item d-lg-none d-block">
                                            <a class="nav-link" href="javascript:Void(0);" data-bs-toggle="offcanvas"
                                                data-bs-target="#hiringForm">Our Hiring</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link <?php if($a == "/whitekraaft/contact-us.php")  echo "active";?>"
                                                href="contact-us.php">Contact Us</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </nav>
                    </div>
                    <div class="col-lg-2  d-lg-block d-none">
                        <div class="d-flex gap-3 justify-content-center align-items-center h-100">
                            <!-- <div class="hireprofiel" data-aos="fade-up">
                                <ul class="navbar-nav align-items-center">
                                    <li class="nav-item">
                                        <a class="nav-link" href="services.php">Our Hiring</a>
                                    </li>
                                </ul>
                            </div> -->
                            <div class="bTn d-flex align-items-center" data-bs-toggle="offcanvas"
                                data-bs-target="#hiringForm">
                                <span class="alignline"></span>
                                <a href="javascript:Void(0)" class="p-2">Our Hiring</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <div class="offcanvas offcanvas-end" tabindex="-1" id="hiringForm" aria-labelledby="hiringFormLabel">
            <div class="offcanvas-header d-flex align-items-center">
                <div class="secTitle">
                    <div class="d-flex align-items-center" data-aos="fade-up" data-aos-duration="1000">
                        <span class="alignline"></span>
                        <h6 class="mb-0">Post your resume</h6>
                    </div>
                    <h2 data-aos="fade-up" data-aos-duration="1300">Recruitment </h2>

                </div>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <?php
                // Check if form is submitted and file is uploaded
                if (isset($_POST['button']) && isset($_FILES['attachment'])) {

                
                // Load POST data from HTML form
                    $sender_name = $_POST["fullName"]; // Sender's name
                    $jobprofile = $_POST["jobProfile"]; // Jobprofile
                    $totalExperience = $_POST["totalExperience"]; // totalExperience
                    $currentCtc = $_POST["currentCtc"]; // currentCtc
                    $expCtc = $_POST["expCtc"];
                    $noticeperiod = $_POST["noticeperiod"];
                    $subject = $_POST["subject"]; 
                // Define sender and recipient emails
                    $from_email = $reply_to_email; // Sender email
                    $hiring_email = 'harishpoloju@gmail.com'; // Recipient email
                    
                    
                    // Validate sender name (uncomment for validation)
                    // if (strlen($sender_name) < 1) {
                    //     die('Name is too short or empty!');
                    // }

                    // Get uploaded file data
                    $tmp_name = $_FILES['attachment']['tmp_name']; // Temp file path
                    $name = $_FILES['attachment']['name']; // Original file name
                    $size = $_FILES['attachment']['size']; // File size
                    $type = $_FILES['attachment']['type']; // File type
                    $error = $_FILES['attachment']['error']; // Upload error

                    // Check for upload errors
                    if ($error > 0) {
                        die('<h4 class="errorMSg">Upload error or no file uploaded</h4>');
                    }

                    // Read the file and encode its content
                    $handle = fopen($tmp_name, "r"); // Open file for reading
                    $content = fread($handle, $size); // Read file content
                    fclose($handle); // Close file

                    $encoded_content = chunk_split(base64_encode($content)); // Encode content
                    $boundary = md5("random"); // Generate a unique boundary

                    // Define email headers
                    $headers = "MIME-Version: 1.0\r\n"; // Specify MIME version
                    // Set sender email
                    $headers .= "From: " . $from_email . "\r\n";
                    // Set reply-to email
                    $headers .= "Reply-To: " . $reply_to_email . "\r\n";
                    // Set content type and boundary
                    $headers .= "Content-Type: multipart/mixed; boundary=$boundary\r\n";

                    // Construct email body with message and attachment
                    $bodyContent = "--$boundary\r\n";
                    $bodyContent .= "Content-Type: text/plain; charset=ISO-8859-1\r\n";

                    $bodyContent .=   $sender_name ."\r\n";   
                    $bodyContent .=   $jobprofile ."\r\n";  
                    $bodyContent .=   $totalExperience ."\r\n";  
                    $bodyContent .=   $currentCtc ."\r\n";  
                    $bodyContent .=   $expCtc ."\r\n";  
                    $bodyContent .=   $noticeperiod ."\r\n";  
                $bodyContent .=" \r\n"; 
                    //$bodyContent .= "Content-Transfer-Encoding: base64\r\n\r\n";
                    // $bodyContent .= chunk_split(base64_encode($message)); // Encode message  
                    
                    // Add attachment to the email body
                    
                    $bodyContent .= "--$boundary\r\n";
                    $bodyContent .= "Content-Type: $type; name=\"$name\"\r\n";
                    $bodyContent .= "Content-Disposition: attachment; filename=\"$name\"\r\n";
                    // $bodyContent .= "Content-Transfer-Encoding: base64\r\n";
                    $bodyContent .= "X-Attachment-Id: " . rand(1000, 99999) . "\r\n\r\n";
                    $bodyContent .= $encoded_content; // Append encoded file content

                    // Send the email
                    $hairingMailResult = mail($hiring_email, $subject, $bodyContent, $headers);

                    // Check if the email was sent successfully
                    if ($hairingMailResult) {
                        echo "<h3 class='successMsg'>Thank you for reaching out to us. We will get back to you shortly.</h3>";
                        // Optionally delete the file after sending
                        // unlink($name);
                    } else {
                        die("Sorry, the email could not be sent. Please try again.");
                    }
                }
            ?>
                <section class="hireForm pb-5 text-center">
                    <form class="row g-4 mx-0" enctype="multipart/form-data" method="POST" action="" data-aos="fade-up"
                        data-aos-duration="1300">
                        <div class="col-lg-12">
                            <div class="form-outline position-relative">
                                <label class="labelHeading">Full Name</label>
                                <input type="text" class="form-control" id="fullName" name="fullName" required="">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-outline position-relative">
                                <label class="labelHeading">Job Profile</label>
                                <input type="text" class="form-control" id="jobProfile" name="jobProfile" required="">
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="form-outline position-relative">
                                <label class="labelHeading">Total Experience in years</label>
                                <input type="number" class="form-control" id="totalExp" name="totalExperience"
                                    required="">
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="form-outline position-relative">
                                <label class="labelHeading">Current CTC in INR</label>
                                <input type="number" class="form-control" id="currentCtc" name="currentCtc" required="">
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="form-outline position-relative">
                                <label class="labelHeading">Expected CTC in INR</label>
                                <input type="number" class="form-control" id="expCtc" name="expCtc" required="">
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="form-outline position-relative">
                                <label class="labelHeading">Notice period in months</label>
                                <input type="text" class="form-control" id="noticeperiod" name="noticeperiod"
                                    required="">
                            </div>
                        </div>


                        <div class="col-lg-9 mb-3">

                            <div class="uploadBtn  position-relative">Upload Resume
                                <input class="form-control" type="file" name="attachment">
                            </div>
                        </div>
                        <div class="col-12 d-flex align-items-center">
                            <div class="bTn d-flex align-items-center position-relative">
                                <span class="alignline"></span>
                                <button type="submit" name="button" value="Submit">Submit</button>
                            </div>
                        </div>
                    </form>
                </section>
            </div>
        </div>