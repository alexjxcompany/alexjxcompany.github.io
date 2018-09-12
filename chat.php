<html>
 <head>
  <title>Chat</title>
   <link rel="stylesheet" href="css/chat_style.css">
   <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
 </head>
 <body>
   <textarea readonly="readonly" name="content" id="text_old">
     <?php
     include ("db.php");
     $login = $_GET[ "login" ];
     if (isset($_POST['text']) && $_POST['text']!='' && $_POST['text']!=' ')
     {
       $text = $_POST['text'];
       $result = mysqli_query ($db, "INSERT INTO chat (nickname,message) VALUES('$login','$text')");
}

     $sql = mysqli_query($db, "SELECT * FROM chat");
     while ($result = mysqli_fetch_array($sql)) {
     echo"\n".$result['nickname'].": ".$result['message'];;
   }
     ?>
   </textarea>
<form id="myform" class="Formst" method="POST" action="">
  <input autocomplete="off" type="text" name="text" class='msg' style="width:500px;" >
  <input type="submit" value="Enter">
</form>
 </body>
</html>
 <script type="text/javascript" >
 document.getElementById("text_old").scrollTop=document.getElementById("text_old").scrollHeight;

</script>
