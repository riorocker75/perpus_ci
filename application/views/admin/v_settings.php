<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Setting Web</h1>
</div>
<?php show_alert(); ?>

		<!-- Content Row -->
	<div class="row">
		<div class="col-lg-12 mb-4">
			<div class="card shadow mb-4">
				<div class="card-header py-3">
					<h6 class="m-0 font-weight-bold text-primary">Setting</h6>
				</div>
				<div class="card-body">
				<?php echo form_open_multipart('admin/settings_act');?>	
			<div class="table-responsive">
				<table class="table">
					<tr>
						<th>Web Name</th>			
						<td><input type="text" name="blog_name" class="form-control" value="<?php echo $this->m_dah->get_option('blog_name'); ?>"></td>
					</tr>
					<tr>
						<th>Deskripsi</th>			
						<td><textarea name="blog_description" class="form-control"><?php echo $this->m_dah->get_option('blog_description'); ?></textarea></td>
					</tr>

					<tr>
						<th>Berita</th>			
						<td><textarea id="editor1" name="blog_welcome" class="form-control" style="min-height:300px"><?php echo $this->m_dah->get_option('blog_welcome'); ?></textarea></td>
					</tr>
			<!-- 		<tr>
						<th>Web Logo</th>			
						<td>
							<?php 
							if(isset($error)){
								echo $error;
							}
							?>
							<input type="file" name="blog_logo">
							<small>Leave blank if doesn't change</small>
						</td>
					</tr> -->
					<tr>
						<th><input type="submit" value="Save Settings" class="btn-sm btn-primary btn"></th>
						<td></td>			
					</tr>
				</table>
			</div>			
		</form>	
				</div>
			</div>
		</div>

	</div>


		<!-- Content Row -->
		
</div>
