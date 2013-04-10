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
	
    //Searching by hobby
    if (isset($_POST['submit_hobby']))
    {
        $i = 1;
        $hobby = $_POST['hobby_change'];
        
        $result_hobby = mysql_query("SELECT name_hobby FROM hobby WHERE id_hobby='$hobby'", $db);
        if (!$result_hobby)
        {
            echo "<p class='sorry_text'>Failed to query the database</p>";
        }
        
        $myrow_hobby = mysql_fetch_array($result_hobby);
        $hobby_name = $myrow_hobby['name_hobby'];
        
        $result = mysql_query("SELECT * FROM user WHERE id_hobby='$hobby'", $db);
        if (!$result)
        {
            echo "<p class='sorry_text'>Failed to query the database</p>";
        }
        
        if (mysql_num_rows($result)>0)
        {
?>
    <form method="post" class="info_form" action="csvfile.php">
        <table class="table_search">
            <tr>
                <th colspan='4'><?php echo 'All these people like <u>'.$hobby_name.'</u>'; ?></th>
            </tr>
<?php
            $myrow = mysql_fetch_array($result);
            do 
            {
?>
            <tr>
                <td><?php echo $i++; ?></td>
                <td><?php echo $myrow['name_user']; ?></td>
                <td><?php echo $myrow['lastname_user']; ?></td>
                <td><?php echo $myrow['date_b']; ?></td>
            </tr>              
<?php            
            }
            while ($myrow = mysql_fetch_array($result));
?>
        </table>
        <input type="hidden" value="<?php echo $hobby_name; ?>" name="hobby" />
        <input type="submit" value="Export result to CSV file" name="exp_hobby" />    
    </form>
<?php
        
        }
        else echo '<p class=sorry_text>The database is not present users with such a hobby</p>';           
    }
    
    //Searching by date of birthday
    if (isset($_POST['submit_birth']))
    {
        $i = 1;
        $birth = $_POST['birthday'];
        
        $result = mysql_query("SELECT * FROM user, hobby WHERE (date_b='$birth') and (user.id_hobby=hobby.id_hobby)", $db);
        if (!$result)
        {
            echo "<p class='sorry_text'>Failed to query the database</p>";
        }
        
        if (mysql_num_rows($result)>0)
        {
?>
    <form method="post" class="info_form" action="csvfile.php">
        <table class="table_search">
            <tr>
                <th colspan='4'><?php echo "All these people's birthday on <u>".$birth."</u>"; ?></th>
                <input type="hidden" value="<?php echo $birth; ?>" name="birth" />
            </tr>
<?php
            $myrow = mysql_fetch_array($result);
            do 
            {
?>
            <tr>
                <td><?php echo $i++; ?></td>
                <td><?php echo $myrow['name_user']; ?></td>
                <td><?php echo $myrow['lastname_user']; ?></td>
                <td><?php echo $myrow['name_hobby']; ?></td>
            </tr>              
<?php            
            }
            while ($myrow = mysql_fetch_array($result));
?>
        </table>
        
        <input type="submit" value="Export result to CSV file" name="exp_birth" />
    </form>
<?php
        }
        else echo '<p class=sorry_text>In the database there is no user with this date of birth</p>';
    }    
    
    //to deny access this file from the address bar
    if ((!isset($_POST['submit_birth'])) and (!isset($_POST['submit_hobby'])))
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