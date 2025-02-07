<?php 
include('DBConnection.php'); 

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['register'])) {
    $uname = trim($_POST['username']);
    $pass1 = trim($_POST['password1']);
    $pass2 = trim($_POST['password2']);
    $secque = trim($_POST['secque']);
    $secans = trim($_POST['secans']);
    $fname = trim($_POST['fname']);
    $mname = trim($_POST['mname']);
    $lname = trim($_POST['lname']);
    $gender = trim($_POST['gender']);
    $dob = trim($_POST['dob']);
    $email = trim($_POST['email']);
    $phno = trim($_POST['phno']);

    $errors = [];

    // Check required fields
    if (empty($uname) || empty($pass1) || empty($pass2) || empty($secque) || empty($secans) || 
        empty($fname) || empty($lname) || empty($gender) || empty($dob) || empty($email) || empty($phno)) {
        $errors[] = "All fields are required.";
    }

    // Email validation
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format.";
    }

    // Phone number validation (must be exactly 10 digits)
    if (!preg_match("/^[0-9]{10}$/", $phno)) {
        $errors[] = "Phone number must be exactly 10 digits.";
    }

    // Password validation
    if ($pass1 !== $pass2) {
        $errors[] = "Passwords do not match.";
    }

    if (!preg_match("/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/", $pass1)) {
        $errors[] = "Password must contain at least one uppercase letter, one lowercase letter, one digit, one special character, and be at least 8 characters long.";
    }

    // Name validation (only letters and spaces)
    if (!preg_match("/^[a-zA-Z ]*$/", $fname)) {
        $errors[] = "First name can only contain letters and spaces.";
    }

    if (!empty($mname) && !preg_match("/^[a-zA-Z ]*$/", $mname)) {
        $errors[] = "Middle name can only contain letters and spaces.";
    }

    if (!preg_match("/^[a-zA-Z ]*$/", $lname)) {
        $errors[] = "Last name can only contain letters and spaces.";
    }

    // Date of birth validation (user must be at least 18 years old)
    $dobDate = DateTime::createFromFormat('Y-m-d', $dob);
    $currentDate = new DateTime();
    $age = $currentDate->diff($dobDate)->y;

    if ($age < 18) {
        $errors[] = "You must be at least 18 years old to register.";
    }

    // Display errors if found
    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo "<script>alert('$error');</script>";
        }
    } else {
        // Check if username exists
        $stmt = $conn->prepare("SELECT * FROM user WHERE username = ?");
        $stmt->bind_param("s", $uname);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows > 0) {
            echo "<script>alert('Username is already registered');</script>";
        } else {
            // Secure password hashing
            $hashed_pass = password_hash($pass1, PASSWORD_BCRYPT);
            $hashed_secans = password_hash($secans, PASSWORD_BCRYPT);

            // Insert data securely
            $stmt = $conn->prepare("INSERT INTO user 
                (username, password, first_name, middle_name, last_name, gender, date_of_birth, email, mobile_number, security_question, security_answare) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

            $stmt->bind_param("sssssssssss", $uname, $hashed_pass, $fname, $mname, $lname, $gender, $dob, $email, $phno, $secque, $hashed_secans);

            if ($stmt->execute()) {
                echo "<script>alert('Registration successful! Now, you can book your journey.');</script>";
            } else {
                echo "<script>alert('Registration failed. Please try again.');</script>";
            }
        }
    }
}
?>


<!doctype html>
<html lang="en">
<head>
	<title>IR</title>
	<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="icon" type="icon/png" href="asset/img/logo/rail_icon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="asset/css/bootstrap.min.css">

    <!-- :start of optional css-->

    <!-- font-awesome for icon -->
    <link rel="stylesheet" href="asset/font-awesome/css/all.min.css">

    <!-- animation css -->
    <link rel="stylesheet" href="asset/css/animate.css">

    <!-- hover css animations -->
    <link rel="stylesheet" href="asset/css/hover-min.css">

    <!-- custom css -->
    <link rel="stylesheet" type="text/css" href="asset/css/custom.css">


    <!-- :end of optional css -->


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="asset/js/jquery-3.4.1.slim.min.js"></script>
    <script src="asset/js/popper.min.js"></script>
    <script src="asset/js/bootstrap.min.js"></script>
    <script src="asset/js/validation.js"></script>

    <style>

        .bg-black{
            background-color:black;
        }
        .container{
            /*padding-top: 40px;*/
        }
        .text-main h5, .text-main{
            font-size: 16px;
            font-weight: bold;
            color: #333;
            font-family: serif;
        }
        .error {
            color: red;
        }

    </style>

</head>
<body>

	<!-- header navbar -->
    <?php include('header.html') ?>

   <!-- light background color -->
<form action="" name="regForm" onsubmit="return(validation());" method="post" class="bg-light">

    <!-- container -->
    <div class="container">
        <div class="row">
            
            <!-- title individual registration -->
    <!-- 1st row start -->
            <div class="col-12">
                <div class="text-blue mt-5 mb-4">
                    <h2>Individual Registration</h2>
                </div>
                <hr> <!-- horizontal line -->
            </div> <!-- 1st row ends -->

            <div class="col-12">
               <div class="text-dark">
                    <h6>Please use a vaild E-Mail and mobile number in registration</h6>
                </div>
                <hr>     
            </div>

    <!--  2nd row start -->
            <!-- username -->
            <div class="col-12 col-sm-6 col-md-3">
                <div class="text-main text-center">
                    <h5>Username<span class="text-red text-strong">&nbsp;*&nbsp;</span>:</h5>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-md-3 ">
                <div class="text-main input-group">
                <input class="form-control" type="text" id="uname" name="username" value="<?php echo isset($uname) ? htmlspecialchars($uname) : ''; ?>">
                <span class="error"><?php echo isset($errors['username']) ? $errors['username'] : ''; ?></span>

                </div>
                <!-- error code -->
                <div class="text-red">
                    <span id="er_uname"><?php if(isset($err_uname)){ echo "$err_uname"; } ?></span>
                </div>
            </div> <!-- username ends -->

            <!-- password -->
            <div class="col-12 col-sm-6 col-md-3">
                <div class="text-main text-center">
                    <h5>Password<span class="text-red text-strong">&nbsp;*&nbsp;</span>:</h5>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-md-3">
                <div class="text-main input-group">
                <input class="form-control" type="password" id="pass1" name="password1">
                <span class="error"><?php echo isset($errors['password1']) ? $errors['password1'] : ''; ?></span>

                </div>
                <!-- er_pass1 code -->
                <div  class="text-red">
                    <span id="er_pass1"></span>
                </div>
            </div> <!-- password ends --> 
    <!-- 2nd row ends -->


    <!-- Horizontal row -->
            <div class="col-12"><hr></div>


    <!-- 3rd row  -->
            <!-- Confirm password -->
            <div class="col-12 col-sm-6 col-md-3">
                <div class="text-main text-center">
                    <h5>Confirm Password<span class="text-red text-strong">&nbsp;*&nbsp;</span>:</h5>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-md-3">
                <div class="text-main input-group">
                <input class="form-control" type="password" id="pass2" name="password2">
                <span class="error"><?php echo isset($errors['password2']) ? $errors['password2'] : ''; ?></span>

                </div>
                <!-- er_pass2 code -->
                <div  class="text-red">
                    <span id="er_pass2"></span>
                </div>
            </div> <!-- password ends --> 

    <!--3rd row ends -->
            

    <!-- Horizontal row -->
            <div class="col-12"><hr></div>


    <!-- 4th row -->
            <!-- security question -->
            <div class="col-12 col-sm-6 col-md-3">
                <div class="text-main text-center">
                    <h5>Security Question<span class="text-red text-strong">&nbsp;*&nbsp;</span>:</h5>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-md-3 ">
                <div class="text-main input-group">
                    <select class="custom-select" id="secQue" name="secque">
                        <option class="" value="default">Select Security Question</option>
                        <option class="" value="1">first mobile no</option>
                        <option class="" value="2">your pet name</option>
                        <option class="" value="3">your nick name</option>
                        <option class="" value="4">your favourite teacher name</option>
                    </select>
                </div>
                <!-- er_secque code -->
                <div  class="text-red">
                    <span id="er_secque"></span>
                </div>
            </div> <!-- security question ends -->

            <!-- security answare -->
            <div class="col-12 col-sm-6 col-md-3">
                <div class="text-main text-center">
                    <h5>Security Answare<span class="text-red text-strong">&nbsp;*&nbsp;</span>:</h5>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-md-3">
                <div class="text-main input-group">
                    <input class="form-control" type="text" id="secAns" name="secans">
                </div>
                <!-- er_secans code -->
                <div class="text-red">
                    <span id="er_secans"></span>
                </div>
            </div> <!-- security answare ends --> 
    <!-- 4th row ends -->


    <!-- Horizontal row -->
            <div class="col-12"><hr></div>

    <!--5th row  -->
            <!-- alert personal details -->
            <div class="col-12 alert alert-primary text-bold">Personal Details</div>
            <!-- name field -->
            <div class="col-12 col-sm-3 col-md-3">
                <div class="text-main text-center">
                    <h5>Name<span class="text-red text-strong">&nbsp;*&nbsp;</span>:</h5>
                </div>
            </div><!-- name ends  -->

            <!-- input field of names -->
            <div class="col-12 col-sm-3 col-md-3 ">
                <div class="text-main input-group">
                <input type="text" id="fn" name="fname" oninput="validateName('fn', 'fname-error')" placeholder="First Name" class="form-control">
                <span id="fname-error" class="error"></span>
                </div>
                <!-- er_fname code -->
                <div  class="text-red">
                    <span id="er_fname"></span>
                </div>
            </div> 

            <div class="col-12 col-sm-3 col-md-3 ">
                <div class="text-main input-group">
                <input type="text" id="mn" name="mname" oninput="validateName('mn', 'mname-error')" placeholder="Middle Name" class="form-control">
                <span id="mname-error" class="error"></span>
                </div>
                <!-- er_fname code -->
                <div  class="text-red">
                    <span id="er_mname"></span>
                </div>
            </div> 

            <div class="col-12 col-sm-3 col-md-3 ">
                <div class="text-main input-group">
                <input type="text" id="ln" name="lname" oninput="validateName('ln', 'lname-error')"placeholder="Last Name" class="form-control">
                <span id="lname-error" class="error"></span>
                </div>
                <!-- er_fname code -->
                <div  class="text-red">
                    <span id="er_lname"></span>
                </div>
            </div>  <!-- input field ends -->
    <!-- 5th row ends -->

    <!-- Horizontal row -->
            <div class="col-12"><hr></div>

    <!-- 6th row start -->
            <!-- Gender -->
            <div class="col-12 col-sm-6 col-md-3">
                <div class="text-main text-center">
                    <h5>Gender<span class="text-red text-strong">&nbsp;*&nbsp;</span>:</h5>
                </div>
            </div>

            <!-- male -->
            <div class="col-6 col-sm-2">
                <div class="text-main input-group">
                    <input class="" type="radio" name="gender" value="M" required>
                    <span class="text-main">&nbsp;&nbsp;Male</span>
                </div>

                <!-- error code -->
                <div  class="text-red">
                    <span id="er_gender"></span>
                </div>
            </div>

            <!-- female -->
            <div class="col-6 col-sm-2">
                <div class="text-main input-group">
                    <input class="" type="radio" name="gender" value="F" required>
                    <span class="text-main">&nbsp;&nbsp;Female</span>
                </div>
            </div>
            <div class="col-12 col-sm-4">
                <div class="text-main input-group">
                    <input class="" type="radio" name="gender" value="O" required>
                    <span class="text-main">&nbsp;&nbsp;Other</span>
                </div>
            </div>
            <!-- input field ends -->
            

    <!-- 6th row ends -->

    <!-- Horizontal row -->
            <div class="col-12"><hr></div>

    <!-- 7th row -->
             <!-- DOB -->
            <div class="col-12 col-sm-6 col-md-3">
                <div class="text-main text-center">
                    <h5>Date Of Birth<span class="text-red text-strong">&nbsp;*&nbsp;</span>:</h5>
                </div>
            </div>

            <!-- input tag -->
            <div class="col-12 col-sm-3">
                <div class="text-main input-group">
                <input class="form-control" type="date" id="dob" name="dob" value="<?php echo isset($dob) ? htmlspecialchars($dob) : ''; ?>">
                <span class="error"><?php echo isset($errors['dob']) ? $errors['dob'] : ''; ?></span>

                </div>

                <!-- error code -->
                <div  class="text-red">
                    <span id="er_dob"></span>
                </div>
            </div>
    <!-- 7th row ends -->

    <!-- Horizontal row -->
            <div class="col-12"><hr></div>

    <!-- 8th row -->
            <!-- email -->
            <div class="col-12 col-sm-6 col-md-3">
                <div class="text-main text-center">
                    <h5>Email<span class="text-red text-strong">&nbsp;*&nbsp;</span>:</h5>
                </div>
            </div>

            <!-- email input-->
            <div class="col-12 col-sm-6 col-md-3">
                <div class="text-main input-group">
                <input class="form-control" type="email" id="email" name="email" value="<?php echo isset($email) ? htmlspecialchars($email) : ''; ?>">
                <span class="error"><?php echo isset($errors['email']) ? $errors['email'] : ''; ?></span>

                </div>

                <!-- error code -->
                <div  class="text-red">
                    <span id="er_email"></span>
                </div>
            </div>

            <!-- phone number -->
            <div class="col-12 col-sm-6 col-md-3">
                <div class="text-main text-center">
                    <h5>Mobile No<span class="text-red text-strong">&nbsp;*&nbsp;</span>:</h5>
                </div>
            </div>

            <!-- number input -->
            <div class="col-12 col-sm-6 col-md-3">
                <!-- 91 label -->
                <div class="text-main input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text alert-dark text-dark">+91</span>
                </div>
                <input class="form-control" type="text" id="phno" name="phno" value="<?php echo isset($phno) ? htmlspecialchars($phno) : ''; ?>">
                <span class="error"><?php echo isset($errors['phno']) ? $errors['phno'] : ''; ?></span>

                </div>

                <!-- error code -->
                <div  class="text-red">
                    <span id="er_phno"></span>
                </div>
            </div>
    <!-- 8th row ends -->

    
    <!-- Horizontal row -->
            <div class="col-12"><hr></div>
            <div class="col-12"><hr></div>

    <!-- 9th row  -->
            <!-- register button -->
            <div class="col-12">
                <div class="text-main text-center">
                    <input class="btn btn-success" type="submit" name="register" value="Register">
                    <input class="btn btn-success" type="reset" name="cancel" value="Reset">
                </div>
            </div>

    <!-- 9th row ends -->

        </div> <!-- row ends -->
    </div> <!-- container ends -->
    <br>
    <br>
</form> <!-- main div ends -->





    <!-- Footer -->
    <?php include('footer.html') ?>
        <script>
            function validateName(fieldId, errorId) {
                let nameInput = document.getElementById(fieldId);
                let errorSpan = document.getElementById(errorId);
                let nameRegex = /^[a-zA-Z ]+$/;

                if (nameInput.value.trim() === "") {
                    errorSpan.textContent = "This field is required.";
                } else if (!nameRegex.test(nameInput.value)) {
                    errorSpan.textContent = "Only letters and spaces are allowed.";
                } else {
                    errorSpan.textContent = ""; // Clear error if valid
                }
            }

            function validation() {
                validateName('fn', 'fname-error');
                validateName('mn', 'mname-error');
                validateName('ln', 'lname-error');

                // Check if any error exists before submitting
                let errors = document.querySelectorAll('.error');
                for (let error of errors) {
                    if (error.textContent !== "") {
                        return false; // Prevent form submission
                    }
                }

                return true;
            }

            document.addEventListener("DOMContentLoaded", function() {
    document.getElementById("regForm").addEventListener("submit", function(event) {
        let isValid = true;

        // Clear previous errors
        document.querySelectorAll(".error").forEach(e => e.innerText = "");

        // Username Validation
        let uname = document.getElementById("uname").value.trim();
        if (uname === "") {
            document.getElementById("er_uname").innerText = "Username is required.";
            isValid = false;
        }

        // Password Validation
        let pass1 = document.getElementById("pass1").value.trim();
        let pass2 = document.getElementById("pass2").value.trim();
        if (pass1 === "") {
            document.getElementById("er_pass1").innerText = "Password is required.";
            isValid = false;
        } else if (!/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/.test(pass1)) {
            document.getElementById("er_pass1").innerText = "Password must have at least 8 characters, 1 uppercase, 1 lowercase, 1 number, and 1 special character.";
            isValid = false;
        }

        if (pass1 !== pass2) {
            document.getElementById("er_pass2").innerText = "Passwords do not match.";
            isValid = false;
        }

        // Email Validation
        let email = document.getElementById("email").value.trim();
        if (email === "") {
            document.getElementById("er_email").innerText = "Email is required.";
            isValid = false;
        } else if (!/^\S+@\S+\.\S+$/.test(email)) {
            document.getElementById("er_email").innerText = "Invalid email format.";
            isValid = false;
        }

        // Phone Number Validation
        let phno = document.getElementById("phno").value.trim();
        if (phno === "" || !/^\d{10}$/.test(phno)) {
            document.getElementById("er_phno").innerText = "Phone number must be exactly 10 digits.";
            isValid = false;
        }

        // Date of Birth Validation
        let dob = document.getElementById("dob").value;
        if (dob === "") {
            document.getElementById("er_dob").innerText = "Date of Birth is required.";
            isValid = false;
        }

        if (!isValid) {
            event.preventDefault(); // Prevent form submission if validation fails
        }
    });
});


</script>
	
</body>
</html>




<?php  
  
?>