#!/usr/bin/perl -w

# Author: Luca De Franceschi
#
# Description: Questo script si occupa di eliminare la news indicata dalla query string all'interno del database di riferimento

######################

use XML::LibXML;
use CGI::Session;
use CGI;

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

# verifico che esista un'immagine con id == $_id
$exists = $root->exists("notizia[\@id=$_id]");
if ($exists) {
	$news = $xml_doc->findnodes("//notizia[\@id=$_id]")->get_node(1);	# ottengo il puntatore al nodo
	$parent = $news->parentNode();										# ottengo suo padre
	$deletedNode = $parent->removeChild($news);						# rimuovo il nodo figlio
	$xml_doc->toFile($filename);										# salvo il file xml

	print $cgi->redirect("newsHandler.cgi");		# rimando alla pagina delle immagini
}
else {
	# se l'immagine non esiste rimando alla pagina di errore
	$code = "404";
	$desc = "News non trovata";
	print $cgi->redirect("errorHandler.cgi?code=$code&desc=$desc");
}
