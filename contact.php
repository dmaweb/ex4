<?php

$host="localhost";
$username="root";
$password="root";

// connect to database
$connect = mysql_connect($host, $user, $password)
  or die (mysql_error());

// close the connection
mysql_close($connect);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Exercise 4</title>
</head>
<body>
 <section id="form">
        <h2>Contact me</h2>
        <p>Please fill out the form below.</p>
        <form action="process.php" method="post">
            <label>First Name</label>
            <input name="firstname" type="text" placeholder="First name" />
            <br>
            <label>Last Name</label>
            <input name="lastname" type="text" placeholder="Last name" />
            <br>
            <label>Email</label>
            <input name="email" type="text" placeholder="Email" />
            <br>
            <label>Comments:</label>
            <br>
            <textarea name="comments"></textarea>
            </label>
            <br>
            <input name="submitted" type="submit" value="Submit" />
        </form>
    </section>
    <!-- #form -->
    <section id="thanks">
        Thanks for your submission, [first_name]!
        <br>
        <table>
            <tr>
                <th>First name</th>
                <th>Last name</th>
                <th>Email</th>
                <th>Comments</th>
            </tr>
            [loop through all the entries in the database and display as rows in the table]
        </table>
    </section>
</body>
</html>