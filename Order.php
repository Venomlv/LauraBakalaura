<?php

require_once($_SERVER["DOCUMENT_ROOT"].'/Db.php');

class Order
{
	public static function isOrdered($id,$uid)
	{
		$db = Db::getConnection();
		$sql = "SELECT oid FROM orders WHERE oid = $id AND uid = $uid";
		$result = $db->query($sql);		
		$order = $result->fetch_assoc();
		
		return $order ? (true) : (false);
	}

}