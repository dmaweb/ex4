<?php

//assign credentials. These will work if you're using mamp and localhost. Change them to the credentials you used when you installed wordpress on your server
$host="localhost";
$username="root";
$password="root";

// connect to database
$connect = mysql_connect($host, $username, $password)
or die (mysql_error());

//if the user has submitted the form, store all the variables in the $_POST superglobal array.
if(isset($_POST['submitted'])) { 
    $firstname=$_POST['firstname'];
    $lastname=$_POST['lastname'];
    $email=$_POST['email'];
    $comments=$_POST['comments'];

    //select the database to read from. If you created the contacts table in your wordpress DB, it's the same one you used when you set uop wordpress
    mysql_select_db("contacts", $connect)
    or die (mysql_error());

    //insert the submitted data into the database
    mysql_query ("INSERT into contacts (firstname, lastname, email, comments) VALUES ('$firstname', '$lastname', '$email', '$comments')", $connect)
    or die (mysql_error());
}

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
            <form action="#" method="post">
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
        Thanks for your submission, <?php echo $firstname; /* display the user's first name */ ?>!
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