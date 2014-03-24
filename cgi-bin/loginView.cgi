#!/usr/bin/perl -w

#########################################################################
# Author: Luca De Franceschi                                            #
# Nota:                                                                 #
#                                                                       #
#	Per far funzionare questo script bisogna                            #
#	aver settato correttamente apache2 per gli script perl/cgi ed aver  #
#	installato il modulo HTML::Template da CPAN       					#          
#																		#
#########################################################################

use HTML::Template;
use CGI;
use CGI::Session;

$session = new CGI::Session();

if ($session->param(-name => "email")) {
	$cgi = new CGI();
	print $cgi->redirect("adminLoader.cgi");
}
else {
	$logged = "Not logged";
}


$template = HTML::Template->new(filename => 'login.tmpl'); # raccolgo il file di template
$template->param(logged => $logged);

HTML::Template->config(utf8 => 1);
print "Content-Type: text/html\n\n", $template->output; # butto in output il template dicendo che si tratta di HTML
