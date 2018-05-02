<!DOCTYPE html>
<html lang="lv">
<?php
	require_once($_SERVER["DOCUMENT_ROOT"].'/head.php');
	require_once($_SERVER["DOCUMENT_ROOT"].'/db.php'); 
	require_once($_SERVER["DOCUMENT_ROOT"].'/dictionary.php'); 
	require_once($_SERVER["DOCUMENT_ROOT"].'/Rozes.php'); 
?>

<body class="maxSize">
	<div id="contactoverlay" class="maxSize"></div>
	<div id="lending" class="maxSize">
		<div class="language">
		<?php echo isset($_GET['lang'])&&$_GET['lang'] == "ru" ? "<a href=\"/contact/?lang=lv\">LV</a>" :  "<a href=\"/contact/?lang=ru\">RU</a>"; ?>
		<?php $currentlang = isset($_GET['lang'])&&$_GET['lang'] == "ru" ? "?lang=ru" : ""; ?>
		</div>
		<div id="menu">
			<a href="<?php echo $href2.''.$currentlang; ?>"><?php echo $about; ?></a>
			<a href="<?php echo $href3.''.$currentlang; ?>"><?php echo $newrozes; ?></a>
			<a href="<?php echo $href1.''.$currentlang; ?>"><?php echo $catalog; ?></a>
			<a class="active" href="<?php echo $href4.''.$currentlang; ?>"><?php echo $contacts; ?></a>
			<a href="<?php echo $href5.''.$currentlang; ?>"><i class="fas fa-user-plus"></i></a>
		</div>
		<div id="aboutme">
			<?php echo $mytele; ?>
		</div>
	</div>
</body>

</html>