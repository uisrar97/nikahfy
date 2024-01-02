<?php
$ci= &get_instance();
$look= $ci->look_support();
?>

<div class="contact-wraper">
	<div class="container">
		<?php if(isset($look)) {?>
			<?= $look->page_details?>
		<?php } ?>
	<!--	<div class="contact-heading">Looking for support?</div>-->
		<!--<p> Lorem Ipsum is simply dummy text of the printing and typesetting industry<br>
		  Lorem Ipsum has been the industry. </p>-->
		<form class="row">
			<div class="col-md-6">
				<div class="form-group">
					<input type="email" class="form-control" id="name" placeholder="Your Name*">
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<input type="email" class="form-control" id="email" placeholder="Email Address*">
				</div>
			</div>
			<div class="col-md-12">
				<div class="form-group">
					<select class="form-control" id="subject">
						<option value="">Select a Department</option>
						<option value="Advertising Department">Advertising Department</option>
						<option value="HR Department">HR Department</option>
						<option value="IT Department">IT Department</option>
						<option value="Marketing Department">Marketing Department</option>
						<option value="Other">Other</option>
					</select>
				</div>
			</div>
			<div class="col-md-12">
				<div class="textarea-group">
					<textarea class="form-textarea" rows="5" placeholder="Your Message" id="message"></textarea>
				</div>
			</div>
			<div class="col-md-12">
				<div class="col-md-6">
					<p style="color: green; display: none" id="pro">Request Is Processing....</p>
				</div>
				<div class="col-md-6">
					<div class="button-contact-form">
						<input type="button" value="Send Your Message" class="send-message-button consend">
					</div>
				</div>
			</div>
		</form>
	</div>
</div>
