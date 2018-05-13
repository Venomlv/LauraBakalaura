<!DOCTYPE html>
<html lang="lv">
<?php
	require_once($_SERVER["DOCUMENT_ROOT"].'/head.php');
	require_once($_SERVER["DOCUMENT_ROOT"].'/db.php'); 
	require_once($_SERVER["DOCUMENT_ROOT"].'/dictionary.php'); 
	require_once($_SERVER["DOCUMENT_ROOT"].'/User.php'); 
	require_once($_SERVER["DOCUMENT_ROOT"].'/header.php');
	require_once($_SERVER["DOCUMENT_ROOT"].'/language.php');
?>

<?php 
	if(isset($_POST['signup'])) //Функция работает, если человек регистрируется
	{
		$email = $_POST['email'];
		$password = $_POST['password'];
		$errors = false;
		
		if(User::CheckExistEmail($email)) // Эти функции проверяют условия, если не совпадает то записывается в ошибку
			$errors[] = $kluda1;
		if(!User::CheckEmail($email))
			$errors[] = $kluda2;
		if(!User::CheckPassword($password))
			$errors[] = $kluda3;
		
		if(!$errors) // Если ошибок нет, то регистрирует
			User::SignUp($email,$password);
		
	}
	else if(isset($_POST['signin'])) // Функция работает, если человек входит
	{
		$email = $_POST['email'];
		$password = $_POST['password'];
		$errors = false;
		
		if(!User::CheckUserData($email,$password))
			$errors[] = $kluda4;
		if(!$errors) // Если нет ошибок, тогда...
		{
			$uid = User::GetUserId($email);
			$_SESSION['user'] = $uid; // Создаёт сессию, что человек вошёл
			header("Location: /"); // Перекидывает его на главную страницу
		}
	}
?>

<body class="maxSize">
	<div id="overlay" class="maxSize"></div>
	<div id="lending" class="maxSize">
	
	<div class="row justify-content-center rozes-view">
		<div class="col-3">
			<div class="card">
				<div class="card-header">
					<?php echo $log; ?>
				</div>
				<div class="card-body">
					<?php if(isset($_SESSION['user'])):?>
						<?php echo $jauinside; ?>
					<?php else: ?>
						<h6><?php echo $prereg; ?></h6>
						<form method="POST">
							<div class="form-group">
								<input class="form-control" type="text" name="email" placeholder="E - mail">
								<input class="form-control mgtop15" type="password" name="password" placeholder="Password">
								<div class="mgtop15 fleft">
									<button type="submit" class="btn btn-primary" name="signup"><?php echo $reg; ?></button>
									<button type="submit" class="btn btn-success" name="signin"><?php echo $log; ?></button>
								</div>
							</div>
						</form>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
		
		<!--Здесь выводятся ошибки, если их нет-->
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