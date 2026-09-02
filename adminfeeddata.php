<!DOCTYPE html>
<html lang="en">

<?php
session_start();
if(!isset($_SESSION['admin_id']))
{
    header('Location: adminlogin.html');
    exit;
}
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Devgad College</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link rel="stylesheet" href="bootstrap5.css">
    <link rel="stylesheet" href="bootstrapicon.css">
    <script src="bootstrap5.js"></script>
    <script src="ajax.js"></script>

    <link rel="stylesheet" href="dataTable.css">
    <script src="dataTable.js"></script>
<style>

    /* General Admin Panel Style */
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background: url('project main/sture2.avif') no-repeat center center fixed; /* Set your background image here */
    background-size: cover; /* Ensures the background image covers the entire page */
    display: flex;
}

/* Admin Container */
.admin-container {
    display: flex;
    width: 100%;
    min-height: 100vh;
}

/* Sidebar */
nav {
    width: 250px;
    background: #333;
    padding: 20px;
    height: 100vh;
    position: fixed;
    left: 0;
    top: 0;
    overflow-y: auto;
}

nav ul {
    list-style: none;
    padding: 0;
    margin: 0;
}

nav ul li {
    margin-bottom: 15px;
}

nav ul li a {
    color: white;
    text-decoration: none;
    display: block;
    padding: 10px;
    background: #444;
    border-radius: 5px;
    font-size: 16px;
}

nav ul li a:hover {
    background: #575757;
}

/* Main Content */
.content {
    margin-left: 270px;
    width: calc(100% - 270px);
    padding: 20px;
    background: rgba(255, 255, 255, 0.9); /* Slightly transparent background */
    border-radius: 10px;
}

/* Header Style */
header {
    background: #004080;
    color: #fff;
    padding: 15px;
    text-align: center;
    font-size: 24px;
    border-radius: 5px;
}

h1 {
    margin: 0;
}

h3 {
    letter-spacing: 2px;
}

/* Table Style */
table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
    text-align: center;
}

th, td {
    padding: 12px 15px;
    border: 1px solid #ddd;
}

th {
    background-color: #004080;
    color: #fff;
}

td {
    background-color: #f9f9f9;
}

td button {
    background-color: #ff3b30;
    color: white;
    border: none;
    padding: 5px 10px;
    cursor: pointer;
    border-radius: 5px;
    margin: 5px;
    font-size: 14px;
}

td button:hover {
    background-color: #e60000;
}

/* Logout Button */
.btn-danger {
    background-color: #ff3b30;
    color: white;
    padding: 10px 20px;
    border-radius: 5px;
    text-decoration: none;
    font-size: 16px;
    letter-spacing: 2px;
    float: right;
}

.btn-danger:hover {
    background-color: #e60000;
}

/* Footer */
footer {
    text-align: center;
    margin-top: 30px;
    padding: 20px;
    background-color: #333;
    color: white;
    position: fixed;
    left: 0;
    bottom: 0;
    width: 100%;
}

/* Responsive Design */
@media screen and (max-width: 768px) {
    .admin-container {
        flex-direction: column;
    }
    nav {
        width: 100%;
        position: relative;
    }
    .content {
        margin-left: 0;
        width: 100%;
    }
}

    </style>
</head>
<body>
    <div class="admin-container">
        <nav>
            <ul>
               

                <li><a href="adminpaneldata.php"><i class="bi bi-person-circle"></i> Student Data</a></li>
                <li><a href="adminfeeddata.php"><i class="bi bi-clipboard2-data-fill"></i> Feedback Data</a></li>
                <li><a href="admindata.php"><i class="bi bi-clipboard-data-fill"></i> Admin Data</a></li>
                <li><a href="admincourses.php"><i class="bi bi-book-fill"></i> Courses</a></li> <!-- New Link for Courses -->
                <li><a href="adminpayment.php"><i class="bi bi-credit-card"></i> Payment</a></li> <!-- New Link for Payment -->
            </ul>
        </nav>
        <div class="content">
        <div><a class="btn btn-danger float-end" style="letter-spacing:2px;" href="adminlogout.php"><i class="bi bi-box-arrow-left"></i> LOGOUT</a></div>

            <header>
            <h1 class="text-warning">Admin Panel</h1>
            <h3 style="letter-spacing:2px;"><i class="bi bi-clipboard2-data-fill"></i> <u>Feedback Data</u></h3>
            </header>
            <main>
<!-- ------------------------------------FEEDBACK DATA ------------------------------------ -->
    <table id="example" class="display text-center" style="width:100%">
        <thead>
            <tr>
                <th class="text-center" style="width:5%;">ID</th>
                <th class="text-center" style="width:15%;">NAME</th>
                <th class="text-center" style="width:18%;">EMAIL</th>
                <th class="text-center" style="width:12%;">CONTACT</th>
                <th class="text-center" style="width:40%;">FEEDBACK</th>
                <?php if($_SESSION['admin_status']==='SA'){?>
                <th class="text-center" style="width:10%;">DELETE</th>
                <?php } ?>
            </tr>
        </thead>
        <tbody id="view">
           
        </tbody>
        <tfoot>
            <tr>
                <th class="text-center">ID</th>
                <th class="text-center">NAME</th>
                <th class="text-center">EMAIL</th>
                <th class="text-center">CONTACT</th>
                <th class="text-center">FEEDBACK</th>
                <?php if($_SESSION['admin_status']==='SA'){?>
                <th class="text-center">DELETE</th>
                <?php } ?>
            </tr>
        </tfoot>
    </table>
                
            </main>
        </div>
    </div>
<!-- --------------------------------------------------FETCH FEED DATA --------------------------------------- -->
    <script>
        // $('#example').DataTable();
// new DataTable('#example');
        $(document).ready(function () {
            $.ajax({
                type: "POST",
                url: "fetchfeeddata.php",
                // data: "data",
                dataType: "html",
                success: function (show) {
                    $('#view').html(show);
                    $('#example').DataTable();
                    
                }
            });
        });
    </script>

    <!-- ---------------------------------------------DELETE FEED DATA ------------------------------------ -->

    <script>
        $(document).ready(function () {
            $(document).on('click','.del', function(){
                
                if(confirm('Do you want to delete the Record...'))
                var id = $(this).data('udel');
                var action="del_feed";
                // alert(action);
               
                $.ajax({
                    url: 'delfeeddata.php',
                    type: 'POST',
                    data: { id: id, action: action },
                    dataType: 'json',
                    success: function(data) {
                        console.log(data);  
                        if (data.stus === 1) {
                            alert(data.msg);
                            location.reload();
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error("AJAX error: " + status + " - " + error);
                    }
                });

            });
        });
    </script>
</body>
</html>
