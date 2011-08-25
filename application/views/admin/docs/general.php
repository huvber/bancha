<div class="block withsidebar code_format">

	<div class="block_head">
		<div class="bheadl"></div>
		<div class="bheadr"></div>

		<h2>Documentazione di <?php echo CMS; ?></h2>

	</div>

	<div class="block_content">

		<div class="sidebar">
			<ul class="sidemenu">
				<li><a href="#sb-intro">1. Introduzione a <?php echo CMS; ?></a></li>
				<li><a href="#sb-install">2. Installazione</a></li>
				<li><a href="#sb-content-types">3. Tipi di contenuto</a></li>
				<li><a href="#sb-types-xml">4. Schema XML dei tipi</a></li>
				<li><a href="#sb-page-actions">5. Azioni delle pagine</a></li>
				<li><a href="#sb-template-layout">6. Template e Layout</a></li>
				<li><a href="#sb-views">7. View e rendering</a></li>
				<li><a href="#sb-extract-records">8. Estrazione di contenuti</a></li>
				<li><a href="#sb-documents">9. Documenti (files)</a>
				<li><a href="#sb-trees">10. Alberi di menu</a></li>
				<li><a href="#sb-caching">11. Caching</a></li>
			</ul>
			<p>Revisione: 1.1<br />Data: 22 Ago 2011</p>
		</div>

		<div class="sidebar_content" id="sb-intro">
			<h3>1. Introduzione a <?php echo CMS; ?></h3>
			<p><?php echo CMS; ?> è un Content Management System per PHP5 sviluppato in Code Igniter, un potente e veloce framework PHP.<br />
			&Egrave; rivolto principalmente a sviluppatori che devono gestire siti di media-grande dimensione, e che prevedono contenuti di diverso tipo.<br /><br />
			<?php echo CMS; ?> basa la sua potenza su alcuni pilastri che lo rendono differente da altri CMS:
			<ul>
				<li>Permette di gestire qualsiasi tipo di contenuto (pagine, news, gallerie fotografiche, prodotti, etc...) attraverso schemi XML.</li>
				<li>Non sacrifica le prestazioni di un sito statico, perch&egrave; utilizza svariati sistemi di caching interno.</li>
				<li>&Egrave; modulare, ovvero può essere esteso con diverse tipologie di moduli che potrai sviluppare tu stesso.</li>
				<li>&Egrave; open-source (puoi scaricarlo direttamente da <a href="#">qui</a>).</li>
				<li>&Egrave; facile da installare e da mantenere. Non necessita di infrastrutture particolari e/o avanzate.</li>
			</ul>
			<?php echo CMS; ?> &egrave; stato interamente sviluppato (ed &egrave; attualmente mantenuto) da <a href="http://www.squallstar.it">Nicholas Valbusa</a>.
			</p>
		</div>

		<div class="sidebar_content" id="sb-install">
			<h3>2. Installazione</h3>
		</div>

		<div class="sidebar_content" id="sb-content-types">
			<h3>3. Tipi di contenuto</h3>
			<p>Milk ti permette di definire diversi contenuti per il tuo sito internet.
			Ogni contenuto, è basato su un file XML che ne descrive tutti i campi gestibili.
			In questo modo, puoi creare centinaia di schemi per amministrare i vari contenuti del tuo sito internet.
			Ad esempio, un tipo di contenuto potrebbero essere i <strong>Prodotti</strong>, oppure delle <strong>Gallerie immagini</strong>.
			<br /><br />
			Un tipo di contenuto deve sempre essere uno tra i seguenti tipi:
			<ul>
				<li><strong>Semplice</strong> (per contenuti lineari, senza gerarchia)</li>
				<li><strong>Ad albero</strong> (per contenuti strutturabili gerarchicamente, come le pagine di un sito internet)</li>
			</ul>
			Come avrai intuito, anche le pagine stesse di un sito internet sono a loro volta un tipo di contenuto. &Egrave; proprio per questo che
			dovr&agrave; essere definito almeno un tipo di contenuto associato all'albero delle pagine del sito. Tale associazione viene impostata nel file di configurazione di Milk alla voce "<strong>DEFAULT TREE TYPE</strong>".
			<br /><br />
			Aggiungendo un nuovo tipo di contenuto, verranno <strong>automaticamente creati</strong> i seguenti files:<br /><br />
			<ul>
				<li><strong>/application/xml/Nome_contenuto.xml</strong> che conterrà la struttura dei campi gestibili,</li>
				<li><strong>/application/views/templates/Nome_contenuto/list.php</strong> ovvero il template xhtml per la visualizzazione come lista dei contenuti,</li>
				<li><strong>/application/views/templates/Nome_contenuto/detail.php</strong> rispettivo template per la visualizzazione di dettaglio.</li>

			</ul>
			</p>
		</div>

		<div class="sidebar_content" id="sb-types-xml">
			<h3>4. Schema XML dei tipi</h3>
<p>Ogni tipo di contenuto è associato ad un relativo file XML presente nella directory <strong><?php echo $this->config->item('xml_folder'); ?></strong> che ne descrive i campi associati. Puoi editare tale file anche dall'amministrazione, premendo il link "<strong>Modifica schema</strong>" nella lista dei tipi di contenuto/pagine. La struttura base di un tipo di contenuto/pagina è definita in questo modo:</p>
			<code>&lt;?xml version="1.0" encoding="utf-8"?&gt;
&lt;content>
	&lt;id&gt;1&lt;/id&gt;
	&lt;name&gt;pagine&lt;/name&gt;
	&lt;description&gt;Pagine generiche&lt;/description&gt;
	&lt;tree&gt;true&lt;/tree&gt;
	&lt;parent_types&gt;
		&lt;type&gt;pagine&lt;/type&gt;
	&lt;/parent_types&gt;
	&lt;has_categories&gt;true&lt;/has_categories&gt;
	&lt;fieldset&gt;
	&lt;/fieldset&gt;
&lt;/content&gt;</code><br />
<p>Il nodo <strong>&lt;id&gt;</strong> verrà popolato automaticamente da Milk quando verrà creato il tipo di contenuto, così come i nodi <strong>&lt;name&gt;</strong> e <strong>&lt;description&gt;</strong> che definiscono rispettivamente il nome utilizzato internamente come chiave, e quello visualizzato all'utente nel pannello.<br />
Il nodo <strong>&lt;tree&gt;</strong> è un booleano che descrive se il contenuto è strutturato ad albero o lineare/semplice (vedi la sezione <strong>3. Tipi di contenuto</strong> per maggiori informazioni).<br /><br />
Il nodo <strong>&lt;parent_types&gt;</strong> è obbligatorio per i contenuti ad albero, e descrive i nomi di tutti i tipi di contenuto da utilizzare come riferimento per le pagine padre. Di default, viene impostato con il tipo di contenuto stesso.
<br /><br />
Il nodo <strong>&lt;has_categories&gt;</strong> è sempre un booleano, e definisce se il tipo di contenuto deve presentare la sezione <strong>Categorie</strong>, che permette di raggruppare i contenuti di quel tipo in diverse categorie amministrabili dal pannello.</p>

<h3>Fieldsets</h3>
<p>Ogni tipo di contenuto può contiene infiniti fieldsets. Ogni fieldset, visivamente sarà una sotto-sezione e potrà contenere infiniti field (campi di inserimento). Ogni fieldset dovrà avere un nome unico tra quelli dello stesso tipo di contenuto (definito attraverso il nodo <strong>&lt;name&gt;</strong>) e conterrà uno o più nodi di tipo <strong>&lt;field&gt;</strong>.</p>
<div class="message info">Strutturare i tuoi campi in fieldset ordinati semanticamente, aiuterà gli utilizzatori durante l'inserimento dati.</div>
<code>&lt;?xml version="1.0" encoding="utf-8"?&gt;
&lt;content>
	...
	&lt;fieldset&gt;
		&lt;name&gt;<strong>Campi generali</strong>&lt;/name&gt;
		&lt;field id="campo_1"&gt;...&lt;/field&gt;
		&lt;field id="campo_2"&gt;...&lt;/field&gt;
	&lt;/fieldset&gt;
	&lt;fieldset&gt;
		&lt;name&gt;<strong>Campi secondari</strong>&lt;/name&gt;
		&lt;field id="campo_3"&gt;...&lt;/field&gt;
		&lt;field id="campo_4"&gt;...&lt;/field&gt;
	&lt;/fieldset&gt;
&lt;/content&gt;</code><br />

<h3>Fields</h3>
<p>I nodi di tipo fields all'interno di un nodo fieldset, sono utilizzati per descrivere un singolo campo di input per tale di tipo di contenuto.
Ogni nodo dovrà avere un id univoco descritto attraverso l'attributo <strong>id</strong> e dovrà essere uno dei seguenti tipi di campo (definito tramite il nodo "type"):</p>
<ul>
	<li><strong>text</strong> - Per utilizzare un input testuale su riga singola senza stile</li>
	<li><strong>textarea</strong> - Per utilizzare un input multiriga con possibilità di inserimento stili e codice HTML</li>
	<li><strong>select</strong> - Per utilizzare un campo di scelta singola a tendina</li>
	<li><strong>checkbox</strong> - Per utilizzare un campo di scelta multipla</li>
	<li><strong>files</strong> - Per utilizzare un campo di caricamento files</li>
	<li><strong>images</strong> - Per utilizzare un campo di caricamento immagini</li>
</ul>
<div class="message warning">Ogni field dovrà sempre specificare il tipo di campo di appartenenza (tra quelli sopra descritti) attraverso il nodo <strong>&lt;type&gt;</strong></div>
<p>Inoltre, ogni field ha a disposizione le seguenti proprietà definibili sempre tramite nodi:</p>
<ul>
	<li><strong>&lt;description&gt;</strong> (string) - per definire il testo da utilizzare come label del campo</li>
	<li><strong>&lt;mandatory&gt;</strong> (bool) - per definire se un campo è obbligatorio</li>
	<li><strong>&lt;length&gt;</strong> (int) - per definire la lunghezza massima accettata per i campi testuali</li>
	<li><strong>&lt;list&gt;</strong> (bool) - per definire se il campo andr&agrave; estratto nelle operazioni di "Lista contenuti"</li>
	<li><strong>&lt;admin&gt;</strong> (bool) - per definire se il campo dovrà essere visualizzato nella lista dei contenuto di questo tipo in amministrazione</li>
	<li><strong>&lt;visible&gt;</strong> (bool) - per definire se inizialmente un campo deve essere nascosto via CSS (display:none)</li>
	<li><strong>&lt;default&gt;</strong> (string) - per definire il valore da utilizzare come predefinito</li>
	<li><strong>&lt;onkeyup&gt;</strong> (string) - per definire del codice Javascript da eseguire al "key up" sul campo</li>
	<li><strong>&lt;onchange&gt;</strong> (string) - per definire del codice Javascript da eseguire al change del valore (solo per i campi di tipo select)</li>
</ul>
<p>Ecco un esempio di definizione di un campo di testo normale:</p>
<code>&lt;field <strong>id="title"</strong>&gt;
	&lt;description&gt;Titolo&lt;/description&gt;
	<strong>&lt;type&gt;text&lt;/type&gt;</strong>
	&lt;mandatory&gt;true&lt;/mandatory&gt;
	&lt;admin&gt;true&lt;/admin&gt;
	&lt;default&gt;Senza titolo&lt;/default&gt;
&lt;/field&gt;</code><br />
<p>I campi di tipo <strong>select</strong> e <strong>checkbox</strong> inoltre, avranno a disposizione il nodo <strong>&lt;options&gt;</strong> per definire le opzioni associate a tale campo, come in questo esempio:</p>
<code>&lt;options&gt;
	&lt;option value="T"&gt;Si&lt;/option&gt;
	&lt;option value="F"&gt;No&lt;/option&gt;
&lt;/options&gt;</code>
<br />
<p>In alternativa, è possibile anche estrarre dinamicamente le options tramite query SQL. Di seguito un esempio:</p>
<code>&lt;field id="galleria"&gt;
	&lt;description&gt;Galleria collegata&lt;/description&gt;
	&lt;type&gt;select&lt;/type&gt;
	<strong>&lt;sql cache="false"&gt;</strong>
		&lt;select&gt;id_record AS value, title AS name&lt;/select&gt;
		&lt;from&gt;records&lt;/from&gt;
		&lt;type&gt;Gallerie&lt;/type&gt;
		&lt;where&gt;published = 1&lt;/where&gt;
		&lt;order_by&gt;name ASC&lt;/order_by&gt;
	<strong>&lt;/sql&gt;</strong>
&lt;/field&gt;</code><br />
<div class="message info">Impostando la cache attiva, la query verr&agrave; cacheata fino a che non verr&agrave; svuotata la cache dei tipi.</div>
<p>Nota: qui, le clausole WHERE sono utilizzabili solamente su campi fisici della tabella selezionata e non sui campi XML.</p>

<p>&Egrave; possibile anche estrarre le options tramite <strong>eval</strong>, utilizzando il nodo <strong>&lt;custom&gt;</strong>:</p>
<code>&lt;field id="lang"&gt;
	&lt;description&gt;Lingua del contenuto&lt;/description&gt;
	&lt;type&gt;select&lt;/type&gt;
	&lt;options&gt;
		<strong>&lt;custom&gt;$this->config->item('languages_select');&lt;/custom&gt;</strong>
	&lt;/options&gt;
&lt;/field&gt;</code><br />

<p>I campi di tipo <strong>files</strong> e <strong>images</strong> avranno a disposizione anche le seguenti propriet&agrave;:</p>
<code>&lt;size&gt;2048&lt;/size&gt;
&lt;mimes&gt;jpg|png|gif&lt;/mimes&gt;
&lt;max&gt;5&lt;/max&gt;</code>
<br />
<p>Rispettivamente, definiscono la dimensione massima dei files caricati in Kb, i mime-types accettati e il numero massimo di files caricabili in questo campo.
Il campo <strong>&lt;mimes&gt;</strong> accetta anche il valore "<strong>*</strong>" come segnaposto per accettare tutti i mimes.</p>

<p>I campi di tipo <strong>images</strong> avranno a disposizione le proprietà dei campi files ed anche le seguenti propriet&agrave;:</p>
<code>&lt;original&gt;true&lt;/original&gt;
&lt;resized&gt;640x?&lt;/resized&gt;
&lt;thumbnail&gt;150x100&lt;/thumbnail&gt;</code>
<br />
<p>Il campo <strong>&lt;original&gt;</strong> imposta se salvare l'immagine originale. I campi <strong>&lt;resized&gt;</strong> e <strong>&lt;thumbnail&gt;</strong>
impostano le dimensioni dell'immagine da ridimensionare per le due nuove rispettive immagini. Il marcatore <strong>"?"</strong> pu&ograve; essere
utilizzato come misura automatica per mantenere le proporzioni della misura definita.</p>

<p>Di seguito un esempio completo di struttura per definire un tipo di contenuto con un campo di testo, una select ed un campo di caricamento per una singola immagine:</p>
<code>&lt;?xml version="1.0" encoding="utf-8"?&gt;
&lt;content>
	&lt;id&gt;1&lt;/id&gt;
	&lt;name&gt;pagine&lt;/name&gt;
	&lt;description&gt;Pagine generiche&lt;/description&gt;
	&lt;tree&gt;true&lt;/tree&gt;
	&lt;parent_types&gt;
		&lt;type&gt;pagine&lt;/type&gt;
	&lt;/parent_types&gt;
	&lt;has_uri&gt;true&lt;/has_uri&gt;
	&lt;has_categories&gt;true&lt;/has_categories&gt;

	&lt;fieldset&gt;
		&lt;name&gt;Informazioni&lt;/name&gt;

		&lt;field id="nome_utente"&gt;
			&lt;description&gt;Il tuo nome&lt;/description&gt;
			&lt;type&gt;text&lt;/type&gt;
			&lt;mandatory&gt;true&lt;/mandatory&gt;
			&lt;length&gt;32&lt;/length&gt;
			&lt;list&gt;true&lt;/list&gt;
		&lt;/field&gt;

		&lt;field id="colore_preferito"&gt;
			&lt;description&gt;Scegli il tuo colore preferito&lt;/description&gt;
			&lt;type&gt;select&lt;/type&gt;
			&lt;default&gt;red&lt;/default&gt;
			&lt;options&gt;
				&lt;option value="red"&gt;Rosso&lt;/option&gt;
				&lt;option value="blue"&gt;Blu&lt;/option&gt;
				&lt;option value="green"&gt;Verde&lt;/option&gt;
			&lt;/options&gt;
			&lt;admin&gt;true&lt;/admin&gt;
		&lt;/field&gt;

		&lt;field id="profile_img"&gt;
			&lt;description&gt;Immagine profilo&lt;/description&gt;
			&lt;type&gt;images&lt;/type&gt;
			&lt;mandatory&gt;true&lt;/mandatory&gt;
			&lt;mimes&gt;jpg|gif|png&lt;/mimes&gt;
			&lt;max&gt;1&lt;/max&gt;
			&lt;original&gt;false&lt;/original&gt;
			&lt;resized&gt;150x?&lt;/resized&gt;
			&lt;thumb&gt;50x50&lt;/thumb&gt;
			&lt;list&gt;true&lt;/list&gt;
		&lt;/field&gt;

	&lt;/fieldset&gt;
&lt;/content&gt;</code><br />
<p>Alla creazione di un nuovo tipo di contenuto, lo schema XML associato conterrà già una struttura di base con alcuni campi dimostrativi, tra cui quelli relativi ai <strong>Meta tags</strong>.</p>

		</div>

		<div class="sidebar_content" id="sb-page-actions">
			<h3>5. Azioni delle pagine</h3>

			<p>Ogni contenuto di tipo albero (da ora in poi, pagine) può avere associata una delle seguenti azioni di visualizzazione:</p>
			<ul>
				<li>Solo testo</li>
				<li>Lista di contenuti</li>
				<li>Azione personalizzata</li>
			</ul>
			<p>Nota: tale lista viene compilata con il campo <strong>action</strong> presente nel file XML di definizione dei tipi.<br /><br />
In base all'azione scelta, il rendering della pagina si comporterà in modo diverso: nel primo caso (solo testo), verrà visualizzato solamente il testo inserito nel campo con id <strong>contenuto</strong> di tale pagina. Nel secondo caso (<strong>lista di contenuti</strong>), sarà possibile scegliere il tipo di contenuti da estrarre ed eventuali condizioni SQL WHERE.<br /><br />
Scegliendo "Lista di contenuti", la pagina utilizzerà il template <strong>list.php</strong> del relativo tipo di contenuto scelto per la renderizzazione. Tale template è contenuto nella directory <strong>application/views/type_templates/{NomeTipo}/</strong><br /><br />
Scegliendo <strong>azione personalizzata</strong>, la pagina invocherà l'azione da te definita anzichè seguire il suo normale percorso di routing. In questo modo potrai creare una azione ad-hoc nel controller delle azioni.<br />
<div class="message info">Le azioni personalizzate, vanno definite nel controller: <u><?php echo $this->config->item('custom_controllers_folder'); ?>actions.php</u></div>
<br />&Egrave; possibile configurare manualmente i comportamenti delle singole azioni agendo sul file responsabile del rendering: <strong>application/views/layout/content_render.php</strong>. Tale file, presenta uno switch-case facilmente configurabile per modificare o implementare nuovi casi per il rendering.</p>

		</div>

		<div class="sidebar_content" id="sb-template-layout">
			<h3>6. Template e Layout</h3>
			<p>Milk utilizza un sistema di viste composto da un elemento principale (<strong>template</strong>) che a sua volta renderizza altre sotto viste, tra cui <strong>header</strong>, <strong>footer</strong> e <strong>content_render</strong>.<br /><br />
Questo vuol dire che un sito potrebbe avere anche 10 template diversi per le varie sezioni del sito internet.<br /><br />Ogni pagina, presenta un campo chiamato <strong>view_template</strong> che definisce il template da renderizzare per tale pagina. L'elenco dei templates è contenuto nella cartella <strong>application/views/layout/templates</strong> e di base presenta questi templates:</p>
<ul>
	<li><strong>.../views/website/desktop/layout/templates/default.php</strong> - utilizzato di default per le pagine</li>
	<li><strong>.../views/website/desktop/layout/templates/home.php</strong> - utilizzato dalla homepage del sito</li>
</ul>
<p>Come potrai vedere, ognuno di questi template contiene del codice HTML dichiarativo e a sua volta sceglie quali altre view renderizzare. Per renderizzare altre view, è sufficiente utilizzare la funzione nativa <strong>load->view</strong> di Code Igniter. Ecco un esempio di template:</p>
<code>&lt;?php $this->load->view('layout/header'); ?&gt;
&lt;?php $this->load->view('layout/content_render'); ?&gt;
&lt;?php $this->load->view('layout/footer'); ?&gt;</code>
<br />
<div class="message info">La parte di layout relativa alle dichiarazioni <strong>html, head, body</strong> è contenuta nel file ../views/website/desktop/layout.php</div>
<p>Quando definisci altri template, ricorda di inserire una nuova option nel campo <strong>view_template</strong> all'interno del tipo di contenuto (solitamente "Pagine") di modo che venga visualizzato il nuovo template nell'area amministrativa.<br /><br />
Templates e views, dispongono già degli helper <strong>url</strong> e <strong>html</strong> di Code Igniter caricati, quindi potrai già utilizzarli.<br /><br />
Anche i tipi di contenuto semplici (non strutturabili ad albero) presentano delle view per la loro visualizzazione:</p>
<ul>
	<li><strong>application/views/website/type_templates/{NomeTipo}/detail.php</strong> - utilizzata nel rendering di dettaglio di un singolo contenuto</li>
	<li><strong>application/views/website/type_templates/{NomeTipo}/list.php</strong> - utilizzata nel rendering di lista di più contenuti di un singolo tipo.</li>
</ul>
<p>Nulla ti vieta di definire altri templates per i tipi e utilizzarli in maniere da te definite nel <strong>content_render.php</strong> (contenuto in application/views/website/desktop/).</p>

		</div>

		<div class="sidebar_content" id="sb-views">
			<h3>7. View e rendering</h3>
			<p>NOTA: il front-end del sito, pu&ograve; utilizzare pi&ugrave; skin per differenziare ad esempio il sito <strong>desktop</strong> dalla versone <strong>mobile</strong>.
Tale configurazione è disponibile nel file di configurazione di milk alla voce "WEBSITE SKINS", e si riferiscono al nome della directory
presente nella directory application/views/website. Per default, la skin utilizzata è la "desktop", e nel caso sia presente la skin mobile
verrà effettuato lo switch in automatico nel caso che il sito venga visitato da un device mobile.</p>
			<p>Milk utilizza la classe <strong>View</strong> per settare degli oggetti nelle viste e renderizzarle.<br />
L'oggetto view, è presente globalmente accedendo alla variabile "view" di Code Igniter in questo modo: <strong>$this->view</strong>.<br /><br />
Il metodo base per settare un oggetto nella view, è il <strong>set()</strong>, e va utilizzato in questa maniera:</p>
<code>$this->view->set('nome_oggetto', $valore);</code><br />
<p>Dalla view, sarà possibile accedere agli oggetti impostati utilizzando le variabili semplici di PHP con la chiave impostata.
Nel nostro esempio sopra, dalla view sarà disponibile la variabile in questo modo:</p>
<code>echo $nome_oggetto;</code><br />
<p>Nel caso fosse necessario eliminare una variabile prima del rendering della view, è possibile utilizzare il metodo <strong>remove()</strong> che accetta un singolo parametro (la chiave/nome dell'oggetto da eliminare).<br /><br />
Di seguito, le funzioni utili a renderizzare view, o templates.</p><br />

<h3>render_template($template_file)</h3>
<p>Renderizza un template presenta nella directory dei templates, utilizzando lo skin in uso (solitamente <strong>application/views/website/desktop/templates/</strong>).
&Egrave; il metodo di rendering più utilizzato, e viene utilizzata soprattutto dal motore di routing generale del sito per renderizzare la struttura base delle pagine.</p>
<code>$this->render_template('default');
//Renderizza il file application/views/layout/templates/default.php

$this->render_template('home');
//Renderizza la homepage del sito, ovvero il file application/views/layout/templates/home.php</code><br />

<h3>render($view_file)</h3>
<p>Metodo base per il rendering di una singola vista lato front-end. Utilizza il path relativo allo skin in uso:</p>
<code>$this->view->render('pagina');
//Renderizzerà il file application/views/website/desktop/pagina.php

$this->view->render('demo/prova');
//Renderizzerà il file application/views/website/desktop/demo/prova.php</code><br />

<h3>render_type_template($type_name, $view_file)</h3>
<p>Metodo per renderizzare una vista specifica di un tipo di contenuto. Principalmente viene usata dal <strong>content_render</strong> (views/layout/content_render.php) per renderizzare automaticamente le viste dei tipi di contenuti, ma nulla ci vieta di usarlo a nostro piacimento come segue:</p>
<code>$this->view->render_type_template('Prodotti', 'list');
//Renderizzerà il file application/views/type_templates/Prodotti/list.php

$this->view->render_type_template('Gallerie', 'detail');
//Renderizzerà il file application/views/type_templates/Gallerie/detail.php</code><br />

<h3>render_layout($view_file)</h3>
<p>Metodo che renderizza un layout utilizzando il path base settato precedentemente. Viene attualmente usato <strong>solamente dall'amministrazione</strong> utilizzando come base "admin/" in modo da renderizzare automaticamente solo le viste figlie di tale path.</p>
<code>$this->view->base = 'admin/';
$this->view->render_layout('docs/general');
//Verrà renderizzato il file application/views/admin/layout/layout.php
//e verranno valorizzate le variabili $view e $content, rispettivamente con
//il nome della view da renderizzare, e i dati impostati con il metodo set().</code>

		</div>

		<div class="sidebar_content" id="sb-extract-records">
			<h3>8. Estrazione di contenuti</h3>
			<p>Utilizzando azioni personalizzate per il rendering delle pagine, potrebbe essere necessario che tu debba estrarre manualmente dei contenuti. Milk porta avanti la filosofia di Code Igniter, e ti mette a disposizione la classe "Records" per le estrazioni dei record. Tale classe è già disponibile in qualsiasi punto della tua applicazione, facendo riferimento all'oggetto <strong>$this</strong> di Code Igniter in questo modo:</p>
<code>$this->records</code><br />
<p>I metodi a disposizione della classe Records sono molto semplici da utilizzare. Ad esempio, se tu volessi estrarre gli ultimi 20 contenuti di tipo "News", potrai procedere come di seguito:</p>
<code>$notizie = $this->records->type('News')->limit(10)->get();</code>
<br />
<p>Riceverai un array di oggetti di tipo <strong>Record</strong> che potrai utilizzare per estrarre le informazioni contenute in base allo schema XML del tipo di contenuto estratto.<br />Ad esempio, stampiamo a video il titolo delle notizie estratte:</p>
<code>foreach ($notizie as $notizia)
{
	echo $notizia-><strong>get('title')</strong> . br(1);
}</code><br />
<p>Come avrai visto, i records dispongono della funzione "get" per ottenere uno qualsiasi dei loro valori. Nel caso la chiave da te seleziona non esista, ti verrà ritornato il valore booleano FALSE anzichè generare errori.<br />Per ottenere il nome/id del tipo di appartenenza di un record e del record stesso, procedi come segue:</p>
<code>echo $record->tipo;
//Mostra: "News"

echo $record->_tipo;
//Mostra: 1

echo $record->id;
//Mostra l'id del record</code><br />
<div class="message info">Per estrarre i documenti associati ad un record, &egrave; sufficiente lanciare la sua funzione <strong>set_documents()</strong> per valorizzare i relativi campi.
In alternativa, &egrave; possibile utilizzare la funzione <strong>documents()</strong> documentata qui sotto per estrarre i documenti al momento dell'estrazione dei records.</div>
<p>La classe records, dispone dei seguenti metodi raffinare le estrazioni:</p>
<ul>
	<li><strong>type($tipo_contenuto)</strong> - definisce il tipo di contenuto da usare per la ricerca</li>
	<li><strong>published($bool)</strong> - definisce se estrarre solo record pubblicati</li>
	<li><strong>language()</strong> - imposta se estrarre solo i contenuti nella lingua in uso (&egrave; possibile passare anche un'altra lingua come parametro della funzione)</li>
	<li><strong>documents($bool)</strong> - definisce se estrarre subito anche i documenti collegati anzich&egrave; usare la funzione <strong>set_documents()</strong> sui singoli record.</li>
	<li><strong>where($field, $value)</strong> - definisce una condizione where (anche su campi non fisici - xml)</li>
	<li><strong>like($field, $value)</strong> - definisce una condizione like (anche su campi non fisici - xml)</li>
	<li><strong>limit($limit, $offset)</strong> - definisce una condizione limit</li>
	<li><strong>order_by($field, $order)</strong> - definisce una condizione di order by</li>
</ul>
<p>E per estrarre i records:</p>
<ul>
	<li><strong>get()</strong> - per estrarre i records con le condizioni scelte</li>
	<li><strong>count()</strong> - per ottenere solo il numero dei records aventi tali condizioni</li>
</ul>
<p>Vediamo un altro esempio di estrazione:</p>
<code>$num_notizie = $this->records->type('News')
	->like('anno', '%2011')
	->limit(40, 10)
	->published(true)
	->order_by('id_record', 'DESC')
	->count();</code><br />
<p>I records presentano alcuni campi fisici preimpostati utilizzati nelle clausole delle query di estrazione, e visualizzabili tramite la funzione "get":</p>
<ul>
	<li><strong>id_record</strong> - rappresenta l'id interno univoco del record</li>
	<li><strong>uri</strong> - ovvero l'URI univoco di quel record (parte finale dell'URL)</li>
	<li><strong>date_insert</strong> - il timestamp riferito al primo inserimento del record</li>
	<li><strong>date_update</strong> - il timestamp riferito all'ultimo salvataggio del record</li>
	<li><strong>date_publish</strong> - il timestamp riferito alla data di pubblicazione del record</li>
	<li><strong>id_parent</strong> - rappresenta l'id del record padre (solo nei contenuti ad albero)</li>
	<li><strong>title</strong> - rappresenta il titolo del record</li>
	<li><strong>lang</strong> - rappresenta la lingua del record (se presente)</li>
	<li><strong>published</strong> - definisce se un record &egrave; pubblicato (0 = bozza, 1 = pubblicato, 2 = differente tra sviluppo e produzione)</li>
</ul>
<div class="message info">Puoi aggiungere campi fisici ad un record (utili per le estrazioni negli alberi di menu) intervenendo sulla variabile <strong>record_columns</strong> all'interno del file di configurazione di Milk.
Dopodichè, sarà necessario anche aggiungere tale colonna alla tabella <strong>records</strong> di Milk con un ALTER-TABLE.</div>
		</div>

		<div class="sidebar_content" id="sb-documents">
			<h3>9. Documenti (files e immagini)</h3>
			<p>Tramite lo schema XML di un tipo di contenuto, è possibile impostare dei campi di tipo "files" o "images", utili per poter caricare appunto files generici e immagini.
			La differenza sostanziale tra questi due tipi risiede nel fatto che le immagini prevedono delle opzioni di ridimensionamento oltre al mero caricamento del file.</p>
			<p>Per estrarre i documenti di un record, è sufficiente invocare la sua funzione set_documents() in questa maniera:</p>
<code>$record-><strong>set_documents();</strong>
print_r($record->get('lista_immagini');</code><br />
<p>In alternativa, anzich&egrave; chiamare singolarmente la funzione per ogni record, &egrave; sufficiente utilizzare la funzione <strong>documents()</strong> durante l'estrazione dei
records per procedere alla valorizzazione automatica dei documenti:</p>
<code>$records = $this->records->type('Menu')-><strong>documents(TRUE)</strong>->get();</code><br />
<div class="message warning">Attenzione: quest'ultimo esempio comporta maggior carico lato database poich&egrave; per ogni record estratto, verr&egrave; effettuata una seconda query per estrarre subito i suoi allegati.</div>
<p>Milk, mette a disposizione anche una classe di estrazione dei documenti. Per inizializzare la classe, utilizzare la seguente sintassi:</p>
<code>$this->load->documents();</code><br />
<p>La classe Documents presenta i seguenti metodi di estrazione (il funzionamento &egrave; simile alla classe Records):</p>
<ul>
	<li><strong>table($table_name)</strong> - definisce la tabella su cui ricercare (solitamente, "records")</li>
	<li><strong>id($table_pkey)</strong> - definisce la chiave primaria di ricerca della tabella sopra indicata</li>
	<li><strong>field($field_name)</strong> - definisce il nome del campo xml (sul tipo di contenuto)</li>
	<li><strong>where($column, $value)</strong> - imposta una condizione where per l'estrazione</li>
	<li><strong>limit($num, $offset)</strong> - definisce il limit-sql per l'estrazione</li>
	<li><strong>get()</strong> - estrae i documenti seguendo le condizioni impostate</li>
</ul>
<p>Ecco un esempio di estrazione:</p>
<code>//Carico la classe documents
$this->load->documents();

//Estraggo 10 documenti dal record con id 12 della tabella records
$documenti = $this->documents->table('records')->id(12)->limit(10)->get();
</code><br />
<p>&Egrave; possibile anche utilizzare i metodi interni della classe Documents per salvare/eliminare files:</p>
<ul>
	<li><strong>upload($name, $specs, $save_params)</strong> - salva un file (dalla $_FILES) su file system</li>
	<li><strong>save($data)</strong> - salva il record di un file (documents table)</li>
	<li><strong>resize_image($path, $resize_to, $marker)</strong> ridimensiona una immagine</li>
	<li><strong>update_alt_text($document_id, $alt_text)</strong> - aggiorna il testo alternativo di un record</li>
	<li><strong>delete_by_binds($table, $id)</strong> - elimina i documenti di un record fornendo tabella e id</li>
	<li><strong>delete_by_id($document_id)</strong> - elimina un documento fornendo il suo id</li>
</ul>
		</div>
		
<div class="sidebar_content" id="sb-trees">
			<h3>10. Alberi di menu</h3>
			<p>
			Per ottenere alberi di menu (solo contenuti di tipo pagina), è disponibile la seguente classe:</p>
<code>$this->tree</code><br />
<p>Il tipo di contenuto da utilizzare come default per la creazione dell'albero del sito, va definito nel file di configurazione di <?php echo CMS; ?> alla voce <strong>DEFAULT TREE TYPE</strong>. Per estrarre l'albero generale del sito, utilizzare la funzione "get_default()" come segue:</p>
<code>//Estraggo l'albero generale delle pagine
$this->tree-><strong>get_default()</strong>;</code>
<br />
<p>Per stampare l'albero ottenuto, &egrave; sufficiente richiamare l'helper menu in questo modo:</p>
<code>$albero = $this->tree->get_default();

$this->load->helper('menu');
echo <strong>menu</strong>($albero);</code>
<br /><p>L'helper provvederà in automatico a "flaggare" i vari stati sulle pagine aperte, o eventuali sotto pagine selezionate con le classi "open" e "selected".</p>	
<div class="message info"><?php echo CMS; ?> provvede già ad estrarre il tipo di contenuto <strong>"<?php echo implode(', ', $this->config->item('default_tree_types')); ?>"</strong> come albero generale del sito internet.</div>
<p>Puoi anche estrarre diversi alberi di menu secondo le tue esigenze. La classe Tree contiene metodi simili a quanto già visto con la classe Records. Ecco alcuni dei metodi utilizzabili per rifinire le estrazioni:</p>
<ul>
	<li><strong>show_invisibles($bool)</strong> - imposta se estrarre i menu impostati come non visibili</li>
	<li><strong>type($type)</strong> - imposta il tipo di contenuto su cui estrarre l'albero</li>
	<li><strong>type_in($types_array)</strong> - imposta i tipi di contenuto su cui estrarre l'albero</li>
	<li><strong>parent_types($type)</strong> - imposta una ricerca tra tutti i parent types definiti nello schema del tipo scelto</li>
	<li><strong>where($key, $val)</strong> - imposta una clausola where (valida su colonne fisiche della tabella pages e pages_stage)</li>
	<li><strong>exclude_page($id_record)</strong> - esclude una determinata pagina dalla ricerca</li>
	<li><strong>exclude_parent($id_record)</strong> - esclude le pagine che hanno come padre tale pagina</li>
</ul>
<p>E quindi, i metodi per estrarre l'albero:</p>
<ul>
	<li><strong>get()</strong> - metodo classico di estrazione dell'albero secondo i filtri sopra definiti</li>
	<li><strong>get_default($type)</strong> - ottiene un albero del tipo scelto, utilizzando prima il file di cache e poi le estrazioni su DB se il file non è presente (o scaduto)</li>
	<li><strong>get_linear()</strong> - ottiene un albero lineare (verticale)</li>
	<li><strong>get_linear_dropdown()</strong> - ottiene un albero lineare come array associativo (utile per le select)</li>
</ul>
<p>Esempio di estrazione di un albero di pagine:</p>
<code>$albero = $this->tree->type('Menu')
		     ->where('lang', 'it')
		     ->exclude_parent(123)
		     ->get();

echo menu($albero);
</code><br />
<p>Infine, alcuni metodi di utilità generale:</p>
<ul>
	<li><strong>get_default_branch($starting_id)</strong> - ritorna un ramo dell'albero di menu principale, partendo dalla pagina con id scelto</li>
	<li><strong>get_current_branch()</strong> - ottiene il ramo attuale dalla pagina/record corrente</li>
	<li><strong>get_branch($pages, $starting_id)</strong> - crea un ramo dell'albero utilizzando l'elenco delle pagine e l'id_record di partenza</li>
	<li><strong>get_page_hierarchy($id_record)</strong> - ottiene la gerarchia di una pagina</li>
	<li><strong>get_type_cachepath($type)</strong> - ottiene la path relativa al file di cache dell'albero di un determinato tipo</li>
	<li><strong>clear_cache($type)</strong> - pulisce i file di cache di un albero (o di quello principale se non viene passato il tipo)</li>
	<li><strong>clear()</strong> - forza il refresh dei dati da DB alla ricerca successiva (normalmente un albero viene cacheato fino alla fine della richiesta)</li>
</ul>
		
</div>

<div class="sidebar_content" id="sb-caching">
			<h3>11. Caching</h3>
			<p><?php echo CMS; ?> utilizza 3 tipi differenti di cache:</p>
		
			
			<h3>Cache dei tipi di contenuto</h3>
			<p>Gli schemi XML dei tipi di contenuto vengono cacheati per garantire un rapido accesso alle definizioni senza il bisogno di effettuare il parsing degli schemi ad ogni richiesta. Per svuotare la cache, &egrave; sufficiente navigare attraverso il menu di amministrazione alla voce <strong>"Gestione" >> "Svuota cache"</strong>. La cache viene svuotata in automatico nel caso venga utilizzata la funzionalit&agrave; di "Modifica schema" dalla vista dei tipi di contenuto, anzich&egrave; intervenire direttamente dal file-system.</p>
			<br />
			
			<h3>Cache degli alberi di menu</h3>
			<p>Tutti gli alberi di menu estratti, vengono <strong>automaticamente cacheati su file-system</strong> in base al loro <strong>tipo</strong> di contenuto. Verranno cacheati <strong>due files</strong> per tipo: uno per l'albero di stage ed uno per quello di produzione. La cache degli alberi viene automaticamente svuotata quando l'albero viene modificato (ad esempio una pagina cambia indirizzo).</p>
			<br />
			
			<h3>Cache delle pagine</h3>
			<p>I tipi di contenuto con struttura a pagine, normalmente presentano un campo xml chiamato "<strong>page_cache</strong>" nella scheda <strong>"Aspetto e azioni"</strong> che rappresenta (nella maschera di inserimento/modifica di una pagina) un campo di input numerico relativo al <strong>numero di minuti</strong> da utilizzare per tenere tale pagina in cache. Per non cacheare la pagina, &egrave; sufficiente impostare tale numero a "0" (zero). La cache di una pagina viene automaticamente svuotata quando la pagina viene modificata, pubblicata o depubblicata.<br /><strong>ATTENZIONE</strong>: la cache delle pagine &egrave; una funzionalit&agrave; estremamente <strong>potente</strong> ma <strong>pericolosa</strong>. Verr&agrave; infatti salvato l'interno rendering finale della pagina e servito all'utente come fosse una <strong>pagina statica</strong> (<em>senza passare dal framework</em>). Utilizzarlo quindi con la dovuta cautela, dato che le uniche variazioni nelle diverse richieste potranno essere solamente modifiche client-side via Javascript.</p>
</div>

	</div>

	<div class="bendl"></div>
	<div class="bendr"></div>

</div>