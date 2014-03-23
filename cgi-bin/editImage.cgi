#!/usr/bin/perl -w

# Author: Luca De Franceschi
#
# Description: Questo script si occupa di modificare l'immagine indicata dalla query string all'interno del database di riferimento

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

$filename = "../database/gallery.xml"; # indica il file xml su cui effettuare il parsing

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
	$desc = "Immagine non trovata";
	print $cgi->redirect("errorHandler.cgi?code=$code&desc=$desc");
}

# estraggo i parametri
$new_name = $cgi->param('name');
$new_alt = $cgi->param('alt');
$new_title = $cgi->param('title');

# verifico che esista un'immagine con id == $_id
$exists = $root->exists("immagine[\@id=$_id]");

if ($exists) {
	$image = $root->findnodes("immagine[\@id=$_id]")->get_node(1);	# mi prendo il nodo che mi serve
	$name = $image->findnodes("nome/text()")->get_node(1);
	$name_val = $image->findvalue("nome");
	$alt = $image->findnodes("alt/text()")->get_node(1);
	$title = $image->findnodes("title/text()")->get_node(1);
	
	rename "../public-html/images/fotogallery/" . $name_val, "../public-html/images/fotogallery/" . $new_name;

	$name->setData($new_name);
	$alt->setData($new_alt);
	$title->setData($new_title);

	$xml_doc->toFile($filename);

	print $cgi->redirect("galleryAdminLoader.cgi");		# rimando alla pagina delle immagini
}
else {
	# se l'immagine non esiste rimando alla pagina di errore
	$code = "404";
	$desc = "Immagine non trovata";
	print $cgi->redirect("errorHandler.cgi?code=$code&desc=$desc");
}
