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
		<div id="snow">
			<?php $catg = Rozes::getCategories(); foreach($catg as $ct): ?>
			<a <?php if(isset($_GET['cat']) && $ct['cid'] == $_GET['cat']) echo 'class="active"'; ?> href="/catalog/?cat=<?php echo $ct['cid'].''.$inside; ?>"><?php echo $ct['cname']; ?></a>
			<?php endforeach; ?>
		</div>
		<div id="mainBlock">
		<?php if(isset($_GET['cat'])): ?>
		<?php $rozes = Rozes::getCategoryRozes($_GET['cat']); foreach($rozes as $roze): ?>
			<a href="/view/?id=<?php echo $roze['rid'].''.$inside; ?>">
			<div class="rozesBlock">
				<div class="rozesThumbnail"><img src="/img/rozes/<?php echo $roze['rimage']; ?>"></div>
				<div class="rozesName"><?php echo $roze['rnamelv']; ?></div>
			</div>
			</a>
		<?php endforeach; ?>
		<?php else: ?>
		<?php $rozes = Rozes::getAllRozes(); foreach($rozes as $roze): ?>
			<a href="/view/?id=<?php echo $roze['rid'].''.$inside; ?>">
			<div class="rozesBlock">
				<div class="rozesThumbnail"><img src="/img/rozes/<?php echo $roze['rimage']; ?>"></div>
				<div class="rozesName"><?php echo $roze['rnamelv']; ?></div>
			</div>
			</a>
		<?php endforeach; ?>
		<?php endif; ?>
		</div>
	</div>
</body>

</html>