<h3 class="text-center">Upload file</h3>
<?php echo validation_errors(); ?>

<?php echo form_open_multipart('upload/do_upload');
?>
	<div class="form-group">
		<label>Choose file here:</label>
		<br>
		<br>
		<input  type="file" name="userfile" size="50"/>

		<br /><br />

<input class="btn btn-success" type="submit" value="Upload" />
		</div>