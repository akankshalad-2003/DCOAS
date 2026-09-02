<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Devgad College</title>
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
                <li><a href="usermanagement.html">User Management</a></li>
                <li><a href="applicationmanagement.html">Application Management</a></li>
                <li><a href="course and fee management.html">Course & Seat Management</a></li>
                <li><a href="fees.html">Fee Management</a></li>
                <li><a href="notification.html">Notifications</a></li>
                <li><a href="reports.html">Reports</a></li>
                <li><a href="security.html">Security & Backup</a></li>
            </ul>
        </nav>
        <div class="content">
            <header>
                <h1>Admin Panel</h1>
            </header>
            <main>
                <section id="users">
                    <h2>User Management</h2>
                    <p>Manage users, assign roles, and control access.</p>
                </section>
                <section id="applications">
                    <h2>Application Management</h2>
                    <p>Review, approve/reject applications.</p>
                </section>
                <section id="courses">
                    <h2>Course & Seat Management</h2>
                    <p>Manage courses and seat allocations.</p>
                </section>
                <section id="fees">
                    <h2>Fee Management</h2>
                    <p>Track fees and generate receipts.</p>
                </section>
                <section id="notifications">
                    <h2>Notifications</h2>
                    <p>Send updates and announcements.</p>
                </section>
                <section id="reports">
                    <h2>Reports</h2>
                    <p>Generate and analyze reports.</p>
                </section>
                <section id="security">
                    <h2>Security & Backup</h2>
                    <p>Secure login and maintain backups.</p>
                </section>
            </main>
        </div>
    </div>
</body>
</html>
