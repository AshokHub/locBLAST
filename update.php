<?php
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
$src = $dir[5];
$version = ltrim($src, 'ncbi-blast-');
$version = rtrim($version, '-src.tar.gz');
ftp_close($ftpConn);
echo "<b>NEW:</b> Blast v$version";
?>