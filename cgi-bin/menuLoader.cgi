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
use XML::LibXML;
HTML::Template->config(utf8 => 1);

$filename = "../database/menu.xml"; # indica il file xml su cui effettuare il parsing
$parser = XML::LibXML->new();	# creo un parser per il file xml
$xml_doc = $parser->parse_file($filename); # effettuo parsing sul file xml e ottengo un oggetto di 'documento xml'

$root = $xml_doc->getDocumentElement();	# ottengo il nodo radice

@category = ("antipasti", "primi", "secondi", "dessert");
@loopContainer = ();

for ($j=0; $j<scalar(@category); $j++) {
	@children = $root->findnodes("$category[$j]/piatto");	# mi prendo tutti i figli evento

	@name = ();
	@price = ();

	foreach $child (@children) {						# scorro tutti i nodi figli della radice
		push(@name, $child->findvalue("nomePiatto"));	# aggiungo il giorno del nodo corrente
		push(@price, $child->findnodes("prezzo"));		# aggiungo il mese del nodo corrente
	}

	$loop = (); # questo array mi servirà per raccogliere i dati quando faccio il ciclo

	for ($i=0; $i<scalar(@children); $i++) {
		my %row_data; 							# dichiaro un hash ausiliario
		$row_data{menu_item} = $name[$i]; 		# inserisco l'i-esimo giorno
		$row_data{price} = $price[$i]; 			# inserisco l'i-esimo mes

		push(@loop, \%row_data); 				# aggiungo a loop_data l'array associativo temporaneo creato nell'iterazione
	}
	push(@loopContainer, \@loop);
}

@degustazione = $root->findnodes("degustazione/nomePiatto/text()");
$prezzo_degustazione = $root->findvalue("degustazione/\@prezzo");
my @degustazioneLoop = ();
for ($i=0; $i<scalar(@degustazione); $i++) {
	my %row_data;
	$row_data{deg_item} = $degustazione[$i];

	push(@degustazioneLoop, \%row_data);
}

print $degustazioneLoop[0]{deg_item};

$template = HTML::Template->new(filename => 'menu.tmpl'); 	# raccolgo il file di template
$template->param(antipasti => $loopContainer[0]); 			#rimpiazzo i parametri con i valori corretti
$template->param(primi => $loopContainer[1]); 				#rimpiazzo i parametri con i valori corretti
$template->param(secondi => $loopContainer[2]); 			#rimpiazzo i parametri con i valori corretti
$template->param(dessert => $loopContainer[3]);				#rimpiazzo i parametri con i valori corretti
$template->param(degustazione => \@degustazioneLoop); 		#rimpiazzo i parametri con i valori corretti
$template->param(deg_price => $prezzo_degustazione); 		#rimpiazzo i parametri con i valori corretti

print "Content-Type: text/html\n\n", $template->output; 	# butto in output il template dicendo che si tratta di HTML
