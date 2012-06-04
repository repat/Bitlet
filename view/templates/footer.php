<footer id="footer" role="contentinfo">
	<div id="inner-footer" class="clearfix">
		<nav class="clearfix">
		</nav>
		<div class="container" style="width:980px">
			<a href="/faq" class="footer-text">FAQ</a>
			<a href="/about" class="footer-text">About</a>
			<a href="/legal" class="footer-text">Legal</a>
			<a href="/support" class="footer-text">Support</a>
			<a href="http://affiliates.bitlet.co/" class="footer-text">Affiliates</a>

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

<? if($UID >= 0) { // already logged in ?>
	<!-- Silence is golden -->
<? } else { // not logged in ?>
	<div id="LoginModal" class="modal hide fade">
	<div id="loginModalHeader" class="modal-header">
		<button class="close" data-dismiss="modal">X</button>
    	<h3>Login</h3>
	</div>
    <!-- dialog contents -->
	<div class="modal-body">

		<div class="input-prepend">
			<span class="add-on loginAddOn">
				<i class="icon-user loginIcon"></i>
			</span>
		<input type="text" size="10" autocomplete="on" class="bitletLogin loginEmail" placeholder="Bit@bitlet.co"/>
        </div>
	
		<div class="input-prepend">
			<span class="add-on loginAddOn">
				<i class="icon-lock loginIcon"></i>
			</span>
			<input type="password" size="10" autocomplete="off" class="bitletLogin loginPassword" placeholder="Password"/>
        </div>

		<label class="checkbox loginRememberMe">
			<input type="checkbox" name="rememberMe" value="rememberMe">
			Remember Me	
        </label>
		<p id="forgotPasswordLogin"><a href="/reset-details">Forgot Details?</a></p>
	</div>
	<div class="modal-footer modalLoginFooter">
		<button type="submit" id="bitletLoginSubmitbtn" autocomplete="off" data-loading-text="Logging you in..." class="btn-large submit-button btn btn-primary">Login</button>
	</div>
</div>
<? } ?>
