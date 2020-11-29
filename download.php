<?php
if (strtoupper(substr(php_uname('s'), 0, 3)) === 'WIN') {
	$osextn = ".exe";
	$osstrt = "";
} else {
	$osextn = "";
	$osstrt = "./";
}

$db_list = array("nr" => "online", "swissprot" => "online", "pdb" => "online", "pat" => "online", "refseq_protein" => "online", "refseq_rna" => "online", "est" => "online", "db/test_na" => "offline", "db/test_aa" => "offline", "db/CDD/Smart" => "offline", "db/pdtdb" => "offline");
$db = $_POST['db'];
$entry = $_POST['entry'];
$acc_no = $_POST['acc_no'];
$title = $_POST['title'];
$frm = $_POST['frm'];
$to = $_POST['to'];
$seq = $_POST['seq'];
$fname = "sequence";
$text = "";

foreach($db_list as $x => $y) {
	if ($x == $db) {
		$db_type = $y;
	}
}

if ($db_type == "offline") {
	$cmd = $osstrt . "blastdbcmd" . $osextn . " -entry \"" . $entry . "\" -db " . $db . " -out " . $fname . ".fa";
	exec($cmd, $output, $seq);
	$file = file_get_contents("$fname.fa");
	unlink ("$fname.fa");
	echo $file;
} else {
	$text .= ">";
	$text .= $acc_no . " ";
	$text .= $title . " (";
	$text .= $frm . " to ";
	$text .= $to . ")";
	$text .= $seq;
	echo $text;
}
?>