<?php
	ini_set("display_errors","Off");

	// Dati della connessione
	$db_host = 'localhost';        
	$db_utente = 'root';
	$password = 'scottex91';               
	$db_nomedb = 'mysql';

	// Effettuo la connessione al database
	$connessione = mysql_connect($db_host, $db_utente, $password) 
	or die ("Errore nella stringa di connessione al database: " . mysql_error());
	mysql_select_db($db_nomedb) or die (mysql_error());

	// Configuro il set di caratteri a utf-8
	//mysql_query('set names utf8');
?>
