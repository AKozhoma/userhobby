<?php
    header('Content-Type: text/html; charset=utf-8');

    include ('blocks/db.php');
    
    //The handler is to create CSV file search results by date of birth
    if (isset($_POST['exp_birth'])) 
    {
        if (isset($_POST['birth'])) { $birth = $_POST['birth']; }
        $str_query = "SELECT name_user, lastname_user, name_hobby FROM user, hobby WHERE date_b='$birth' and user.id_hobby=hobby.id_hobby";
        
        if (!$result = mysql_query($str_query, $db)) 
        {
            echo "<p class='sorry_text'>Failed to query the database</p>";
            exit();        
        }    
                
        header('Content-Type: application/vnd.ms-excel; charset=utf-8');
        header('Content-Disposition: attachment;filename="user_birthday_'.$birth.'.csv"');
        header("Content-Transfer-Encoding: binary ");
        
        echo "name_user|lastname_user|name_hobby"."\n";
        while ($myrow = mysql_fetch_row($result))
        {
            foreach ($myrow as $value)
            {
                echo "". $value . "|";
            }
            echo "\n";
        }   
    }
    
    //The handler is to create CSV file search results by hobby
    if (isset($_POST['exp_hobby'])) 
    {
        if (isset($_POST['hobby'])) {$hobby_name = $_POST['hobby'];}
        $str_query = "SELECT name_user, lastname_user, date_b FROM user, hobby WHERE hobby.name_hobby='$hobby_name' and user.id_hobby=hobby.id_hobby";
    
        if (!$result = mysql_query($str_query, $db)) 
        {
            echo "<p class='sorry_text'>Failed to query the database</p>";
            exit();        
        }    
    
        echo "name_user|lastname_user|date_b"."\n";
        
        header('Content-Type: application/vnd.ms-excel; charset=utf-8');
        header('Content-Disposition: attachment;filename="user_'.$hobby_name.'_'.date("d-m-Y").'.csv"');
        header("Content-Transfer-Encoding: binary ");
        
        while ($myrow = mysql_fetch_row($result))
        {
            foreach ($myrow as $value)
            {
                echo "". $value . "|";
            }
            echo "\n";
        }
    }
    
    //to deny access this file from the address bar
    if ((!isset($_POST['exp_hobby'])) and (!isset($_POST['exp_birth'])))
    {
        echo '<p>Sorry, but you must first complete the registration form or enter your login</p>';                
    }            
?>