<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251" />
<title>Test task Inuits</title>
<link href="style.css" rel="stylesheet" type="text/css" />
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
    
    //to deny access this file from the address bar
    if ((!isset($_POST['submit'])) and (!isset($_POST['submit2'])) and (!isset($_POST['change1'])) and (!isset($_POST['change2'])))
    {
        echo '<p class=sorry_text>Sorry, but you must first complete the registration form or enter your login</p>';
?>
    <script type="text/javascript">
        setTimeout("redirect('index.php')",5000);
    </script>
<?php            
    }
    
    //The main processing of user data
    else
    {            
?>

<?php
    
        //this is the handler for the data from the registration form
        if (isset($_POST['submit']))
        {
            if (isset($_POST['name'])) {$name = $_POST['name'];}
            if (isset($_POST['lastname'])) {$lastname = $_POST['lastname'];}
            if (isset($_POST['date'])) {$date = $_POST['date'];}
            if (isset($_POST['hobby'])) {$hobby = $_POST['hobby'];}
            if (isset($_POST['login'])) {$login = $_POST['login'];}
            if (isset($_POST['password'])) {$password = $_POST['password'];}
            
            $result = mysql_query("SELECT * FROM user WHERE login='$login'", $db);
            if (mysql_num_rows($result)>0)
            {
                echo "<p class='sorry_text'>This username already exists in the database, change your data please</p>";
?>
            <script type="text/javascript">
                setTimeout("redirect('index.php')",5000);
            </script>
<?php
            exit();
            }
            else
            {
                mysql_query("INSERT INTO user (name_user, lastname_user, date_b, login, password, id_hobby) VALUES ('$name', '$lastname', '$date', '$login', '$password', '$hobby')", $db);
            }       
        }
    
        //this is the handler for the data from the autorization form
        if (isset($_POST['submit2']))
        {
            if (isset($_POST['login'])) {$login = $_POST['login'];}
            if (isset($_POST['password'])) {$password = $_POST['password'];}
            $result = mysql_query("SELECT id_hobby FROM user WHERE password='$password' and login='$login'", $db);
            if (!$result)
            {
                echo "<p class='sorry_text'>Failed to query the database</p>";
            }
            
            if (mysql_num_rows($result)<=0)
            {
                echo "<p class='sorry_text'>There is no user in the database with the same name and password</p>";
?>
            <script type="text/javascript">
                setTimeout("redirect('index.php')",5000);
            </script>
<?php
            exit();
            }
            else
            {
                $myrow = mysql_fetch_array($result);
                $hobby = $myrow['id_hobby'];
            }
        }    
    
        //this is the handler for the data from the change hobby page
        if (isset($_POST['change1']))
        {
            $id_user = $_POST['id_user'];
            $hobby_change = $_POST['hobby_change'];
            mysql_query("UPDATE user SET id_hobby='$hobby_change' WHERE id_user=$id_user",$db);
            $result = mysql_query("SELECT * FROM user WHERE id_user=$id_user", $db);
            if (!$result)
            {
                echo "<p class='sorry_text'>Failed to query the database</p>";
            }
            
            $myrow = mysql_fetch_array($result);
            $hobby = $myrow['id_hobby'];
            $login = $myrow['login'];
            $password = $myrow['password'];
        }   
    
        //this is the handler for the data from the change password page
        if (isset($_POST['change2']))
        {
            $id_user = $_POST['id_user'];
            $password = $_POST['password'];
            mysql_query("UPDATE user SET password='$password' WHERE id_user=$id_user",$db);
            $result = mysql_query("SELECT * FROM user WHERE id_user=$id_user", $db);
            if (!$result)
            {
                echo "<p class='sorry_text'>Failed to query the database</p>";
            }
            
            $myrow = mysql_fetch_array($result);
            $hobby = $myrow['id_hobby'];
            $login = $myrow['login'];
            $password = $myrow['password'];
        }
    
        //The following is the main output code of personal user data    
        $result_info = mysql_query("SELECT * FROM user WHERE password='$password' and login='$login'", $db);
        if (!$result_info)
        {
            echo "<p class='sorry_text'>Failed to query the database</p>";
        }
        
        $myrow_info = mysql_fetch_array($result_info);
    
        $result_hobby = mysql_query("SELECT * FROM hobby WHERE id_hobby='$hobby'", $db);
        if (!$result_hobby)
        {
            echo "<p class='sorry_text'>Failed to query the database</p>";
        }
        
        $myrow_hobby = mysql_fetch_array($result_hobby);
        $name_hobby = $myrow_hobby['name_hobby'];
    
        echo '<p id="caption_info_form">Hello, '.$myrow_info['name_user'].' ('.$myrow_info['login'].')!</p>';
    
?>
   
    <form class="info_form" method="post" action="change_data.php">
        <table class="table">
        <tr>
            <th colspan="3" id="caption_form"><?php echo 'YOUR PERSONAL INFORMATION'; ?></th>
        </tr>
        
        <tr>
            <td class="left_td"><?php echo 'name:'; ?></td>
            <td><?php echo $myrow_info['name_user']; ?></td>
        </tr>
        
        <tr>
            <td class="left_td"><?php echo 'last name:'; ?></td>
            <td><?php echo $myrow_info['lastname_user']; ?></td>
        </tr>
        
        <tr>
            <td class="left_td"><?php echo 'date of birthday:'; ?></td>
            <td><?php echo $myrow_info['date_b']; ?></td>
        </tr>
        
        <tr>
            <td class="left_td"><?php echo 'hobby:'; ?></td>
            <td><?php echo $myrow_hobby['name_hobby']; ?></td>
            <input type="hidden" name="name_hobby" value="<?php echo $myrow_hobby['name_hobby']; ?>" />
            <input type="hidden" name="password" value="<?php echo $myrow_info['password']; ?>" />
            <input type="hidden" name="id_user" value="<?php echo $myrow_info['id_user']; ?>" />
            <td><input type="submit" value="Change hobby" name="ch_hobby" class="buttonR" /></td>
        </tr>
        
        <tr>
            <td class="left_td"><?php echo 'login:'; ?></td>
            <td><?php echo $myrow_info['login']; ?></td>
        </tr>
        
        <tr>
            <td class="left_td"><?php echo 'password:'; ?></td>
            <td><?php echo $myrow_info['password']; ?></td>
            <td><input type="submit" value="Change password" name="ch_password" class="buttonR" /></td>
        </tr>
        
        </table>
    </form>
<?php 
    }
?>    
</body>
</html>
