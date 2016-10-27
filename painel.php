 <?php
	include_once 'views/header.php';
	$control->checkLogin();

?>

<div class="panel panel-default">
  <div class="panel-body text-center">
	<h3><p> Painel de funcionalidades</p></h3>
	<?php echo $_SESSION['user']['id']; ?>
  </div>
</div>

<?php

	include_once 'views/footer.php';

?>