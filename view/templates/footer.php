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

<!-- FAQ Modal -->

<div id="FAQModal" class="modal hide fade">

	<div class="modal-header">
		<button class="close" data-dismiss="modal">X</button>
    	<h3>Frequently Asked Questions</h3>
	</div>
    <!-- dialog contents -->
    <div class="modal-body faq">
		<div class="container">
    	<div class="row">
  			<div class="span6">		
				<h2>Is Bitlet an online store?</h2>
				<p>Not yet, right now Bitlet is a service that lets you turn your Facebook, Twitter, or Blog page into an online store. We manage all of your digital content delivery and payment processing, and you just focus on selling.</p>
				
				<h2>How much does it cost?</h2>
				<p>Our fee is 30 cents plus 7% of the sale for each sale. Unlike many similar services, Bitlet has no initial cost.<p>
				
				<h2>What are credits?</h2>
				<p>Credits are how we keep track of your earnings. One credit is equal to $1 USD.</p>
				
				<h2>How do I earn credits?</h2>
				<p>There are two ways to earn: as a seller and as an affiliate. As a seller, you earn back all the profit in credits after we take our 30 cents + 7% cut. So if you sell something for $10.00, you earn 9.00 credits in your account balance.</p>
				
				<p>As an affiliate, you earn back 20% of any sales made from the affiliate link you shared. Use credits to buy other items, or, once you reach a minimum of 10.00 credits in your account balance, you can click the cash in button, and we'll mail you a check. Remember, credits expire after 60 days.</p>
			</div>
 			<div class="span6">
				<h2>How does the affiliates system work?</h2>
				<p>After you've bought an item, you receive an affiliate link. Share that link anywhere you'd like. When people buy an item from your affiliate link, you get credits in return (20% of the sale).</p>
				
				<h2>What credit cards do you support?</h2>
				<p>All the major ones: Visa, Mastercard, American Express, Discover, JCB, and Diners Club cards.</p>
				
				<h2>Do I need to make an account?</h2>
				<p>No, you don't need to make an account to buy or sell. Although we do encourage you to make an account to keep track of all your purchases and/or merchandise, as well as earn extra credits by taking advantage of our affiliate system.</p>
				
				<h2>Can I use Bitlet even if I live outside the US?</h2>
				<p>Yes, we support all major international credit cards. </p>
			<h2>More questions? <a href="mailto:dev@simply.io">Email us</a> 
				and we'll get back to you right away! </h2>
			</div>
		</div> </div>
		<br>
     </div>
    <!-- dialog buttons -->
	<div class="modal-footer">
		<a href="#" class="btn primary">OK</a>
	</div>
</div>
 
<script type="text/javascript"> // ensure modal is only shown on page load
function showFAQ() {
	// wire up the buttons to dismiss the modal when shown
	$("#FAQModal").bind("show", function() {
		$("#FAQModal a.btn").click(function(e) {
			// do something based on which button was clicked
			// we just log the contents of the link element for demo purposes
			console.log("button pressed: "+$(this).html());
	
			// hide the dialog box
			$("#FAQModal").modal('hide');
		});
	});
	
	// remove the event listeners when the dialog is hidden
	$("#FAQModal").bind("hide", function() {
		// remove event listeners on the buttons
		$("#FAQModal a.btn").unbind();
	});
	
	// finally, wire up the actual modal functionality and show the dialog
	$("#FAQModal").modal({
	  "backdrop"  : "static",
	  "keyboard"  : true,
	  "show"      : true    // this parameter ensures the modal is shown immediately
	});
};
</script>

<!-- Login Modal -->

<div id="LoginModal" class="modal hide fade">
	<div class="modal-header">
		<button class="close" data-dismiss="modal">X</button>
    	<h3>Login</h3>
	</div>
    <!-- dialog contents -->
	<div class="modal-body">
		<iframe class="LoginIFrame"></iframe>
	</div>
</div>
 
<script type="text/javascript"> // ensure modal is only shown on page load
function showLogin() {
	// wire up the buttons to dismiss the modal when shown
	$("#FAQModal").bind("show", function() {
		$("#FAQModal a.btn").click(function(e) {
			// do something based on which button was clicked
			// we just log the contents of the link element for demo purposes
			console.log("button pressed: "+$(this).html());
	
			// hide the dialog box
			$("#FAQModal").modal('hide');
		});
	});
	
	// remove the event listeners when the dialog is hidden
	$("#FAQModal").bind("hide", function() {
		// remove event listeners on the buttons
		$("#FAQModal a.btn").unbind();
	});
	
	// finally, wire up the actual modal functionality and show the dialog
	$("#FAQModal").modal({
	  "backdrop"  : "static",
	  "keyboard"  : true,
	  "show"      : true    // this parameter ensures the modal is shown immediately
	});
};
</script>
