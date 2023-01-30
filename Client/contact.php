<?php

if(isset($_POST['send']))
{
	$email = $row['email'];
	$username = $row['username'];
	$message = $_POST['txtmessage'];

	$sql = "SELECT CURRENT_DATE,CURRENT_TIME FROM tbl_feedback";
	$result = mysqli_query($connect,$sql);
	$rowdate = mysqli_fetch_array($result);

	$Date = $rowdate['CURRENT_DATE'];
	$time = $rowdate['CURRENT_TIME'];

	$sql = "INSERT INTO tbl_feedback (email,username,feedback,date,time)
			VALUES('$email','$username','$message','$Date','$time')";
	mysqli_query($connect,$sql);
}

?>

<div id="colorlib-contact">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<h3>Contact Information</h3>
				<div class="row contact-info-wrap">
					<div class="col-md-3">
						<p><span><i class="icon-location"></i></span> Phnom Penh <strong>,</strong> Cambodia</p>
					</div>
					<div class="col-md-3">
						<p><span><i class="icon-phone3"></i></span> <a href="#">+855 77 996 226</a></p>
					</div>
					<div class="col-md-3">
						<p><span><i class="icon-paperplane"></i></span> <a href="https://t.me/Marwin025">@Marwin025</a></p>
					</div>
				</div>
			</div>
		</div>
		<div class="row">

			<div class="col-md-6">
				<div class="contact-wrap">
					<h3>Get In Touch</h3>

					<form action="index.php?p=contact.php&action=send" method="Post" class="contact-form">
						<div class="row">

							<div class="w-100"></div>
							<div class="col-sm-12">
								<div class="form-group">
									<label for="email">Email</label>
									<h4><?=$row['email']?></h4>
								</div>
							</div>
							<div class="w-100"></div>
							
							<div class="w-100"></div>
							<div class="col-sm-12">
								<div class="form-group">
									<label for="message">Message</label>
									<textarea name="txtmessage" id="txtmessage" cols="30" rows="10" class="form-control" placeholder="Say something about us"></textarea>
								</div>
							</div>
							<div class="w-100"></div>
							<div class="col-sm-12">
								<div class="form-group">
									<input type="submit" name="send" value="Send Message" class="btn btn-primary">
								</div>
							</div>

						</div>
					</form>		

				</div>
			</div>

			<div class="col-md-6">
				<img src="images/mangamashup.jpg" alt="" style="width:750px; height:100%; border-radius:25px;">
			</div>

			<div class="col-md-6">
				<div id="map" class="colorlib-map"></div>		
			</div>
		</div>
	</div>
</div>