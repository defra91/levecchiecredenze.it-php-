# Progetto levecchiecredenze.it

Il presente repository ha come scopo quello di raccogliere e versionare il progetto relativo al sito `levecchiecredenze.it`

* Vecchio sito levecchiecredenze: <http://www.levecchiecredenze.it>

## Registro delle modifiche 

| Autore  | Data della modifica | Versione | Descrizione |
| ------------- | ------------- | -------- | ----------- |

## Standard e riferimenti

* Standarx XHtml: <http://www.w3.org/TR/xhtml1/>
* Standard CSS2: <http://www.w3.org/TR/CSS2/>
* Javascript reference: <http://www.w3schools.com/jsref/>

## Vincoli tecnici

* Il sito web dev'essere accesssibile e conforme allo standard XHTML Strict;
* Deve tenere una netta separazione tra struttura, presentazione e comportamento;
* La base di dati di riferimento deve essere su MySQL;
* Il linguaggio per generare pagine dinamiche dev'essere il linguaggio php;
* Bisogna mettere a disposizione almeno tre tipologie di operazioni dinamiche:
  * Inserimento di dati;
  * Estrazione di dati;
  * Modifica di dati;

## Istruzioni per la configurazione di un database locale di prova

Il sito web per manipolare i dati fa riferimento a un database MySQL. L'accesso a tale database è per ovvie ragioni limitato solamente al gestore del repository. Allo stato attuale alcuni script restituiranno un errore, in quanto manca il file di configurazione per le ragioni esplicate. Ciònonostante chiunque può configurare liberamente un proprio database locale e rendere il sito funzionante. Di seguito sono riportate le istruzioni:

* Creare un file `config.php` dentro la directory `./mysql/`;
* Inserire il codice php che segue e sostituire opportunamente i campi con quelli del vostro database MySQL locale o remoto:

``` php

<?php
	ini_set("display_errors","Off");

	// Dati della connessione
	$db_host = 'yourHost';			// esempio 'localhost'        
	$db_utente = 'yourUsername';
	$password = 'yourPassword';               	
	$db_nomedb = 'yourDbName';		

	// Effettuo la connessione al database
	$connessione = mysql_connect($db_host, $db_utente, $password) 
	or die ("Errore nella stringa di connessione al database: " . mysql_error());
	mysql_select_db($db_nomedb) or die (mysql_error());

	// Configuro il set di caratteri a utf-8
	mysql_query('set names utf8');
?>

```
Naturalmente il codice è a titolo di esempio, ciascuno può scrivere il proprio file come meglio crede. L'unico vincolo richiesto è la dichiarazione di una variabile chiamata `$connessione` che è un riferimento alla connessione al database MySQL.

* Importare le tabelle nel proprio database (da linea di comando o da interfaccia gradica) facendo riferimento al file: `./mysql/backup.sql`. Tale file verrà aggiornato costantemente ad ogni modifica della struttura del database.
