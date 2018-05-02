<!DOCTYPE html>
<html lang="lv">
<?php
	require_once($_SERVER["DOCUMENT_ROOT"].'/head.php');
	require_once($_SERVER["DOCUMENT_ROOT"].'/db.php'); 
	require_once($_SERVER["DOCUMENT_ROOT"].'/dictionary.php'); 
	require_once($_SERVER["DOCUMENT_ROOT"].'/User.php'); 
?>

<?php 
	if(isset($_POST['signup']))
	{
		$email = $_POST['email'];
		$password = $_POST['password'];
		$errors = false;
		
		if(User::CheckExistEmail($email))
			$errors[] = $kluda1;
		if(!User::CheckEmail($email))
			$errors[] = $kluda2;
		if(!User::CheckPassword($password))
			$errors[] = $kluda3;
		
		if(!$errors)
			User::SignUp($email,$password);
		
	}
?>

<body class="maxSize">
	<div id="overlay" class="maxSize"></div>
	<div id="lending" class="maxSize">
		<div class="language">
		<?php echo isset($_GET['lang'])&&$_GET['lang'] == "ru" ? "<a href=\"/catalog/?lang=lv\">LV</a>" :  "<a href=\"/catalog/?lang=ru\">RU</a>"; ?>
		<?php $currentlang = isset($_GET['lang'])&&$_GET['lang'] == "ru" ? "?lang=ru" : ""; ?>
		<?php $inside = isset($_GET['lang'])&&$_GET['lang'] == "ru" ? "&lang=ru" : "&lang=lv"; ?>
		</div>
		<div id="menu">
			<a href="<?php echo $href2.''.$currentlang; ?>"><?php echo $about; ?></a>
			<a href="<?php echo $href3.''.$currentlang; ?>"><?php echo $newrozes; ?></a>
			<a class="active" href="<?php echo $href1.''.$currentlang; ?>"><?php echo $catalog; ?></a>
			<a href="<?php echo $href4.''.$currentlang; ?>"><?php echo $contacts; ?></a>
			<a href="<?php echo $href5.''.$currentlang; ?>"><i class="fas fa-user-plus"></i></a>
		</div>
		<div id="registration">
				<h3><?php echo $prereg; ?></h3>
				<form class="form-control" method="POST">
					<input class="form-input" name="email" placeholder="E - mail" type="text">
					<input class="form-input" name="password" placeholder="Password" type="password">
					<input class="myBtn reg" type="submit" name="signup" value="<?php echo $reg; ?>">
					<input class="myBtn" type="submit" name="signin" value="<?php echo $log; ?>">
				</form>
			</div>
		</div>
		<?php $sc = 20; if(isset($errors)&& is_array($errors)): ?>
			<?php foreach($errors as $error): ?>
				<div class="enf noselect" style="top:<?php echo $sc;?>px;"><?php echo $error;?></div>
			<?php $sc += 55;?>
			<?php endforeach; ?>
		<?php elseif (isset($_POST['signup']) && !$errors): ?> 
				<div class="enf noselect good" style="top:<?php echo $sc;?>px;"><?php echo $goodreg;?></div>
		<?php endif; ?>
	</div>
</body>

</html>