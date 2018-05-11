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

<?php
	if(isset($_POST['theid']))
		Order::DoneOrder($_POST['theid'],$_SESSION['user']);
	
	if(isset($_POST['liked']))
		if(!Rozes::getLike($_SESSION['user'], $_POST['liked'])) 
			Rozes::setLike($_SESSION['user'], $_POST['liked']); 
		else
			Rozes::unLike($_SESSION['user'], $_POST['liked']);
?>

<body class="maxSize">
	<div id="overlay" class="maxSize"></div>
	<div id="lending" class="maxSize">
	
	<div id="snow">
	<?php $catg = Rozes::getCategories(); foreach($catg as $ct): ?>
		<a <?php if(isset($_GET['cat']) && $ct['cid'] == $_GET['cat']) echo 'class="active"'; ?> href="/catalog/?cat=<?php echo $ct['cid'].'&'.$currentlang; ?>"><?php echo $ct['cname']; ?></a>
	<?php endforeach; ?>
	</div>
	
	<div class="row justify-content-center rozes-view">
		<div class="col-6">
			<?php $roze = Rozes::getCertainRoze($_GET['id']); ?>
			<?php if($roze != NULL): ?>
			<div class="card">
			<div class="card-header">
				<?php echo isset($_GET['lang'])&&$_GET['lang'] == 'ru' ? $roze['rnameru'] : $roze['rnamelv']; ?>
			</div>
			  <div class="card-body rozes-padding">				
				<div class="container rozes-padding">
				  <div class="row rozes-text">
					<div class="col">
						<img class="card-img-top" src="/img/rozes/<?php echo $roze['rimage']; ?>">
						<?php if(isset($_SESSION['user'])): ?>
							<button id="do-like" type="button" class="btn btn-primary" data-id="<?php echo $roze['rid']; ?>">
								<?php if(Rozes::getLike($_SESSION['user'], $roze['rid'])): ?>
									<i class="fas fa-heart fa-15x"></i>
								<?php else: ?>
									<i class="far fa-heart fa-15x"></i>
								<?php endif; echo $manpatik; ?>	
							</button>
							<?php if(isset($_SESSION['user']) && !Order::isOrdered($roze['rid'],$_SESSION['user'])): ?>
							<button type="button" class="btn btn-success" id="do-order" data-id="<?php echo $roze['rid']; ?>">
								<i class="fas fa-shopping-cart fa-15x"></i> <?php echo $zakaz; ?>
							</button>
							<?php endif; ?>
						<?php endif; ?>
					</div>
					<div class="col">
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