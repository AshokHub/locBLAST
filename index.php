<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "https://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="https://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>locBLAST - Local NCBI BLAST+ Search</title>
<style type="text/css">
html {
	box-sizing: border-box;
	-webkit-text-size-adjust: 100%;
	-webkit-font-smoothing: antialiased;
}
html, body {
    height: 100%;
    margin: 0px;
    padding: 0px;
}
.form{
	position: absolute;
	top: 50%;
	left: 50%;
	width: 510px;
	height: 320px;
	margin-top: -160px; /* Half the height */
	margin-left: -255px; /* Half the width */
	vertical-align: middle;
	border: 1px solid blue;
	box-shadow: 0px 0px 3px #ccc, 0 10px 15px #eee inset;
	border-radius: 2px;
	font-family: "Times New Roman", Georgia, Serif;
}
.error{
	position: absolute;
	top: 50%;
	left: 50%;
	width: 300px;
	height: 50px;
	margin-top: -25px; /* Half the height */
	margin-left: -150px; /* Half the width */
	vertical-align: middle;
	border: 1px solid red;
	box-shadow: 0px 0px 3px #ccc, 0 10px 15px #eee inset;
	border-radius: 2px;
	color: red;
	text-align: center;
	font-weight: bold;
	line-height: 50px;
	font-family: "Times New Roman", Georgia, Serif;
}
.output{
	position: relative;
	box-sizing: border-box;
	width: 650px;
	height: auto;
	margin: 0 auto;
	vertical-align: middle;
	border: 1px solid blue;
	font-size: 12px;
	box-shadow: 0px 0px 3px #ccc, 0 10px 15px #eee inset;
	border-radius: 2px;
}
.space {
	padding: 10px;
}
abbr {
	text-decoration: none;
	color: blue;
	cursor: pointer;
}
.effect {
	border: 1px solid #aaa;
	box-shadow: 0px 0px 3px #ccc, 0 10px 15px #eee inset;
	border-radius: 2px;
}
.heffect {
    border: 0;
    height: 1px;
    background: blue;
}
a { text-decoration: none; }
</style>
</head>
<body>
<?php
if(isset($_POST['submit'])) 
{
	function get_seq($x) {
		$fck = 0;
		$seq = "";
		$fl = explode("\n", $x);
		$sh = trim(array_shift($fl));
		if($sh == null) {
			$fck++;
		}
		$fl = array_filter($fl);
		foreach($fl as $str) {
			$seq .= trim($str);
		}
		$seq = strtoupper($seq);
		$seq = preg_replace("/[^ACDEFGHIKLMNPQRSTVWY]/i", "", $seq);
		if ((count($fl) < 1) || (strlen($seq) == 0)) {
			$fck++;
			return $fck;
		} else {
			return $fck;
		}
	}

	function fcheck($x) {
		$gt = substr($x, 0, 1);
		$flck = 0;
		if ($gt != ">") {
			$flck++;
			return $flck;
		} else {
			$gtr = substr($x, 1);
			$sqs = explode(">", $gtr);
			if (count($sqs) > 1) {
				foreach ($sqs as $sq) {
					$flck += get_seq($sq);
				}
				return $flck;
			} else {
				$flck += get_seq($gtr);
				return $flck;
			}
		}
	}

	$error = 0;
	ini_set('file_uploads', 1);
	ini_set('max_execution_time', 0);
	$program = $_POST['program'];
	$datalib = $_POST['datalib'];
	$sequence = $_POST['sequence'];
	$seqfile = $_FILES['seqfile']['name'];
	$path = realpath($_FILES['seqfile']['name']);
	$tpath = realpath($_FILES['seqfile']['tmp_name']);
	$extn = strtolower(pathinfo($_FILES['seqfile']['name'], PATHINFO_EXTENSION));
	
	if (($sequence == "") && (empty($seqfile))) {
		print "<div class='error'>No input sequence provided!!</div>";
		$error++;
	}
	
	if (!empty($seqfile)) {
		if(!in_array($extn, array('fa', 'fas', 'fsa', 'fasta', 'seq'))) {
			print "<div class='error'>Invalid FASTA file input!!</div>";
			$error++;
		}
	}
	
	if ($error == 0) {
		if (($sequence != "") && (!empty($seqfile))) {
			print "<div class='error'>Input either sequence or file!!</div>";
		} else if (!empty($seqfile)) {
			$input = pathinfo($_FILES['seqfile']['tmp_name'], PATHINFO_FILENAME) . ".fas";
			$output = pathinfo($_FILES['seqfile']['tmp_name'], PATHINFO_FILENAME) . ".htm";
			move_uploaded_file($_FILES['seqfile']['tmp_name'], $input);
			$fh = fopen($input, 'r');
			$f = fread($fh, filesize($input));
			fclose($fh);
			$status = fcheck($f);
			if ($status == 0) {
				$cmd = $program . " " . $datalib . " -query " . $input . " -outfmt 0 -out " . $output . " -html";
				exec($cmd);
				$foh = fopen($output, 'r');
				if (filesize($output) == 0) {
					print "<div class='error'>Not a valid Database!!</div>";
					fclose($foh);
				} else {
					$fo = fread($foh, filesize($output));
					print "<div class='output'><h2 style='text-align: center; font-family: 'Times New Roman', Georgia, Serif;'><i style='font-size: small;'>loc</i><span style='color:blue'>BLAST</span> - Local NCBI BLAST+ Search</h2><hr class='heffect' /><div class='space' style='font-family: monospace, 'Courier New', courier;'>" . $fo . "</div></div>";
					fclose($foh);
				}
				unlink($input);
				unlink($output);
			} else {
				print "<div class='error'>Invalid FASTA file input!!</div>";
				unlink($input);
			}
		} else {
			$tmpif = 'blast' . date("Y.m.d.h.i.s") . '.fas';
			$tmpof = 'blast' . date("Y.m.d.h.i.s") . '.htm';
			$fhsq = fopen($tmpif, 'w') or die("<div class='error'>File Creation Failed!!</div>");
			fwrite($fhsq, $sequence);
			fclose($fhsq);
			$sttus = fcheck($sequence);
			if ($sttus == 0) {
				$cmds = $program . " " . $datalib . " -query " . $tmpif . " -outfmt 0 -out " . $tmpof . " -html";
				exec($cmds);
				$fsoh = fopen($tmpof, 'r');
				if (filesize($tmpof) == 0) {
					print "<div class='error'>Not a valid Database!!</div>";
					fclose($fsoh);
				} else {
					$fot = fread($fsoh, filesize($tmpof));
					print "<div class='output'><h2 style='text-align: center; font-family: 'Times New Roman', Georgia, Serif;'><i style='font-size: small;'>loc</i><span style='color:blue'>BLAST</span> - Local NCBI BLAST+ Search</h2><hr class='heffect' /><div class='space' style='font-family: monospace, 'Courier New', courier;'>" . $fot . "</div></div>";
					fclose($fsoh);
				}
				unlink($tmpif);
				unlink($tmpof);
			} else {
				print "<div class='error'>Invalid FASTA file input!!</div>";
				unlink($tmpif);
			}
		}
	}
} else {?>
	<div class="form">
	<form action="" method="post" name="blastform" enctype= "multipart/form-data">
	<h3 style="text-align: center;"><i style="font-size: small;">loc</i><span style="color:blue">BLAST</span> - Local NCBI BLAST+ Search</h3>
	<hr class="heffect" />
	<p style="padding: 0 3px 0 3px;">
	Program
	<select class="effect" id="program" name="program">
		<option value="blastn.exe">blastn</option>
		<option selected value="blastp.exe">blastp</option>
		<option value="blastx.exe">blastx</option>
		<option value="tblastn.exe">tblastn</option>
		<option value="tblastx.exe">tblastx</option>
		<option value="deltablastx.exe">deltablast</option>
		<option value="psiblast.exe">psiblast</option>
		<option value="rpsblast.exe">rpsblast</option>
		<option value="rpstblastn.exe">rpstblastn</option>
	</select>
	Database
	<select class="effect" id="datalib" name="datalib">
		<option value='-db nr -remote'>nr</option>
		<option value='-db swissprot -remote'>swissprot</option>
		<option selected value="-db pdb -remote">pdb</option>
		<option value="-db db/test_na">test dna</option>
		<option value="-db db/test_aa">test aa</option>
		<option value="-db db/pdt">pdtdb</option>
	</select>
	</p>
	<p style="padding: 0 3px 0 3px;">
	Enter sequence below in 
	<abbr title="&gt;gi|532319|pir|TVFV2E|TVFV2E envelope protein&#13;ELRLRYCAPAGFALLKCNDADYDGFKTNCSNVSVVHCTNLMNTTVTTGLLLNGSYSENRT&#13;QIWQKHRTSNDSALILLNKHYNLTVTCKRPGNKTVLPVTIMAGLVFHSQKYNLRLRQAWC&#13;HFPSNWKGAWKEVKEEIVNLPKERYRGTNDPKRIFFQRQWGDPETANLWFNCHGEFFYCK&#13;MDWFLNYLNNLTVDADHNECKNTSGTKSGNKRAPGP">FASTA</abbr>  format (<a style="font-size:small" onclick="javascript:document.getElementById('program').value='blastp.exe';
	document.getElementById('datalib').value='-db db/pdt';
	document.getElementById('sequence').value='>tr|A0PQ23|A0PQ23_MYCUA Chorismate pyruvate-lyase\nMLAVLPEKREMTECHLSDEEIRKLNRDLRILIATNGTLTRILNVLANDEIVVEIVKQQIQ\nDAAPEMDGCDHSSIGRVLRRDIVLKGRRSGIPFVAAESFIAIDLLPPEIVASLLETHRPI\nGEVMAASCIETFKEEAKVWAGESPAWLELDRRRNLPPKVVGRQYRVIAEGRPVIIITEYF\nLRSVFEDNSREEPIRHQRSVGTSARSGRSICT';" href="javascript:void()">DEMO</a>)
	<br />
	<textarea class="effect" style="min-width: 498px;" name="sequence" id="sequence" rows=6 cols=60></textarea>
	<br />
	Or load it from disk 
	<input class="effect" type="file" name="seqfile">
	</p>
	<p style="padding: 0 3px 0 3px;">
	<input class="effect" type="button" name="clear" value="Clear Sequence" onClick="document.getElementById('sequence').value=''; document.getElementById('sequence').focus();">
	<input class="effect" type="submit" name="submit" value="Search">
	</p>
	</form>
	</div>
	<?php
}
?>
</body>
</html>