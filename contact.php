<?php
//assign credentials. These will work if you're using mamp and localhost. Change them to the credentials you used when you installed wordpress on your server
$host="localhost";
$username="dmaprof_wp";
$password="123dma321";
// connect to database
$connect = mysql_connect($host, $username, $password)
or die (mysql_error());
//if the user has submitted the form, store all the variables in the $_POST superglobal array.
if(isset($_POST['submitted'])) {
$firstname=mysql_real_escape_string($_POST['firstname']);
$lastname=mysql_real_escape_string($_POST['lastname']);
$email=mysql_real_escape_string($_POST['email']);
$comments=mysql_real_escape_string($_POST['comments']);

//select the database to read from. If you created the contacts table in your wordpress DB, it's the same one you used when you set uop wordpress
mysql_select_db("dmaprof_wp3", $connect)
or die (mysql_error());
//insert the submitted data into the database
mysql_query ("INSERT into contacts (firstname, lastname, email, comments) VALUES ('$firstname', '$lastname', '$email', '$comments')", $connect)
or die (mysql_error());
}
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
    <?php if(isset($_POST['submitted'])) { //only show the thank you message and the list of contacts AFTER the user submits their info.
    //escape out of php ?>
    <section id="thanks">
        Thanks for your submission, <?php echo $firstname; /* display the user's first name */ ?>!
        <h2>Contact list</h2>
        <table>
            <tr>
                <th>Entry ID</th>
                <th>First name</th>
                <th>Last name</th>
                <th>Email</th>
                <th>Comments</th>
                <th>Time of submission</th>
            </tr>
            <?php $contacts = mysql_query('SELECT * from contacts', $connect)
            or die (mysql_error());
            // loop through all the entries in the database and display as rows in the table
            while ($row = mysql_fetch_row($contacts)) {
            // echo the opening tab;e row tag
            echo "<tr>";
                //treat each field in the row as a single piece of data that we can echo out between <td> tags
                foreach ($row as $field) { 
                echo "<td>" . $field . "</td>";
                }
            // echo the closing table row tag
            echo "</tr>";
            }
            // close the connection
            mysql_close($connect);
            ?>
        </table>
    </section>
    <?php // go back into php to close out the if statement with a curly bracket
    } ?>
</body>
</html>
