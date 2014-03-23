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
use CGI::Session;
use CGI;
use XML::LibXML;

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

# una volta verificato carico la tabella dei log

$filename = "../database/log.xml"; 		# indica il file xml su cui effettuare il parsing
$parser = XML::LibXML->new();				# creo un parser per il file xml
$xml_doc = $parser->parse_file($filename); 	# effettuo parsing sul file xml e ottengo un oggetto di 'documento xml'

$root = $xml_doc->getDocumentElement();	# ottengo il nodo radice

@logs = $root->findnodes("item");

@actions = ();
@users = ();
@timestamps = ();

foreach $item (@logs) { # scorro tutti i log
	push(@actions, $item->findvalue("nome"));	# aggiungo all'array dei nomi il nome dell'azione corrente
	push(@users, $item->findvalue("utente"));		# aggiungo all'array degli utenti il nome dell'utente corrente
	$datetime = $item->findvalue("timestamp/data/giorno") . " " . $item->findvalue("timestamp/data/mese") . " " . $item->findvalue("timestamp/data/anno") . ", " . $item->findvalue("timestamp/time");	# aggiungo il timestamp corrente concatenando i diversi valori
	push(@timestamps, $datetime);
}

my @loop_data = (); # questo array mi servirà per raccogliere i dati quando faccio il ciclo

for ($i=0; $i<scalar(@logs); $i++) {
	my %row_data; 								# dichiaro un hash ausiliario
	$row_data{action} = $actions[$i]; 			# inserisco l'i-esimo nome
	$row_data{user} = $users[$i]; 				# inserisco l'i-esimo user
	$row_data{timestamp} = $timestamps[$i]; 	# inserisco l'i-esimo timestamp

	push(@loop_data, \%row_data); 	# aggiungo a loop_data l'array associativo temporaneo creato nell'iterazione
}

$template = HTML::Template->new(filename => 'admin.tmpl'); # raccolgo il file di template
$template->param(user => $user);
$template->param(log => \@loop_data);

HTML::Template->config(utf8 => 1);
print "Content-Type: text/html\n\n", $template->output; # butto in output il template dicendo che si tratta di HTML
