<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>APLIKASI PENGELOLAAN ARSIP - Silahkan Login</title>
<link rel="shortcut icon" href="images/logo1.png">
<link rel="stylesheet" type="text/css" href="stylelogin.css"/>

<script type="text/javascript">
function validasi(form){
if (form.username.value == ""){
alert("Anda belum mengisikan Username");
form.username.focus();
return (false);
}
     
if (form.password.value == ""){
alert("Anda belum mengisikan Password");
form.password.focus();
return (false);
}
return (true);
}
</script>

</head>

<body OnLoad="document.login.username.focus();">
<div id="main">

<div id="container"> Aplikasi Pengelolaan Arsip<br/>
<br/>
<form id="form-login" name="login" method="post" action="cek_login.php" onSubmit="return validasi(this)">
  <input type="text" name="username" size="20" id="input" align="absmiddle" placeholder="User ID" class="ikon form"/>
  <input type="password" name="password" size="20" id="input" align="absmiddle" placeholder="Pass ID" class="ikon2 form" />
  <br />
  
  <input name="Submit" type="image" src="images/login.png" size="50px" value="LOGIN" class="hvr-fade tombol" align="absmiddle"/>
</form>
</div>

<div class="clear"></div>

</div>
</body>
</html>
