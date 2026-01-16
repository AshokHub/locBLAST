<?php
if (strtoupper(substr(php_uname('s'), 0, 3)) === 'WIN') {
	$osextn = ".exe";
	$osstrt = "";
} else {
	$osextn = "";
	$osstrt = "./";
}
$cmd = $osstrt . "blastdbcmd" . $osextn . " -version";
exec($cmd, $output);
$old_version = $output[0];
$old_v = preg_replace("/[^.0-9]+/", "", $old_version);

$html = file_get_contents("https://ftp.ncbi.nlm.nih.gov/blast/executables/blast+/LATEST/");
	
preg_match('/<a href=[^>]*>ncbi-blast-(.*?)(\+.*)<\/a>/is', $html, $match); 

$new_v = $match[1];

if ($new_v > $old_v) {
	echo "<b>NEW:</b> <a href='ftp://ftp.ncbi.nlm.nih.gov/blast/executables/LATEST' title='Download'>BLAST v" . $match[1] . "+</a>";
} else {
	echo "Latest Version!";
}
?>
