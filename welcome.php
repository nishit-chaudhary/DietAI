<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>DietAI</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>
<style>
    ul {
    list-style: none;
    column-count: 3;
    -moz-column-count: 3;
    -webkit-column-count: 3;
    }
    ul li {
        display: block;
        padding: 10px 0;
    }
</style>

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
    <!-- Topbar End  -->


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
                        <a href="#" class="nav-item nav-link active">Dashboard</a>
                        <a href="#" class="nav-item nav-link">Plan</a>
                        <a href="#" class="nav-item nav-link">Journey</a>
                    </div>
                    <a href="#" class="navbar-brand mx-5 d-none d-lg-block">
                        <h1 class="m-0 display-4 text-primary"><span class="text-secondary">Diet</span>AI</h1>
                    </a>

                    <div class="navbar-nav mr-auto py-0">
                        <a href="#" class="nav-item nav-link" style="margin-top: 10px;">Supplements</a>
                        <a href="#" class="nav-item nav-link "> <img src="usericon.png">  Welcome User </a>
                    </div> 
                </div>
            </nav>
        </div>
    </div>
    <!-- Navbar End -->

    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <h1 class="section-title position-relative text-center mb-5">Fill the details to start your journey</h1>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-9">
                    <div class="contact-form bg-light rounded p-5">
                        <div id="success"></div>
                        <form name="sentMessage" id="contactForm" novalidate="novalidate" method="GET" onsubmit="sendRequest()">
                            <div class="form-row">
                                <div class="col-sm-6 control-group">
                                    <input type="text" class="form-control p-4" id="height" name="height" placeholder="Your height in cms" required="required" data-validation-required-message="Please enter your height" />
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="col-sm-6 control-group">
                                    <input type="text" class="form-control p-4" id="weight" name="weight" placeholder="Your weight in kgs" required="required" data-validation-required-message="Please enter your weight" />
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-sm-6 control-group">
                                    <input type="text" class="form-control p-4" id="veg-nonveg" name="veg" placeholder="Your preference for Veg/Non-Veg" required="required" data-validation-required-message="Please enter your preference" />
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="col-sm-6 control-group">
                                    <input type="text" class="form-control p-4" id="age" name="age" placeholder="Your Age" required="required" data-validation-required-message="Please enter your Age" />
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <!-- add radio button to for weightgain and weightloss -->
                            <div class="form-row">
                                <div class="col-sm-6 control-group">
                                    <input type="radio"  id="weightgain" value="weightgain" name="response" required="required" data-validation-required-message="Please enter your preference" />
                                    <!-- add label for weightgain -->
                                    <label for="weightgain">Weight Gain</label>
                                </div>
                                <div class="col-sm-6 control-group">
                                    <input type="radio"  id="weightloss" value="weightloss" name="response" required="required" data-validation-required-message="Please enter your preference" />
                                    <!-- add label for weightgain -->
                                    <label for="weightloss">Weight Loss</label>
                                </div>
                            </div>   
                            <div>
                                <button class="btn btn-primary btn-block py-3 px-5" type="submit" id="sendMessageButton">Get Diet</button>
                            </div>
                        </form> <br><br>

                        <div id="recommendation" style="display: none; ">
                            <h1 class="section-title position-relative text-center mb-5"> <small>Your Diet Plan</small></h1>
                            <div id="dietplan">
                                <ul id="dietplanlist">
                                </ul>
                            </div>
                        </div>
                        <div style="height: 50px; display:flex;">
                            <p id="result" style="word-wrap: break-word; margin: auto;"></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
    


    <script>
        // send fetch request to flask server
        async function sendRequest() {
            event.preventDefault();
            const resp = await fetch(`http://127.0.0.1:5000?height=${document.forms[0].height.value}&weight=${document.forms[0].weight.value}&veg=${document.forms[0].veg.value}&age=${document.forms[0].age.value}&response=${document.forms[0].response.value}`);
            const json = await resp.json();
            var output = `${JSON.stringify(json, null, 2)}`;
            // display div recommendation
            document.getElementById("recommendation").style.display = "block";
            // remove the square brackets from the output
            output = output.replace("[", "");
            output = output.replace("]", "");
            // convert the output to a string
            output = output.toString();
            // remove the double quotes from the output
            output = output.replace(/"/g, "");
            // split the output into an array
            output = output.split(",");
            // display the output in 3 columns
            var i;
            for (i = 0; i < output.length; i++) {
                document.getElementById("dietplanlist").innerHTML += "<li>" + output[i] + "</li>";
            }
        
            
            // document.getElementById("result").innerHTML = output.join("<br>");


            // document.getElementById("result").innerHTML = output;
            
  }
            // fetch(`http://127.0.0.1:5000?height=${document.forms[0].height.value}&weight=${document.forms[0].weight.value}&veg=${document.forms[0].veg.value}&age=${document.forms[0].age.value}&response=${document.forms[0].response.value}`, {
        //         method: 'GET',
        //         headers: {
        //             'Access-Control-Allow-Origin': '*',
        //             'Content-Type': 'application/json'
        //         }
        //     })
        //     // get response from flask server
        //     .then(response => console.log(response.json()))
        //     .then(data => {
        //         console.log(data);
        //         document.getElementById("result").innerHTML = data;
        //     })
        //     .catch(err => console.log(err));
        // }
        </script>
    </body>
    </html>

