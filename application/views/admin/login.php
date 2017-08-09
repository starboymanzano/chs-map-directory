<div class="container">
	<br/>
	<div class="row">
		<?php echo validation_errors(); ?>
		<?php echo form_open('admin/login'); ?>
			<div class="col-md-4 col-md-offset-4">
			<div class="panel panel-danger" style="padding: 5%;">
				<h1 class="text-center"><?php echo $title; ?></h1><br/>	
				<div class="form-group">

					<?php if($this->session->flashdata('user_loggedout')): ?>
		       		<?php echo '<p class="alert alert-info">'.$this->session->flashdata('user_loggedout').'</p>'; ?>
		     		<?php endif; ?>

					<?php if($this->session->flashdata('login_failed')): ?>
		        	<?php echo '<p class="alert alert-danger">'.$this->session->flashdata('login_failed').'</p>'; ?>
		      		<?php endif; ?>

					<b><input type="text" name="username" class="form-control" placeholder="Enter Username" required autofocus autocomplete='off'></b>
				</div>
				<div class="form-group">
						<b><input type="password" name="password" class="form-control" placeholder="Enter Password" required autofocus></b>
				</div>
				<button style="background-color:#5cb85c; color:white;" type="submit" class="btn btn-success btn-block"><b>Login</b></button>
			</div>
		<?php echo form_close(); ?>
	</div>
</div>
