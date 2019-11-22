<?php
	include_once('model/glossary.php');

	$glossary = glossary_all();

?>
<p>Shortcode [glossary lang="your-language"]</p>
<div class="wrap">
	<h1 class="wp-heading-inline"></h1>

	<?php if(empty($glossary)){ ?>
		<a href="<?php $_SERVER['PHP_SELF']?>?page=glossary&c=add" class="page-title-action">Add Glossary</a>
	<?php }else{ ?>
		<a href="<?php $_SERVER['PHP_SELF']?>?page=glossary&c=delete" class="page-title-action">Delete Glossary Table</a>
	<?php } ?>
	
	<hr class="wp-header-end">
	<table class="wp-list-table widefat fixed striped posts">
		<thead>
			<tr>
				<th scope="col" id="title" class="manage-column column-title column-primary sortable desc" style="width:70px;">
					<span>Edit</span>
				</th>
				<th scope="col" id="title" class="manage-column column-title column-primary sortable desc">
					<span>english</span>
				</th>
				<th scope="col" id="title" class="manage-column column-title column-primary sortable desc">
					<span>arabic</span>
				</th>
				<th scope="col" id="title" class="manage-column column-title column-primary sortable desc">
					<span>czech</span>
				</th>
				<th scope="col" id="title" class="manage-column column-title column-primary sortable desc">
					<span>italian</span>
				</th>
				<th scope="col" id="title" class="manage-column column-title column-primary sortable desc">
					<span>polish</span>
				</th>
				<th scope="col" id="title" class="manage-column column-title column-primary sortable desc">
					<span>portuguese</span>
				</th>
				<th scope="col" id="title" class="manage-column column-title column-primary sortable desc">
					<span>russian</span>
				</th>
				<th scope="col" id="title" class="manage-column column-title column-primary sortable desc">
					<span>slovak</span>
				</th>
				<th scope="col" id="title" class="manage-column column-title column-primary sortable desc">
					<span>spanish</span>
				</th>
				<th scope="col" id="title" class="manage-column column-title column-primary sortable desc">
					<span>ukranian</span>
				</th>
				<th scope="col" id="title" class="manage-column column-title column-primary sortable desc">
					<span>vietnamese</span>
				</th>

				

				
				
			</tr>
		</thead>
		<tbody id="the-list">
			<?php foreach ((array) $glossary as $glos) : ?>
			<tr id="<?=$glos['id_glossary'] ?>" >
				<td>
					<a href="<?=$_SERVER['PHP_SELF'] ?>?page=glossary&c=edit&id=<?=$glos['id_glossary'] ?>"><strong>Edit</strong></a>
				</td>
				<td>
					<strong><?=$glos['english'] ?></strong>
				</td>
				<td>
					<strong><?=$glos['arabic'] ?></strong>
				</td>
				<td>
					<strong><?=$glos['czech'] ?></strong>
				</td>
				<td>
					<strong><?=$glos['italian'] ?></strong>
				</td>
				<td>
					<strong><?=$glos['polish'] ?></strong>
				</td>
				<td>
					<strong><?=$glos['portuguese'] ?></strong>
				</td>
				<td>
					<strong><?=$glos['russian'] ?></strong>
				</td>
				<td>
					<strong><?=$glos['slovak'] ?></strong>
				</td>
				<td>
					<strong><?=$glos['spanish'] ?></strong>
				</td>
				<td>
					<strong><?=$glos['ukranian'] ?></strong>
				</td>
				<td>
					<strong><?=$glos['vietnamese'] ?></strong>
				</td>
				
				
				
			</tr>
			<?php endforeach;?>
		</tbody>
	</table>
</div>
