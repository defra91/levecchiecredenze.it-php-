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
read(STDIN, $buffer,$ENV{'CONTENT_LENGTH'});
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

if () {
	$session = new CGI::Session();
	$session->param(-name => "username", -value => "luca");
	print $session->header(-location => "loginView.cgi");
}
else {
	$cgi = new CGI();
	$cgi->redirect("loginView.cgi");
}