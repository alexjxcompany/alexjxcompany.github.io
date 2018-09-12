<?php
    if (isset($_POST['login']))
    { $login = $_POST['login']; if ($login == '') { unset($login);} }

    if (isset($_POST['password']))
    { $password=$_POST['password']; if ($password =='') { unset($password);} }

 if (empty($login) or empty($password))
    {
    exit ("Not all info!");
    }

    $login = stripslashes($login);
    $login = htmlspecialchars($login);

    $password = stripslashes($password);
    $password = htmlspecialchars($password);

    $login = trim($login);
    $password = trim($password);

    include ("db.php");


    $result = mysql_query("SELECT id FROM users WHERE login='$login'",$db);
    $myrow = mysql_fetch_array($result);

    if (!empty($myrow['id'])) {
    exit ("Sorry, this login already registered");
    }

    $result = mysql_query("SELECT id FROM users WHERE pass='$password'",$db);
    $myrow = mysql_fetch_array($result);

    if (!empty($myrow['id'])) {
    exit ("Sorry, this password already registered");
    }


    $result2 = mysql_query ("INSERT INTO users (login,pass) VALUES('$login','$password')");
    if ($result2=='TRUE')
    {
    echo "Congratulations!";
     echo '<form action="index.html" method="post">
    <p>
       <input type="submit" name="submit" value="Sign in">
    </p></form>';
    }
 else {
    echo "Error!";
    }
    ?>
