 <html>
 <head>
 <link rel="stylesheet" href="style.css">
 </head>
<body>
<div class="poster">
<h2>Send Log</h2>
<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>"><br/>
	Username:<input type="text" name="fname" text="zyapguy">
	<br/><br/>
	Text:<input type="text" name="post">
	<br/><br/>
	Send as debug : 
	<!-- Rounded switch -->
	<label class="switch">
	<input type="checkbox" name="server">
	<span class="slider round"></span>
	</label>
  <input type="submit">
</form>
<!-- <h2>Reset Logs</h2>
<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>"><br/>
	Admin Username:<input type="text" name="uname">
	<br/><br/>
	Admin Pass:<input type="text" name="pword">
	<br/><br/>
	REALLY RESET : 
	<label class="switch">
	<input type="checkbox" name="server">
	<span class="slider round"></span>
	</label>
  <input type="submit">
</form>
</div>
-->
<?php

// function alert($msg) {
//     echo "<script type='text/javascript'>alert('$msg');</script>";
// }
// 	if ($_SERVER["REQUEST_METHOD"] == "POST") {
// 	  // collect value of input field
// 		$myfile = fopen("logs.txt", "r") or die("Unable to open file!");
// 		$username = $_POST['uname'];
// 		$password = $_POST['pword'];
// 		if (isset($_POST['server'])) {
// 			if ($username == "zyapguy")
// 			{
// 				if ($password == "baybars!")
// 				{
// 					$name = "";
// 					fclose($myfile);
// 					$myfile = fopen("logs.txt", "w") or die("Unable to open file!");
// 					$txt = $name;
// 					fwrite($myfile, $txt);
// 					fclose($myfile);
// 				}
// 				else {
// 					alert("PASSWORD INCORRECT");
// 				}
// 			}
// 			else {
// 				alert("USERNAME NOT FOUND");
// 			}

// 		}
// 		else {
			
// 		}
// 		header('Location: '.$_SERVER['PHP_SELF']);  
// 	}

	
?>  

</div>
	<div class = "posted">
	 <?php
$myfile = fopen("logs.txt", "r") or die("Unable to open file!");
echo fread($myfile,filesize("logs.txt"));
fclose($myfile);
?> 
<?php

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
	  // collect value of input field
		$myfile = fopen("logs.txt", "r") or die("Unable to open file!");
		$username = $_POST['fname'];
		if (isset($_POST['server'])) {
			$name = "<b>[DEBUG]" . $_POST['post'] . "</b><br/>" .  fread($myfile,filesize("logs.txt"));
			fclose($myfile);
			$myfile = fopen("logs.txt", "w") or die("Unable to open file!");
			$txt = $name;
			fwrite($myfile, $txt);
			fclose($myfile);
		}
		else {
			$name = $username . " : " . $_POST['post'] . "<br/>" .  fread($myfile,filesize("logs.txt"));
			fclose($myfile);
			$myfile = fopen("logs.txt", "w") or die("Unable to open file!");
			$txt = $name;
			fwrite($myfile, $txt);
			fclose($myfile);
		}
	  
		header('Location: '.$_SERVER['PHP_SELF']);  
	}

	
?> 


</div>
</body>
</html> 