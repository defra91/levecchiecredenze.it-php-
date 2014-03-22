#!/usr/bin/perl -w

#########################################################################
# Author: Luca De Franceschi                                            #
#########################################################################

use CGI;
use CGI::Session;
use XML::LibXML;

$filename = "../database/users.xml"; 		# indica il file xml su cui effettuare il parsing
$parser = XML::LibXML->new();				# creo un parser per il file xml
$xml_doc = $parser->parse_file($filename); 	# effettuo parsing sul file xml e ottengo un oggetto di 'documento xml'

$root = $xml_doc->getDocumentElement();		# ottengo il nodo radice

$buffer = "";
read(STDIN, $buffer,$ENV{'CONTENT_LENGTH'});	# estraggo i dati dal form
@pairs = split(/&/, $buffer);					# divido i vari parametri e li butto in un array
%input;
foreach $pair (@pairs) { 
	($name, $value) = split(/=/, $pair); 
	$value =~ tr/+/ /; 							# effettuo una serie di operazioni per pulire la stringa									
	$value =~ s/%([a-fA-F0-9][a-fA-F0-9])/pack("C", hex($1))/eg; 
	$name =~ tr/+/ /; 
	$name =~ s/%([a-fA-F0-9][a-fA-F0-9])/pack("C",hex($1))/eg; 
	$input{$name} = $value;						# inserisco il valore nell'array associativo
}

# rimpiazzare la @ con \@

$exists = $root->exists("user[email=$input{\"email\"} and password=$input{\"password\"}]");

if ($exists) {
	$session = CGI::Session->new();
	$session->param(-name => "email", -value => $input{email});
	print $session->header(-location => "loginView.cgi");
}
else {
	$cgi = new CGI();
	print $cgi->redirect("loginView.cgi");
}