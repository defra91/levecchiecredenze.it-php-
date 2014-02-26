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

$path = "../public-html/images/fotogallery/"; # Imposto il path delle foto
@photos = (); # creo un array per i path
@alt = (); # creo un array per gli alt
# Al momento non prelevo da xml ma direttamente da dentro la cartella. Io so a priori che ci sono 26 foto
for ($i=0; $i<26; $i++) {
	push(@photos, $path . ($i+1) . ".jpg");
	push(@alt, "Descrizione della foto" . ($i+1) . ".jpg");
}

my @loop_data = (); # questo array mi servirà per raccogliere i dati quando faccio il ciclo

for ($i=0; $i<scalar(@photos); $i++) {
	my %row_data; # dichiaro un hash ausiliario
	$row_data{alt} = $alt[$i]; # inserisco l'i-esimo alt
	$row_data{src} = $photos[$i]; # inserisco l'i-esimo photos

	push(@loop_data, \%row_data); # aggiungo a loop_data l'array associativo temporaneo creato nell'iterazione
}


$template = HTML::Template->new(filename => 'gallery.tmpl'); # raccolgo il file di template
$template->param(gallery => \@loop_data); #rimpiazzo i parametri con i valori corretti

print "Content-Type: text/html\n\n", $template->output; # butto in output il template dicendo che si tratta di HTML
