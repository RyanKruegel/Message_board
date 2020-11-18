<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Message Board</title>
</head>
<body>
	<?php 
		if(isset($_POST["submit"])){
			$Subject = stripslashes($_POST["subject"]);
			$Name = stripslashes($_POST["name"]);
			$Message = stripslashes($_POST["message"]);

			$Subject = str_replace("~", "-", $Subject);
			$Name = str_replace("~", "-", $Name);
			$Message = str_replace("~", "-", $Message);

			$MessageRecord =  "$Subject~$Name~$Message\n";


			$MessageFile = fopen("MessageBoard/messages.txt", "ab");

		
			if($MessageFile == FALSE){
				echo "There was an error saving your message!\n";
			}
			else{
				fwrite($MessageFile, $MessageRecord);
				fclose($MessageFile);
				echo "Your message has been saved!\n";
			}
		}
	?>

	<h1>Post New Message</h1>
	<hr/>
	<form action = "PostMessage.php" method="POST">
		<label style="font-weight: bold;" for="subject">Subject:</label>
		<input type="text" name="subject"/>
		<label style="font-weight: bold;" for="name">Name:</label>
		<input type="text" name="name"><br>
		<textarea name="message" rows="6" cols="80"></textarea><br>
		<input type="submit" name="submit" value="Post Message"/>
		<input type="reset" name="reset" value="Rest Form"/>
	</form>
	<br/>
	<p><a href="MessageBoard.php">View Messages</a></p>
</body>
</html>