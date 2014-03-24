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
@antipasti_price = $cgi->param('prezzo_antipasto');

@primi_name = $cgi->param('nome_primo');
@primi_price = $cgi->param('prezzo_primo');

@secondi_name = $cgi->param('nome_secondo');
@secondi_price = $cgi->param('prezzo_secondo');

@dessert_name = $cgi->param('nome_dessert');
@dessert_price = $cgi->param('prezzo_dessert');

@degustazione_name = $cgi->param('deg_name');
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

# Inserisco gli antipasti

$nuovo_el = "\t<antipasti>";

for ($i=0; $i<scalar(@antipasti_name); $i++) {
	$nuovo_el .= "\t\t<piatto>
	\t\t\t<nomePiatto>" . $antipasti_name[$i] . "</nomePiatto>"
	. "\t\t\t<prezzo>" . $antipasti_price[$i] . "</prezzo>"
	. "\t\t</piatto>";
}

$nuovo_el .= "\t</antipasti>";

$frammento = $parser->parse_balanced_chunk($nuovo_el);	# controllo la buona formazione dell'elemento

$root->appendChild($frammento);	

# inserisco i primi

$nuovo_el = "\t<primi>";

for ($i=0; $i<scalar(@primi_name); $i++) {
	$nuovo_el .= "\t\t<piatto>
	\t\t\t<nomePiatto>" . $primi_name[$i] . "</nomePiatto>"
	. "\t\t\t<prezzo>" . $primi_price[$i] . "</prezzo>"
	. "\t\t</piatto>";
}

$nuovo_el .= "\t</primi>";

$frammento = $parser->parse_balanced_chunk($nuovo_el);	# controllo la buona formazione dell'elemento

$root->appendChild($frammento);

# inserisco i secondi

$nuovo_el = "\t<secondi>";

for ($i=0; $i<scalar(@secondi_name); $i++) {
	$nuovo_el .= "\t\t<piatto>
	\t\t\t<nomePiatto>" . $secondi_name[$i] . "</nomePiatto>"
	. "\t\t\t<prezzo>" . $secondi_price[$i] . "</prezzo>"
	. "\t\t</piatto>";
}

$nuovo_el .= "\t</secondi>";

$frammento = $parser->parse_balanced_chunk($nuovo_el);	# controllo la buona formazione dell'elemento

$root->appendChild($frammento);

# Inserisco i dessert

$nuovo_el = "\t<dessert>";

for ($i=0; $i<scalar(@dessert_name); $i++) {
	$nuovo_el .= "\t\t<piatto>"
	. "\t\t\t<nomePiatto>" . $dessert_name[$i] . "</nomePiatto>"
	. "\t\t\t<prezzo>" . $dessert_price[$i] . "</prezzo>"
	. "\t\t</piatto>";
}

$nuovo_el .= "\t</dessert>";

$frammento = $parser->parse_balanced_chunk($nuovo_el);	# controllo la buona formazione dell'elemento

$root->appendChild($frammento);

# Inserisco il menu degustazione

$nuovo_el = "\t<degustazione prezzo=\"$deg_price\">";

for ($i=0; $i<scalar(@degustazione_name); $i++) {
	$nuovo_el .= "\t\t<nomePiatto>" . $degustazione_name[$i] . "</nomePiatto>"
}

$nuovo_el .= "\t</degustazione>";

$frammento = $parser->parse_balanced_chunk($nuovo_el);	# controllo la buona formazione dell'elemento

$root->appendChild($frammento);

$day = $root->findnodes("last_update/giorno/text()")->get_node(1);
$month = $root->findnodes("last_update/mese/text()")->get_node(1);
$year = $root->findnodes("last_update/anno/text()")->get_node(1);

$day->setData($new_day);
$month->setData($new_month);
$year->setData($new_year);

$xml_doc->toFile($filename);

$cgi->redirect("editMenuLoader.cgi");

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