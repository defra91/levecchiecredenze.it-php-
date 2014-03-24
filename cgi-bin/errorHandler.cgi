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
use CGI;

$cgi = CGI->new();

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
if ($input{"code"} && $input{"desc"}) {
	$code = $input{"code"};
	$desc = $input{"desc"};
}
else {
	$code = 404;
	$desc = "Errore non trovato";
}

$template = HTML::Template->new(filename => 'error.tmpl'); # raccolgo il file di template
$template->param(code => $code);
$template->param(desc => $desc);

HTML::Template->config(utf8 => 1);
print "Content-Type: text/html\n\n", $template->output; # butto in output il template dicendo che si tratta di HTML
