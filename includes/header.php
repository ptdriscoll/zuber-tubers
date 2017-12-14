<?php
//get root folder so assets and images links work on all pages
$protocol = strpos($_SERVER['SERVER_SIGNATURE'], '443') !== false ? 'https://' : 'http://';
$root = $protocol . $_SERVER['HTTP_HOST'].'/zubertubers/';

//get root includes folder in file system, which is different between localhost and live servers 
$doc_root = $_SERVER['DOCUMENT_ROOT'];
if ($root === 'http://localhost/zubertubers/') $doc_includes = $doc_root.'/zubertubers/includes/';
else $doc_includes = $doc_root.'/includes/';

//get page path to synch pages when switching from English to Spanish and back
$uri = $_SERVER['REQUEST_URI'];
$page = str_replace('/zubertubers/', '', $uri);
if (strpos($page, 'espanol/') !== false) {
  $spanish = true;
  $page = str_replace('espanol/', '', $page);  
}
else $spanish = false;

if ($spanish) {	
	$home = 'Home';
	$language = 'English';
	$language_link = '';
	$language_path = 'espanol/';
	$about = 'About';
	$contact = 'Contact';
	$playlistId = 'PLO5rIpyd-O4HssIWIjwdlaW6FfdQ87WqH';
}
else {
	$home = 'Home';
	$language = 'Espa&ntilde;ol';  
  //exception for contact page, which only has an english version
	$language_link = ($page === 'contact/') ? '' : 'espanol/';
	$language_path = '';
	$about = 'About';
	$contact = 'Contact';	
	$playlistId = 'PLA26ADF32F6A4FAD6';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title><?php echo $title; ?></title>
<meta name="description" content="<?php echo $description; ?>">

<link href="<?php echo $root; ?>/assets/lib/css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo $root; ?>/assets/lib/css/bootstrap-theme.min.css" rel="stylesheet">
<link href="<?php echo $root; ?>/assets/css/custom.css" rel="stylesheet">

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

<?php if (file_exists($doc_includes.'googleAnalytics.php')) include 'googleAnalytics.php'; ?>

</head>

<body class="<?php if ($spanish) echo 'spanish'; ?>">  
<div id="push_footer_wrapper">
    
    <!--MASTHEAD--------------------------------------------------------------------------------------->
 	 <div class="main container shadow"> 
	    <div id="header" class="header clearfix"></div>
	    
	    <nav class="navbar navbar-inverse">
		  <div class="container-fluid">
		    <ul class="nav navbar-nav">
		      <li class="<?php if ($page == '') echo 'active'; ?>"><a href="<?php echo $root; ?><?php echo $language_path; ?>"><?php echo $home; ?></a></li>
		      <li><a href="<?php echo $root; ?><?php echo $language_link; ?><?php echo $page; ?>"><?php echo $language; ?></a></li>
		      <li class="<?php if ($page == 'about/') echo 'active'; ?>"><a href="<?php echo $root; ?><?php echo $language_path; ?>about"><?php echo $about; ?></a></li>
		      <li class="<?php if ($page == 'contact/') echo 'active'; ?>"><a href="<?php echo $root; ?>contact"><?php echo $contact; ?></a></li> 
		    </ul>
		  </div>
		</nav>	  