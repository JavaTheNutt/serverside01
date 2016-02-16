<?php

class RecordCompany
{
	private $db;

	public function __construct($database)
	{
		$this->db = $database;
	}

	public function allRecordCompanies()
	{
		$sql = "SELECT * FROM recordcompanies";
		$stmt = $this->db->prepare($sql);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_OBJ);
	}


	public function oneRecordCompany($companyId)
	{
		$sql = 'SELECT * FROM recordcompanies WHERE comapnyid = :companyId';
		$stmt = $this->db->prepare($sql);
		$stmt->bindParam(':companyId', $companyId, PDO::PARAM_INT);
		$stmt->execute();
		$company = $stmt->fetch(PDO::FETCH_OBJ);
		return $company;
	}

	public function findRecordCompanies($field, $value)
	{
		$sql = 'SELECT * FROM recordcompanies WHERE :field LIKE :value';
		$value = '%' . $value . '%';
		$stmt = $this->db->prepare($sql);
		$stmt->bindParam(':field', $field, PDO::PARAM_STR);
		$stmt-> bindParam(':value', $value, PDO::PARAM_STR);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_OBJ);
	}

	public function insertRecordCompany($name, $city, $rep, $email, $website)
	{
		$stmt = $this->db->prepare("INSERT INTO recordcompanies(companyname, companycity, representative, represenativeemail, website) VALUES
(:compname ,:city, :rep, :email, :website)");
		$stmt->bindParam(':compname', $name, PDO::PARAM_STR);
		$stmt->bindParam(':city', $city, PDO::PARAM_STR);
		$stmt->bindParam(':rep', $rep, PDO::PARAM_STR);
		$stmt->bindParam(':email', $email, PDO::PARAM_STR);
		$stmt->bindParam(':website', $website, PDO::PARAM_STR);
		$stmt -> execute();
	}
}