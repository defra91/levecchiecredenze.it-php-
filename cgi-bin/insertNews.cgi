#!/usr/bin/perl -w

# Author: Luca De Franceschi
#
# Description: Questo script si occupa di inserire la news indicata dalla query string all'interno del database di riferimento

######################

use XML::LibXML;
use CGI::Session;
use CGI;
use DateTime;
use Switch;

$cgi = CGI->new();

# prima di tutto controllo che l'utente che cerca di accedere alla pagina sia autenticato
$session = CGI::Session->new();

$user = "";
if ($session->param(-name => "email")) {
	$user = $session->param(-name => "email");
}
else {
	$cgi = new CGI();
	print $cgi->redirect("../public-html/index.html");
}

$filename = "../database/news.xml"; 		# indica il file xml su cui effettuare il parsing

$parser = XML::LibXML->new();				# creo un parser per il file xml
$xml_doc = $parser->parse_file($filename); 	# effettuo parsing sul file xml e ottengo un oggetto di 'documento xml'

$root = $xml_doc->getDocumentElement();		# ottengo il nodo radice

$title = $cgi->param('title');
$desc = $cgi->param('desc');

$last_id = $root->findvalue("notizia[last()]/\@id");	# estraggo l'id dell'ultima immagine
$new_id = $last_id + 1;									# incremento l'id

$today = DateTime->now;

$day = $today->day;
$month = $today->month;
$month = getMonthInItalianString($month);
$year = $today->year;

$nuovo_el ="
	\t<notizia id=\"$new_id\">
	\t\t<titolo>$title</titolo>
	\t\t<descrizione>$desc</descrizione>
	\t\t<data>
	\t\t\t<giorno>$day</giorno>
	\t\t\t<mese>$month</mese>
	\t\t\t<anno>$year</anno>
	\t\r</data>
	\t</notizia>";

$frammento = $parser->parse_balanced_chunk($nuovo_el);	# controllo la buona formazione dell'elemento

$root->appendChild($frammento);							# appendo il nuovo elemento alla radice

$xml_doc->toFile($filename); 							# salvo il file xml

print $cgi->redirect("newsHandler.cgi");				# rimando alla pagina delle immagini

sub getMonthInItalianString {
	$month = $_[0];
	switch ($month) {
		case 1 { return "Gennaio"; }
		case 2 { return "Febbraio"; }
		case 3 { return "Marzo"; }
		case 4 { return "Aprile"; }
		case 5 { return "Maggio"; }
		case 6 { return "Giugno"; }
		case 7 { return "Luglio"; }
		case 8 { return "Agosto"; }
		case 9 { return "Settembre"; }
		case 10 { return "Ottobre"; }
		case 11 { return "Novembre"; }
		case 12 { return "Dicembre"; }

	}
}