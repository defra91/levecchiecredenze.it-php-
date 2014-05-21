<?php

	require_once("../resources/library/utils/PageCompositor.php");

	$compositor = new PageCompositor();

	print $compositor->createPageHeader(4);

?>

<body>
	
	<div id="navigation">
		<?php
			print $compositor->createNavigationMenu(4);	
			print $compositor->createFooter(1);
		?>
	</div>
	
	<div id="content">
		<h1>La nostra cantina</h1>
		<hr/>
		<p>
			La nostra cantina è il risultato di un’accurata selezione, che mette a disposizione dei clienti circa 130 etichette selezionate tra i migliori vini presenti sul mercato nazionale e non solo.
		</p>
		<p>
			Con un piccolo preavviso sono a disposizione altri 3.000 vini.
		</p>

		<a href="docs/carta_vini.pdf" target="_blank" class="download">Scarica la lista di vini in pdf (144,7 kB)</a>

		<table summary="Nella tabella viene fornito l'elenco di tutti i vini al bicchiere disponibili nel menu. Ogni riga descrive un vino tramite l'indicazione del nome, della cantina di provenienza e del suo prezzo">
			<caption>Vini al bicchiere</caption>
			<tr>
				<th scope="col">Nome</th>
				<th scope="col">Cantina</th>
				<th scope="col">Prezzo</th>
			</tr>
			<tr>
				<td scope="row">Freisa di Chieri</td>
				<td>La Borgarella</td>
				<td>€ 2,00</td>
			</tr>
			<tr>
				<td scope="row">Barbera</td>
				<td>Rossotto</td>
				<td>€ 3,00</td>
			</tr>
			<tr>
				<td scope="row">Gavi</td>
				<td>Il Pozzo</td>
				<td>€ 3,00</td>
			</tr>
			<tr>
				<td scope="row" lang="de">Muller thurgau brut</td>
				<td>Ca Ernesto</td>
				<td>€ 3,00</td>
			</tr>
		</table>

		<table summary="Nella tabella viene fornito l'elenco di tutte le mezze bottiglie presenti nel menu. Ogni riga descrive un vino tramite l'indicazione del nome, della cantina di provenienza, della capacità della bottiglia e del suo prezzo">
			<caption>Mezze bottiglie</caption>
			<tr>
				<th scope="col">Nome</th>
				<th scope="col">Cantina</th>
				<th scope="col">Quantità</th>
				<th scope="col">Prezzo</th>
			</tr>	
			<tr>
				<td scope="row">Arneis “Anterisio”</td>
				<td>Cascina Chicco</td>
				<td>37,50 <abbr title="centilitri">cl</abbr></td>
				<td>€ 7,00</td>
			</tr>
			<tr>
				<td scope="row">Favorita</td>
				<td>Del Tetto</td>
				<td>37,50 <abbr title="centilitri">cl</abbr></td>
				<td>€ 8,00</td>
			</tr>
			<tr>
				<td scope="row" lang="de">Gewurztraminer</td>
				<td>San Michele Appiano</td>
				<td>37,50 <abbr title="centilitri">cl</abbr></td>
				<td>€ 8,00</td>
			</tr>
			<tr>
				<td scope="row">Greco di Tufo</td>
				<td>Mastroberardino</td>
				<td>37,50 <abbr title="centilitri">cl</abbr></td>
				<td>€ 7,00</td>
			</tr>
			<tr>
				<td scope="row">Freisa di Chieri vivace</td>
				<td>Balbiano</td>
				<td>37,50 <abbr title="centilitri">cl</abbr></td>
				<td>€ 7,00</td>
			</tr>
			<tr>
				<td scope="row">Bonarda Piemonte vivace</td>
				<td>Balbiano</td>
				<td>37,50 <abbr title="centilitri">cl</abbr></td>
				<td>€ 7,00</td>
			</tr>
			<tr>
				<td scope="row">Barbera d'Alpa</td>
				<td>Deltetto</td>
				<td>37,50 <abbr title="centilitri">cl</abbr></td>
				<td>€ 8,00</td>
			</tr>
			<tr>
				<td scope="row">Barbera d'Asti</td>
				<td>Damilano</td>
				<td>37,50 <abbr title="centilitri">cl</abbr></td>
				<td>€ 8,00</td>
			</tr>
			<tr>
				<td scope="row">Nebbiolo Langhe “Marghe”</td>
				<td>Damilano</td>
				<td>37,50 <abbr title="centilitri">cl</abbr></td>
				<td>€ 9,00</td>
			</tr>
			<tr>
				<td scope="row">Dolcetto d’Alba ”Colombè”</td>
				<td>Ratti</td>
				<td>37,50 <abbr title="centilitri">cl</abbr></td>
				<td>€ 8,00</td>
			</tr>
			<tr>
				<td scope="row">Nero d’Avola”Sedara”</td>
				<td>Donnafugata</td>
				<td>37,50 <abbr title="centilitri">cl</abbr></td>
				<td>€ 8,00</td>
			</tr>
		</table>

		<table summary="Nella tabella viene fornito l'elenco dei vini bianchi presenti nel menu suddivisi per regione. Ogni riga descrive un vino tramite l'indicazione del nome, della cantina di provenienza e del suo prezzo a bottiglia">
			<caption>Vini bianchi</caption>
			<tr>
				<th scope="col">Nome</th>
				<th scope="col">Cantina</th>
				<th scope="col">Prezzo</th>
			</tr>
			<tr>
				<th scope="col" colspan="3">Piemonte</th>
			</tr>
			<tr>
				<td scope="row">Roero Arneis</td>
				<td>Casetta</td>
				<td>€ 12,00</td>
			</tr>
			<tr>
				<td scope="row">Roero Arneis “Anterisio”</td>
				<td>Cascina Chiccho</td>
				<td>€ 13,00</td>
			</tr>
			<tr>
				<td scope="row">Roero Arneis <span lang="fr">“Daivej”</span></td>
				<td>Del Tetto</td>
				<td>€ 14,00</td>
			</tr>
			<tr>
				<td scope="row">Roero Arneis</td>
				<td>Malvirà</td>
				<td>€ 14,00</td>
			</tr>
			<tr>
				<td scope="row">Roero Arneis</td>
				<td>Pescaja</td>
				<td>€ 15,00</td>
			</tr>
			<tr>
				<td scope="row">Roero Arneis <span lang="fr">"Blangè"</span></td>
				<td>Ceretto</td>
				<td>€ 21,00</td>
			</tr>
			<tr>
				<td scope="row">Langhe Favorita <span lang="fr">“Servaj”</span></td>
				<td>Del Tretto</td>
				<td>€ 14,00</td>
			</tr>
			<tr>
				<td scope="row">Langhe Favorita</td>
				<td>Chicco</td>
				<td>€ 13,00</td>
			</tr>
			<tr>
				<td scope="row" lang="fr">Chardonnay “Malù”</td>
				<td>Servetti</td>
				<td>€ 12,00</td>
			</tr>
			<tr>
				<td scope="row">Gavi</td>
				<td>Caldera</td>
				<td>€ 14,00</td>
			</tr>
			<tr>
				<td scope="row">Gavi di Gavi</td>
				<td>Chiarlo Michele</td>
				<td>€ 14,00</td>
			</tr>
			<tr>
				<td scope="row">Erbaluce “Misobolo”</td>
				<td>Chieck</td>
				<td>€ 16,00</td>
			</tr>
			<tr>
				<td scope="row">Erbaluce di Caluso</td>
				<td>La Masera</td>
				<td>€ 13,00</td>
			</tr>
			<tr>
				<td scope="row">Timorasso “Derthona”</td>
				<td>Massa</td>
				<td>€ 24,00</td>
			</tr>
			<tr>
				<th scope="col" colspan="3">Friuli</th>
			</tr>
			<tr>
				<td scope="row" lang="fr">Sauvignon</td>
				<td lang="fr">Le Monde</td>
				<td>€ 14,00</td>
			</tr>
			<tr>
				<td scope="row">Ribolla Gialla</td>
				<td lang="fr">Le Monde</td>
				<td>€ 15,00</td>
			</tr>
			<tr>
				<td scope="row" lang="fr">Chardonnay</td>
				<td lang="fr">Lis Neris</td>
				<td>€ 21,00</td>
			</tr>
			<tr>
				<td scope="row">Tocai Friulano</td>
				<td>Le Vigne di Zamò</td>
				<td>€ 23,00</td>
			</tr>
			<tr>
				<td scope="row" lang="fr">Vintage Tunina</td>
				<td lang="fr">Jermann</td>
				<td>€ 55,00</td>
			</tr>
			<tr>
				<th scope="col" colspan="3">Trentino Alto Adige</th>
			</tr>
			<tr>
				<td scope="row" lang="de">Muller thurgau <abbr title="Alto Adige">A.A.</abbr></td>
				<td lang="de">Muri Gries</td>
				<td>€ 14,00</td>
			</tr>
			<tr>
				<td scope="row" lang="de">Gewurztraminer</td>
				<td>Viticoltori di Caldaro</td>
				<td>€ 17,50</td>
			</tr>
			<tr>
				<td scope="row" lang="de">Sanct Valentin Gewurztraminer</td>
				<td><abbr title="San Michele">S.M.</abbr> Appiano</td>
				<td>€ 31,50</td>
			</tr>
			<tr>
				<td scope="row" lang="de">“Lahn” <span lang="fr">Sauvignon</span></td>
				<td><abbr title="San Michele">S.M.</abbr> Appiano</td>
				<td>€ 17,50</td>
			</tr>
			<tr>
				<th scope="col" colspan="3">Veneto</th>
			</tr>
			<tr>
				<td scope="row">Lugana “<abbr title="contrà">Cà</abbr> del Lago”</td>
				<td>Villabella</td>
				<td>€ 14,00</td>
			</tr>
			<tr>
				<th scope="col" colspan="3">Toscana</th>
			</tr>
			<tr>
				<td scope="row">Cervaro della Sala</td>
				<td>Antinori</td>
				<td>€ 55,00</td>
			</tr>
			<tr>
				<th scope="col" colspan="3">Campania</th>
			</tr>
			<tr>
				<td scope="row">Greco di Tufo</td>
				<td>Mastroberardino</td>
				<td>€ 17,00</td>
			</tr>
			<tr>
				<td scope="row">Falanghina</td>
				<td>Vadiaperti</td>
				<td>€ 14,00</td>
			</tr>
			<tr>
				<th scope="col" colspan="3">Sicilia</th>
			</tr>
			<tr>
				<td scope="row">Grillo</td>
				<td>Principe di Corleone</td>
				<td>€ 13,00</td>
			</tr>
			<tr>
				<td scope="row" lang="fr">Chardonnay</td>
				<td>Planeta</td>
				<td>€ 32,50</td>
			</tr>
			<tr>
				<td scope="row">Valcanziria</td>
				<td>Gulfi</td>
				<td>€ 16,00</td>
			</tr>
			<tr>
				<th scope="col" colspan="3">Sardegna</th>
			</tr>
			<tr>
				<td scope="row">Vermentino”Cucaione”</td>
				<td>Piero Mancini</td>
				<td>€ 13,00</td>
			</tr>
		</table>


		<table summary="Nella tabella viene fornito l'elenco dei vini rossi presenti nel menu suddivisi per regione. Ogni riga descrive un vino tramite l'indicazione del nome, della cantina di provenienza e del suo prezzo a bottiglia">
			<caption>Vini rossi</caption>
			<tr>
				<th scope="col">Nome</th>
				<th scope="col">Cantina</th>
				<th scope="col">Prezzo</th>
			</tr>
			<tr>
				<th scope="col" colspan="3">Piemonte</th>
			</tr>
			<tr>
				<td scope="row">Freisa di Chieri "Barbarossa"</td>
				<td>Balbiano</td>
				<td>€ 17,00</td>
			</tr>
			<tr>
				<td scope="row">Freisa di Chieri</td>
				<td>La Borganella</td>
				<td>€ 10,00</td>
			</tr>
			<tr>
				<td scope="row">Freisa vivace "Luna di Maggio"</td>
				<td>Cascina Gilli</td>
				<td>€ 13,00</td>
			</tr>
			<tr>
				<td scope="row">Grignolino d'Asti</td>
				<td>Braida</td>
				<td>€ 16,00</td>
			</tr>
			<tr>
				<td scope="row">Grignolino Piemonte</td>
				<td>Agostino Pavia</td>
				<td>€ 12,00</td>
			</tr>
			<tr>
				<td scope="row">Dolcetto d'Alba</td>
				<td>Renato Ratti</td>
				<td>€ 15,00</td>
			</tr>
			<tr>
				<td scope="row">Dolcetto d'Alba</td>
				<td>Damilano</td>
				<td>€ 14,00</td>
			</tr>
			<tr>
				<td scope="row">Dolcetto Dogliani "Le Gemelle"</td>
				<td>Marenco Romana</td>
				<td>€ 10,00</td>
			</tr>
			<tr>
				<td scope="row">Dolcetto Dogliani "San Luigi"</td>
				<td>Pecchenino</td>
				<td>€ 16,50</td>
			</tr>
			<tr>
				<td scope="row">Barbera d'Alba "Granera Alta"</td>
				<td>Cascina Chicco</td>
				<td>€ 13,00</td>
			</tr>
			<tr>
				<td scope="row">Barbera d'Alba</td>
				<td>Deltetto</td>
				<td>€ 12,00</td>
			</tr>
			<tr>
				<td scope="row">Barbera d'Alba</td>
				<td>Ratti Renato</td>
				<td>€ 17,00</td>
			</tr>
			<tr>
				<td scope="row">Barbera d'Asti "Tre Vescovi"</td>
				<td>Vincho Vaglio</td>
				<td>€ 14,00</td>
			</tr>
			<tr>
				<td scope="row">Barbera d'Asti "Bric dei Banditi"</td>
				<td>Martinetti</td>
				<td>€ 19,00</td>
			</tr>
			<tr>
				<td scope="row">Barbera d'Asti "Casareggio"</td>
				<td>Agostino Pavia</td>
				<td>€ 12,00</td>
			</tr>
			<tr>
				<td scope="row">Barbera vivace "Il Giullare"</td>
				<td>Caldera</td>
				<td>€ 13,00</td>
			</tr>
			<tr>
				<td scope="row">Barbera d'Asti "<abbr title="contrà">Cà</abbr> di Pian</td>
				<td>La Spinetta</td>
				<td>€ 27,00</td>
			</tr>

			<tr>
				<td scope="row">Roero</td>
				<td>Casetta</td>
				<td>€ 14,00</td>
			</tr>
			<tr>
				<td scope="row">Roero "Montespianato"</td>
				<td>Chicco</td>
				<td>€ 17,00</td>
			</tr>
			<tr>
				<td scope="row">Nebbiolo Langhe "Tukè"</td>
				<td>Pescaja</td>
				<td>€ 15,00</td>
			</tr>
			<tr>
				<td scope="row">Nebbiolo Langhe</td>
				<td>Pio Cesare</td>
				<td>€ 26,00</td>
			</tr>
			<tr>
				<td scope="row">Nebbiolo Langhe</td>
				<td>Produttori barbaresco</td>
				<td>€ 15,00</td>
			</tr>
			<tr>
				<td scope="row">Pelaverga Verduno</td>
				<td>Bel Colle</td>
				<td>€ 16,00</td>
			</tr>
			<tr>
				<td scope="row">Ruchè</td>
				<td>Caldera</td>
				<td>€ 17,00</td>
			</tr>
			<tr>
				<td scope="row">Ruchè</td>
				<td>Cantina Sociale di Castagnole</td>
				<td>€ 13,00</td>
			</tr>
			<tr>
				<td scope="row">Barolo "Marcenasco"</td>
				<td>Ratti Renato</td>
				<td>€ 53,00</td>
			</tr>
			<tr>
				<td scope="row">Barolo "Pì Vigne"</td>
				<td>Grasso Silvio</td>
				<td>€ 40,00</td>
			</tr>
			<tr>
				<td scope="row">Barbaresco</td>
				<td>Castello di Verduno</td>
				<td>€ 32,00</td>
			</tr>
			<tr>
				<td scope="row">Barbaresco "Bric Balin"</td>
				<td>Moccagatta</td>
				<td>€ 54,50</td>
			</tr>
			<tr>
				<td scope="row">Barbaresco</td>
				<td>Produttori del Barbaresco</td>
				<td>€ 25,00</td>
			</tr>
			<tr>
				<td scope="row">Sito Moresco Langhe Rosso</td>
				<td>Gaja</td>
				<td>€ 50,00</td>
			</tr>
			<tr>
				<th scope="col" colspan="3">Lombardia</th>
			</tr>
			<tr>
				<td scope="row">Bonarda <abbr title="Oltre Pò">O.P.</abbr> "Giada vivace"</td>
				<td>La Costaiola</td>
				<td>€ 12,00</td>
			</tr>
			<tr>
				<td scope="row">Bonarda <abbr title="Oltre Pò">O.P.</abbr></td>
				<td>Quaquarini</td>
				<td>€ 13,00</td>
			</tr>
			<tr>
				<th scope="col" colspan="3">Valle d'Aosta</th>
			</tr>
			<tr>
				<td scope="row" lang="fr">Pinot Noir</td>
				<td lang="fr">Les Cretes</td>
				<td>€ 17,00</td>
			</tr>
			<tr>
				<th scope="col" colspan="3">Veneto</th>
			</tr>
			<tr>
				<td scope="row">Valpolicella Classico</td>
				<td>Brigaldara</td>
				<td>€ 14,00</td>
			</tr>
			<tr>
				<td scope="row">Amarone Classico</td>
				<td>Villabella</td>
				<td>€ 38,00</td>
			</tr>
			<tr>
				<th scope="col" colspan="3">Friuli</th>
			</tr>
			<tr>
				<td scope="row">Refosco del Peduncolo Rosso</td>
				<td lang="fr">Le Monde</td>
				<td>€ 14,00</td>
			</tr>
			<tr>
				<td scope="row" lang="fr">Cabernet Sauvignon</td>
				<td lang="fr">Lis Neris</td>
				<td>€ 20,00</td>
			</tr>
			<tr>
				<td scope="row" lang="fr">Cabernet Sauvignon</td>
				<td lang="fr">Le Monde</td>
				<td>€ 19,00</td>
			</tr>
			<tr>
				<th scope="col" colspan="3">Trentino Alto Adige</th>
			</tr>
			<tr>
				<td scope="row" lang="fr">Cabernet Merlot</td>
				<td>Caldaro</td>
				<td>€ 17,00</td>
			</tr>
			<tr>
				<td scope="row" lang="fr">Pinot Noire</td>
				<td><abbr title="Alto Adige">A.A.</abbr> <span lang="fr">Muri Gries</span></td>
				<td>€ 17,00</td>
			</tr>
			<tr>
				<th scope="col" colspan="3">Toscana</th>
			</tr>
			<tr>
				<td scope="row">Chianti Superiore</td>
				<td>Castello di Sticciano</td>
				<td>€ 14,00</td>
			</tr>
			<tr>
				<td scope="row">Brunello di Montalcino</td>
				<td><abbr title="colle">Col</abbr> d'Orcia</td>
				<td>€ 43,00</td>
			</tr>
			<tr>
				<td scope="row">Morellino Scansano "Mentore"</td>
				<td>Fattoria Mantellassi</td>
				<td>€ 14,00</td>
			</tr>
			<tr>
				<td scope="row">Tignanello</td>
				<td>Antinori</td>
				<td>€ 88,00</td>
			</tr>
			<tr>
				<th scope="col" colspan="3">Campania</th>
			</tr>
			<tr>
				<td scope="row">Aglianico "Rubrato"</td>
				<td>Feudi San Gregorio</td>
				<td>€ 15,50</td>
			</tr>
			<tr>
				<td scope="row">Taurasi "Radici"</td>
				<td>Mastroberardino</td>
				<td>€ 34,00</td>
			</tr>
			<tr>
				<th scope="col" colspan="3">Abruzzo</th>
			</tr>
			<tr>
				<td scope="row">Montepulciano "Chronicon"</td>
				<td>Zaccagnini</td>
				<td>€ 16,00</td>
			</tr>
			<tr>
				<th scope="col" colspan="3">Sicilia</th>
			</tr>
			<tr>
				<td scope="row">Nero Avola "Narkè"</td>
				<td>Principe di Corleone</td>
				<td>€ 13,00</td>
			</tr>
			<tr>
				<td scope="row">Cerasuolo di Vittoria</td>
				<td>Gulfi</td>
				<td>€ 18,00</td>
			</tr>
			<tr>
				<th scope="col" colspan="3">Sardegna</th>
			</tr>
			<tr>
				<td scope="row">Cannonau</td>
				<td>Piero Mancini</td>
				<td>€ 13,00</td>
			</tr>
		</table>

		<table summary="Nella tabella viene fornito l'elenco dei vini rosati presenti nel menu. Ogni riga descrive un vino tramite l'indicazione del nome, della cantina di provenienza e del suo prezzo a bottiglia">
			<caption>Vini rosati</caption>
			<tr>
				<th scope="col">Nome</th>
				<th scope="col">Cantina</th>
				<th scope="col">Prezzo</th>
			</tr>
			<tr>
				<td scope="row">"Ciaret" rosato di Freisa</td>
				<td>La Montagnetta</td>
				<td>€ 13,00</td>
			</tr>
			<tr>
				<td scope="row" lang="la">Lacrima Rosae</td>
				<td>Mastroberardino</td>
				<td>€ 15,50</td>
			</tr>
			<tr>
				<td scope="row" lang="de">Lagrein Rosé</td>
				<td lang="de">Weinbauernverband</td>
				<td>€ 12,00</td>
			</tr>
		</table>

		<table summary="Nella tabella viene fornito l'elenco dei vini da dessert presenti nel menu. Ogni riga descrive un vino tramite l'indicazione del nome, della cantina di provenienza e del suo prezzo a bottiglia">
			<caption>Vini da dessert</caption>
			<tr>
				<th scope="col">Nome</th>
				<th scope="col">Cantina</th>
				<th scope="col">Prezzo</th>
			</tr>
			<tr>
				<td scope="row">Moscato d'Asti</td>
				<td>Villa Jolanda</td>
				<td>€ 11,00</td>
			</tr>
			<tr>
				<td scope="row">Malvasia Castelnuovo</td>
				<td>Cascina Gilli</td>
				<td>€ 12,00</td>
			</tr>
		</table>

		<table summary="Nella tabella viene fornito l'elenco dei vini passiti presenti nel menu. Ogni riga descrive un vino tramite l'indicazione del nome, della cantina di provenienza e del suo prezzo a bottiglia">
			<caption>Vini passiti</caption>
			<tr>
				<th scope="col">Nome</th>
				<th scope="col">Cantina</th>
				<th scope="col">Prezzo</th>
			</tr>
			<tr>
				<td scope="row">Passito di Moscato d'Asti</td>
				<td>Servetti</td>
				<td>€ 24,00</td>
			</tr>
			<tr>
				<td scope="row">Passito d'Erbaluce</td>
				<td>La Masera</td>
				<td>€ 24,00</td>
			</tr>
		</table>

		<table summary="Nella tabella viene fornito l'elenco dei vini frizzanti presenti nel menu. Ogni riga descrive un vino tramite l'indicazione del nome, della cantina di provenienza e del suo prezzo a bottiglia">
			<caption>Bollicine</caption>
			<tr>
				<th scope="col">Nome</th>
				<th scope="col">Cantina</th>
				<th scope="col">Prezzo</th>
			</tr>
			<tr>
				<td scope="row">"Insolito" spumante Rosè</td>
				<td>La Montagnetta</td>
				<td>€ 12,00</td>
			</tr>
			<tr>
				<td scope="row">Prosecco v8+</td>
				<td>Sior Piero</td>
				<td>€ 15,00</td>
			</tr>
			<tr>
				<td scope="row">Spumante Metodo Classico</td>
				<td>Campagnola</td>
				<td>€ 14,00</td>
			</tr>
			<tr>
				<td scope="row">Spumante Metodo Classico Rosè</td>
				<td>Rossotto</td>
				<td>€ 18,00</td>
			</tr>
			<tr>
				<td scope="row">Franciacorta Brut</td>
				<td>Contadi Castaldi</td>
				<td>€ 25,00</td>
			</tr>
		</table>

		<table summary="Nella tabella viene fornito l'elenco dei vini champagne presenti nel menu. Ogni riga descrive un vino tramite l'indicazione del nome, della cantina di provenienza e del suo prezzo a bottiglia">
			<caption lang="fr">Champagne</caption>
			<tr>
				<th scope="col">Nome</th>
				<th scope="col">Cantina</th>
				<th scope="col">Prezzo</th>
			</tr>
			<tr>
				<td scope="row" lang="fr">Champagne Brut</td>
				<td lang="fr">Henri de Berr</td>
				<td>€ 35,00</td>
			</tr>
			<tr>
				<td scope="row" lang="fr">Champagne blanc de blanc</td>
				<td lang="fr">Esterlin</td>
				<td>€ 30,00</td>
			</tr>
			<tr>
				<td scope="row" lang="fr">Champagne Blanc de noirs "Nature"</td>
				<td lang="fr">Drappier</td>
				<td>€ 60,00</td>
			</tr>
		</table>

		<table summary="Nella tabella viene fornito l'elenco delle birre artigianali presenti nel menu. Ogni riga descrive una birra tramite l'indicazione del nome, della cantina di provenienza e del suo prezzo a bottiglia">
			<caption lang="fr">Birre artigianali</caption>
			<tr>
				<th scope="col">Nome</th>
				<th scope="col">Cantina</th>
				<th scope="col">Prezzo</th>
			</tr>
			<tr>
				<td scope="row">Birra Bionda - 0,75 <abbr title="centilitri">cl</abbr></td>
				<td lang="fr">Birrificio della Granda</td>
				<td>€ 11,00</td>
			</tr>
			<tr>
				<td scope="row">Birra Rossa - 0,75 <abbr title="centilitri">cl</abbr></td>
				<td lang="fr">Birrificio della Granda</td>
				<td>€ 11,00</td>
			</tr>
			<tr>
				<td scope="row">Birra binda "Melia" - 0,50 <abbr title="centilitri">cl</abbr></td>
				<td lang="fr">Birrificio della Granda</td>
				<td>€ 9,00</td>
			</tr>
		</table>

		<table summary="Nella tabella viene fornito l'elenco delle grappe e distillati presenti nel menu. Ogni riga descrive un liquore tramite l'indicazione del nome, della cantina di provenienza e del suo prezzo a bicchiere">
			<caption lang="fr">Grappe e distillati</caption>
			<tr>
				<th scope="col">Nome</th>
				<th scope="col">Cantina</th>
				<th scope="col">Prezzo</th>
			</tr>
			<tr>
				<td scope="row">Barolo grappa Marolo</td>
				<td>Marolo</td>
				<td>€ 4,50</td>
			</tr>
			<tr>
				<td scope="row">Barbera grappa Marolo</td>
				<td>Marolo</td>
				<td>€ 4,50</td>
			</tr>
			<tr>
				<td scope="row">Arneis grappa Marolo</td>
				<td>Marolo</td>
				<td>€ 4,50</td>
			</tr>
			<tr>
				<td scope="row">Piasi grappa (Bracchetto)</td>
				<td>Berta</td>
				<td>€ 4,50</td>
			</tr>
			<tr>
				<td scope="row">Freisa grappa bianca</td>
				<td>Balbiano</td>
				<td>€ 4,50</td>
			</tr>
			<tr>
				<td scope="row">Freisa grappa bianca</td>
				<td>La Borganella</td>
				<td>€ 4,00</td>
			</tr>
			<tr>
				<td scope="row">Freisa grappa <span lang="fr">barrique</span></td>
				<td>Balbiano</td>
				<td>€ 5,00</td>
			</tr>
			<tr>
				<td scope="row">Monprà grappa magnum</td>
				<td>Berta</td>
				<td>€ 5,00</td>
			</tr>
			<tr>
				<td scope="row">Valdavi grappa magnum</td>
				<td>Berta</td>
				<td>€ 4,50</td>
			</tr>
			<tr>
				<td scope="row">Barberesco grappa bianca</td>
				<td>Gaja</td>
				<td>€ 5,00</td>
			</tr>
			<tr>
				<td scope="row">Roccanivo grappa</td>
				<td>Berta</td>
				<td>€ 9,50</td>
			</tr>
			<tr>
				<td scope="row">Barolo chinato</td>
				<td>Marcarini</td>
				<td>€ 4,50</td>
			</tr>
			<tr>
				<td scope="row">Tesseron Cognac lotto <abbr title="numero">n.</abbr> 90</td>
				<td></td>
				<td>€ 7,50</td>
			</tr>
			<tr>
				<td scope="row">De Fussigny Cognac</td>
				<td></td>
				<td>€ 7,00</td>
			</tr>
			<tr>
				<td scope="row" lang="fr">Samalens Bas-Armagnac</td>
				<td></td>
				<td>€ 5,00</td>
			</tr>
			<tr>
				<td scope="row" lang="fr">Chateau Du Breuil Calvados</td>
				<td></td>
				<td>€ 4,50</td>
			</tr>
			<tr>
				<td scope="row">Caolla 12 anni</td>
				<td></td>
				<td>€ 8,00</td>
			</tr>
			<tr>
				<td scope="row">Whisky Oban</td>
				<td></td>
				<td>€ 7,00</td>
			</tr>
			<tr>
				<td scope="row" lang="fr">Lagavulin single-malt (<span lang="it">16 anni</span>)</td>
				<td></td>
				<td>€ 7,50</td>
			</tr>
			<tr>
				<td scope="row">Ron Zacapa (15 anni)</td>
				<td></td>
				<td>€ 9,00</td>
			</tr>
			<tr>
				<td scope="row" lang="fr">Clement Rhum Agricole Vieux (<span lang="it">3 anni</span>)</td>
				<td></td>
				<td>€ 5,00</td>
			</tr>
			<tr>
				<td scope="row" lang="es">Ron Matusalem Clasico Solera</td>
				<td></td>
				<td>€ 4,00</td>
			</tr>
		</table>

		<em>
			* tutti i vini in carta possono essere acquistati da asporto con uno sconto del 20%
		</em>

	</div>

	<?php
		$compositor->createSocialTab();
	?>

</body>

</html>

<?php
	$compositor->registerPageLog(4);
?>