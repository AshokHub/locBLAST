<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<link rel="icon" href="favicon.ico" type="image/ico" sizes="32x32">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>locBLAST - Local NCBI BLAST+ Search</title>
	<link href="style.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript">//<![CDATA[
	window.onload = function() {
		document.getElementById('pgm_desc').innerHTML = "<a href='blastp.php'>&lArr; Compares Protein Query vs Protein Database</a>";
		//document.getElementById('tips').innerHTML = "Choose Program to Use and Database to Search";
		document.getElementById('advsearch').disabled = true;
		document.getElementById('blastp_program').style.visibility = 'visible';
		document.getElementById('datalib').getElementsByTagName("option")[0].disabled = false;
		document.getElementById('datalib').getElementsByTagName("option")[1].disabled = false;
		document.getElementById('datalib').getElementsByTagName("option")[2].disabled = false;
		document.getElementById('datalib').getElementsByTagName("option")[3].disabled = true;
		document.getElementById('datalib').getElementsByTagName("option")[4].disabled = true;
		document.getElementById('datalib').getElementsByTagName("option")[5].disabled = false;
		document.getElementById('datalib').getElementsByTagName("option")[6].disabled = false;
		document.getElementById('datalib').getElementsByTagName("option")[7].disabled = true;
		document.getElementById('datalib').getElementsByTagName("option")[8].disabled = false;
		document.getElementById('datalib').getElementsByTagName("option")[9].disabled = true;
		document.getElementById('datalib').getElementsByTagName("option")[10].disabled = false;
		document.getElementById('datalib').getElementsByTagName("option")[0].selected = true;
	};
	function download_fasta(db, entry, acc_no, title, frm, to, seq) {
		var xhttp = new XMLHttpRequest();
		var params = "db=" + db + "&entry=" + entry + "&acc_no=" + acc_no + "&title=" + title + "&frm=" + frm + "&to=" + to + "&seq=" + seq;
		xhttp.open('POST', 'download.php', true);
		xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xhttp.setRequestHeader("Content-length", params.length);
		xhttp.setRequestHeader("Connection", "close");
		xhttp.send(params);
		xhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				var hiddenElement = document.createElement('a');
				hiddenElement.href = 'data:text/fasta;charset=utf-8,' + encodeURIComponent(this.responseText);
				hiddenElement.target = '_blank';
				hiddenElement.download = acc_no + ".fasta";
				hiddenElement.click();
			}
		};
	}
	function blastUpdate() {
		var request = new XMLHttpRequest();
		request.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				document.getElementById('update_msg').innerHTML = this.responseText;
			} else {
				document.getElementById('update_msg').innerHTML = '<div id="loading"></div>';
			}
		};
		request.open('POST', 'update.php', true);
		request.send();
	}
	function prgmDesc() {
		var program = document.getElementById("program").value;
		if (program == "blastn") {
			document.getElementById('pgm_desc').innerHTML = "<a href='" + program + ".php'>&lArr; Compares Nucleotide Query vs Nucleotide Database</a>";
			document.getElementById('blastn_program').style.display = "block";
			document.getElementById('datalib').getElementsByTagName("option")[0].disabled = false;
			document.getElementById('datalib').getElementsByTagName("option")[1].disabled = true;
			document.getElementById('datalib').getElementsByTagName("option")[2].disabled = true;
			document.getElementById('datalib').getElementsByTagName("option")[3].disabled = false;
			document.getElementById('datalib').getElementsByTagName("option")[4].disabled = false;
			document.getElementById('datalib').getElementsByTagName("option")[5].disabled = true;
			document.getElementById('datalib').getElementsByTagName("option")[6].disabled = true;
			document.getElementById('datalib').getElementsByTagName("option")[7].disabled = false;
			document.getElementById('datalib').getElementsByTagName("option")[8].disabled = true;
			document.getElementById('datalib').getElementsByTagName("option")[9].disabled = true;
			document.getElementById('datalib').getElementsByTagName("option")[10].disabled = true;
			document.getElementById('datalib').getElementsByTagName("option")[0].selected = true;
			document.getElementById("outfmt16").checked = true;
			document.getElementById("outfmt16").disabled = false;
		} else {
			document.getElementById('blastn_program').style.display = "none";
		}
		if (program == "blastp") {
			document.getElementById('pgm_desc').innerHTML = "<a href='" + program + ".php'>&lArr; Compares Protein Query vs Protein Database</a>";
			document.getElementById('blastp_program').style.display = "block";
			document.getElementById('datalib').getElementsByTagName("option")[0].disabled = false;
			document.getElementById('datalib').getElementsByTagName("option")[1].disabled = false;
			document.getElementById('datalib').getElementsByTagName("option")[2].disabled = false;
			document.getElementById('datalib').getElementsByTagName("option")[3].disabled = true;
			document.getElementById('datalib').getElementsByTagName("option")[4].disabled = true;
			document.getElementById('datalib').getElementsByTagName("option")[5].disabled = false;
			document.getElementById('datalib').getElementsByTagName("option")[6].disabled = false;
			document.getElementById('datalib').getElementsByTagName("option")[7].disabled = true;
			document.getElementById('datalib').getElementsByTagName("option")[8].disabled = false;
			document.getElementById('datalib').getElementsByTagName("option")[9].disabled = true;
			document.getElementById('datalib').getElementsByTagName("option")[10].disabled = false;
			document.getElementById('datalib').getElementsByTagName("option")[0].selected = true;
			document.getElementById("outfmt16").checked = true;
			document.getElementById("outfmt16").disabled = false;
		} else {
			document.getElementById('blastp_program').style.display = "none";
		}
		if (program == "blastx") {
			document.getElementById('pgm_desc').innerHTML = "<a href='" + program + ".php'>&lArr; Compares Nucleotide Query vs Protein Database</a>";
			document.getElementById('blastx_program').style.display = "block";
			document.getElementById('datalib').getElementsByTagName("option")[0].disabled = false;
			document.getElementById('datalib').getElementsByTagName("option")[1].disabled = false;
			document.getElementById('datalib').getElementsByTagName("option")[2].disabled = false;
			document.getElementById('datalib').getElementsByTagName("option")[3].disabled = true;
			document.getElementById('datalib').getElementsByTagName("option")[4].disabled = true;
			document.getElementById('datalib').getElementsByTagName("option")[5].disabled = false;
			document.getElementById('datalib').getElementsByTagName("option")[6].disabled = false;
			document.getElementById('datalib').getElementsByTagName("option")[7].disabled = true;
			document.getElementById('datalib').getElementsByTagName("option")[8].disabled = false;
			document.getElementById('datalib').getElementsByTagName("option")[9].disabled = true;
			document.getElementById('datalib').getElementsByTagName("option")[10].disabled = false;
			document.getElementById('datalib').getElementsByTagName("option")[0].selected = true;
			document.getElementById("outfmt16").checked = true;
			document.getElementById("outfmt16").disabled = false;
		} else {
			document.getElementById('blastx_program').style.display = "none";
		}
		if (program == "tblastn") {
			document.getElementById('pgm_desc').innerHTML = "<a href='" + program + ".php'>&lArr; Compares Protein Query vs Nucleotide Database</a>";
			document.getElementById('tblastn_program').style.display = "block";
			document.getElementById('datalib').getElementsByTagName("option")[0].disabled = false;
			document.getElementById('datalib').getElementsByTagName("option")[1].disabled = true;
			document.getElementById('datalib').getElementsByTagName("option")[2].disabled = true;
			document.getElementById('datalib').getElementsByTagName("option")[3].disabled = false;
			document.getElementById('datalib').getElementsByTagName("option")[4].disabled = false;
			document.getElementById('datalib').getElementsByTagName("option")[5].disabled = true;
			document.getElementById('datalib').getElementsByTagName("option")[6].disabled = true;
			document.getElementById('datalib').getElementsByTagName("option")[7].disabled = false;
			document.getElementById('datalib').getElementsByTagName("option")[8].disabled = true;
			document.getElementById('datalib').getElementsByTagName("option")[9].disabled = true;
			document.getElementById('datalib').getElementsByTagName("option")[10].disabled = true;
			document.getElementById('datalib').getElementsByTagName("option")[0].selected = true;
			document.getElementById("outfmt16").checked = true;
			document.getElementById("outfmt16").disabled = false;
		} else {
			document.getElementById('tblastn_program').style.display = "none";
		}
		if (program == "tblastx") {
			document.getElementById('pgm_desc').innerHTML = "<a href='" + program + ".php'>&lArr; Compares Nucleotide Query vs Nucleotide Database</a>";
			document.getElementById('tblastx_program').style.display = "block";
			document.getElementById('datalib').getElementsByTagName("option")[0].disabled = true;
			document.getElementById('datalib').getElementsByTagName("option")[1].disabled = true;
			document.getElementById('datalib').getElementsByTagName("option")[2].disabled = true;
			document.getElementById('datalib').getElementsByTagName("option")[3].disabled = false;
			document.getElementById('datalib').getElementsByTagName("option")[4].disabled = false;
			document.getElementById('datalib').getElementsByTagName("option")[5].disabled = true;
			document.getElementById('datalib').getElementsByTagName("option")[6].disabled = true;
			document.getElementById('datalib').getElementsByTagName("option")[7].disabled = false;
			document.getElementById('datalib').getElementsByTagName("option")[8].disabled = true;
			document.getElementById('datalib').getElementsByTagName("option")[9].disabled = true;
			document.getElementById('datalib').getElementsByTagName("option")[10].disabled = true;
			document.getElementById('datalib').getElementsByTagName("option")[4].selected = true;
			document.getElementById("outfmt16").checked = true;
			document.getElementById("outfmt16").disabled = false;
		} else {
			document.getElementById('tblastx_program').style.display = "none";
		}
		if (program == "deltablast") {
			document.getElementById('pgm_desc').innerHTML = "<a href='" + program + ".php'>&lArr; Compares Protein Query vs Protein CD Database</a>";
			document.getElementById('deltablast_program').style.display = "block";
			document.getElementById('datalib').getElementsByTagName("option")[0].disabled = false;
			document.getElementById('datalib').getElementsByTagName("option")[1].disabled = false;
			document.getElementById('datalib').getElementsByTagName("option")[2].disabled = false;
			document.getElementById('datalib').getElementsByTagName("option")[3].disabled = true;
			document.getElementById('datalib').getElementsByTagName("option")[4].disabled = true;
			document.getElementById('datalib').getElementsByTagName("option")[5].disabled = false;
			document.getElementById('datalib').getElementsByTagName("option")[6].disabled = false;
			document.getElementById('datalib').getElementsByTagName("option")[7].disabled = true;
			document.getElementById('datalib').getElementsByTagName("option")[8].disabled = true;
			document.getElementById('datalib').getElementsByTagName("option")[9].disabled = false;
			document.getElementById('datalib').getElementsByTagName("option")[10].disabled = true;
			document.getElementById('datalib').getElementsByTagName("option")[0].selected = true;
			// Graphical Display is Redirected to Normal Display Temporarily
			document.getElementById("outfmt16").disabled = true;
			document.getElementById("outfmt0").disabled = false;
			document.getElementById("outfmt0").checked = true;
		} else {
			document.getElementById('deltablast_program').style.display = "none";
		}
		if (program == "psiblast") {
			document.getElementById('pgm_desc').innerHTML = "<a href='" + program + ".php'>&lArr; Compares Protein Query vs Protein CD Database</a>";
			document.getElementById('psiblast_program').style.display = "block";
			document.getElementById('datalib').getElementsByTagName("option")[0].disabled = false;
			document.getElementById('datalib').getElementsByTagName("option")[1].disabled = false;
			document.getElementById('datalib').getElementsByTagName("option")[2].disabled = false;
			document.getElementById('datalib').getElementsByTagName("option")[3].disabled = true;
			document.getElementById('datalib').getElementsByTagName("option")[4].disabled = true;
			document.getElementById('datalib').getElementsByTagName("option")[5].disabled = false;
			document.getElementById('datalib').getElementsByTagName("option")[6].disabled = false;
			document.getElementById('datalib').getElementsByTagName("option")[7].disabled = true;
			document.getElementById('datalib').getElementsByTagName("option")[8].disabled = true;
			document.getElementById('datalib').getElementsByTagName("option")[9].disabled = false;
			document.getElementById('datalib').getElementsByTagName("option")[10].disabled = true;
			document.getElementById('datalib').getElementsByTagName("option")[0].selected = true;
			// Graphical Display is Redirected to Normal Display Temporarily
			document.getElementById("outfmt16").disabled = true;
			document.getElementById("outfmt0").disabled = false;
			document.getElementById("outfmt0").checked = true;
		} else {
			document.getElementById('psiblast_program').style.display = "none";
		}
		if (program == "rpsblast") {
			document.getElementById('pgm_desc').innerHTML = "<a href='" + program + ".php'>&lArr; Compares Protein Query vs Protein CD Database</a>";
			document.getElementById('rpsblast_program').style.display = "block";
			document.getElementById('datalib').getElementsByTagName("option")[0].disabled = true;
			document.getElementById('datalib').getElementsByTagName("option")[1].disabled = true;
			document.getElementById('datalib').getElementsByTagName("option")[2].disabled = true;
			document.getElementById('datalib').getElementsByTagName("option")[3].disabled = true;
			document.getElementById('datalib').getElementsByTagName("option")[4].disabled = true;
			document.getElementById('datalib').getElementsByTagName("option")[5].disabled = true;
			document.getElementById('datalib').getElementsByTagName("option")[6].disabled = true;
			document.getElementById('datalib').getElementsByTagName("option")[7].disabled = true;
			document.getElementById('datalib').getElementsByTagName("option")[8].disabled = true;
			document.getElementById('datalib').getElementsByTagName("option")[9].disabled = false;
			document.getElementById('datalib').getElementsByTagName("option")[10].disabled = true;
			document.getElementById('datalib').getElementsByTagName("option")[9].selected = true;
			document.getElementById("outfmt16").checked = true;
			document.getElementById("outfmt16").disabled = false;
		} else {
			document.getElementById('rpsblast_program').style.display = "none";
		}
		if (program == "rpstblastn") {
			document.getElementById('pgm_desc').innerHTML = "<a href='" + program + ".php'>&lArr; Compares Nucleotide Query vs Protein CD Database</a>";
			document.getElementById('rpstblastn_program').style.display = "block";
			document.getElementById('datalib').getElementsByTagName("option")[0].disabled = true;
			document.getElementById('datalib').getElementsByTagName("option")[1].disabled = true;
			document.getElementById('datalib').getElementsByTagName("option")[2].disabled = true;
			document.getElementById('datalib').getElementsByTagName("option")[3].disabled = true;
			document.getElementById('datalib').getElementsByTagName("option")[4].disabled = true;
			document.getElementById('datalib').getElementsByTagName("option")[5].disabled = true;
			document.getElementById('datalib').getElementsByTagName("option")[6].disabled = true;
			document.getElementById('datalib').getElementsByTagName("option")[7].disabled = true;
			document.getElementById('datalib').getElementsByTagName("option")[8].disabled = true;
			document.getElementById('datalib').getElementsByTagName("option")[9].disabled = false;
			document.getElementById('datalib').getElementsByTagName("option")[10].disabled = true;
			document.getElementById('datalib').getElementsByTagName("option")[9].selected = true;
			document.getElementById("outfmt16").checked = true;
			document.getElementById("outfmt16").disabled = false;
		} else {
			document.getElementById('rpstblastn_program').style.display = "none";
		}
	}
	function changeCSS() {
		//document.getElementsByClassName('form').style.cssText = "background-color: red; color: black; font-size: 44px";
		//document.getElementById('form').style.cssText = "height: 100%;";
		//document.getElementById('form').style.backgroundColor = "red";
	}
	function enableAdvSubmit() {
		document.getElementById('advsearch').disabled = false;
		document.getElementById('advced').style.backgroundColor = "yellow";
		document.getElementById('advced').style.color = "red";
		document.getElementById('advced').style.fontWeight = "bold";
		document.getElementById('advced').style.fontVariant = "small-caps";
		document.getElementById('advced').style.fontFamily = "'Times New Roman', Times, serif";
	}
	//]]>
	</script>
</head>
<body>
<?php
if(isset($_POST['search']) || isset($_POST['advsearch'])) {
	if (strtoupper(substr(php_uname('s'), 0, 3)) === 'WIN') {
		$osextn = ".exe";
		$osstrt = "";
	} else {
		$osextn = "";
		$osstrt = "./";
	}

	function convert_filter_string($filter_string, $program) {
		// print STDERR "Parsing '$filter_string'\n";
		if (preg_match("/F/", $filter_string, $match)) {
			if (($program == "blastp" || $program == "tblastn") || ($program == "blastx" || $program == "tblastx")) {
				return " -seg no";
			} else {
				return " -dust no";
			}
		}

		$retval = "";
		if (preg_match("/S (\d+) (\S+) (\S+)/", $filter_string, $match)) {
			$retval .= " -seg '" . $match[0] . " " . $match[1] . " " . $match[2] . "'";
		}
		if (preg_match("/D (\d+) (\d+) (\d+)/", $filter_string, $match)) {
			$retval .= " -dust '" . $match[0] . " " . $match[1] . " " . $match[2] . "'";
		}
		if (preg_match("/R -d (\S+)/", $filter_string, $match)) {
			$retval .= " -filtering_db " . $match[0];
		} elseif (preg_match("/R\s*;/", $filter_string, $match)) {
			$retval .= " -filtering_db repeat/repeat_9606";
		}

		if (preg_match("/L|T|S|D/", $filter_string, $match) && !(preg_match("/seg|dust/", $retval, $match1))) {
			if (($program == "blastp" || $program == "tblastn") || $program == "blastx") {
				$retval .= " -seg yes";
			} else {
				$retval .= " -dust yes";
			}
		}

		if (preg_match("/m/", $filter_string, $match)) {
			$retval .= " -soft_masking true";
		}
		// print STDERR "returning '$retval'\n";
		return $retval;
		
		//$filter_string = "m";
		//$program = "blastn";
		//print convert_filter_string($filter_string, $program);
	}
	
	function blastn() {
		$advparam = "";
		$advparam .= " -num_alignments " . $_POST['bn_num_alignments'];
		$advparam .= " -evalue " . $_POST['bn_evalue'];
		$advparam .= " -word_size " . $_POST['bn_word_size'];
		$match_scores = $_POST['bn_match_scores'];
		$match_score = explode(',', $match_scores);
		$advparam .= " -reward " . $match_score[0];
		$advparam .= " -penalty " . $match_score[1];
		$gapcosts = $_POST['bn_gapcosts'];
		$gapcost = explode(',', $gapcosts);
		$advparam .= " -gapopen " . $gapcost[0];
		$advparam .= " -gapextend " . $gapcost[1];
		if (isset($_POST['bn_filter1'])) {
			$advparam .= convert_filter_string($_POST['bn_filter1'], $_POST['program']);
		}
		if (isset($_POST['bn_filter2'])) {
			$advparam .= convert_filter_string($_POST['bn_filter2'], $_POST['program']);
		}
		return $advparam;
	}
	
	function blastp() {
		$advparam = "";
		$advparam .= " -num_alignments " . $_POST['bp_num_alignments'];
		$advparam .= " -evalue " . $_POST['bp_evalue'];
		$advparam .= " -word_size " . $_POST['bp_word_size'];
		$advparam .= " -matrix " . $_POST['bp_matrix'];
		$gapcosts = $_POST['bp_gapcosts'];
		$gapcost = explode(',', $gapcosts);
		$advparam .= " -gapopen " . $gapcost[0];
		$advparam .= " -gapextend " . $gapcost[1];
		if (isset($_POST['bp_filter1'])) {
			$advparam .= convert_filter_string($_POST['bp_filter1'], $_POST['program']);
		}
		if (isset($_POST['bp_filter2'])) {
			$advparam .= convert_filter_string($_POST['bp_filter2'], $_POST['program']);
		}
		return $advparam;
	}
	
	function blastx() {
		$advparam = "";
		$advparam .= " -num_alignments " . $_POST['bx_num_alignments'];
		$advparam .= " -evalue " . $_POST['bx_evalue'];
		$advparam .= " -word_size " . $_POST['bx_word_size'];
		$advparam .= " -matrix " . $_POST['bx_matrix'];
		$gapcosts = $_POST['bx_gapcosts'];
		$gapcost = explode(',', $gapcosts);
		$advparam .= " -gapopen " . $gapcost[0];
		$advparam .= " -gapextend " . $gapcost[1];
		if (isset($_POST['bx_filter1'])) {
			$advparam .= convert_filter_string($_POST['bx_filter1'], $_POST['program']);
		}
		if (isset($_POST['bx_filter2'])) {
			$advparam .= convert_filter_string($_POST['bx_filter2'], $_POST['program']);
		}
		return $advparam;
	}
	
	function tblastn() {
		$advparam = "";
		$advparam .= " -num_alignments " . $_POST['tbn_num_alignments'];
		$advparam .= " -evalue " . $_POST['tbn_evalue'];
		$advparam .= " -word_size " . $_POST['tbn_word_size'];
		$advparam .= " -matrix " . $_POST['tbn_matrix'];
		$gapcosts = $_POST['tbn_gapcosts'];
		$gapcost = explode(',', $gapcosts);
		$advparam .= " -gapopen " . $gapcost[0];
		$advparam .= " -gapextend " . $gapcost[1];
		if (isset($_POST['tbn_filter1'])) {
			$advparam .= convert_filter_string($_POST['tbn_filter1'], $_POST['program']);
		}
		if (isset($_POST['tbn_filter2'])) {
			$advparam .= convert_filter_string($_POST['tbn_filter2'], $_POST['program']);
		}
		return $advparam;
	}
	
	function tblastx() {
		$advparam = "";
		$advparam .= " -num_alignments " . $_POST['tbx_num_alignments'];
		$advparam .= " -evalue " . $_POST['tbx_evalue'];
		$advparam .= " -word_size " . $_POST['tbx_word_size'];
		$advparam .= " -matrix " . $_POST['tbx_matrix'];
		$advparam .= " -strand " . $_POST['tbx_strand'];
		if (isset($_POST['tbx_filter2'])) {
			$advparam .= convert_filter_string($_POST['tbx_filter2'], $_POST['program']);
		}
		if (isset($_POST['tbx_lcase_masking'])) {
			$advparam .= " -lcase_masking";
		}
		return $advparam;
	}
	
	function deltablast() {
		$advparam = "";
		$advparam .= " -num_alignments " . $_POST['db_num_alignments'];
		$advparam .= " -evalue " . $_POST['db_evalue'];
		$advparam .= " -word_size " . $_POST['db_word_size'];
		$advparam .= " -matrix " . $_POST['db_matrix'];
		$gapcosts = $_POST['db_gapcosts'];
		$gapcost = explode(',', $gapcosts);
		$advparam .= " -gapopen " . $gapcost[0];
		$advparam .= " -gapextend " . $gapcost[1];
		$advparam .= " -threshold " . $_POST['db_threshold'];
		$advparam .= " -pseudocount " . $_POST['db_pseudocount'];
		return $advparam;
	}

	function psiblast() {
		$advparam = "";
		$advparam .= " -num_alignments " . $_POST['psib_num_alignments'];
		$advparam .= " -evalue " . $_POST['psib_evalue'];
		$advparam .= " -word_size " . $_POST['psib_word_size'];
		$advparam .= " -matrix " . $_POST['psib_matrix'];
		$gapcosts = $_POST['psib_gapcosts'];
		$gapcost = explode(',', $gapcosts);
		$advparam .= " -gapopen " . $gapcost[0];
		$advparam .= " -gapextend " . $gapcost[1];
		$advparam .= " -threshold " . $_POST['psib_threshold'];
		$advparam .= " -pseudocount " . $_POST['psib_pseudocount'];
		return $advparam;
	}
	
	function rpsblast() {
		$advparam = "";
		$advparam .= " -num_alignments " . $_POST['rpsb_num_alignments'];
		$advparam .= " -num_descriptions " . $_POST['rpsb_num_descriptions'];
		$advparam .= " -evalue " . $_POST['rpsb_evalue'];
		if (isset($_POST['rpsb_filter1'])) {
			$advparam .= convert_filter_string($_POST['rpsb_filter1'], $_POST['program']);
		}
		if (isset($_POST['rpsb_filter2'])) {
			$advparam .= convert_filter_string($_POST['rpsb_filter2'], $_POST['program']);
		}
		if (isset($_POST['rpsb_lcase_masking'])) {
			$advparam .= " -lcase_masking";
		}
		return $advparam;
	}
	
	function rpstblastn() {
		$advparam = "";
		$advparam .= " -num_alignments " . $_POST['rpstbn_num_alignments'];
		$advparam .= " -num_descriptions " . $_POST['rpstbn_num_descriptions'];
		$advparam .= " -evalue " . $_POST['rpstbn_evalue'];
		if (isset($_POST['rpstbn_filter1'])) {
			$advparam .= convert_filter_string($_POST['rpstbn_filter1'], $_POST['program']);
		}
		if (isset($_POST['rpstbn_filter2'])) {
			$advparam .= convert_filter_string($_POST['rpstbn_filter2'], $_POST['program']);
		}
		if (isset($_POST['rpstbn_lcase_masking'])) {
			$advparam .= " -lcase_masking";
		}
		return $advparam;
	}
	
	if ($_POST['adv_param'] == "advanced") {
		if ($_POST['program'] == "blastn") {
			$advparam = blastn();
		}
		if ($_POST['program'] == "blastp") {
			$advparam = blastp();
		}
		if ($_POST['program'] == "blastx") {
			$advparam = blastx();
		}
		if ($_POST['program'] == "tblastn") {
			$advparam = tblastn();
		}
		if ($_POST['program'] == "tblastx") {
			$advparam = tblastx();
		}
		if ($_POST['program'] == "deltablast") {
			$advparam = deltablast();
		}
		if ($_POST['program'] == "psiblast") {
			$advparam = psiblast();
		}
		if ($_POST['program'] == "rpsblast") {
			$advparam = rpsblast();
		}
		if ($_POST['program'] == "rpstblastn") {
			$advparam = rpstblastn();
		}
	} else {
		$advparam = "";
	}
	
	$online_db = array('nr -remote', 'swissprot -remote', 'pdb -remote', 'pat -remote', 'refseq_protein -remote', 'refseq_rna -remote', 'est -remote');
	$offline_db = array('db/test_na', 'db/test_aa', 'db/CDD/Smart', 'db/pdtdb');

	$aa_db = array('nr -remote', 'swissprot -remote', 'pdb -remote', 'pat -remote', 'refseq_protein -remote', 'db/test_aa', 'db/CDD/Smart', 'db/pdtdb');
	$na_db = array('nr -remote', 'refseq_rna -remote', 'est -remote', 'db/test_na');

	$blast_aa_program = array('blastp', 'deltablast', 'psiblast', 'rpsblast');
	$blast_na_program = array('blastn', 'tblastx');
	$blast_tra_program = array('tblastn');
	$blast_trn_program = array('blastx', 'rpstblastn');
	
	function mol_type($seq) {
		$fstr = preg_replace("/[ATCGU]/i", "", $seq);
		if (strlen($fstr) > 0) {
			return "aa";
		} else {
			return "na";
		}
	}
	
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
		global $moltype;
		$moltype = mol_type($seq);
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
	$outfmt = $_POST['outfmt'];
	$seqfile = $_FILES['seqfile']['name'];
	$path = realpath($_FILES['seqfile']['name']);
	$tpath = realpath($_FILES['seqfile']['tmp_name']);
	$extn = strtolower(pathinfo($_FILES['seqfile']['name'], PATHINFO_EXTENSION));
	
	if (($sequence == "") && (empty($seqfile))) {
		//print "<div class='error'>Input Sequence or File Not Found!</div>";
		require_once('header.php');
		print "Input Sequence or File Not Found!";
		require_once('footer.php');
		$error++;
	}
	
	if (!empty($seqfile)) {
		if(!in_array($extn, array('fa', 'fas', 'fsa', 'fasta', 'seq'))) {
			require_once('header.php');
			print "Invalid FASTA file Input!";
			require_once('footer.php');
			//print "<div class='error'>Invalid FASTA file input!!</div>";
			$error++;
		}
	}
	
	if ($error == 0) {
		if (($sequence != "") && (!empty($seqfile))) {
			//print "<div class='error'>Input Either Sequence or File!</div>";
			require_once('header.php');
			print "Input Either Sequence or File!";
			require_once('footer.php');
		} else if (!empty($seqfile)) {
			$input = pathinfo($_FILES['seqfile']['tmp_name'], PATHINFO_FILENAME) . ".fas";
			move_uploaded_file($_FILES['seqfile']['tmp_name'], $input);
			if ($outfmt == 16) {
				$tmpxm = pathinfo($_FILES['seqfile']['tmp_name'], PATHINFO_FILENAME) . ".xml";
				$cmd = $osstrt . $program . $osextn . " -db " . $datalib . " -query " . $input . " -outfmt " . $outfmt . " -out " . $tmpxm . $advparam;
				$topfs = $tmpxm;
			} else {
				$tmpof = pathinfo($_FILES['seqfile']['tmp_name'], PATHINFO_FILENAME) . ".htm";
				$cmd = $osstrt . $program . $osextn . " -db " . $datalib . " -query " . $input . " -outfmt " . $outfmt . " -out " . $tmpof . " -html" . $advparam;
				$topfs = $tmpof;
			}
			$fh = fopen($input, 'r');
			$f = fread($fh, filesize($input));
			fclose($fh);
			$status = fcheck($f);
			$param_error = 0;
			if ($status == 0) {
				if ((in_array($program, $blast_aa_program) && in_array($datalib, $aa_db)) && ($moltype == "aa")) {
					$param_error = 0;
				} elseif ((in_array($program, $blast_na_program) && in_array($datalib, $na_db)) && ($moltype == "na")) {
					$param_error = 0;
				} elseif ((in_array($program, $blast_tra_program) && in_array($datalib, $na_db)) && ($moltype == "aa")) {
					$param_error = 0;
				} elseif ((in_array($program, $blast_trn_program) && in_array($datalib, $aa_db)) && ($moltype == "na")) {
					$param_error = 0;
				} else {
					//print "<div class='error'>Invalid Input/Program/Database Selection!</div>";
					require_once('header.php');
					print "Invalid Input/Program/Database Selection!";
					require_once('footer.php');
					$param_error++;
					if (file_exists($input)) { unlink ($input); }
				}
				if ($param_error == 0) {
					print "<div id=\"progress\">";
					require_once('header.php');
					print "<div class='ball'></div><div class='ball'></div><div class='ball'></div><div class='ball'></div>";
					require_once('footer.php');
					print "</div>";
					exec($cmd, $exec_output, $exec_return);
					if (!$exec_return) {
						$foh = fopen($topfs, 'r');
						if (filesize($topfs) == 0) {
							require_once('header.php');
							print "Program Execution Failed!";
							require_once('footer.php');
							//print "<div class='error'>Program Execution Failed!</div>";
							fclose($foh);
							if (file_exists($input)) { unlink ($input); }
							if ($outfmt == 16) {
								if (file_exists($tmpxm)) { unlink ($tmpxm); }
							} else {
								if (file_exists($tmpof)) { unlink ($tmpof); }
							}
						} else {
							$fo = fread($foh, filesize($topfs));
							if ($outfmt == 16) {
								print "<script type=\"text/javascript\">document.getElementById('progress').style.display = \"none\";</script>";
								print "<div class='xoutput'><h2 style=\"text-align: center;\"><i style=\"font-size: medium\">loc</i><span style=\"color:blue; font-size: large\">BLAST</span> - <span style=\"font-size: large;\">local NCBI BLAST</span></h2><hr class='heffect' />";
								print "<a href=\"index.php\" title=\"Go Back to Home\"><div style=\"padding: 0 5px 0 0;\" id=\"back\"></div></a>";
								require_once('xml.php');
								print "</div>";
							} else {
								print "<script type=\"text/javascript\">document.getElementById('progress').style.display = \"none\";</script>";
								print "<div class='output'><h2 style=\"text-align: center;\"><i style=\"font-size: medium\">loc</i><span style=\"color:blue; font-size: large\">BLAST</span> - <span style=\"font-size: large;\">local NCBI BLAST</span></h2><hr class='heffect' /><div class='space' style='font-family: monospace, 'Courier New', courier;'><a href=\"index.php\" title=\"Go Back to Home\"><div style=\"padding: 0 5px 0 0;\" id=\"back\"></div></a>" . $fo . "</div></div>";
							}
							fclose($foh);
							if (file_exists($input)) { unlink ($input); }
							if ($outfmt == 16) {
								if (file_exists($tmpxm)) { unlink ($tmpxm); }
							} else {
								if (file_exists($tmpof)) { unlink ($tmpof); }
							}
						}
					} else {
						//print "<div class='error'>Invalid Input/Program/Database Selection!</div>";
						print "<script type=\"text/javascript\">document.getElementById('progress').style.display = \"none\";</script>";
						include('header.php');
						print "Invalid Input/Program/Database Selection!";
						include('footer.php');
						if (file_exists($input)) { unlink ($input); }
						if ($outfmt == 16) {
							if (file_exists($tmpxm)) { unlink ($tmpxm); }
						} else {
							if (file_exists($tmpof)) { unlink ($tmpof); }
						}
					}
				}
			} else {
				require_once('header.php');
				print "Invalid FASTA File Input!";
				require_once('footer.php');
				//print "<div class='error'>Invalid FASTA File Input!</div>";
				if (file_exists($input)) { unlink ($input); }
			}
		} else {
			$tmpif = 'blast' . date("Y.m.d.h.i.s") . '.fas';
			if ($outfmt == 16) {
				$tmpxm = 'blast' . date("Y.m.d.h.i.s") . '.xml';
				$cmds = $osstrt . $program . $osextn . " -db " . $datalib . " -query " . $tmpif . " -outfmt " . $outfmt . " -out " . $tmpxm . $advparam;
				$topfs = $tmpxm;
			} else {
				$tmpof = 'blast' . date("Y.m.d.h.i.s") . '.htm';
				$cmds = $osstrt . $program . $osextn . " -db " . $datalib . " -query " . $tmpif . " -outfmt " . $outfmt . " -out " . $tmpof . " -html" . $advparam;
				$topfs = $tmpof;
			}
			$fhsq = fopen($tmpif, 'w') or die("<div class='error'>File Creation Failed!</div>");
			fwrite($fhsq, $sequence);
			fclose($fhsq);
			$sttus = fcheck($sequence);
			$param_error = 0;
			if ($sttus == 0) {
				if ((in_array($program, $blast_aa_program) && in_array($datalib, $aa_db)) && ($moltype == "aa")) {
					$param_error = 0;
				} elseif ((in_array($program, $blast_na_program) && in_array($datalib, $na_db)) && ($moltype == "na")) {
					$param_error = 0;
				} elseif ((in_array($program, $blast_tra_program) && in_array($datalib, $na_db)) && ($moltype == "aa")) {
					$param_error = 0;
				} elseif ((in_array($program, $blast_trn_program) && in_array($datalib, $aa_db)) && ($moltype == "na")) {
					$param_error = 0;
				} else {
					//print "<div class='error'>Invalid Input/Program/Database Selection!</div>";
					require_once('header.php');
					print "Invalid Input/Program/Database Selection!";
					require_once('footer.php');
					$param_error++;
					if (file_exists($tmpif)) { unlink ($tmpif); }
				}
				if ($param_error == 0) {
					print "<div id=\"progress\">";
					require_once('header.php');
					print "<div class='ball'></div><div class='ball'></div><div class='ball'></div><div class='ball'></div>";
					require_once('footer.php');
					print "</div>";
					exec($cmds, $exec_output, $exec_return);
					if (!$exec_return) {
						$fsoh = fopen($topfs, 'r');
						if (filesize($topfs) == 0) {
							//print "<div class='error'>Failed to Execute!</div>";
							require_once('header.php');
							print "Failed to Execute!";
							require_once('footer.php');
							fclose($fsoh);
							if (file_exists($tmpif)) { unlink ($tmpif); }
							if ($outfmt == 16) {
								if (file_exists($tmpxm)) { unlink ($tmpxm); }
							} else {
								if (file_exists($tmpof)) { unlink ($tmpof); }
							}
						} else {
							$fot = fread($fsoh, filesize($topfs));
							if ($outfmt == 16) {
								print "<script type=\"text/javascript\">document.getElementById('progress').style.display = \"none\";</script>";
								print "<div class='xoutput'><h2 style=\"text-align: center;\"><i style=\"font-size: medium\">loc</i><span style=\"color:blue; font-size: large\">BLAST</span> - <span style=\"font-size: large;\">local NCBI BLAST</span></h2><hr class='heffect' />";
								print "<a href=\"index.php\" title=\"Go Back to Home\"><div style=\"padding: 0 5px 0 0;\" id=\"back\"></div></a>";
								require_once('xml.php');
								print "</div>";
							} else {
								print "<script type=\"text/javascript\">document.getElementById('progress').style.display = \"none\";</script>";
								print "<div class='output'><h2 style=\"text-align: center;\"><i style=\"font-size: medium\">loc</i><span style=\"color:blue; font-size: large\">BLAST</span> - <span style=\"font-size: large;\">local NCBI BLAST</span></h2><hr class='heffect' /><div class='space' style='font-family: monospace, 'Courier New', courier;'><a href=\"index.php\" title=\"Go Back to Home\"><div style=\"padding: 0 5px 0 0;\" id=\"back\"></div></a>" . $fot . "</div></div>";
							}
							fclose($fsoh);
							if (file_exists($tmpif)) { unlink ($tmpif); }
							if ($outfmt == 16) {
								if (file_exists($tmpxm)) { unlink ($tmpxm); }
							} else {
								if (file_exists($tmpof)) { unlink ($tmpof); }
							}
						}
					} else {
						print "<script type=\"text/javascript\">document.getElementById('progress').style.display = \"none\";</script>";
						include('header.php');
						print "Invalid Input/Program/Database Selection!";
						include('footer.php');
						//print "<div class='error'>Invalid Input/Program/Database Selection!</div>";
						if (file_exists($tmpif)) { unlink ($tmpif); }
						if ($outfmt == 16) {
							if (file_exists($tmpxm)) { unlink ($tmpxm); }
						} else {
							if (file_exists($tmpof)) { unlink ($tmpof); }
						}
					}
				}
			} else {
				//print "<div class='error'>Invalid FASTA File Input!</div>";
				require_once('header.php');
				print "Invalid FASTA File Input!";
				require_once('footer.php');
				if (file_exists($tmpif)) { unlink ($tmpif); }
			}
		}
	}
} else {
	require_once('header.php');
	print "Choose Program to Use and Database to Search";
	require_once('footer.php');
}
?>
</body>
</html>
