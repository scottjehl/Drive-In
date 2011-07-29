<?
//limit the file writing to urls opened via regular HTTP requests
$allowAjax = true;

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
			'<script>function checkupdates(s,src){ s = document.createElement("script"); s.src = "/jquery-mobile/drive-in/comingsoon.js.php?tmp=" + Math.random().toString().slice(2,11); setTimeout(function(){ document.documentElement.appendChild(s); },100); }; checkupdates();</script></html>',
			file_get_contents( "../" . $url )
		);
}
else{
	echo file_get_contents( "../" . $url );
}
?>

