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

$filename = "../database/events.xml"; # indica il file xml su cui effettuare il parsing
$parser = XML::LibXML->new();	# creo un parser per il file xml
$xml_doc = $parser->parse_file($filename); # effettuo parsing sul file xml e ottengo un oggetto di 'documento xml'

$root = $xml_doc->getDocumentElement();	# ottengo il nodo radice

$_id = 3;

@menu = $root->findnodes("evento[id=$_id]/menu");	# mi prendo tutti i figli evento

@menu_items = ();		# inizializzo l'array delle portate

foreach $child (@children) {	# scorro tutti i nodi figli della radice
	push(@menu_items, $child->findnodes("/giorno/text()"));	# aggiungo il giorno del nodo corrente
}

my @loop_data = (); # questo array mi servirà per raccogliere i dati quando faccio il ciclo

for ($i=0; $i<scalar(@children); $i++) {
	my %row_data; 						# dichiaro un hash ausiliario
	$row_data{day} = $days[$i]; 		# inserisco l'i-esimo giorno
	$row_data{month} = $months[$i]; 	# inserisco l'i-esimo mese
	$row_data{year} = $years[$i];		# inserisco l'i-esimo anno
	$row_data{title} = $title[$i];		# inserisco l'i-esimo titolo
	$row_data{id} = $id[$i];			# inserisco l'i-esimo id
	$row_data{text} = $texts[$i];		# inserisco l'i-esima descrizione

	push(@loop_data, \%row_data); 		# aggiungo a loop_data l'array associativo temporaneo creato nell'iterazione
}

$template = HTML::Template->new(filename => 'events.tmpl'); # raccolgo il file di template
$template->param(events => \@loop_data); #rimpiazzo i parametri con i valori corretti

print "Content-Type: text/html\n\n", $template->output; # butto in output il template dicendo che si tratta di HTML
