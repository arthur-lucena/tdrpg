<?php
function createUser($member) {
	$member = escapeMember($member);

	mysql_query('INSERT INTO tb_members(user, passwd, email, reg_ip) VALUES (\''.$member->getUser().'\', \''.sha1($member->getPasswd()).'\', \''.$member->getEmail().'\', \''.$_SERVER['REMOTE_ADDR'].'\')');
	
	$row = mysql_fetch_assoc(mysql_query('SELECT MAX(id) as id FROM tb_members'));
	
	$member->setId($row['id']);
	
	if(mysql_affected_rows($GLOBALS['link'])==1) {
		// echo 'board successful created';
	}
	
	return $member;
}

function loginUser($member) {
	$member = escapeMember($member);
	
	$query = 'SELECT id, email FROM tb_members WHERE user=\''.$member->getUser().'\' AND passwd=\''.sha1($member->getPasswd()).'\'';
	$result = mysql_fetch_assoc(mysql_query($query));
	
	if ($result['id']) {
		$member->setId($result['id']);
		$member->setEmail($result['email']);
		$member->setPasswd(null);
		
		return $member;
	} else {
		return false;
	}
}

function escapeMember($member){
	$member->setUser(mysql_real_escape_string($member->getUser()));
	$member->setPasswd(mysql_real_escape_string($member->getPasswd()));
	$member->setEmail(mysql_real_escape_string($member->getEmail()));

	return $member;
}
?>