<form method="post" action="<?php echo baseURL(); ?>?createacc=true&createuser=true">
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
    <input type="submit" value="enviar" /> 
</form>

<?php
if (isset($_GET['createuser'])) {
    $member = new Member();
    $member->setUser($_POST['user']);
    $member->setEmail($_POST['email']);
    $member->setPasswd($_POST['passwd']);
    
    createUser($member);  
    
    if ($member->getId()) {
        echo 'membro registrado!';
    }
}
?>