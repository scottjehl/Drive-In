<?
//function to check contents of text file
function checkChange($currurl){
	$currcontents = file_get_contents( "nowplaying.txt" );

	if( $currurl !== $currcontents ){
		//return JS to change locations
		echo "window.location.href = '" . $currcontents . "'";
	}
	else{
		//1 second timeout
		sleep(1);
		checkChange( $currurl );
	}
}

//current value of text file
$currurl = file_get_contents( "nowplaying.txt" );

//start up the poller
checkChange( $currurl );
?>