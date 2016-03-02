<?php

class Album
{
	private $db;

	public function __construct($database)
	{
		$this->db = $database;
	}

	public function allAlbums()
	{
		$stmt = $this->db->prepare("SELECT albumid, albumname, year, genre, artist, recordcompany, companyname, artistname, albumartwork FROM albums JOIN artists ON albums.artist = artists.artistid JOIN recordcompanies ON albums.recordcompany = recordcompanies.companyid");
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_OBJ);
	}

	public function insertAlbum($name, $year, $genre, $artist, $recordcompany, $artwork)
	{
		$stmt = $this->db->prepare("INSERT INTO albums (albumname, year, genre, artist, recordcompany, albumartwork) VALUES
(:albumname, :albumyear, :albumgenre, :artist, :recordcompany, :artwork)");
		$stmt->bindParam(':albumname', $name, PDO::PARAM_STR);
		$stmt->bindParam(':albumyear', $year, PDO::PARAM_INT);
		$stmt->bindParam(':albumgenre', $genre, PDO::PARAM_STR);
		$stmt->bindParam(':artist', $artist, PDO::PARAM_INT);
		$stmt->bindParam(':recordcompany', $recordcompany, PDO::PARAM_INT);
		$stmt->bindParam('artwork', $artwork, PDO::PARAM_STR);
		$stmt->execute();
	}

	public function oneAlbum($id)
	{
		$stmt = $this->db->prepare("SELECT albumid, albumname, year, genre, artist, recordcompany, companyname, artistname, albumartwork FROM albums JOIN artists ON albums.artist = artists.artistid JOIN recordcompanies ON albums.recordcompany = recordcompanies.companyid WHERE :id = albumid");
		$stmt->bindParam(':id', $id, PDO::PARAM_INT);
		$stmt->execute();
		return $stmt->fetch(PDO::FETCH_OBJ);
	}

}