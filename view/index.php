<!DOCTYPE html>
<html lang="lv">
<?php
	require_once($_SERVER["DOCUMENT_ROOT"].'/head.php');
	require_once($_SERVER["DOCUMENT_ROOT"].'/db.php'); 
	require_once($_SERVER["DOCUMENT_ROOT"].'/dictionary.php'); 
	require_once($_SERVER["DOCUMENT_ROOT"].'/Rozes.php'); 
	require_once($_SERVER["DOCUMENT_ROOT"].'/Order.php'); 
	require_once($_SERVER["DOCUMENT_ROOT"].'/header.php');
	require_once($_SERVER["DOCUMENT_ROOT"].'/language.php');
?>

<?php //Если было нажание на кнопку "Закать", JS скрипт обрабатывает и отправляем запрос, здесь же мы проверяем
//существует ли пост запрос, если да, то выполняем определённую функцию
	if(isset($_POST['theid']))
		Order::DoneOrder($_POST['theid'],$_SESSION['user']);
	
	if(isset($_POST['liked']))
		if(!Rozes::getLike($_SESSION['user'], $_POST['liked'])) //Если лайк не стоит, то ставим, иначе снимаем
			Rozes::setLike($_SESSION['user'], $_POST['liked']); 
		else
			Rozes::unLike($_SESSION['user'], $_POST['liked']);
?>

<body class="maxSize">
	<div id="overlay" class="maxSize"></div>
	<div id="lending" class="maxSize">
	<!--Получаем список категорий и выводим их ввиде меню, через цикл foreach (он выводит информацию, пока она есть)-->
	<div id="snow">
	<?php $catg = Rozes::getCategories(); foreach($catg as $ct): ?>
	<!--Если категория в которой мы сейчас равна названию категории в списке, то её название жирным шрифтом как активное-->
		<a <?php if(isset($_GET['cat']) && $ct['cid'] == $_GET['cat']) echo 'class="active"'; ?> href="/catalog/?cat=<?php echo $ct['cid']; if ($currentlang) echo '&'.$currentlang; ?>"><?php echo $ct['cname']; ?></a>
	<?php endforeach; ?>
	</div>
	
	<div class="row justify-content-center rozes-view">
		<div class="col-6">
			<!--Получаем определённую розы по ID из адресной строки-->
			<?php $roze = Rozes::getCertainRoze($_GET['id']); ?>
			<?php if($roze != NULL): ?>
			<!--Если роза существует, что работает код ниже-->
			<div class="card">
			<div class="card-header">
				<!--Выводим название розы, которое зависит от языке в запросе-->
				<?php echo isset($_GET['lang'])&&$_GET['lang'] == 'ru' ? $roze['rnameru'] : $roze['rnamelv']; ?>
			</div>
			  <div class="card-body rozes-padding">				
				<div class="container rozes-padding">
				  <div class="row rozes-text">
					<div class="col">
						<img class="card-img-top" src="/img/rozes/<?php echo $roze['rimage']; ?>">
						<!--Если пользователь вошёл в свой профиль-->
						<?php if(isset($_SESSION['user'])): ?>
							<!--data-id нужно для js скрипта, что получить ID розы-->
							<button id="do-like" type="button" class="btn btn-primary" data-id="<?php echo $roze['rid']; ?>">
								<!--Проверяем была ли уже лайкнута роза-->
								<?php if(Rozes::getLike($_SESSION['user'], $roze['rid'])): ?>
									<i class="fas fa-heart fa-15x"></i>
								<?php else: ?>
									<i class="far fa-heart fa-15x"></i>
								<?php endif; echo $manpatik; ?>	
							</button>
							<!--Проверяет зашёл ли пользователь, и чтобы он ещё не заказывал эту розу-->
							<?php if(isset($_SESSION['user']) && !Order::isOrdered($roze['rid'],$_SESSION['user'])): ?>
							<button type="button" class="btn btn-success" id="do-order" data-id="<?php echo $roze['rid']; ?>">
								<i class="fas fa-shopping-cart fa-15x"></i> <?php echo $zakaz; ?>
							</button>
							<?php endif; ?>
						<?php endif; ?>
					</div>
					<div class="col">
						<!--Взависимости от язык выводится информация на определённом языке-->
						<?php echo isset($_GET['lang'])&&$_GET['lang'] == 'ru' ? $roze['describeru'] : $roze['describelv']; ?>
						<?php echo $vel; echo isset($_GET['lang'])&&$_GET['lang'] == 'ru' ? $roze['rtextru'] : $roze['rtextlv']; ?>
						<?php echo '<h3 class="mgtop15">'.$cost.' '.$roze['rprice'].' €</h3>'; ?>
					</div>
					<div class="w-100"></div>
				  </div>
				</div>
			  </div>
			</div>
			<?php else: ?>
			<!--Здесь выводится информация, если розы нет-->
			<div class="card">
				<div class="card-header">
					<?php echo $kludaName; ?>
				</div>
				 <div class="card-body">
					<?php echo $roseEmpty; ?>			
				 </div>
			</div>
			<?php endif; ?>
		</div>
	</div>
	
		<div class="enf noselect good" style="top:10px;" hidden><?php echo $zakazdone; ?></div>
	</div>
</body>

</html>