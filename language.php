<div class="language">
	<?php 
		$url = $_SERVER['REQUEST_URI']; //получаем введёный адрес без домена
		if(isset($_GET['lang']) && $_GET['lang'] == 'ru') //Если язык есть и равен русскому
		{
			$url = preg_replace("/ru/", "lv", $url); //В адрессной строке заменяем слово ru на lv
			echo "<a href=\"$url\">LV</a>"; //Выводим переключатель
		}
		else if(isset($_GET['lang'])) //если язык есть, но не русский
		{
			$url = preg_replace("/lv/", "ru", $url);
			echo "<a href=\"$url\">RU</a>";
		}	
		else if(isset($_GET['cat']) || isset($_GET['id'])) //Если нет языка тогда, но есть другие параметры
		{
			echo "<a href=\"$url&lang=ru\">RU</a>";
		}
		else //Если нет языка тогда
		{
			echo "<a href=\"$url?lang=ru\">RU</a>";
		}
	?>
</div>

