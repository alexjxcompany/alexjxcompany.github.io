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

$result = mysqli_query($db, "SELECT id FROM users WHERE login='$login'");
$myrow1 = mysqli_fetch_array($result);
$result = mysqli_query($db, "SELECT id FROM users WHERE pass='$password'");
$myrow2 = mysqli_fetch_array($result);

if ($myrow1 != $myrow2)
{exit ("Wrong login or password!");
} else header("Refresh: 1;  url=chat.php?login=$login");

?>
