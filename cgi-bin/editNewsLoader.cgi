#!/usr/bin/perl -w
#
# Author: Luca De Franceschi
#
# Description: Questo script si occupa di verificare se l'utente è autenticato e, in caso positivo,  carica la pagina di edit della news selezionata

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

$filename = "../database/news.xml"; 		# indica il file xml su cui effettuare il parsing
$parser = XML::LibXML->new();				# creo un parser per il file xml
$xml_doc = $parser->parse_file($filename);	# effettuo parsing sul file xml e ottengo un oggetto di 'documento xml'

$_id = "";
$buffer = "";
$buffer = $ENV{'QUERY_STRING'};
@pairs = split(/&/, $buffer);
%input = {};
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
	$code = "404";
	$desc = "News non trovata";
	print $cgi->redirect("errorHandler.cgi?code=$code&desc=$desc");
}

$root = $xml_doc->getDocumentElement();		# ottengo il nodo radice

$news = $root->findnodes("notizia[\@id=$_id]")->get_node(1);	# mi prendo l'immagine da modificare

$title = $news->findvalue("titolo");
$desc = $news->findvalue("descrizione");

$template = HTML::Template->new(filename => 'editNews.tmpl'); # raccolgo il file di template
$template->param(title => $title);
$template->param(desc => $desc);
$template->param(id => $_id);


HTML::Template->config(utf8 => 1);
print "Content-Type: text/html\n\n", $template->output; # butto in output il template dicendo che si tratta di HTML
