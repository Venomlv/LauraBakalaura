<?php

require_once($_SERVER["DOCUMENT_ROOT"].'/Db.php');

class Rozes
{
	public static function getPopularRozes()
	{
		$db = Db::getConnection();
		$sql = "SELECT COUNT(*),roses.rnameru, roses.rnamelv, roses.rimage, roses.rid FROM `likes`, `roses`".' '.
			   "WHERE roses.rid = likes.rid GROUP BY roses.rnameru ORDER BY COUNT(*) DESC LIMIT 9";
		$result = $db->query($sql);		
		return $result;
	}
	
	public static function getTenRozes()
	{
		$db = Db::getConnection();
		$sql = "SELECT * FROM roses ORDER BY rid DESC LIMIT 8";
		$result = $db->query($sql);		
		
		return $result;
	}
	
	public static function getCategories()
	{
		$db = Db::getConnection();
		$sql = "SELECT * FROM categories";
		$result = $db->query($sql);		
		
		return $result;
	}
	
	public static function getAllRozes()
	{
		$db = Db::getConnection();
		$sql = "SELECT * FROM roses ORDER BY rid DESC";
		$result = $db->query($sql);		
		
		return $result;
	}
	
	public static function getCertainRoze($id)
	{
		$db = Db::getConnection();
		$sql = "SELECT * FROM roses WHERE rid = ".$id;
		$result = $db->query($sql);		
		
		return $result->fetch_assoc();
	}
	
	public static function getCategoryRozes($cat)
	{		
		$db = Db::getConnection();
		$sql = "SELECT * FROM roses WHERE rcategory = ".$cat;
		$result = $db->query($sql);		
		
		return $result;
	}
	
	public static function setLike($uid,$id)
	{
		$db = Db::getConnection();
		$sql = "INSERT INTO likes (lid,uid,rid) VALUES (NULL, '$uid', '$id')";
		$result = $db->query($sql);	
	}
	
	public static function getLike($uid,$id)
	{
		$db = Db::getConnection();
		$sql = "SELECT lid FROM likes WHERE uid = $uid AND rid = $id";
		$result = $db->query($sql);			
		$like = $result->fetch_assoc();
		
		return $like['lid'] ? (true) : (false); 
	}
	
	public static function unLike($uid,$id)
	{
		$db = Db::getConnection();
		$sql = "DELETE FROM likes WHERE uid = $uid AND rid = $id";
		$result = $db->query($sql);	
	}
}