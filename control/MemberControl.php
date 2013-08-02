<?php namespace Control;

class MemberControl {
    
	public static function createUser($member) {
		$member = \Control\MemberControl::escapeMember($member);
	
        $sql = 'INSERT INTO tb_members(user, passwd, email, reg_ip, dt_reg) VALUES (\''.$member->getUser().'\', \''.sha1($member->getPasswd()).'\', \''.$member->getEmail().'\', \''.$_SERVER['REMOTE_ADDR'].'\', NOW())';
		mysql_query($sql);
        
		$row = mysql_fetch_assoc(mysql_query('SELECT MAX(id) as id FROM tb_members'));
		        
		$member->setId($row['id']);
		
		if(mysql_affected_rows($GLOBALS['link'])==1) {
			// echo 'board successful created';
		}
		
		return $member;
	}
	
	public static function loginUser($member) {
		$member = \Control\MemberControl::escapeMember($member);
		
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
	
	public static function escapeMember($member){
		$member->setUser(mysql_real_escape_string($member->getUser()));
		$member->setPasswd(mysql_real_escape_string($member->getPasswd()));
		$member->setEmail(mysql_real_escape_string($member->getEmail()));
	
		return $member;
	}
}
?>