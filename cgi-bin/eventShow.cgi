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
use CGI;
HTML::Template->config(utf8 => 1);

$filename = "../database/events.xml"; # indica il file xml su cui effettuare il parsing
$parser = XML::LibXML->new();	# creo un parser per il file xml
$xml_doc = $parser->parse_file($filename); # effettuo parsing sul file xml e ottengo un oggetto di 'documento xml'
$cgi = CGI->new();

$root = $xml_doc->getDocumentElement();	# ottengo il nodo radice

$buffer = "";
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
	# $code = "404";
	# $desc = "Evento non trovato";
	# print $cgi->redirect("errorHandler.cgi?code=$code&desc=$desc");
	$_id = 2;
}


@menu = $root->findnodes("evento[\@id=$_id]/menu/portata");	# mi prendo tutte le portate del menu
$name = $root->findvalue("evento[\@id=$_id]/nome"); # mi prendo il nome dell'evento
$date = $root->findvalue("evento[\@id=$_id]/data/giorno") . " " . $root->findvalue("evento[\@id=$_id]/data/mese") . " " . $root->findvalue("evento[\@id=$_id]/data/anno");
$desc = $root->findvalue("evento[\@id=$_id]/descrizione");
$price = $root->findvalue("evento[\@id=$_id]/menu/\@prezzo");

my @loop_data = (); 	# questo array mi servirà per raccogliere i dati quando faccio il ciclo

for ($i=0; $i<scalar(@menu); $i++) {
	my %row_data; 						# dichiaro un hash ausiliario
	$row_data{menu_item} = $menu[$i]; 	# inserisco l'i-esimo giorno

	push(@loop_data, \%row_data); 		# aggiungo a loop_data l'array associativo temporaneo creato nell'iterazione
}


$template = HTML::Template->new(filename => 'eventShow.tmpl'); # raccolgo il file di template
$template->param(menu => \@loop_data); #rimpiazzo i parametri con i valori corretti
$template->param(name => $name);
$template->param(date => $date);
$template->param(desc => $desc);
$template->param(price => $price);

print "Content-Type: text/html\n\n", $template->output; # butto in output il template dicendo che si tratta di HTML
