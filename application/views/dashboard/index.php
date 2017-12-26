<h2><?= $title; ?></h2>
<?php foreach ($files as $file) : ?>
	</br>
	
	<div class="row">
		<?php $getdata  = $file['userfile']; ?>
			<a href="<?php echo site_url(); ?>dashboard/download/<?php echo $getdata; ?>"><small>Uploaded on : <?php echo $file['created_at']?> in <strong><?php echo $file['userfile']; ?></strong></small></a>

			<form class="cat-delete" action="dashboard/delete/<?php echo $file['id']; ?>" method="POST">
			<input type="submit" class="btn-background btn-link text-danger" value="[X]">
		</form>
		<div class="col-sm-9">
			</br>
		</div>
	</div>

<?php endforeach; ?>