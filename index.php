<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251" />
<title>User's Forms</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
</head>

<body>

<?php include ('blocks/db.php');?>

<form action="main.php" method="post" class="reg_form" >
    <p id="caption_form">REGISTRATION FORM</p>
    <label><p>Name:</p>
    <p><input type="text" size="30" class="form_text" required="required" name="name" /></p></label>
    <label><p>Lastname:</p>
    <p><input type="text" size="30" class="form_text" required="required" name="lastname" /></p></label>
    <label><p>Date birthday:</p>
    <p><input name="date" class="form_text" size="30" type="text" name="date" value="1985-01-01" required="required" /></p></label>
    <p>Select your hobby:
        <select name="hobby" class="form_text">
            <?php include ('blocks/select_hobby.php'); ?>
        </select></p>
    <label><p>Username:</p>
    <p><input type="text" size="30" class="form_text" name="login" required="required" /></p></label>
    <label><p>Password:</p>
    <p><input type="password" size="30" class="form_text" name="password" required="required" /></p></label>
    <p><input type="reset" value="Reset" class="buttonL" />
    <input type="submit" value="Confirm" name="submit" class="buttonR" /></p>
</form>

<form action="main.php" method="post" class="reg_form" >
    <p id="caption_form">AUTHORIZATION FORM</p>
    <label><p>Username:</p>
    <p><input type="text" size="30" class="form_text" name="login" required="required" /></p></label>
    <label><p>Password:</p>
    <p><input type="password" size="30" class="form_text" name="password" required="required" /></p></label>
    <p><input type="reset" value="Reset" class="buttonL" />
    <input type="submit" value="Login" name="submit2" class="buttonR" /></p>
</form>

<form action="hobby.php" method="post" class="reg_form" >
    <p id="caption_form">ADDING NEW HOBBY</p>
    <label><p>Hobby:</p>
    <p><input type="text" size="30" class="form_text" name="hobby" required="required" /></p></label>
    <label><p>Description:</p>
    <p><textarea cols="10" rows="5" wrap="virtual" class="form_text" maxlength="200" name="description"></textarea></p></label>
    <p><input type="reset" value="Reset" class="buttonL" />
    <input type="submit" value="Add" name="submit3" class="buttonR" /></p>
</form>

<form action="search.php" method="post" class="reg_form" >
    <p id="caption_form">SEARCHING FORM</p>
    <p><label>Find all users with hobby:
        <select name="hobby_change" class="search_text">
            <?php include ('blocks/select_hobby.php'); ?>
        </select>
    </label>
    <input type="submit" value="Search" name="submit_hobby" class="buttonS" /></p>
    
    <p><label>Find all users with date of birthday:
    <input type="text" size="20" class="search_text" name="birthday" value="1985-01-01" required="required" /></label>
    <input type="submit" value="Search" name="submit_birth" class="buttonS" /></p>
</form>

</body>
</html>
