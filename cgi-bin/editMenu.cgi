#!/usr/bin/perl -w

# Author: Luca De Franceschi
#
# Description: Questo script si occupa di modificare il menu
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
	print $cgi->redirect("../public-html/index.html");
}

$filename = "../database/menu.xml"; # indica il file xml su cui effettuare il parsing

$parser = XML::LibXML->new();	# creo un parser per il file xml
$xml_doc = $parser->parse_file($filename); # effettuo parsing sul file xml e ottengo un oggetto di 'documento xml'

$root = $xml_doc->getDocumentElement();	# ottengo il nodo radice

# estraggo i parametri
@antipasti_name = $cgi->param('nome_antipasto');
@antipasti_price = $cgi->param('prezzo_antipasto'):

@primi_name = $cgi->param('nome_primo');
@primi_price = $cgi->param('prezzo_primo'):

@secondi_name = $cgi->param('nome_secondo');
@secondi_price = $cgi->param('prezzo_secondo'):

@dessert_name = $cgi->param('nome_dessert');
@dessert_price = $cgi->param('prezzo_dessert');

@degustazione_name = $cgi->param('deg_name')
$deg_price = $cgi->param('deg_price');

$today = DateTime->now;
$new_day = $today->day;
$new_month = $today->month;
$new_month = getMonthInItalianString($new_month);
$new_year = $today->year;

$antipasti = $root->findnodes("antipasti")->get_node(1);
$primi = $root->findnodes("primi")->get_node(1);
$secondi = $root->findnodes("secondi")->get_node(1);
$dessert = $root->findnodes("dessert")->get_node(1);
$degustazione = $root->findnodes("degustazione")->get_node(1);


$parent = $antipasti->parentNode();
$deletedNode = $parent->removeChild($antipasti);	
$parent = $primi->parentNode();
$deletedNode = $parent->removeChild($primi);
$parent = $secondi->parentNode();
$deletedNode = $parent->removeChild($secondi);
$parent = $dessert->parentNode();
$deletedNode = $parent->removeChild($dessert);			
$parent = $degustazione->parentNode();
$deletedNode = $parent->removeChild($degustazione);

$xml_doc->toFile($filename);



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