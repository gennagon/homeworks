<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
</head>
<body>
<form action="form.php" method="POST">
	<p>Введите свою цену</p>
	<input type="text" name="userName">
	<p>Введите свою сумму</p>
	<input type="password" name="userPass">
	<input type="submit" name="submit">
</form>
<?PHP
if (is_readable("user.DB")){
	$data=file_get_contents("user.DB");
	$users=unserialize($data);
}
if (isset($_POST['submit'])){
	$userName=$_POST['userName'];
	$userPass=$_POST['userPass'];
	$user=['userName'=>$userName,'userPass'=>$userPass];
	$users[]=$user;
	$usersDB=serialize($users);
	//echo "<br> $usersDB";
	file_put_contents("user.DB",$usersDB);
}
if (isset($users)) {
	foreach ($users as $user){
		echo "<br>".$user['userName'].": ".$user['userPass'];
	}	
	echo "<pre>";
	print_r($users);
}
?>
</body>
</html>