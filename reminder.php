<!DOCTYPE html>
<html>
<head>
	<title>College Event Tracking</title>
	<style>
		body {
			font-family: Arial, sans-serif;
			margin: 0;
			padding: 0;
		}
		header {
			background-color: #343434;
			color: #fff;
			padding: 1rem;
			text-align: center;
		}
		h1 {
			margin: 0;
			font-size: 2rem;
		}
		main {
			display: flex;
			flex-wrap: wrap;
			justify-content: center;
			align-items: center;
			height: 100vh;
			background-color: #f5f5f5;
		}
		.message {
			background-color: #fff;
            border-radius: 32px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            cursor: pointer;
            margin: 1rem;
            padding: 11.5rem;
            text-align: center;
            max-width: 450px;
            transition: all 0.3s ease;
            margin-bottom: 350px;
		}
		.message:hover {
			transform: translateY(-5px);
			box-shadow: 0 6px 8px rgba(0, 0, 0, 0.2);
		}
		.reminder {
			border: 2px solid #ff1515;
		}
		.reminder h2 {
			color: #005bab;
			font-size: 1.5rem;
			margin: 0;
		}
		.reminder p {
			color: #666;
			font-size: 1.2rem;
			margin: 1rem 0 0;
		}
		.certificate {
			border: 2px solid #008000;
		}
		.certificate h2 {
			color: #008000;
			font-size: 1.5rem;
			margin: 0;
		}
		.certificate p {
			color: #666;
			font-size: 1.2rem;
			margin: 1rem 0 0;
		}
	</style>
</head>
<body>
	<header>
		<h1>College Event Tracking</h1>
	</header>
	<main>
		<div class="message reminder" onclick="location.href='email.php';">
			<h2>Reminder</h2>
			<p>Send a reminder to all participants</p>
		</div>
		<div class="message certificate" onclick="location.href='certificate.php';">
			<h2>Certificates</h2>
			<p>Send certificates to all participants</p>
		</div>
	</main>
</body>
</html>
