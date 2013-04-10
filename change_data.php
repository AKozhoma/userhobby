<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251" />
<title>User's Forms</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript">
        function redirect($str)
        {
            location.href = $str;
        }
    </script>
</head>

<body>

<?php include ('blocks/db.php');?>
    
<?php 
        
    if (isset($_POST['ch_hobby'])) 
    {
?> 
    <form class="info_form" action="main.php" method="post">
<?php
        $name_hobby = $_POST['name_hobby'];
        $id_user = $_POST['id_user'];    
        echo "<p class='sorry_text_info'>Here you can change your hobby, remember that you are now interested in <strong>".$name_hobby."</strong></p>"; 
        echo "<br><p>select a new hobby:";
?>
        <input type="hidden" name="id_user" value="<?php echo $id_user; ?>" />
        <select name="hobby_change" class="info_text">
            <?php include ('blocks/select_hobby.php'); ?>
        </select>

        <input type="submit" value="Change" name="change1" class="buttonS" /></p>
    </form>
<?php            
    }
        
    if (isset($_POST['ch_password'])) 
    {
?>
    <form class="info_form" action="main.php" method="post">
<?php
        $password = $_POST['password'];
        $id_user = $_POST['id_user'];
        echo "<p class='sorry_text_info'>Here you can change your password</p>"; 
        echo "<br><p>its your old password: <strong>".$password.'</strong></p>';
        echo "<p>enter new password: ";
?>
        <input type="hidden" name="id_user" value="<?php echo $id_user; ?>" />        
        <input type="text" size="20" name="password" class="info_text" />
        <input type="submit" value="Change" name="change2" class="buttonS" /></p>
    </form>
<?php
    }
    
    //to deny access this file from the address bar
    if ((!isset($_POST['ch_hobby'])) and (!isset($_POST['ch_password'])))
    {
        echo '<p class=sorry_text>Sorry, but you must first complete the registration form or enter your login</p>';
?>
    <script type="text/javascript">
        setTimeout("redirect('index.php')",5000);
    </script>
<?php            
    }            
?>
        
</body>
</html>
