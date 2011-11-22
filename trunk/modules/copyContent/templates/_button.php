<?php use_helper('I18N') ?>
<?php echo jq_link_to_function(__("Copy Content"), 
	'$("#a-breadcrumb-copy-content-form").fadeIn(250,""); 
	$("#a-breadcrumb-copy-content-button").hide(); 
	$(".a-breadcrumb-copy-content-controls a.a-cancel").parent().show();', 
	array(
		'id' => 'a-breadcrumb-copy-content-button', 
		'class' => 'a-btn icon a-edit', 
)) ?>

<form method="POST" action="<?php echo url_for('copyContent') ?>" id="a-breadcrumb-copy-content-form" class="a-breadcrumb-form add">
	<input type="hidden" name="id" value="<?php echo $page->id ?>"/>

	<ul class="a-form-controls a-breadcrumb-copy-content-controls">
	  <li>
			<input type="submit" class="a-submit" value="<?php echo __('Copy') ?>" />			
		</li>
	  <li>
			<?php echo jq_link_to_function(__("Cancel"), 
				'$("#a-breadcrumb-copy-content-form").hide(); 
				$("#a-breadcrumb-copy-content-button").fadeIn(); 
				$("#a-breadcrumb-copy-content-button").prev(".a-i").fadeIn();', 
				array(
					'class' => 'a-btn a-cancel', 
			)) ?>
		</li>
	</ul>
</form>
