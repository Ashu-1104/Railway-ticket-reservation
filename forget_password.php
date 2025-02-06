<?php 
    session_start();
    include('DBConnection.php');

    if(isset($_POST['resetbtn'])) {
        $uname = $_POST['username'];
        $newpass = $_POST['newpassword'];
        $confirmpass = $_POST['confirmpassword'];
        
        if($newpass == $confirmpass) {
            $sql = "UPDATE user SET password = '$newpass' WHERE username = '$uname'";
            if($conn->query($sql) === TRUE) {
                header("location: login.php?reset=1");
            } else {
                $er_invalid = "Error updating password.";
            }
        } else {
            $er_invalid = "Passwords do not match.";
        }
    }
?>

<!doctype html>
<html lang="en">
<head>
    <title>Forgot Password</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="icon/png" href="asset/img/logo/rail_icon.png">
    <link rel="stylesheet" href="asset/css/bootstrap.min.css">
    <link rel="stylesheet" href="asset/font-awesome/css/all.min.css">
    <link rel="stylesheet" href="asset/css/custom.css">
    <script src="asset/js/jquery-3.4.1.slim.min.js"></script>
    <script src="asset/js/popper.min.js"></script>
    <script src="asset/js/bootstrap.min.js"></script>
    <style>
        .bg-img {
            background-image: url('asset/img/7.jpg');
            background-size: cover;
            background-position: center;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        .main-name {
            font-size: 50px;
            font-family: Arial Rounded MT Bold;
            margin-top: 0px;
            background-color: rgba(2,2,2,0.2);
            border-radius: 5px;
            width: 560px;
            padding-left: 50px;
            text-align: center;
            align-self: center;
            color: white;
        }

         #bg-custom{
            background-color:rgba(2,2,2,0.8);
        }
        #m-cust{
            margin-right: 250px;
            margin-top: 60px; 
        }
        .bg-black{
            background-color:black;
        }

        @media(max-width: 400px){
            .bg-img{
                background-image: url('asset/img/5.jpg');
                background-size: auto;
                background-repeat: no-repeat;
                /*background-position: center*/

            }
        }

        .bg-img2{
            background-image:url('asset/img/5.jpg'); 
            background-size: 100%;
        }
        .pnr{
            background-color: white;
            color: black;
            /*width: 340px;*/
            padding-top: 10px;
            box-shadow: 2px 2px 18px 10px #222;
            border-radius: 2px;
        }
        
        .fs-1{
            font-size: 42px;
            font-family: Tempus Sans ITC;
            margin-top: 50px;
        }
        .fs-2{
            font-size: 18px;
            font-family: Yu Gothic Light;
            font-weight: lighter;
            margin-bottom: 50px; 
        }

    </style>
</head>
<body class="bg-img">
    <?php include('navbar1.html'); ?>

    <div class="main-name">INDIAN RAILWAYS</div>

    <div class="row text-light">
        <div class="col-12 col-sm-12 col-md-4 offset-1">
            <div class="row pnr m-5 text-center">
                <div class="col-12 mt-3">
                    <span><img src="asset/img/logo/rail_icon.png"></span><br>
                    <span class="fs-1">Reset Password</span>
                </div>
                <div class="col-12 mt-4">
                    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
                        <div class="text-red">
                            <span><?php if (isset($er_invalid)){ echo "$er_invalid"; }?></span>
                        </div>
                        <div class="input-group">
                            <input type="text" name="username" class="text-center form-control" placeholder="Enter Username" required>
                        </div>
                        <br>
                        <div class="input-group">
                            <input type="password" name="newpassword" class="text-center form-control" placeholder="Enter New Password" required>
                        </div>
                        <br>
                        <div class="input-group">
                            <input type="password" name="confirmpassword" class="text-center form-control" placeholder="Confirm Password" required>
                        </div>
                        <br>
                        <div class="input-group">
                            <input type="submit" name="resetbtn" class="btn text-light bg-blue btn-block" value="Reset Password">
                        </div>
                        <div class="col-8 offset-5 mt-2">
                            <a href="login.php" class="text-dark btn btn-light p-0">Back to Login</a>
                        </div>
                    </form>
                </div>
            </div>                    
        </div>
    </div>

    <div class="row wd bg-black text-light text-center p-3">
        <div class="col-12">
            Copyright &copy; 2020 | All rights reserved <br>
            Developed by Ashutosh Tiwari
        </div>
    </div>
</body>
</html>
