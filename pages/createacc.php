<form method="post" action="">
	<h1>Cadastro de Membros</h1>
    <label for="user">usuario: </label>
    <input id="user" name="user" type="text" />
    <br />
    <label for="passwd">senha: </label>
    <input id="passwd" name="passwd" type="password" />
    <br />
    <label for="email">email: </label>
    <input id="email" name="email" type="text" />
    <br />
    <br />
    <input id="submit" name="submit" type="submit" value="enviar" /> 
</form>

<?php
if (isset($_POST['submit']) && $_POST['submit']=='enviar') {
	$msg = '';
	
	if (empty($_POST['user'])) {
		$msg += 'usuario vazio<br />';
	}
	
	if (empty($_POST['passwd'])) {
		$msg += 'senha vazio<br />';
	}

	if (empty($_POST['email'])) {
		$msg += 'email vazio<br />';
	}
	
	if ($msg != '') {
		echo $msg;
	} else {
		$member = new Member();
	    $member->setUser($_POST['user']);
	    $member->setEmail($_POST['email']);
	    $member->setPasswd($_POST['passwd']);
        // TODO adicionar ip e data da criação 
        // $member->setRegIp();
        // $member->setDtCreate();
	            
	    $member = \Control\MemberControl::createUser($member);  
	    
	    if ($member->getId() != null) {
	        echo 'membro registrado!';
	    }
	}
}
?>