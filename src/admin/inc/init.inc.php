<?php
require_once 'db.inc.php';
require_once 'recordcompany.inc.php';
require_once 'artists.inc.php';
require_once 'display_record_companies.php';
require_once 'display_artists.inc.php';


$recordCompany = new RecordCompany($dbh);
$artist = new Artist($dbh);