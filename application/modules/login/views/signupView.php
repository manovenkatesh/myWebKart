<div class="container">
    <h1 class="text-center font-weight-bold" style="color:white;"><?php echo $Name ?></h1>
	<div class="d-flex justify-content-center h-100">
		<div class="card">
			<div class="card-header text-center" >
				<h3>Sign UP</h3>
			</div>
			<div class="card-body">
                
				<?php echo form_open('signup/addUser','id="signupForm"')?>
					<div style="color:red;font_size:10px;"><?php echo form_error('username'); ?></div>
					<div class="input-group form-group">
						
						<input type="text" class="form-control" name="username" value="<?php echo set_value('username');?>" placeholder="Username">
						
					</div>
					<div style="color:red;font_size:10px;"><?php echo form_error('name'); ?></div>
					<div class="input-group form-group">
						<input type="text" class="form-control" name="name" value="<?php echo set_value('name');?>" placeholder="Name">
					</div>
					<div style="color:red;font_size:10px;"><?php echo form_error('address'); ?></div>
					<div class="input-group form-group">
						<input type="text" class="form-control" name="address" value="<?php echo set_value('address');?>" placeholder="Address">
					</div>

					<div style="color:red;font_size:10px;"><?php echo form_error('phoneNumber'); ?></div>
					<div class="input-group form-group">
						<input type="text" class="form-control" name="phoneNumber" value="<?php echo set_value('phoneNumber');?>" placeholder="Phone Number">
					</div>

					<div style="color:red;font_size:10px;"><?php echo form_error('email'); ?></div>
					<div class="input-group form-group">
						<input type="text" class="form-control" name="email" value="<?php echo set_value('email');?>" placeholder="Email">
					</div>

					<div style="color:red;font_size:10px;"><?php echo form_error('password'); ?></div>
					<div class="input-group form-group">
						<input type="password" class="form-control" name="password" placeholder="Password">
					</div>

					<div style="color:red;font_size:10px;"><?php echo form_error('passconf'); ?></div>
					<div class="input-group form-group">
						<input type="password" class="form-control" name="passconf" placeholder="Conform Password">
					</div>
					<div class="form-group">
						<input type="submit" name="submit" value="Signup" class="btn float-right login_btn">
					</div>
				</form>
			</div>
		</div>
	</div>
    
</div>
