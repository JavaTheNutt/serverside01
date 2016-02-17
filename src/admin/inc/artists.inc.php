<?php
class Artist{
	private $db;
	public function __construct($database)
	{
		$this->db = $database;
	}
	public function allArtists(){
		$stmt = $this->db->prepare("SELECT * FROM artists");
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_OBJ);
	}
	public function insertArtist($name, $city, $website){
		$stmt = $this->db->prepare("INSERT INTO artists(name, city, website) VALUES
(:artistname, :city, :website)");
		$stmt->bindParam(':artistname', $name, PDO::PARAM_STR);
		$stmt->bindParam(':city', $city, PDO::PARAM_STR);
		$stmt->bindParam(':website', $website, PDO::PARAM_STR);
		$stmt->execute();
	}
	public function updateArtist($artistid, $artistname, $artistcity, $artistwebsite){
		$stmt = $this->db->prepare("UPDATE artists SET name = :artname, city = :city, website = :website WHERE artistid = :artistid");
		$stmt->bindParam(':artistid', $artistid, PDO::PARAM_INT);
		$stmt->bindParam(':artname', $artistname, PDO::PARAM_STR);
		$stmt->bindParam(':city', $artistcity, PDO::PARAM_STR);
		$stmt->bindParam(':artistwebsite', $artistwebsite, PDO::PARAM_STR);
		$stmt->execute();
	}
	public function oneArtist($id){
		$stmt = $this->db->prepare("SELECT * FROM artists WHERE artistid = :id");
		$stmt->bindParam(':id', $id, PDO::PARAM_INT);
		$stmt->execute();
		return $stmt->fetch(PDO::FETCH_OBJ);
	}

}