<?php
function createUser($member) {
	mysql_query('INSERT INTO tb_members(user, passwd, email) VALUES (\''.$member->getUser().'\', \''.sha1($member->getPasswd()).'\', \''.$member->getEmail().'\')');
	
	$row = mysql_fetch_assoc(mysql_query('SELECT MAX(id) as id FROM tb_members'));
	
	$member->setId($row['id']);
	
	if(mysql_affected_rows($GLOBALS['link'])==1) {
		// echo 'board successful created';
	}
	
	return $member;
}
?>