<?php
// UNDERCONSTRUCTION HTTP CODE
$protocol = 'HTTP/1.0';
if ( $_SERVER['SERVER_PROTOCOL'] === 'HTTP/1.1' ) {
	$protocol = 'HTTP/1.1';
}
header( $protocol . ' 503 Service Unavailable', true, 503 );
header( 'Retry-After: 3600' );
// initialize DOMer
define('DOMer',1);
// Include DOM class
include 'DOMer.php';
// Initialize DOM
$dom = new DOMer('html5');
// Include CSS
$dom->css(array(
	'https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900',
	'https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css',
));
// Include JavaScripts
$dom->js(array(
	'https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js',
	'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js',
	'https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js',
));
$dom->title = 'YOUR TITLE - Underconstruction';
// Initialize content
$html = $content = array();

// Set image
$content[]=$dom->tag('h1', array('class'=>'display-1'), 
	$dom->tag('strong', false, 'YOUR TITLE')
);
// Subtitle
$content[]=$dom->tag('h2', array('class'=>'mt-3'), 'This page is underconstruction');
// Address
$content[]=$dom->tag('address', array('class'=>'mt-3'), array(
	$dom->tag('div', false, 'Street Address 1, ZIP-1234 City'),
	$dom->tag('div', false, array(
		'Phone: ',
		$dom->tag('a', array('href'=>'tel:+1234567890', 'class'=>'font-weight-light'), '+12 (3) 456 / 7890')
	)),
	$dom->tag('div', false, array(
		'Mobile: ',
		$dom->tag('a', array('href'=>'tel:+1234567890', 'class'=>'font-weight-light'), '+12 (3) 456 / 7890')
	)),
	$dom->tag('div', false, array(
		'Website: ',
		$dom->tag('a', array('href'=>'https://www.yoursite.com', 'rel'=>'bookmark', 'class'=>'font-weight-light'), 'www.yoursite.com')
	)),
	$dom->tag('div', false, array(
		'E-Mail: ',
		$dom->tag('a', array('href'=>'mailto:info@yoursite.com', 'class'=>'font-weight-light'), 'info@yoursite.com')
	)),
));
// Copyright
$content[]=$dom->tag('footer', array('class'=>'mt-5 h6 font-weight-light'), $dom->tag('div', false, array(
		'Copyright © '.date('Y').' ',
		$dom->tag('a', array('href'=>'/'), 'YOURSITE.COM')
	)));

// Set container
$html[] = $dom->tag('div', array('class'=>'container-fluid h-100'),
	// row
	$dom->tag('div', array('class'=>'row justify-content-center h-100'),
		// col
		$dom->tag('div', array('class'=>'col-12 hidden-md-down align-self-center align-items-center text-center'),$content)
	)
);

// Print HTML
$dom->html($html, array(
	'body_attr' => array(
		'class' => 'home-page',
		'id' => 'home-page',
		'style' => 'height: 100vh; display:block; font-family: \'Roboto\', Sans-serif; background:url(bckg.jpg) no-repeat center center; background-size:cover'
	),
	'compress' => true
),true);