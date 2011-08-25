<?php
/**
 * {name} List View
 *
 * Lista di record di tipo {name}
 *
 * @package		Milk
 * @author		Nicholas Valbusa - info@squallstar.it - @squallstar
 * @copyright	Copyright (c) 2011, Squallstar
 * @license		GNU/GPL (General Public License)
 *
 */

$records = & $page->get('records');

echo '<div class="details"><h1>'.$page->get('title').'</h1>'.
	 '<p class="info">'.menu($this->tree->get_current_branch()).'</p></div>'.
	 '<div class="body">'.$page->get('contenuto').br(2);

if ($records && is_array($records) && count($records)) {
?>

	<h3>Lista {name}</h3>

	<ul>
	<?php

		foreach ($records as $record) {
			?>
			<li>
				<strong><?php echo $record->get('title'); ?></strong><br />
				<a href="<?php echo current_url() . '/' . $record->get('uri'); ?>">Vai al dettaglio</a>
				<br /><br />
			</li>
			<?php
		}

	?>
	</ul>
	<?php

	if (isset($this->pagination))
	{
		echo $this->pagination->create_links();
	}

}

echo '</div><div class="clear"></div>';