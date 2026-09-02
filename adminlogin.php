<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Login</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link rel="stylesheet" href="bootstrap5.css">
    <link rel="stylesheet" href="bootstrapicon.css">
    <script src="bootstrap5.js"></script>
    <script src="ajax.js"></script>
    <style>
        /* General styles */
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #eeeff0de; /* Blue theme background */
            display: flex;
            flex-direction: column;
            align-items: center;
            min-height: 100vh;
        }

         /*menustrip*/
  /* Navigation Bar */
  nav {
            position: absolute;
            top: 0;
            width: 100%;
            background-color: rgba(30, 61, 88, 0.9);
            padding: 15px 0;
        }

        nav ul {
            display: flex;
            justify-content: center;
            list-style: none;
        }

        nav ul li {
            margin: 0 20px;
        }

        nav ul li a {
            text-decoration: none;
            color: white;
            font-size: 18px;
            font-weight: bold;
            transition: color 0.3s;
        }

        nav ul li a:hover {
            color: #ff5650;
        }
        /* Login Container */
        .login-container {
            background: rgba(255, 255, 255, 0.8);
            padding: 40px 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            text-align: center;
            width: 300px;
            margin-top: 30px; /* Distance between menu and form */
            min-height: 400px; /* Adjust this value to increase height */
        }
/*demo*/
body {
    margin: 0;
    font-family: Arial, sans-serif;
    background: url('logbag.webp') no-repeat center center fixed; 
    background-size: cover;
    display: flex;
    flex-direction: column;
    align-items: center;
    min-height: 100vh;
}

/*demo*/

        .login-container img {
            width: 80px;
            height: auto;
            margin-bottom: 15px;
        }

        .login-container h2 {
            margin-bottom: 30px;
            color: #007BFF;
        }

        .login-container .input-container {
            position: relative;
            margin-bottom: 15px;
        }

        .login-container input[type="text"],
        .login-container input[type="password"] {
            width: 100%;
            padding: 10px 10px 10px 35px; /* Adjust padding to fit icon */
            margin: 0;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .login-container .input-container i {
            position: absolute;
            left: 10px;
            top: 50%;
            transform: translateY(-50%);
            color: #007BFF;
        }

        .login-container button {
            width: 100%;
            padding: 10px;
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        .login-container button:hover {
            background-color: #0056b3;
        }

        .login-container a {
            display: block;
            margin-top: 15px;
            color: #007BFF;
            text-decoration: none;
        }

        .login-container a:hover {
            text-decoration: underline;
        }
         
        /* Footer Section */
        .footer {
            background-color: #1e3d58;
            color: white;
            padding: 30px;
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            position: relative;
            bottom: auto;
            width: 100%;
        }

        .footer div {
            width: 30%;
            margin-bottom: 20px;
        }

        .footer h3 {
            margin-bottom: 10px;
        }

        .footer a {
            color: white;
            text-decoration: none;
        }

        .footer a:hover {
            text-decoration: underline;
        }

        .footer .contact-info p {
            margin-bottom: 5px;
        }
    </style>
</head>
<body>

     <!-- Navigation Bar -->
     <nav>
        <ul>
            <li><a href="index4.php">Home</a></li>
            <li><a href="newaboutus.php">About Us</a></li>
            <li><a href="lastcourse1.php">Courses</a></li>
            <li><a href="addmission4.php">Admission</a></li>
            <li><a href="contactnew.php">Contact</a></li>
        </ul>
    </nav>
     <div>
        <br><br><br><br>
     </div>
  
    <!--<li><a href="welcome.html"> Go Back</a></li>-->

    <div class="login-container rounded-3 w-25">
        <img src="OIP.jpg" alt="Devgad College Logo">
        <h2>Admin Login</h2>
        <form id="loginForm">

            <div class="form-floating mb-3 ">
                <input type="email" class="form-control" id="email" name="email" placeholder="Email" >
                <input type="text" value="admin_log" name="type" hidden>
                <label for="email"><i class="bi bi-envelope text-primary"></i> Email</label>
                <div id="emlerr" class="text-danger" style="text-align: left;" ></div>
            </div>

            <div class="form-floating mb-3 ">
                <input type="password" class="form-control" id="adminid" name="adminid" placeholder="Password" >
                <label for="password"><i class="bi bi-shield-fill text-primary"></i> Admin ID</label>
                <div id="admerr" class="text-danger" style="text-align: left;"></div>
            </div>
            <div class="d-flex justify-content-center px-lg-2">
                <button type="submit" class="w-100 " id="adminlog">Login</button>
            </div>

            
        </form>
        <a href="#" id="frgtpass">Forgot Password?</a>
            
        
    </div>

   

    <script>
        $(document).ready(function(){
            $("#frgtpass").click(function(){
                alert("Please contact with 'Super Admin (SA)' or 'IT Support'.");
            });

            $('#adminlog').click(function (e) { 
                e.preventDefault();
                // alert(123);

                $emlerr = $("#emlerr");
                $admerr = $("#admerr");

                var error = [];

                $emlerr.removeClass('text-danger').text('');
                $admerr.removeClass('text-danger').text('');

                var email = $("#email").val();
                var adminid = $("#adminid").val();

            if(email === "")
            {
                $emlerr.addClass('text-danger').html('<i class="bi bi-exclamation-triangle-fill"></i> Please enter Email.').stop(true, true).fadeIn().delay(3000).fadeOut(2000);
            }
            if(adminid === "")
            {
                $admerr.addClass('text-danger').html('<i class="bi bi-exclamation-triangle-fill"></i> Please enter Admin ID.').stop(true, true).fadeIn().delay(3000).fadeOut(2000);
            }

            if(email !=='' && adminid !=='')
            {
                // alert($('#loginForm').serialize());

                $.ajax({
                    type: "POST",
                    url: "logadmin.php",
                    data: $('#loginForm').serialize(),
                    dataType: "json",
                    success: function (data) {
                        if(data.stus === 0)
                        {
                            alert(data.msg);
                        }
                        if(data.stus === 1)
                        {
                            $emlerr.addClass('text-danger').html('<i class="bi bi-exclamation-triangle-fill"></i> Email not found.<br> Please verify it or contact to Super Admin.').stop(true, true).fadeIn().delay(3000).fadeOut(2000);
                        }
                        if(data.stus === 2)
                        {
                            $admerr.addClass('text-danger').html('<i class="bi bi-exclamation-triangle-fill"></i> Invalid Admin ID,<br> Please verify it or contact to Super Admin.' ).stop(true, true).fadeIn().delay(3000).fadeOut(2000);
                        }
                        if(data.stus === 3)
                        {
                            $('#loginForm')[0].reset();
                            window.location.href = 'adminpaneldata.php';
                        }
                    }
                });
            }
                
            });
        });
    </script>

    <!-- <script>
        document.getElementById("loginForm").addEventListener("submit", function(event) {
            event.preventDefault(); 
            
            
            var username = document.getElementById("username").value;
            var password = document.getElementById("password").value;
            
           
            if (username === "student" && password === "password123") {
                
                window.location.href = "adminpaneldata.php"; 
                
            } else {
                alert("Invalid username or password. Please try again.");
            }
        });
    </script> -->
<!--footer-->
 <!-- Footer Section -->
 <div><br><br><br></div>
 <div class="footer">
 <div class="contact-info"> 
   <br><br> <b> <h3>Contact Info</h3></b>
        <br><p>Smt. Neerabai Parkar Vidyanagari A/P Devgad,</p>
       <br> <p>Sindhudurg, Maharashtra, Devgad 416613, India</p>
        <p>📞 +91 94220 71492</p>
        <p>✉️ <a href="mailto:dcddevgad@gmail.com">dcddevgad@gmail.com</a></p>
    </div>
    <div>
       <br><br> <b> <h3>Useful Links</h3></b>
       <br> <a href="https://cic.gov.in/">RTI Committee</a><br>
        <br><a href="https://mu.ac.in/">Mumbai University Website</a><br>
        <br><a href="https://www.ugc.gov.in/">UGC Website</a><br>
        <br><a href="https://mahadbtmahait.in/">State Government Website</a><br>
        <br><a href="https://mu.ac.in/examination">Exam - Mumbai University</a><br>
        <br><a href="https://mahadbtmahait.in/">Caste Discrimination Prevention Portal</a>
    </div>
    <div>
       <b><br><br><h3>Feedback</h3></b>
       <br> <a href="https://cic.gov.in/">RTI Committee</a><br>
        <br><a href="https://mu.ac.in/">Mumbai University Website</a><br>
        <br><a href="https://www.ugc.gov.in/">UGC Website</a><br>
        <br><a href="https://mahadbtmahait.in/">State Government Website</a><br>
        <br><a href="https://mu.ac.in/examination">Exam - Mumbai University</a><br>
        <br><a href="https://mahadbtmahait.in/">Caste Discrimination Prevention Portal</a>
    </div>
</div>
</body>
</html>
