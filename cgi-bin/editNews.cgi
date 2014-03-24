#!/usr/bin/perl -w

# Author: Luca De Franceschi
#
# Description: Questo script si occupa di modificare la indicata dalla query string all'interno del database di riferimento

######################

use XML::LibXML;
use CGI::Session;
use CGI;
use DateTime;

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

$filename = "../database/news.xml"; # indica il file xml su cui effettuare il parsing

$parser = XML::LibXML->new();	# creo un parser per il file xml
$xml_doc = $parser->parse_file($filename); # effettuo parsing sul file xml e ottengo un oggetto di 'documento xml'

$root = $xml_doc->getDocumentElement();	# ottengo il nodo radice

# recupero l'id dalla query string
$buffer = "";
$_id = "";
$buffer = $ENV{'QUERY_STRING'};
@pairs = split(/&/, $buffer);
%input;
foreach $pair (@pairs) { 
	($name, $value) = split(/=/, $pair); 
	$value =~ tr/+/ /;
	$value =~ s/%([a-fA-F0-9][a-fA-F0-9])/pack("C", hex($1))/g; 
	$name =~ tr/+/ /; 
	$name =~ s/%([a-fA-F0-9][a-fA-F0-9])/pack("C",hex($1))/g; 
	$input{$name} = $value;
}
if ($input{"id"}) {
	$_id = $input{"id"};
}
else {
	# se non trova nella query string un parametro id allora rimando alla pagina d'errore
	$code = "404";
	$desc = "News non trovata";
	print $cgi->redirect("errorHandler.cgi?code=$code&desc=$desc");
}

# estraggo i parametri
$new_title = $cgi->param('title');
$new_desc = $cgi->param('desc');

$today = DateTime->now;
$new_day = $today->day;
$new_month = $today->month;
$new_month = getMonthInItalianString($new_month);
$new_year = $today->year;

# verifico che esista un'immagine con id == $_id
$exists = $root->exists("notizia[\@id=$_id]");

if ($exists) {
	$news = $root->findnodes("notizia[\@id=$_id]")->get_node(1);	# mi prendo il nodo che mi serve
	$title = $image->findnodes("titolo/text()")->get_node(1);
	$desc = $image->findnodes("descrizione/text()")->get_node(1);
	$day = $image->findnodes("data/giorno/text()")->get_node(1);
	$month = $image->findnodes("data/mese/text()")->get_node(1);
	$year = $image->findnodes("data/anno/text()")->get_node(1);
	
	$title->setData($new_title);
	$desc->setData($new_desc);
	$day->setData($new_day);
	$month->setData($new_month);
	$year->setData($new_year);

	$xml_doc->toFile($filename);

	print $cgi->redirect("newsHandler.cgi");		# rimando alla pagina delle news
}
else {
	# se l'immagine non esiste rimando alla pagina di errore
	$code = "404";
	$desc = "News non trovata";
	print $cgi->redirect("errorHandler.cgi?code=$code&desc=$desc");
}


sub getMonthInItalianString {
	($month) = @_;
	switch($month) {
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