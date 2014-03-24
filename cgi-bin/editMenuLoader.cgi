#!/usr/bin/perl -w
#
# Author: Luca De Franceschi
# Description: Questo script si occupa di visualizzare il template di modifica del menu

use HTML::Template;
use XML::LibXML;
use CGI::Session;
use DateTime;
use CGI;
HTML::Template->config(utf8 => 1);

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

@category = ("antipasti", "primi", "secondi", "dessert");
@loopContainer = ();

for ($j=0; $j<scalar(@category); $j++) {
	@children = $root->findnodes("$category[$j]/piatto");	# mi prendo tutti i figli evento

	@name = ();
	@price = ();

	foreach $child (@children) {						# scorro tutti i nodi figli della radice
		push(@name, $child->findvalue("nomePiatto"));	# aggiungo il giorno del nodo corrente
		push(@price, $child->findvalue("prezzo"));		# aggiungo il mese del nodo corrente
	}

	$loop = (); # questo array mi servirà per raccogliere i dati quando faccio il ciclo

	for ($i=0; $i<scalar(@children); $i++) {
		my %row_data; 							# dichiaro un hash ausiliario
		$row_data{menu_item} = $name[$i]; 		# inserisco l'i-esima item
		$row_data{price} = $price[$i]; 			# inserisco l'i-esimo prezzo
		$row_data{cnt} = $i;

		push(@loop, \%row_data); 				# aggiungo a loop_data l'array associativo temporaneo creato nell'iterazione
	}
	push(@loopContainer, \@loop);
}

@degustazione = $root->findnodes("degustazione/nomePiatto/text()");
$prezzo_degustazione = $root->findvalue("degustazione/\@prezzo");
my @degustazioneLoop = ();
for ($i=0; $i<scalar(@degustazione); $i++) {
	my %row_data;
	$row_data{deg_item} = $degustazione[$i];

	push(@degustazioneLoop, \%row_data);
}

$template = HTML::Template->new(filename => 'editMenu.tmpl'); 	# raccolgo il file di template
$template->param(antipasti => $loopContainer[0]); 			#rimpiazzo i parametri con i valori corretti
$template->param(primi => $loopContainer[1]); 				#rimpiazzo i parametri con i valori corretti
$template->param(secondi => $loopContainer[2]); 			#rimpiazzo i parametri con i valori corretti
$template->param(dessert => $loopContainer[3]);				#rimpiazzo i parametri con i valori corretti
$template->param(degustazione => \@degustazioneLoop); 		#rimpiazzo i parametri con i valori corretti
$template->param(deg_price => $prezzo_degustazione); 		#rimpiazzo i parametri con i valori corretti

print "Content-Type: text/html\n\n", $template->output; 	# butto in output il template dicendo che si tratta di HTML
