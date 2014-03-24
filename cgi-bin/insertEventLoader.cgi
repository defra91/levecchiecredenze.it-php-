#!/usr/bin/perl -w
#
# Author: Luca De Franceschi
#
# Description: Questo script verifica che l'utente sia autenticato e visualizza il template della pagina di inserimento di un nuovo evento
#

use HTML::Template;
use CGI::Session;
use CGI;
use DateTime;

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

$today = DateTime->now;
$actualYear = $today->year;

@day = ();
@month = ();
@year = (); 

for ($i=1; $i<32; $i++) {
	push(@day, $i);
}
for ($i=1; $i<=12; $i++) {
	push(@month, $i);
}
for ($i=$actualYear; $i<$actualYear+2; $i++) {
	push(@year, $i);
}

my @day_loop = (); # questo array mi servirà per raccogliere i dati quando faccio il ciclo

for ($i=0; $i<scalar(@day); $i++) {
	my %row_data; # dichiaro un hash ausiliario
	$row_data{val} = $day[$i];

	push(@day_loop, \%row_data); # aggiungo a loop_data l'array associativo temporaneo creato nell'iterazione
}

my @month_loop = (); # questo array mi servirà per raccogliere i dati quando faccio il ciclo

for ($i=0; $i<scalar(@month); $i++) {
	my %row_data; # dichiaro un hash ausiliario
	$row_data{val} = $month[$i];

	push(@month_loop, \%row_data); # aggiungo a loop_data l'array associativo temporaneo creato nell'iterazione
}

my @year_loop = (); # questo array mi servirà per raccogliere i dati quando faccio il ciclo

for ($i=0; $i<scalar(@year); $i++) {
	my %row_data; # dichiaro un hash ausiliario
	$row_data{val} = $year[$i];

	push(@year_loop, \%row_data); # aggiungo a loop_data l'array associativo temporaneo creato nell'iterazione
}

$template = HTML::Template->new(filename => 'insertEvent.tmpl'); # raccolgo il file di template
$template->param(day => \@day_loop);
$template->param(month => \@month_loop);
$template->param(year => \@year_loop);

HTML::Template->config(utf8 => 1);
print "Content-Type: text/html\n\n", $template->output; # butto in output il template dicendo che si tratta di HTML
