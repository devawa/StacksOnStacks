<div class="row">
    
    <form class="col s12 m12 card" action="loginPortal.php" method="POST" role="form">
        <h2 class="cyan-text text-darken-4 center">Sign In</h2>
      <div class="row">
        <div class="input-field col s12 m8 offset-m2">
            <i class="material-icons prefix">phone</i>
			<input id="uname" name="uname" type="text" class="validate">
            <label for="uname">Cell Phone Number</label>
		</div>
        <div class="input-field col s12 m8 offset-m2">
            <i class="material-icons prefix">lock_outline</i>
			<input id="psw" name="psw" type="password" class="validate">
			<label for="psw">Password</label>
		</div>
      </div>
      <div class="col s12 center">
            <button type="submit" class ="btn">
				Sign In
		    </button>
      </div>
      <div class="col s12 center">
            <p>
				<a href="register.php" class="cyan-text">Don't have an account? Sign up here</a>
            </p>
            <p>
				<label>
					<input id="indeterminate-checkbox" type="checkbox" />
					<span>Remember Me</span>
				</label>
            </p>
            <p>
				<a href="forgotPassword.php">Forgot Password</a>
			</p>
      </div>
    </form>
</div> 