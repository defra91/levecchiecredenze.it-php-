#!/usr/bin/perl -w

#########################################################################
# Author: Luca De Franceschi                                            #
# Nota:                                                                 #
#                                                                       #
#	Per far funzionare questo script bisogna                            #
#	aver settato correttamente apache2 per gli script perl/cgi ed aver  #
#	installato il modulo HTML::Template da CPAN                         #
#########################################################################

use HTML::Template;
use XML::LibXML;

$filename = "../database/news.xml"; # indica il file xml su cui effettuare il parsing
$parser = XML::LibXML->new();	# creo un parser per il file xml
$xml_doc = $parser->parse_file($filename); # effettuo parsing sul file xml e ottengo un oggetto di 'documento xml'

$root = $xml_doc->getDocumentElement();	# ottengo il nodo radice

@children = $root->findnodes("notizia");	# mi prendo tutti i figli notizia del nodo radice news

@date = ();		# inizializzo l'array delle date delle news
@title = (); 		# inizializzo l'array dei titoli delle news
@text = ();	# inizializzo l'array delle descrizioni delle news

foreach $child (@children) {	# scorro tutti i nodi figli della radice
	$data = $child->findnodes("data/giorno/text()") . " " . $child->findnodes("data/mese/text()") . " " . $child->findnodes("data/anno/text()");
	push(@date, $data);		# aggiungo all'array dei nomi la data appena ottenuta
	push(@title, $child->findnodes("titolo/text()"));		# aggiungo all'array di titoli il contenuto testuale del nodo 'titolo' corrente
	push(@text, $child->findnodes("descrizione/text()"));	# aggiungo all'array dei 'text' il contenuto testuale del nodo 'descrizione' corrente
}

my @loop_data = (); # questo array mi servirà per raccogliere i dati quando faccio il ciclo

for ($i=0; $i<scalar(@children); $i++) {
	my %row_data; # dichiaro un hash ausiliario
	$row_data{date} = $date[$i]; # inserisco l'i-esima data
	$row_data{title} = $title[$i]; # inserisco l'i-esimo titolo
	$row_data{text} = $text[$i]; # inserisco l'i-esima descrizione

	push(@loop_data, \%row_data); # aggiungo a loop_data l'array associativo temporaneo creato nell'iterazione
}

$template = HTML::Template->new(filename => 'news.tmpl'); # raccolgo il file di template
$template->param(news => \@loop_data); #rimpiazzo i parametri con i valori corretti

print "Content-Type: text/html\n\n", $template->output; # butto in output il template dicendo che si tratta di HTML
