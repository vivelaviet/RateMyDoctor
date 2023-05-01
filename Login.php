<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
	<style>
		body {
			display: flex;
			justify-content: center;
			align-items: center;
			height: 100vh;
		}

		form {
			width: 300px;
			padding: 20px;
			border: 1px solid #ccc;
			border-radius: 5px;
			background-color: #fff;
			box-shadow: 0 0 6px #ccc;
		}

		h2 {
			text-align: center;
		}

		label {
			display: block;
			margin-bottom: 17px;
		}
		input[type="submit"] {
			background-color: #4c65af;
			color: #fff;
			border: none;
			padding: 12px 16px;
			border-radius: 4px;
			cursor: pointer;
		}
		input[type="text"],
		input[type="password"] {
			width: 100%;
			padding: 10px;
			border: 1px solid #ccc;
			border-radius: 3px;
			margin-bottom: 15px;
		}

	</style>
</head>
<body>
	<form>
		<h2>Login</h2>
		<label for="username">Username:</label>
		<input style="margin-left:-13px" type="text" id="username" name="username">

		<label for="password">Password:</label>
		<input style="margin-left:-13px" type="password" id="password" name="password">

		<input type="submit" value="Login">
	</form>
</body>
</html>