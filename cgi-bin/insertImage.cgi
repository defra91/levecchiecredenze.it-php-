#!/usr/bin/perl -w

# Author: Luca De Franceschi
#
# Description: Questo script si occupa di inserire l'immagine indicata dalla query string all'interno del database di riferimento

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

$filename = "../database/gallery.xml"; 		# indica il file xml su cui effettuare il parsing

$parser = XML::LibXML->new();				# creo un parser per il file xml
$xml_doc = $parser->parse_file($filename); 	# effettuo parsing sul file xml e ottengo un oggetto di 'documento xml'

$root = $xml_doc->getDocumentElement();		# ottengo il nodo radice

$image = $cgi->upload('image');
$imageName = $cgi->param('name');
$alt = $cgi->param('alt');
$title = $cgi->param('title');

# verifico che non esista un'immagine con name == $filename
$exists = $root->exists("immagine[nome=$imageName]");

if ($exists) {
	$code = 600;
	$desc = "Il nome dell'immagine da te indicato è già presente nel database.";
	$cgi->redirect("adminErrorHandler.cgi?code=$code&desc=$desc");
}

# verifico che l'immagine sia stata raccolta correttamente
if (!$image) {
	$code = 600;
	$desc = "C'è stato un errore nel caricare l'immagine.";
	$cgi->redirect("adminErrorHandler.cgi?code=$code&desc=$desc");
}

my $upload_dir = "../public-html/images/fotogallery/";		# indico la cartella sulla quale fare l'upload

open(UPLOADFILE, ">$upload_dir$imageName") or  die "$!";
binmode UPLOADFILE;

while ( <$image>) {
	print UPLOADFILE;
}

close  UPLOADFILE;

$last_id = $root->findvalue("immagine[last()]/\@id");	# estraggo l'id dell'ultima immagine
$new_id = $last_id + 1;									# incremento l'id

$nuovo_el ="
	\n\t<immagine id=\"$new_id\">
	\n\t\t<nome>$imageName</nome>
	\n\t\t<alt>$alt</alt>
	\n\t\t<title>$title</title>
	\n\t\t<percorso>$upload_dir</percorso>
	\n\t</immagine>";

$frammento = $parser->parse_balanced_chunk($nuovo_el);	# controllo la buona formazione dell'elemento

$root->appendChild($frammento);							# appendo il nuovo elemento alla radice

$xml_doc->toFile($filename); 							# salvo il file xml

print $cgi->redirect("galleryAdminLoader.cgi");			# rimando alla pagina delle immagini

