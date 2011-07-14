<?
//limit the file writing to urls opened via regular HTTP requests
$allowAjax = false;

//get url
$url = $_GET[ "url" ];

//limit this to regular HTTP requests, since ajax requests to HTML files are unlikely what we're looking for
if( $allowAjax || !$_SERVER[ "HTTP_X_REQUESTED_WITH" ] || $_SERVER[ "HTTP_X_REQUESTED_WITH" ] !=="XMLHttpRequest" ){
	//write the newly requested url to text file
	$fp = fopen( "nowplaying.txt", "w" );
	fwrite( $fp, $url );
	fclose ( $fp );

	//append script tag at end of HTML which 
	echo preg_replace(
			'/<\/html>/i',
			'<script>(function(s,src){ s.src = src; setTimeout(function(){ document.documentElement.appendChild(s); },1000); })(document.createElement("script"), "drive-in/comingsoon.js.php?" + Math.random().toString().slice(2,11) )</script></html>',
			file_get_contents( "../" . $url )
		);
}
else{
	echo file_get_contents( "../" . $url );
}
?>

