<?php
// Keep track on the session 
session_start ();
function loginForm() {
    echo '
	<div class="form-group">
		<div id="loginform">
			<form action="index.php" method="post">
			<h1>Simple  Chat</h1><hr/>
				<label for="name">Please Enter Your Name To Proceed..</label>
				<input type="text" name="name" id="name" class="form-control" placeholder="Enter Your Name"/>
				<input type="submit" class="btn btn-primary" data-toggle="button" aria-pressed="false" autocomplete="off" name="enter" id="enter" value="Enter" />
			</form>
		</div>
	</div>
   ';
}
 
if (isset ( $_POST ['enter'] )) {
    if ($_POST ['name'] != "") {
        $_SESSION ['name'] = stripslashes ( htmlspecialchars ( $_POST ['name'] ) );
        $cb = fopen ( "login.html", 'a' );
        fwrite ( $cb, "<div class='msgln'><i style=color:blue;>User " . $_SESSION ['name'] . " has joined the chat session.</i><br></div>" );
        fclose ( $cb );
    } else {
        echo '<span class="error">Please Enter a Name</span>';
    }
}
 
if (isset ( $_GET ['logout'] )) {
    $cb = fopen ( "log.html", 'a' );
    fwrite ( $cb, "<div class='msgln'><istyle=color:red;>User " . $_SESSION ['name'] . " has left the chat session.</i><br></div>" );
    fclose ( $cb );
    session_destroy ();
    header ( "Location: index.php" );
}
?>