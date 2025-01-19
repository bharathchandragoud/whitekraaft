<?php include('header.php')?>



<div class="sliderBar pt-5 mt-5">
    <div>
        <section class="hireForm pb-5 text-center">
            <form class="row g-4" enctype="multipart/form-data" method="POST" action="" data-aos="fade-up"
                data-aos-duration="1300">
                <div class="col-lg-12">
                    <div class="form-outline">
                        <input type="text" class="form-control" id="fullName" name="fullName" placeholder="Full Name"
                            autocomplete="off" required="">
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="form-outline">
                        <input type="text" class="form-control" id="jobProfile" name="jobProfile"
                            placeholder="Job Profile Applied For" autocomplete="off" required="">
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="form-outline">
                        <input type="number" class="form-control" id="totalExp" name="totalExperience"
                            placeholder="Total Experience (in Years)" autocomplete="off" required="">
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="form-outline">
                        <input type="number" class="form-control" id="currentCtc" name="currentCtc"
                            placeholder="Current CTC (in INR per annum)" autocomplete="off" required="">
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="form-outline">
                        <input type="number" class="form-control" id="expCtc" name="expCtc"
                            placeholder="Expected CTC(in INR per annum)" autocomplete="off" required="">
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="form-outline">
                        <input type="text" class="form-control" id="noticeperiod" name="noticeperiod"
                            placeholder="Notice Period (in Months)" autocomplete="off" required="">
                    </div>
                </div>


                <div class="col-lg-9 mb-3">
                    <input class="form-control" type="file" name="attachment" placeholder="Attachment">
                    <div class="uploadBtn">Upload Resume</div>
                </div>
                <div class="col-12">
                    <div class="bTn d-flex align-items-center position-relative">
                        <span class="alignline"></span>
                        <button type="submit" name="button" value="Submit">Submit</button>
                    </div>
                </div>
            </form>
        </section>
    </div>
</div>

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
  echo" $sender_name";
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
        echo "<h3 class='successMsg'>File sent successfully.</h3>";
        // Optionally delete the file after sending
        // unlink($name);
    } else {
        die("Sorry, the email could not be sent. Please try again.");
    }
}
?>
<?php include('footer.php')?>