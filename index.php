<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Treasure Hunt</title>
		<meta name="viewport" content="width=device-width,user-scalable=yes"/>

		<style>
			html {
				background: url('img/scroll.jpg') no-repeat;
				-webkit-background-size: cover;
				-moz-background-size: cover;
				
				color: #000;
				font-style: italic;
			}
			
			h1 {
				font-size: 16px;
			}
			
			img {
				max-width: 100%
			}
			
			.message {
				position: absolute;
				left: 0; top: 0; right: 0; bottom: 0;
				padding: 55px 30px;
				text-align: center;
				
				opacity: 0;
				-webkit-transition: opacity 0.5s;
			}
			.message.is-shown {
				opacity: 1;
				z-index: 999;
			}
			
			.photo {
				margin-top: 30px;
			}
		</style>

	</head>
	<body>

		<div class="message intro is-shown">
			<h1>Welcome, Adventurers</h1>
			<p>
				Come with us now on a journey through time &amp; space. Mainly space. Ahead lie various challenges to which you must rise. You will be playing against each other, racing towards the finish to claim the ultimate prize.
			</p>
			<p>
				Your journey begins...<em>here</em>.
			</p>
			<img class="go" src="img/go.png" alt="Go!" />
		</div>
		
		<div class="message photo">
			<img alt="" src="common/photos/<?php echo $_GET['player'];?>01.jpeg" />
		</div>
		
		<script>
			document.querySelector('.go').addEventListener('click', function () {
				document.querySelector('.intro').classList.remove('is-shown');
				document.querySelector('.photo').classList.add('is-shown');
			});
		</script>

	</body>
</html>
