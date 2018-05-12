<!DOCTYPE html>
<html lang="lv">
<?php
	require_once($_SERVER["DOCUMENT_ROOT"].'/head.php');
	require_once($_SERVER["DOCUMENT_ROOT"].'/db.php'); 
	require_once($_SERVER["DOCUMENT_ROOT"].'/dictionary.php'); 
	require_once($_SERVER["DOCUMENT_ROOT"].'/Rozes.php'); 
?>

<body class="maxSize">
	<div id="overlay" class="maxSize"></div>
	<div id="lending" class="maxSize">
		<div id="tk-menu">
			<?php require_once($_SERVER["DOCUMENT_ROOT"].'/header.php');
				require_once($_SERVER["DOCUMENT_ROOT"].'/language.php'); ?>
		</div>
		<div class="card-columns four"><!--Здесь он выводит розы пока они есть в базе по определённому условию-->
			<?php $rozes = Rozes::GetPopularRozes(); foreach($rozes as $roze): ?>
				<div class="card" style="width: 18rem;">
					<img class="card-img-top" src="/img/rozes/<?php echo $roze['rimage']; ?>" alt="<?php echo $roze['rnamelv']; ?>">
					<div class="card-body">
						<h5 class="card-title">
							<?php echo isset($_GET['lang'])&&$_GET['lang'] == 'ru' ? $roze['rnameru'] : $roze['rnamelv']; ?>
						</h5>
						<a href="/view/?id=<?php echo $roze['rid']; ?>" class="btn btn-primary"><?php echo $gotoroze; ?></a>
					</div>
				</div>
			<?php endforeach; ?>	
		</div>
	</div>
</body>

</html>