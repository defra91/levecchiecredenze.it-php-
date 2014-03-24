#!/usr/bin/perl -w
#
# Author: Luca De Franceschi
#
# Description: Questo script si occupa di generare la pagina di gestione delle news
#

use HTML::Template;
use XML::LibXML;
use CGI::Session;

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

$filename = "../database/news.xml";			# indica il file xml su cui effettuare il parsing
$parser = XML::LibXML->new();				# creo un parser per il file xml
$xml_doc = $parser->parse_file($filename); 	# effettuo parsing sul file xml e ottengo un oggetto di 'documento xml'

$root = $xml_doc->getDocumentElement();		# ottengo il nodo radice

@children = $root->findnodes("notizia");	# mi prendo tutti i figli immagine del nodo radice gallery

@title = ();		# inizializzo l'array dei titoli
@desc = (); 		# inizializzo l'array delle descrizioni
@data = ();			# inizializzo l'array delle date
@id = ();			# inizializzo l'array degli id

foreach $child (@children) {							# scorro tutti i nodi figli della radice
	push(@title, $child->findvalue("titolo");			# aggiungo all'array dei nomi il contenuto testuale del nodo titolo
	push(@desc, $child->findvalue("descrizione"));		# aggiungo all'array degli 'alt' il contenuto testuale del nodo descrizione
	push(@data, $child->findvalue("data/giorno") . "/" . $child->findvalue("data/mese") . "/" . $child->findvalue("data/anno"));	# aggiungo all'array dei 'title' il contenuto testuale del nodo 'title'
	push(@id, $child->getAttribute("id"));				# ottengo l'id dell'immagine
}

my @loop_data = (); # questo array mi servirà per raccogliere i dati quando faccio il ciclo

for ($i=0; $i<scalar(@children); $i++) {
	my %row_data; 						# dichiaro un hash ausiliario
	$row_data{title} = $title[$i]; 		# inserisco l'i-esimo titolo
	$row_data{desc} = $desc[$i]; 		# inserisco l'i-esima descrizione
	$row_data{data} = $data[$i];		# inserisco l'iesima data
	$row_data{id} = $id[$i];			# inserisco l'iesmo id

	push(@loop_data, \%row_data); 		# aggiungo a loop_data l'array associativo temporaneo creato nell'iterazione
}

$template = HTML::Template->new(filename => 'newsAdmin.tmpl'); # raccolgo il file di template
$template->param(news => \@loop_data); #rimpiazzo i parametri con i valori corretti

HTML::Template->config(utf8 => 1);
print "Content-Type: text/html\n\n", $template->output; # butto in output il template dicendo che si tratta di HTML
