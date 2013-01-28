<?php 
    $result = mysql_query ("SELECT id_hobby, name_hobby FROM hobby", $db);

    if (!$result)
    {
        echo "<p>Query data failed please contact technical support service<br><strong>error code: </strong>", mysql_error(),"</p>";
        exit();
    }

    if (mysql_num_rows($result) > 0)
    {
        $myrow = mysql_fetch_array ($result);
        do
        {
            printf("<option value = '%s'>%s</option>", $myrow["id_hobby"], $myrow["name_hobby"]);
        }
        while ($myrow = mysql_fetch_array ($result));	
    }
    else 
    {
        echo "<p>Information on this request can not be removed from the database, the table has no appropriate records</p>";
        exit();
    }
?>