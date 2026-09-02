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
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: url('project main/sture2.avif') no-repeat center center fixed; /* Set your background image here */
            background-size: cover; /* Ensures the background image covers the entire page */
            display: flex;
        }

        .admin-container {
            display: flex;
            width: 100%;
        }

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
        }

        nav ul li a:hover {
            background: #575757;
        }

        .content {
            margin-left: 270px;
            width: calc(100% - 270px);
            padding: 20px;
        }

        header {
            background: #004080;
            color: #fff;
            padding: 15px;
            text-align: center;
            font-size: 24px;
            border-radius: 5px;
        }

        section {
            margin-bottom: 20px;
            padding: 20px;
            background: #f9f9f9;
            border-radius: 5px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #004080;
        }
    </style>
</head>
<body>
    <div class="admin-container">
        <nav>
            <ul>
                <!-- <li><a href="usermanagement.html">User Management</a></li>
                <li><a href="applicationmanagement.html">Application Management</a></li>
                <li><a href="course and fee management.html">Course & Seat Management</a></li>
                <li><a href="fees.html">Fee Management</a></li>
                <li><a href="notification.html">Notifications</a></li>
                <li><a href="reports.html">Reports</a></li>
                <li><a href="security.html">Security & Backup</a></li> -->

                <li><a href="adminpaneldata.php"><i class="bi bi-person-circle"></i> Student Data</a></li>
                <li><a href="adminfeeddata.php"><i class="bi bi-clipboard2-data-fill"></i> Feedback Data</a></li>
                <li><a href="admindata.php"><i class="bi bi-clipboard-data-fill"></i> Admin Data</a></li>
                <li><a href="admincourses.php"><i class="bi bi-book-fill"></i> Courses</a></li> <!-- New Link for Courses -->
                <li><a href="adminpayment.php"><i class="bi bi-credit-card"></i> Payment</a></li> <!-- New Link for Payment -->
                <?php if($_SESSION['admin_status']==='SA'){?>
                <li><a class="text-white text-start py-lg-2 btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#exampleModal" ><i class="bi bi-person-vcard-fill"></i> Admin Form</a></li>
                <?php } ?>

            </ul>
        </nav>
        <div class="content">
        <div><a class="btn btn-danger float-end" style="letter-spacing:2px;" href="adminlogout.php"><i class="bi bi-box-arrow-left"></i> LOGOUT</a></div>

            <header>
            <h1 class="text-warning">Admin Panel</h1>
            <h3 style="letter-spacing:2px;"><i class="bi bi-clipboard2-data-fill"></i> <u>Admin Data</u></h3>
            </header>
            <main>
<!-- ------------------------------------ADMIN DATA ------------------------------------ -->
    <table id="example" class="display text-center" style="width:100%">
        <thead>
            <tr>
                <th class="text-center" >ID</th>
                <th class="text-center" >NAME</th>
                <th class="text-center"  style="width:13%;">ADMIN STATUS</th>
                <th class="text-center" >CONTACT</th>
                <th class="text-center" >EMAIL</th>

                <?php if($_SESSION['admin_status']==='SA'){?>
                <th class="text-center" >ADMIN ID</th>
                <th class="text-center" >DELETE</th>
                <?php } ?>

            </tr>
        </thead>
        <tbody id="view">
           
        </tbody>
        <tfoot>
            <tr>
                <th class="text-center" >ID</th>
                <th class="text-center" >NAME</th>
                <th class="text-center"  style="width:13%;">ADMIN STATUS</th>
                <th class="text-center" >CONTACT</th>
                <th class="text-center" >EMAIL</th>

                <?php if($_SESSION['admin_status']==='SA'){?>
                <th class="text-center" >ADMIN ID</th>
                <th class="text-center" >DELETE</th>
                <?php } ?>
                
            </tr>
        </tfoot>
    </table>
                
            </main>
        </div>
    </div>

    <!-- --------------------------------MODAL-------------------------------- -->

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <table style="width: 100%;">
        <form id="adminfrm">
            <tr>
                <td class="px-lg-2">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="name" name="name" placeholder="name@example.com">
                        <label for="name"><i class="bi bi-person-fill"></i> Name</label>
                    <span id="nmerr"></span>
                    </div>
                </td>
                <td class="px-lg-2">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="adminid" name="adminid" placeholder="name@example.com">
                        <input type="text" id="action" name="action" value="admin_data" style="display:none;">
                        <label for="adminid"><i class="bi bi-person-vcard-fill"></i> Admin ID</label>
                    <span id="admiderr"></span>
                    </div>
                </td>
            </tr>

            <tr>
                <td class="px-lg-2">
                    <div class="form-floating mb-3">
                        <input type="tel" class="form-control" id="phone" name="phone" placeholder="name@example.com">
                        <label for="phone"><i class="bi bi-telephone-fill"></i> Contact</label>
                    <span id="conerr"></span>
                    </div>
                </td>
                <td class="px-lg-2 pb-lg-3">
                <div class="form-floating">
                        <input type="email" class="form-control" id="email" name="email" placeholder="Password">
                        <label for="floatingPassword"><i class="bi bi-envelope-fill"></i> Email</label>
                    <span id="emlerr"></span>
                    </div>
                </td>
            </tr>

            <tr>
                <td class="px-lg-2">
                    <select class="form-select py-3 " id="adminstus" name="adminstus" aria-label="Default select example">
                        <option value="" selected> Admin_Status</option>
                        <option value="UA">User Admin</option>
                        <option value="SA">Super Admin</option>
                    </select>
                    <span id="admstserr"></span>
                </td>
                
            </tr>
        </form>
        </table>

      </div>
      <div class="modal-footer d-flex justify-content-center">
        <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
        <button type="button" class="btn btn-primary w-50" id="sbtadmin" ><b style='letter-spacing:3px;' >SUBMIT</b></button>
      </div>
    </div>
  </div>
</div>

   

    <script>
        // $('#example').DataTable();
        // new DataTable('#example');
        $(document).ready(function () {
            $.ajax({
                type: "POST",
                url: "adminfetchdata.php",
                // data: "data",
                dataType: "html",
                success: function (show) {
                    $('#view').html(show);
                    $('#example').DataTable();
                    
                }
            });
        });
    </script>
<!-- ---------------------------------------------------ADD ADMIN USER ----------------------------------------------------- -->
    <script>
       $(document).ready(function () {
        var isValid = true;

        
        $('#adminstus').change(function () {
            var adminstus = $(this).val();  

            if (adminstus === "SA") {
                var confirmAction = confirm('Do you want to set status with "Super Admin"...?'); 

                
                if (!confirmAction) {
                    $(this).val('');  
                    $admstserr.addClass('text-danger').html('<i class="bi bi-exclamation-triangle-fill"></i> Please select Admin status').stop(true, true).fadeIn().delay(3000).fadeOut(2000);
                    isValid = false; 
                }
            }
        });

    
    $('#sbtadmin').click(function (e) {
        e.preventDefault(); 

        var $nmerr = $('#nmerr');
        var $emlerr = $('#emlerr');
        var $conerr = $('#conerr');
        var $admiderr = $('#admiderr');
        var $admstserr = $('#admstserr');

        $nmerr.removeClass('text-danger').text('');
        $emlerr.removeClass('text-danger').text('');
        $conerr.removeClass('text-danger').text('');
        $admiderr.removeClass('text-danger').text('');
        $admstserr.removeClass('text-danger').text('');

        var name = $('#name').val();
        var email = $('#email').val();
        var contact = $('#phone').val();
        var adminid = $('#adminid').val();
        var adminstus = $('#adminstus').val();

        var contactPattern = /^\d{10}$/;
        var emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

        if (name === "") {
            $nmerr.addClass('text-danger').html('<i class="bi bi-exclamation-triangle-fill"></i> Please enter Name').stop(true, true).fadeIn().delay(3000).fadeOut(2000);
            isValid = false;
        }

        if (email === '') {
            $emlerr.addClass('text-danger').html('<i class="bi bi-exclamation-triangle-fill"></i> Please enter Email').stop(true, true).fadeIn().delay(3000).fadeOut(2000);
            isValid = false;
        }

        if (!emailPattern.test(email)) {
            $emlerr.addClass('text-danger').html('<i class="bi bi-exclamation-triangle-fill"></i> Please enter a valid Email address').stop(true, true).fadeIn().delay(3000).fadeOut(2000);
            isValid = false;
        }

        if (contact === '') {
            $conerr.addClass('text-danger').html('<i class="bi bi-exclamation-triangle-fill"></i> Please enter Contact Number').stop(true, true).fadeIn().delay(3000).fadeOut(2000);
            isValid = false;
        } else if (!contactPattern.test(contact)) {
            $conerr.addClass('text-danger').html('<i class="bi bi-exclamation-triangle-fill"></i> Please enter a valid Contact Number (10 digits)').stop(true, true).fadeIn().delay(3000).fadeOut(2000);
            isValid = false;
        }

        if (adminid === '') {
            $admiderr.addClass('text-danger').html('<i class="bi bi-exclamation-triangle-fill"></i> Please enter Admin ID').stop(true, true).fadeIn().delay(3000).fadeOut(2000);
            isValid = false;
        }

        if (adminstus === "") {
            $admstserr.addClass('text-danger').html('<i class="bi bi-exclamation-triangle-fill"></i> Please select Admin status').stop(true, true).fadeIn().delay(3000).fadeOut(2000);
            isValid = false;
        }

        
        if (isValid) {
            var admindata = $('#adminfrm').serialize();
            $.ajax({
                type: "POST",
                url: "insertadmindata.php",
                data: admindata,
                dataType: "json",
                success: function (data) {
                    if (data.stus === 0) {
                        alert(data.msg);
                    } else if (data.stus === 1) {
                        alert(data.msg);
                        location.reload();  
                    }
                    else if (data.stus === 2) {
                    $admiderr.addClass('text-danger').html('<i class="bi bi-exclamation-triangle-fill"></i> '+ data.msg).stop(true, true).fadeIn().delay(3000).fadeOut(2000);    
                    }
                    else if (data.stus === 3){
                        $emlerr.addClass('text-danger').html('<i class="bi bi-exclamation-triangle-fill"></i> ' + data.msg).stop(true, true).fadeIn().delay(3000).fadeOut(2000);
                    }
                    else if (data.stus === 4){
                        $admstserr.addClass('text-danger').html('<i class="bi bi-exclamation-triangle-fill"></i> '+ data.msg).stop(true, true).fadeIn().delay(3000).fadeOut(2000);

                    }
                },
                error: function () {
                    alert("An error occurred while submitting the form. Please try again.");
                }
            });
        }
    });
});

    </script>

<!-- ----------------- DELETE ADMIN USER --------------------- -->
    <script>
        $(document).ready(function(){

            $(document).on('click','.del', function(){

            if(confirm('Do you want to delete the Record...'))
            {
                var id = $(this).data('udel');
                var action="del_admin";
            // alert(id);

                $.ajax({
                    type: "POST",
                    url: "insertadmindata.php",
                    data: {id: id, action: action},
                    dataType: "json",
                    success: function (data) {
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
            }
            });

        });
    </script>

</body>
</html>
