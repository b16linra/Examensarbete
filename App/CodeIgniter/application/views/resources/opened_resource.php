<div id="opened-resource-view">
	<div class="resource">
		<?php foreach ($resource->result() as $row) : ?>
		<h1><?php echo $row->title; ?></h1>
		<div>
			<p><?php echo $row->description; ?></p>
		</div>
		<br>
		<div>
			<p><?php echo nl2br($row->body); ?></p>
		</div>
		<?php $resource_id = $row->id; ?>
		<?php endforeach; ?>
	</div>
	<div class="comment-section">
		<h3>Comment section</h3>
		<!-- Only signed in users can create comments -->
		<?php if($show_create_comment) : ?>
			<?php echo form_open(uri_string(), 'id=form-create-comment'); ?>
			<div class="form-group">
				<span class="form-label">Create comment</span>
				<?php echo form_textarea($form_comment, set_value('form-comment')); ?>
				<?php echo form_error('form-comment'); ?>
			</div>
			<?php echo form_hidden('form-resource-id', $resource_id); ?>
			<?php echo form_submit('submit', 'Create comment'); ?>
			<?php echo form_close(); ?>
		<?php endif; ?>

		<?php foreach ($comments->result() as $row) : ?>
			<div class="comment">
				<div class="comment-by">By: <?php echo $row->username; ?></div>
				<div class="comment-created">Created: <?php echo substr($row->created, 0, 16); ?></div>
				<p class="comment-body"><?php echo nl2br($row->body); ?></p>
			</div>
		<?php endforeach; ?>
	</div>
</div>