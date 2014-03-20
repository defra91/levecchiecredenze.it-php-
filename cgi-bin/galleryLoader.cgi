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
HTML::Template->config(utf8 => 1);

$filename = "../database/gallery.xml"; # indica il file xml su cui effettuare il parsing
$parser = XML::LibXML->new();	# creo un parser per il file xml
$xml_doc = $parser->parse_file($filename); # effettuo parsing sul file xml e ottengo un oggetto di 'documento xml'

$root = $xml_doc->getDocumentElement();	# ottengo il nodo radice

@children = $root->findnodes("immagine");	# mi prendo tutti i figli immagine del nodo radice gallery

@name = ();		# inizializzo l'array dei nomi delle immagini
@alt = (); 		# inizializzo l'array degli 'alt' delle immagini
@title = ();	# inizializzo l'array dei 'title' delle immagini
@path = ();		# inizializzo l'array dei 'path' delle immagini

foreach $child (@children) {	# scorro tutti i nodi figli della radice
	push(@name, $child->findnodes("nome/text()"));		# aggiungo all'array dei nomi il contenuto testuale del nodo 'nome'
	push(@alt, $child->findnodes("alt/text()"));		# aggiungo all'array degli 'alt' il contenuto testuale del nodo 'alt'
	push(@title, $child->findnodes("title/text()"));	# aggiungo all'array dei 'title' il contenuto testuale del nodo 'title'
	push(@path, $child->findnodes("percorso/text()"));	# aggiungo all'array dei path il contenuto testuale del nodo 'percorso'
}

my @loop_data = (); # questo array mi servirà per raccogliere i dati quando faccio il ciclo

for ($i=0; $i<scalar(@children); $i++) {
	my %row_data; # dichiaro un hash ausiliario
	$row_data{alt} = $alt[$i]; # inserisco l'i-esimo alt
	$row_data{src} = $path[$i] . $name[$i]; # inserisco l'i-esima immagine
	$row_data{title} = $title[$i]; # inserisco l'i-esimo title

	push(@loop_data, \%row_data); # aggiungo a loop_data l'array associativo temporaneo creato nell'iterazione
}

$template = HTML::Template->new(filename => 'gallery.tmpl'); # raccolgo il file di template
$template->param(gallery => \@loop_data); #rimpiazzo i parametri con i valori corretti

print "Content-Type: text/html\n\n", $template->output; # butto in output il template dicendo che si tratta di HTML
