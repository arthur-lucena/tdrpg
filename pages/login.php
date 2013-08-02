<form action="" method="post">
	<h1>Login de Membros</h1>
	<label for="user">usuario: </label>
    <input id="user" name="user" type="text" />
    <br />
    <label for="passwd">senha: </label>
    <input id="passwd" name="passwd" type="password" />
    <br />
	<input id="submit" name="submit" type="submit" value="logar" />
</form>

<?php	
	if (isset($_POST['submit']) && $_POST['submit']=='logar') {
		if (empty($_POST['user'])) {
			echo 'usuario vazio';
		}
		
		if (empty($_POST['passwd'])) {
			echo 'senha vazio';
		}
		
		$member = new Member();
		$member->setUser($_POST['user']);
		$member->setPasswd($_POST['passwd']);
		
		$member = \Control\MemberControl::loginUser($member);
		echo var_dump($member);
		if ($member->getId()) {
			$_SESSION['id'] = $member->getId();
			$_SESSION['user'] = $member->getUser();
			
			header('Location: http://'.$_SERVER['SERVER_NAME'].'/tdrpg/');
		} else {
			echo '<br />login fail';
		}
	}
?>