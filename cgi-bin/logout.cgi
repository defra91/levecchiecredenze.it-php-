#!/usr/bin/perl -w

#########################################################################
# Author: Luca De Franceschi                                            #
#########################################################################

use CGI;
use CGI::Session;
use CGI::Carp qw(warningsToBrowser fatalsToBrowser); 

$cgi = CGI->new();

# prima di tutto controllo che l'utente che cerca di accedere alla pagina sia autenticato
$session = CGI::Session->new();

if ($session->param(-name => "email")) {
	$session->delete();
	$session->close();
	$session->delete();
	$session->flush();
	print $cgi->redirect("../public-html/index.html");
}
else {
	$cgi = new CGI();
	print $cgi->redirect("../public-html/index.html");
}
