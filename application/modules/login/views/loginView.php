<div class="container">
    <h1 class="text-center font-weight-bold" style="color:white;"><?php echo $Name ?></h1>
	<div class="d-flex justify-content-center h-100">
		<div class="card">
			<div class="card-header">
				<h3>Sign In</h3>
				<div class="d-flex justify-content-end social_icon">
					<span><i class="fab fa-facebook-square"></i></span>
					<span><i class="fab fa-google-plus-square"></i></span>
					<span><i class="fab fa-twitter-square"></i></span>
				</div>
			</div>
			<div class="card-body">
                
				<?php echo form_open('login/validate','id="loginForm"')?>
					<div style="color:red;font_size:10px;"><?php echo form_error('username'); ?></div>
					<div class="input-group form-group">
					
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						
						<input type="text" class="form-control" name="username" placeholder="username">
						
					</div>
					<div style="color:red;font_size:10px;"><?php echo form_error('password'); ?></div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input type="password" class="form-control" name="password" placeholder="password">
					</div>
					<div class="row align-items-center remember">
						<input type="checkbox">Remember Me
					</div>
					<div class="form-group">
						<input type="submit" name="submit" value="Login" class="btn float-right login_btn">
					</div>
				</form>
			</div>
			<div class="card-footer">
				<div class="d-flex justify-content-center links">
					Don't have an account?<a href="<?php echo site_url('signup')?>">Sign Up</a>
				</div>
				<div class="d-flex justify-content-center">
					<a href="#">Forgot your password?</a>
				</div>

				
			</div>
		</div>
	</div>
    
</div>
