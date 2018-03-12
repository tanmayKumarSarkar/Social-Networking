<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form method="post" action="new_user.php">
<table width="530" height="673" border="0" cellpadding="5" cellspacing="5">
<tr></tr>
<tr>
  <th scope="col">ENTER YOUR USERNAME ::</th>
  <th scope="col"><input type="text" name="username" required/></th>
</tr>
<tr>
  <th scope="row">ENTER PASSWORD ::</th>
  <td  align="middle"><input name="password1" type="password"   required/></td>
</tr>
<tr>
  <th scope="row">RE-ENTER PASSWRD ::</th>
  <td align="middle"><input name="password2" type="password"   required/></td>
</tr>
<tr>
  <th scope="row">ENTER YOUR FIRST NAME ::</th>
  <td align="middle"><input type="text" name="fname" required/></td>
</tr>
<tr>
  <th scope="row">ENTER YOUR LAST NAME ::</th>
  <td align="middle"><input type="text" name="lname" required/></td>
</tr>
<tr>
  <th scope="row">YOUR ADDRESS ::</th>
  <td align="middle"><input type="text" name="address" required/></td>
</tr>
<tr>
  <th scope="row">EMAIL ADDRESS ::</th>
  <td align="middle"><input type="email" name="email" required/></td>
</tr>
<tr>
  <th scope="row">DATE OF BIRTH ::</th>
  <td align="middle">
  <select name="dob_day">
  <option selected="selected">--day--</option>
  <?php for($day=01;$day<32;$day++){ ?>
  <option name="<?php echo $day ;?>"  value='<?php echo $day ; ?>'><?php echo $day ;?></option>
  <?php } ?>
  </select>
  <select name="dob_month">
  <option selected="selected">--month--</option>
  <?php for($month=01;$month<13;$month++){ ?>
  <option name="<?php echo $month ;?>"  value='<?php echo $month ; ?>'><?php echo $month ;?></option>
  <?php } ?>
  </select>
  <select name="dob_year">
  <option selected="selected">--year--</option>
  <?php for($year=1960;$year<2014;$year++){ ?>
  <option name="<?php echo $year ;?>" value='<?php echo $year ; ?>'><?php echo $year ;?></option>
  <?php } ?>
  </select>
  </td>
</tr>
<tr>
  <th scope="row">CONTACT NO. ::</th>
  <td align="middle"><input type="text" name="contact" pattern="[0-9]{10}"/></td>
</tr>
<tr>
  <th scope="row">UPLOAD YOUR PICTURE ::</th>
  <td align="middle">&nbsp;</td>
</tr>
<tr>
  <th scope="row">GENDER ::</th>
  <td align="middle">male &nbsp;&nbsp;<input type="radio" name="gender" value="male" />
  					female &nbsp;&nbsp;<input type="radio" name="gender" value="female" /></td>
</tr>
<tr>
  <th scope="row">&nbsp;</th>
  <td align="middle"><input type="submit" value="register" /></td>
</tr>
<tr>
  <th scope="row">&nbsp;</th>
  <td align="middle">&nbsp;</td>
</tr>
</table>
</body>
</html>
