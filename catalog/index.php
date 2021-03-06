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
		<div id="snow">
			<?php $catg = Rozes::getCategories(); foreach($catg as $ct): ?>
			<!--Если категория в которой мы сейчас равна названию категории в списке, то её название жирным шрифтом как активное-->
				<a <?php if(isset($_GET['cat']) && $ct['cid'] == $_GET['cat']) echo 'class="active"'; ?> href="/catalog/?cat=<?php echo $ct['cid']; if ($currentlang) echo '&'.$currentlang; ?>"><?php echo $ct['cname']; ?></a>
			<?php endforeach; ?>
		</div>
		
		<!--Здесь выводит менюшка и язык, для того, чтобы они не плыли вниз с розами вместе-->
		<div id="tk-menu">
			<?php require_once($_SERVER["DOCUMENT_ROOT"].'/header.php');
				require_once($_SERVER["DOCUMENT_ROOT"].'/language.php'); ?>
		</div>
		
		<!--Выводит все розы из базы по определённому условию, либо все розы, либо определённой категории-->
		<div class="card-columns withMenu">
			<?php $rozes = isset($_GET['cat']) 
			? Rozes::getCategoryRozes($_GET['cat']) 
			: Rozes::getAllRozes();
			//Этот цикл выводит пока есть что выводить
			foreach($rozes as $roze): ?>
				<div class="card" style="width: 18rem;">
					<img class="card-img-top" src="/img/rozes/<?php echo $roze['rimage']; ?>" alt="<?php echo $roze['rnamelv']; ?>">
					<div class="card-body">
						<h5 class="card-title">
							<?php echo isset($_GET['lang'])&&$_GET['lang'] == 'ru' ? $roze['rnameru'] : $roze['rnamelv']; ?>
						</h5>
						<a href="/view/?id=<?php echo $roze['rid']; if($currentlang) echo '&'.$currentlang; ?>" class="btn btn-primary"><?php echo $gotoroze; ?></a>
					</div>
				</div>
			<?php endforeach; ?>	
		</div>
	</div>
</body>

</html>