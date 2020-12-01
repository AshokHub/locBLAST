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

$host = 'ftp.ncbi.nlm.nih.gov';
$user = 'anonymous';
$password = 'anonymous';
$ftpConn = ftp_connect($host);
$login = ftp_login($ftpConn, $user, $password);
$blast_exe_dir = "/blast/executables/LATEST";
if ((!$ftpConn) || (!$login)) {
	ftp_close($ftpConn);
	echo 'NA';
}
ftp_chdir($ftpConn, $blast_exe_dir);
$dir = ftp_nlist($ftpConn, '');
$n = count($dir);
for ($i = 0; $i < $n; $i++) {
	if (preg_match("/src.tar.gz$/i", $dir[$i]) == 1) {
		$new_src = $dir[$i];
	}
}
$new_version = ltrim($new_src, 'ncbi-blast-');
$new_version = rtrim($new_version, '-src.tar.gz');
ftp_close($ftpConn);
$new_v = preg_replace("/[^.0-9]+/", "", $new_version);

if ($new_v > $old_v) {
	echo "<b>NEW:</b> <a href='ftp://ftp.ncbi.nlm.nih.gov/blast/executables/LATEST' title='Download'>Blast v$new_version</a>";
} else {
	echo "You are running the latest version!";
}
?>
