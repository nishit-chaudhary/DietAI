<?php
$showAlert = false;
if(isset($_POST['signup']))
{
require_once "config.php";

$username = $password = $cpassword = "";
$username_err = $password_err = $cpassword_err = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (empty(trim($_POST['username']))) {
        $username_err = "Please enter a username.";
    } else {
        $sql = "SELECT username FROM users WHERE username = ?";
        $stmt = mysqli_prepare($conn, $sql);
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            $param_username = trim($_POST['username']);
            
            if (mysqli_stmt_execute($stmt)) {
                mysqli_stmt_store_result($stmt);
                if (mysqli_stmt_num_rows($stmt) == 1) {
                    $username_err = "This username is already taken.";
                } else {
                    $username = trim($_POST['username']);
                }
            } else {
                echo "Account already exists.";
            }
        }
        mysqli_stmt_close($stmt);
    }
    if (empty(trim($_POST['password']))) {
        $password_err = "Please enter a password.";
    } elseif (strlen(trim($_POST['password'])) < 6) {
        $password_err = "Password must have atleast 6 characters.";
    } else {
        $password = trim($_POST['password']);
    }
    if (empty(trim($_POST['cpassword']))) {
        $cpassword_err = "Please confirm password.";
    } else {
        $cpassword = trim($_POST['cpassword']);
        if (empty($password_err) && ($password != $cpassword)) {
            $cpassword_err = "Password did not match.";
        }
    }
    
    if (empty($username_err) && empty($password_err) && empty($cpassword_err)) {
        $showAlert = true;
        $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
        $stmt = mysqli_prepare($conn, $sql);
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);
            $param_username = $username;
            $param_password = $password;
            if (mysqli_stmt_execute($stmt)) {
                header("location: login.php");
            } else {
                echo "Something went wrong. Please try again later.";
            }
        }
        mysqli_stmt_close($stmt);
    }
    mysqli_close($conn);
}
}

if(isset($_POST['login']))
{

session_start();

if(isset($_SESSION['username'])){
    header("Location: welcome.php");
    exit;
}

require_once "config.php";

$username = $password = "";
$username_err = $password_err = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){

    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }

    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }

    if(empty($username_err) && empty($password_err)){
        $param_password = $password;
        $sql = "SELECT username, password FROM users WHERE username = ?";
        if($stmt = mysqli_prepare($conn, $sql)){
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            $param_username = $username;
            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
                if(mysqli_stmt_num_rows($stmt) == 1){
                    mysqli_stmt_bind_result($stmt, $username, $param_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if($password == $param_password){
                
                            session_start();
                            $_SESSION["username"] = $username;
                            header("location: welcome.php");
                        } else{
                            $password_err = "The password you entered was not valid.";
                        }
                    }
                } else{
                    $username_err = "No account found with that username.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        mysqli_stmt_close($stmt);
    }
    mysqli_close($conn);
}

}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>DietAI</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Topbar Start -->
    <div class="container-fluid bg-primary py-3 d-none d-md-block">
        <div class="container">
            <!-- <div class="row">
                <div class="col-md-6 text-center text-lg-left mb-2 mb-lg-0">
                    <div class="d-inline-flex align-items-center">
                        <a class="text-white pr-3" href="">FAQs</a>
                        <span class="text-white">|</span>
                        <a class="text-white px-3" href="">Help</a>
                        <span class="text-white">|</span>
                        <a class="text-white pl-3" href="">Support</a>
                    </div>
                </div>
                <div class="col-md-6 text-center text-lg-right">
                    <div class="d-inline-flex align-items-center">
                        <a class="text-white px-3" href="">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a class="text-white px-3" href="">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a class="text-white px-3" href="">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        <a class="text-white px-3" href="">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a class="text-white pl-3" href="">
                            <i class="fab fa-youtube"></i>
                        </a>
                    </div>
                </div>
            </div> -->
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid position-relative nav-bar p-0">
        <div class="container-lg position-relative p-0 px-lg-3" style="z-index: 9;">
            <nav class="navbar navbar-expand-lg bg-white navbar-light shadow p-lg-0">
                <a href="index.php" class="navbar-brand d-block d-lg-none">
                    <h1 class="m-0 display-4 text-primary"><span class="text-secondary">Diet</span>AI</h1>
                </a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                    <div class="navbar-nav ml-auto py-0">
                        <a href="index.php" class="nav-item nav-link">Home</a>
                        <a href="about.php" class="nav-item nav-link">About</a>
                        <a href="product.php" class="nav-item nav-link">Product</a>
                    </div>
                    <a href="index.php" class="navbar-brand mx-5 d-none d-lg-block">
                        <h1 class="m-0 display-4 text-primary"><span class="text-secondary">Diet</span>AI</h1>
                    </a>
                    <div class="navbar-nav mr-auto py-0">
                        <a href="service.php" class="nav-item nav-link">Service</a>
                        <a href="gallery.php" class="nav-item nav-link">Gallery</a>
                        <a href="contact.php" class="nav-item nav-link">Contact</a>
                        <a href="login.php" class="nav-item nav-link active">Login</a>
                        
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <!-- Navbar End -->
    <?php
    if($showAlert){
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> Your account is now created and you can login
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
    }

    ?>
    <!-- <div class="alert alert-success" role="alert">
         A simple success alert—check it out!
    </div> -->

    <!-- login - register form -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="card border-0 shadow">
                        <div class="card-body">
                            <h3 class="mb-4">Login</h3>
                            <form action="login.php" method="post" name="Login" id="login">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" name="username" id="username" placeholder="Enter Email">
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" name="password" id="password" placeholder="Enter Password">
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary" name="login" value="Login">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card border-0 shadow">
                        <div class="card-body">
                            <h3 class="mb-4">Register</h3>
                            <form action="login.php" method="post" name="SignUp" id="signup">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" name="username" id="username" placeholder="Enter Email">
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" name="password" id="password" placeholder="Enter Password">
                                </div>
                                <div class="form-group">
                                    <label for="password">Confirm Password</label>
                                    <input type="password" class="form-control" name="cpassword" id="cpassword" placeholder="Re-enter Password">
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary" name="signup" value="Register">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- login - register form end -->


    
    
