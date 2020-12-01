<?php  	include("includes/functions.php");  ?>

<?php 
	if($_REQUEST['query'] == 'logout')
	{
		$_SESSION = array();
		 if(isset($_COOKIE[session_name()]))
		 {
			 setcookie(session_name(), '', time()-42000, '/');
		
			session_destroy();   session_unset();
			header('location:login?query=loggedout');
		 }
		 	
	} 
	else
	{
		//SETTING REDIRECT \ PREVIOUS URL 
		if(isset($_SERVER['HTTP_REFERER'])) {  $u = $_SERVER['HTTP_REFERER'];  $_SESSION['url'] = $u;   }
		 
		else {  }	
		?>
		<?php $url = 'locked-screen';
		header('Location: '.$url);
	}
			
?>