<footer id="footer" role="contentinfo">
	<div id="inner-footer" class="clearfix">
		<nav class="clearfix">
		</nav>
		<div class="container" style="width:980px">
			<a href="/about/#terms" class="footer-text">Terms</a>
			<a href="/about/#privacy" class="footer-text">Privacy</a>
			<a href="http://affiliates.bitlet.co/" class="footer-text">Affiliates</a>
			<a href="#" class="footer-text" onclick="showFAQ();">Help</a>
			<a href="/about/#security" class="footer-text">Security</a>
			<? if($uid >= 0) { // already logged in ?>
				<a href="#" class="footer-text logout-btn">Log Out</a>
			<? } ?>

			<p class="copyright-text">&copy;2012 Bitlet, Inc</p>
		</div>
	</div> <!-- end #inner-footer -->	
</footer>

<?php
/****************************************************
* set up the modal to start hidden and fade in and out
* Other Notes:
*
* **************************************************/ ?>

<!-- Login Modal -->

<? if($uid >= 0) { // already logged in ?>
	<!-- Silence is golden -->
<? } else { // not logged in ?>
<div id="LoginModal" class="modal hide fade">
	<div class="modal-header login-modal-header">
		<button class="close" data-dismiss="modal">X</button>
    	<h3>Login</h3>
	</div>
    <!-- dialog contents -->
	<div class="modal-body">

		<div class="input-prepend">
			<span class="add-on login-add-on">
				<i class="icon-user"></i>
			</span>
		<input type="text" size="10" autocomplete="on" class="bitlet-login login-email" placeholder="Bit@bitlet.co"/>
        </div>
	
		<div class="input-prepend">
			<span class="add-on login-add-on">
				<i class="icon-lock"></i>
			</span>
			<input type="password" size="10" autocomplete="off" class="bitlet-login login-password" placeholder="Password"/>
        </div>

		<label class="checkbox login-remember-me">
			<input type="checkbox" name="rememberMe" value="rememberMe">
			Remember Me	
        </label>
		<p class="forgot-password-login"><a href="reset-details">Forgot Details?</a></p>
	</div>
	<div class="modal-footer modal-login-footer">
		<button type="submit" class="bitlet-login-submitbtn btn-large submit-button btn btn-primary">Login</button>
	</div>
</div>
<? } ?>
