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
		$sql = 'SELECT * FROM recordcompanies WHERE companyid = :companyId';
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
		$stmt = $this->db->prepare("INSERT INTO recordcompanies(companyname, companycity, representative, representativeemail, website) VALUES
(:compname ,:city, :rep, :email, :website)");
		$stmt->bindParam(':compname', $name, PDO::PARAM_STR);
		$stmt->bindParam(':city', $city, PDO::PARAM_STR);
		$stmt->bindParam(':rep', $rep, PDO::PARAM_STR);
		$stmt->bindParam(':email', $email, PDO::PARAM_STR);
		$stmt->bindParam(':website', $website, PDO::PARAM_STR);
		$stmt -> execute();
	}

	public function updateRecord($compid, $rep, $email, $website)
	{
		$stmt = $this->db->prepare(
			"UPDATE recordcompanies SET representative = :rep ,
			  representativeemail = :email, website = :website WHERE  companyid = :compid");
		$stmt->bindParam(':compid', $compid, PDO::PARAM_INT);
		$stmt->bindParam(':rep', $rep, PDO::PARAM_STR);
		$stmt->bindParam(':email', $email, PDO::PARAM_STR);
		$stmt->bindParam(':website', $website, PDO::PARAM_STR);
		$stmt->execute();
	}
	public function deleteRecord($compid){
		$stmt =$this->db->prepare("DELETE FROM recordcompanies WHERE companyid = :compid");
		$stmt->bindParam(':compid', $compid, PDO::PARAM_INT);
		$stmt->execute();
	}
}