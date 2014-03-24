#!/usr/bin/perl -w
#
# Author: Luca De Franceschi
#
# Description: Questo script verifica che l'utente sia autenticato e visualizza il template della pagina di inserimento di una nuova news
#

use HTML::Template;
use CGI::Session;
use CGI;

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

$template = HTML::Template->new(filename => 'insertNews.tmpl'); # raccolgo il file di template

HTML::Template->config(utf8 => 1);
print "Content-Type: text/html\n\n", $template->output; # butto in output il template dicendo che si tratta di HTML
