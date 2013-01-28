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
	
    //this is the handler for adding new hobby in the database
    if (isset($_POST['submit3']))
    {
        $hobby = $_POST['hobby'];
        $description = $_POST['description'];
        $result_ch = mysql_query("SELECT * FROM hobby WHERE name_hobby='$hobby'", $db);
        if (mysql_num_rows($result_ch)>0)
        {
            echo "<p class='sorry_text'>This kind of hobby already exists in the database, change your data please</p>";
?>
            <script type="text/javascript">
                setTimeout("redirect('index.php')",5000);
            </script>
<?php
            exit();
        }
        
        $result = mysql_query("INSERT INTO hobby (name_hobby, description_hobby) VALUES ('$hobby', '$description')", $db);
        if ($result)
        {
            echo "<p class='sorry_text'>This kind of hobby is successfully added to the database, you can now choose it to users in the registration form</p>";
        }
        else
        {
            echo "<p class='sorry_text'>Failed to query the database</p>";
        }
?>
    <script type="text/javascript">
        setTimeout("redirect('index.php')",5000);
    </script>
<?php
    }    
    else
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