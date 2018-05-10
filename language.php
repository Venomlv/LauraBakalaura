<div class="language">
	<?php 
		$url = $_SERVER['REQUEST_URI'];
		if(isset($_GET['lang']) && $_GET['lang'] == 'ru')
		{
			$url = preg_replace("/ru/", "lv", $url);
			echo "<a href=\"$url\">LV</a>";
		}
		else if(isset($_GET['lang']))
		{
			$url = preg_replace("/lv/", "ru", $url);
			echo "<a href=\"$url\">RU</a>";
		}	
		else
		{
			echo "<a href=\"$url?lang=ru\">LV</a>";
		}
	?>
</div>