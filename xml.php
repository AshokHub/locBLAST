<div class="grahic_output">
	<?php
	$file = $tmpxm;

	if (file_exists($file)) {
		$xml = simplexml_load_file($file);
		if (!isset($file)) {
			print "<div class='warning'>Failed to Read File!</div></div></div>\n</body>\n</html>";
			exit;
		} else {
			if (!isset($xml->BlastOutput2->report->Report->results->Results->search->Search)) {
				// !isset($xml->report->Report->results->Results->iterations->Iteration->search->Search) for PSI-BLAST
				print "<div class='warning'>Invalid XML File Format!</div></div></div>\n</body>\n</html>";
				if (file_exists($input)) { unlink ($input); }
				if (file_exists($tmpif)) { unlink ($tmpif); }
				if (file_exists($tmpxm)) { unlink ($tmpxm); }
				if (file_exists($tmpof)) { unlink ($tmpof); }
				exit;
			} else {
				$Report = $xml->BlastOutput2->report->Report;
			}
		}
	} else {
		print "<div class='warning'>File Does Not Exist!</div></div></div>\n</body>\n</html>";
		exit;
	}

	$Parameters = $Report->params->Parameters;
	$Search = $Report->results->Results->search->Search;
	$Hit = $Search->hits->Hit;
	$Statistics = $Search->stat->Statistics;
	$enid = 0;

	$molecule = $moltype;
						
	function fmtprint($length, $query_seq, $query_seq_from, $query_seq_to, $align_seq, $sbjct_seq, $sbjct_seq_from, $sbjct_seq_to, $p_m, $query_frame, $hit_frame) {
		$large = max(array((int)$query_seq_from, (int)$query_seq_to, (int)$sbjct_seq_from, (int)$sbjct_seq_to));
		$large_len = strlen($large);
		$n = (int)($length / 60);
		$r = $length % 60;
		if ($r > 0) $t = $n + 1;
		else $t = $n;
		$j = 0;
		if ($query_frame != 0 && $hit_frame != 0) {
			for ($i = 0; $i < $t; $i++) {
				if ($query_frame > 0) {
					$xn4 = $query_seq_from;
					$xs4 = substr($query_seq, 60*$i, 60);
					$xs4 = preg_replace("/-/", "", $xs4);
					$yn4 = $xn4 + (strlen($xs4) * 3) - 1;
					print "\nQuery  " . str_pad($xn4, $large_len) . "  " . substr($query_seq, 60*$i, 60) . "  " . $yn4;
					$xn4 = $yn4 + 1;
					print "\n       ". str_pad(" ", $large_len) . "  " . substr($align_seq, 60*$i, 60);
				} else {
					$xn = $query_seq_to;
					$xs = substr($query_seq, 60*$i, 60);
					$xs = preg_replace("/-/", "", $xs);
					$yn = $xn - (strlen($xs) * 3) + 1;
					print "\nQuery  " . str_pad($xn, $large_len) . "  " . substr($query_seq, 60*$i, 60) . "  " . $yn;
					$xn = $yn - 1;
					print "\n       ". str_pad(" ", $large_len) . "  " . substr($align_seq, 60*$i, 60);
				}
				if ($hit_frame > 0) {
					$an4 = $sbjct_seq_from;
					$ys4 = substr($sbjct_seq, 60*$i, 60);
					$ys4 = preg_replace("/-/", "", $ys4);
					$bn4 = $an4 + (strlen($ys4) *3) - 1;
					print "\nSbjct  " . str_pad($an4, $large_len) . "  " . substr($sbjct_seq, 60*$i, 60) . "  " . $bn4 . "\n";
					$an4 = $bn4 + 1;
				} else {
					$an = $sbjct_seq_to;
					$ys = substr($sbjct_seq, 60*$i, 60);
					$ys = preg_replace("/-/", "", $ys);
					$bn = $an - (strlen($ys) *3) + 1;
					print "\nSbjct  " . str_pad($an, $large_len) . "  " . substr($sbjct_seq, 60*$i, 60) . "  " . $bn . "\n";
					$an = $bn - 1;
				}
			}
		} elseif ($query_frame != 0 && $hit_frame == 0) {
			if ($query_frame > 0) { $xn1 = $query_seq_from; } else { $xn1 = $query_seq_to; }
			$an1 = $sbjct_seq_from;
			for ($i = 0; $i < $t; $i++) {
				if ($query_frame > 0) {
					$xs1 = substr($query_seq, 60*$i, 60);
					$xs1 = preg_replace("/-/", "", $xs1);
					$yn1 = $xn1 + (strlen($xs1) * 3) - 1;
					print "\nQuery  " . str_pad($xn1, $large_len) . "  " . substr($query_seq, 60*$i, 60) . "  " . $yn1;
					$xn1 = $yn1 + 1;
					print "\n       ". str_pad(" ", $large_len) . "  " . substr($align_seq, 60*$i, 60);
					$ys1 = substr($sbjct_seq, 60*$i, 60);
					$ys1 = preg_replace("/-/", "", $ys1);
					$bn1 = $an1 + strlen($ys1) - 1;
					print "\nSbjct  " . str_pad($an1, $large_len) . "  " . substr($sbjct_seq, 60*$i, 60) . "  " . $bn1 . "\n";
					$an1 = $bn1 + 1;
				} else {
					$xs1 = substr($query_seq, 60*$i, 60);
					$xs1 = preg_replace("/-/", "", $xs1);
					$yn1 = $xn1 - (strlen($xs1) * 3) + 1;
					print "\nQuery  " . str_pad($xn1, $large_len) . "  " . substr($query_seq, 60*$i, 60) . "  " . $yn1;
					$xn1 = $yn1 - 1;
					print "\n       ". str_pad(" ", $large_len) . "  " . substr($align_seq, 60*$i, 60);
					$ys1 = substr($sbjct_seq, 60*$i, 60);
					$ys1 = preg_replace("/-/", "", $ys1);
					$bn1 = $an1 + strlen($ys1) - 1;
					print "\nSbjct  " . str_pad($an1, $large_len) . "  " . substr($sbjct_seq, 60*$i, 60) . "  " . $bn1 . "\n";
					$an1 = $bn1 + 1;
				}
			}
		} elseif ($query_frame == 0 && $hit_frame != 0) {
			if ($hit_frame > 0) { $an3 = $sbjct_seq_from; } else { $an3 = $sbjct_seq_to; }
			$xn3 = $query_seq_from;
			for ($i = 0; $i < $t; $i++) {
				if ($hit_frame > 0) {
					$xs3 = substr($query_seq, 60*$i, 60);
					$xs3 = preg_replace("/-/", "", $xs3);
					$yn3 = $xn3 + strlen($xs3) - 1;
					print "\nQuery  " . str_pad($xn3, $large_len) . "  " . substr($query_seq, 60*$i, 60) . "  " . $yn3;
					$xn3 = $yn3 + 1;
					print "\n       ". str_pad(" ", $large_len) . "  " . substr($align_seq, 60*$i, 60);
					$ys3 = substr($sbjct_seq, 60*$i, 60);
					$ys3 = preg_replace("/-/", "", $ys3);
					$bn3 = $an3 + (strlen($ys3) * 3) - 1;
					print "\nSbjct  " . str_pad($an3, $large_len) . "  " . substr($sbjct_seq, 60*$i, 60) . "  " . $bn3 . "\n";
					$an3 = $bn3 + 1;
				} else {
					$xs3 = substr($query_seq, 60*$i, 60);
					$xs3 = preg_replace("/-/", "", $xs3);
					$yn3 = $xn3 + strlen($xs3) - 1;
					print "\nQuery  " . str_pad($xn3, $large_len) . "  " . substr($query_seq, 60*$i, 60) . "  " . $yn3;
					$xn3 = $yn3 + 1;
					print "\n       ". str_pad(" ", $large_len) . "  " . substr($align_seq, 60*$i, 60);
					$ys3 = substr($sbjct_seq, 60*$i, 60);
					$ys3 = preg_replace("/-/", "", $ys3);
					$bn3 = $an3 - (strlen($ys3) * 3) + 1;
					print "\nSbjct  " . str_pad($an3, $large_len) . "  " . substr($sbjct_seq, 60*$i, 60) . "  " . $bn3 . "\n";
					$an3 = $bn3 - 1;
				}
			}
		} else {
			$xn2 = $query_seq_from;
			$an2 = $sbjct_seq_from;
			for ($i = 0; $i < $t; $i++) {
				$xs2 = substr($query_seq, 60*$i, 60);
				$xs2 = preg_replace("/-/", "", $xs2);
				$yn2 = $xn2 + strlen($xs2) - 1;
				print "\nQuery  " . str_pad($xn2, $large_len) . "  " . substr($query_seq, 60*$i, 60) . "  " . $yn2;
				$xn2 = $yn2 + 1;
				print "\n       ". str_pad(" ", $large_len) . "  " . substr($align_seq, 60*$i, 60);
				$ys2 = substr($sbjct_seq, 60*$i, 60);
				$ys2 = preg_replace("/-/", "", $ys2);
				if ($p_m == "Plus") {
					$bn2 = $an2 + strlen($ys2) - 1;
					print "\nSbjct  " . str_pad($an2, $large_len) . "  " . substr($sbjct_seq, 60*$i, 60) . "  " . $bn2 . "\n";
					$an2 = $bn2 + 1;
				} else {
					$bn2 = $an2 - strlen($ys2) + 1;
					print "\nSbjct  " . str_pad($an2, $large_len) . "  " . substr($sbjct_seq, 60*$i, 60) . "  " . $bn2 . "\n";
					$an2 = $bn2 - 1;
				}
			}
		}
	}

	function seq_split($rawseq) {
		$result = "\\n";
		$y = 60;
		$rawseq = preg_replace("/-/", "", $rawseq);
		$len = strlen($rawseq);
		$qt = (int)($len / $y);
		$rm = $len % $y;
		if ($rm == 0 and $qt > 0) { $qt--; }
		for ($i = 0; $i <= $qt; $i++) {
			if ($rm > 0) {
				if ($i == $qt) {
					$result .=  substr($rawseq, $i * $y, $rm) . "\\n";
				} else {
					$result .=  substr($rawseq, $i * $y, $y) . "\\n";
				}
			} else {
				$result .=  substr($rawseq, $i * $y, $y) . "\\n";
			}
		}
		return $result;
	}

	function annotate($def) {
		$pbn = preg_match_all('/pdb\|\K[^\|]*(?=\|)/', $def, $m0);
		if ($pbn > 0) {
			for ($i0 = 0; $i0 < $pbn; $i0++) {
				$id0[$i0] = $m0[0][$i0];
			}
			$id0 = array_unique($id0);
			$id0 = array_filter($id0);
			$id0 = array_values($id0);
			if (!empty($id0)) {
				$n0 = count($id0);
				for ($i0 = 0; $i0 < $n0; $i0++) {
					$def = preg_replace("/$id0[$i0]/", "<a href=\"http://www.rcsb.org/pdb/explore/explore.do?structureId=$id0[$i0]\" id='ilnk' target='_blank'>". $id0[$i0] . "</a>", $def);
				}
			}
		}
		$pn = preg_match_all('/\|pdb\|\K[^\|]*(?=\|)/', $def, $m);
		if ($pn > 0) {
			for ($i1 = 0; $i1 < $pn; $i1++) {
				$id[$i1] = $m[0][$i1];
			}
			$id = array_unique($id);
			$id = array_filter($id);
			$id = array_values($id);
			if (!empty($id)) {
				$n = count($id);
				for ($i1 = 0; $i1 < $n; $i1++) {
					$def = preg_replace("/$id[$i1]/", "<a href=\"http://www.rcsb.org/pdb/explore/explore.do?structureId=$id[$i1]\" id='ilnk' target='_blank'>". $id[$i1] . "</a>", $def);
				}
			}
		}
		$gn = preg_match_all('/gi\|\K[^\|]*(?=\|)/', $def, $m1);
		if ($gn > 0) {
			for ($i2 = 0; $i2 < $gn; $i2++) {
				$gid[$i2] = $m1[0][$i2];
			}
			$gid = array_unique($gid);
			$gid = array_filter($gid);
			$gid = array_values($gid);
			if (!empty($gid)) {
				$n1 = count($gid);
				for ($i2 = 0; $i2 < $n1; $i2++) {
					$def = preg_replace("/$gid[$i2]/", "<a href=\"https://www.ncbi.nlm.nih.gov/protein/$gid[$i2]\" id='ilnk' target='_blank'>". $gid[$i2] . "</a>", $def);
				}
			}
		}
		$gb = preg_match_all('/gb\|\K[^\|]*(?=\|)/', $def, $m2);
		if ($gb > 0) {
			for ($i3 = 0; $i3 < $gb; $i3++) {
				$gbid[$i3] = $m2[0][$i3];
			}
			$gbid = array_unique($gbid);
			$gbid = array_filter($gbid);
			$gbid = array_values($gbid);
			if (!empty($gbid)) {
				$n2 = count($gbid);
				for ($i3 = 0; $i3 < $n2; $i3++) {
					$def = preg_replace("/$gbid[$i3]/", "<a href=\"https://www.ncbi.nlm.nih.gov/nucleotide/$gbid[$i3]\" id='ilnk' target='_blank'>". $gbid[$i3] . "</a>", $def);
				}
			}
		}
		$rf = preg_match_all('/ref\|\K[^\|]*(?=\|)/', $def, $m3);
		if ($rf > 0) {
			for ($i4 = 0; $i4 < $rf; $i4++) {
				$rfid[$i4] = $m3[0][$i4];
			}
			$rfid = array_unique($rfid);
			$rfid = array_filter($rfid);
			$rfid = array_values($rfid);
			if (!empty($rfid)) {
				$n3 = count($rfid);
				for ($i4 = 0; $i4 < $n3; $i4++) {
					$def = preg_replace("/$rfid[$i4]/", "<a href=\"https://www.ncbi.nlm.nih.gov/nuccore/$rfid[$i4]\" id='ilnk' target='_blank'>". $rfid[$i4] . "</a>", $def);
				}
			}
		}
		$sp = preg_match_all('/sp\|\K[^\|]*(?=\|)/', $def, $m4);
		if ($sp > 0) {
			for ($i5 = 0; $i5 < $sp; $i5++) {
				$spid[$i5] = $m4[0][$i5];
			}
			$spid = array_unique($spid);
			$spid = array_filter($spid);
			$spid = array_values($spid);
			if (!empty($spid)) {
				$n4 = count($spid);
				for ($i5 = 0; $i5 < $n4; $i5++) {
					$def_spid = explode('.', $spid[$i5]);
					$def = preg_replace("/$spid[$i5]/", "<a href=\"http://www.uniprot.org/uniprot/" . array_shift($def_spid) . "\" id='ilnk' target='_blank'>". $spid[$i5] . "</a>", $def);
				}
			}
		}
		$emb = preg_match_all('/emb\|\K[^\|]*(?=\|)/', $def, $m5);
		if ($emb > 0) {
			for ($i6 = 0; $i6 < $emb; $i6++) {
				$embid[$i6] = $m5[0][$i6];
			}
			$embid = array_unique($embid);
			$embid = array_filter($embid);
			$embid = array_values($embid);
			if (!empty($embid)) {
				$n5 = count($embid);
				for ($i6 = 0; $i6 < $n5; $i6++) {
					$def_embid = explode('.', $embid[$i6]);
					$def = preg_replace("/$embid[$i6]/", "<a href=\"https://www.ebi.ac.uk/ena/data/view/" . array_shift($def_embid) . "\" id='ilnk' target='_blank'>". $embid[$i6] . "</a>", $def);
				}
			}
		}
		$dbj = preg_match_all('/dbj\|\K[^\|]*(?=\|)/', $def, $m6);
		global $molecule;
		$dbj_db = $molecule;
		if ($dbj > 0) {
			for ($i7 = 0; $i7 < $dbj; $i7++) {
				$dbjid[$i7] = $m6[0][$i7];
			}
			$dbjid = array_unique($dbjid);
			$dbjid = array_filter($dbjid);
			$dbjid = array_values($dbjid);
			if (!empty($dbjid)) {
				$n6 = count($dbjid);
				for ($i7 = 0; $i7 < $n6; $i7++) {
					$def = preg_replace("/$dbjid[$i7]/", "<a href=\"http://getentry.ddbj.nig.ac.jp/getentry/$dbj_db/$dbjid[$i7]\" id='ilnk' target='_blank'>". $dbjid[$i7] . "</a>", $def);
				}
			}
		}
		return $def;
	}

	function evfmt($Hsp_evalue) {
		$x = (float)sprintf("%.1e", $Hsp_evalue);
		if (preg_match("/e-/i", $x)) {
			$y = explode("E-", $x);
			if ($y[1] < 10) return round($y[0]) . "e-0" . $y[1];
			else return round($y[0]) . "e-" . $y[1];
		} else {
			if (preg_match("/\./", $x)) {
				if ($x * 1000 < 1): return round($x * 10000) . "e-04";
				else: return $x; endif;
			} else
				return $x . ".0";
		}
	}

	function btscre($Hsp_bit_score) {
		if (($Hsp_bit_score < 100) && ($Hsp_bit_score > 10)) {
			return sprintf("%.1f", $Hsp_bit_score);
		} elseif ($Hsp_bit_score < 10) {
			return sprintf("%.2f", $Hsp_bit_score);
		} else {
			return round($Hsp_bit_score);
		}
	}

	function scvr($Hsp_qseq, $query_len) {
		$Hsp_qseq = preg_replace("/-/", "", $Hsp_qseq);
		$Hsp_qseq_n = strlen($Hsp_qseq);
		return (int)(($Hsp_qseq_n/$query_len)*100);
	}

	function color_key($score) {
		if ($score <= 40) {
			return "black";
		} elseif ($score > 40 && $score <= 50) {
			return "blue";
		} elseif ($score > 50 && $score <= 80) {
			return "green";
		} elseif ($score > 80 && $score <= 200) {
			return "purple";
		} elseif ($score > 200) {
			return "red";
		} else {
			return "white";
		}
	}

	function scale($n) {
		$pxls = 500 / $n;
		if ($n <= 50) {
			$nq = (int)($n / 5);
			$nr = $n % 5;
			$x = $nq;
			while ($x <= $n) {
				print "<div class=\"scale\" style=\"margin-left: " . (int)(($pxls*$nq)-2) . "px\"></div>\n";
				$x += $nq;
			}
		} elseif ($n > 50 && $n <= 500) {
			$nq = (int)($n / 10);
			$nr = $n % 10;
			$nqn = $nq * 10;
			$nqnq = (int)($nqn / 5);
			$nrnr = $nqn % 5;
			if ($nqnq % 10 > 0) {
				$nqnqx = (int)($nqnq / 10);
				$new = $nqnqx * 10;
				$newx = $new;
				while ($newx <= $n) {
					print "<div class=\"scale\" style=\"margin-left: " . (int)(($pxls*$new)-2) . "px\"></div>\n";
					$newx += $new;
				}
			} else {
				$new = $nqnq;
				$newx = $new;
				while ($newx <= $n) {
					print "<div class=\"scale\" style=\"margin-left: " . (int)(($pxls*$new)-2) . "px\"></div>\n";
					$newx += $new;
				}
			}
		} elseif ($n > 500 && $n <= 5000) {
			$nq = (int)($n / 10);
			$nr = $n % 10;
			$nqn = $nq * 10;
			$nqnq = (int)($nqn / 5);
			$nrnr = $nqn % 5;
			if ($nqnq % 50 > 0) {
				$nqnqx = (int)($nqnq / 50);
				$new = $nqnqx * 50;
				$newx = $new;
				while ($newx <= $n) {
					print "<div class=\"scale\" style=\"margin-left: " . (int)(($pxls*$new)-2) . "px\"></div>\n";
					$newx += $new;
				}
			} else {
				$new = $nqnq;
				$newx = $new;
				while ($newx <= $n) {
					print "<div class=\"scale\" style=\"margin-left: " . (int)(($pxls*$new)-2) . "px\"></div>\n";
					$newx += $new;
				}
			}
		} else {
			$nq = (int)($n / 5);
			$nr = $n % 5;
			$x = $nq;
			while ($x <= $n) {
				print "<div class=\"scale\" style=\"margin-left: " . (int)(($pxls*$nq)-2) . "px\"></div>\n";
				$x += $nq;
			}
		}
	}

	function unit($n) {
		$pxls = 500 / $n;
		if ($n <= 50) {
			$nq = (int)($n / 5);
			$nr = $n % 5;
			$x = $nq;
			while ($x <= $n) {
				$w = strlen($x);
				print "<div class=\"sdg\" style=\"margin-left: " . (int)(($pxls * ($nq)) - (9 * $w)) . "px; width: " . ($w * 9) . "px;\">" . $x . "</div>";
				$x += $nq;
			}
		} elseif ($n > 50 && $n <= 500) {
			$nq = (int)($n / 10);
			$nr = $n % 10;
			$nqn = $nq * 10;
			$nqnq = (int)($nqn / 5);
			$nrnr = $nqn % 5;
			if ($nqnq % 10 > 0) {
				$nqnqx = (int)($nqnq / 10);
				$new = $nqnqx * 10;
				$newx = $new;
				while ($newx <= $n) {
					$w = strlen($newx);
					print "<div class=\"sdg\" style=\"margin-left: " . (int)(($pxls * ($new)) - (9 * $w)) . "px; width: " . ($w * 9) . "px;\">" . $newx . "</div>";
					$newx += $new;
				}
			} else {
				$new = $nqnq;
				$newx = $new;
				while ($newx <= $n) {
					$w = strlen($newx);
					print "<div class=\"sdg\" style=\"margin-left: " . (int)(($pxls * ($new)) - (9 * $w)) . "px; width: " . ($w * 9) . "px;\">" . $newx . "</div>";
					$newx += $new;
				}
			}
		} elseif ($n > 500 && $n <= 5000) {
			$nq = (int)($n / 10);
			$nr = $n % 10;
			$nqn = $nq * 10;
			$nqnq = (int)($nqn / 5);
			$nrnr = $nqn % 5;
			if ($nqnq % 50 > 0) {
				$nqnqx = (int)($nqnq / 50);
				$new = $nqnqx * 50;
				$newx = $new;
				while ($newx <= $n) {
					$w = strlen($newx);
					print "<div class=\"sdg\" style=\"margin-left: " . (($pxls * ($new)) - (9 * $w)) . "px; width: " . ($w * 9) . "px;\">" . $newx . "</div>";
					$newx += $new;
				}
			} else {
				$new = $nqnq;
				$newx = $new;
				while ($newx <= $n) {
					$w = strlen($newx);
					print "<div class=\"sdg\" style=\"margin-left: " . (($pxls * ($new)) - (9 * $w)) . "px; width: " . ($w * 9) . "px;\">" . $newx . "</div>";
					$newx += $new;
				}
			}
		} else {
			$nq = (int)($n / 5);
			$nr = $n % 5;
			$x = $nq;
			while ($x <= $n) {
				$w = strlen($x);
				print "<div class=\"sdg\" style=\"margin-left: " . (int)(($pxls * ($nq)) - (9 * $w)) . "px; width: " . ($w * 9) . "px;\">" . $x . "</div>";
				$x += $nq;
			}
		}
	}

	function graph($q_ln, $htsn, $ht_acc, $ht_tle, $ht_cnt, $haln_bt_scr, $haln_qfrm, $haln_qto, $haln_qfram) {
		$px_unit = 500 / $q_ln; // Pixel per unit scale
		for ($i = 0; $i < $htsn; $i++) {
			$ii = $i + 1;
			if ($ht_cnt[$i] > 1) {
				$q_range = array();
				$bit_scr = array();
				$hsp_odr = array();
				for ($j = 0; $j < $ht_cnt[$i]; $j++) {
					if (isset($haln_qfram) && !empty($haln_qfram)) {
						if ($haln_qfram[$i][$j] < 0) {
							$q_range["" . $haln_qfrm[$i][$j] . ""] = $haln_qto[$i][$j];
							$bit_scr["" . $haln_qfrm[$i][$j] . ""] = $haln_bt_scr[$i][$j];
							$hsp_odr["" . $haln_qfrm[$i][$j] . ""] = $j + 1;
						} else {
							$q_range["" . $haln_qto[$i][$j] . ""] = $haln_qfrm[$i][$j];
							$bit_scr["" . $haln_qto[$i][$j] . ""] = $haln_bt_scr[$i][$j];
							$hsp_odr["" . $haln_qto[$i][$j] . ""] = $j + 1;
						}
					} else {
						$q_range["" . $haln_qfrm[$i][$j] . ""] = $haln_qto[$i][$j];
						$bit_scr["" . $haln_qfrm[$i][$j] . ""] = $haln_bt_scr[$i][$j];
						$hsp_odr["" . $haln_qfrm[$i][$j] . ""] = $j + 1;
					}
				}
				ksort($q_range);
				ksort($bit_scr);
				ksort($hsp_odr);
				$kxnw = $kxbs = $kxbp = 0;
				foreach ($q_range as $xfr => $xto) {
					$yfr[$kxnw] = $xfr;
					$yto[$kxnw] = $xto;
					$kxnw++;
				}
				foreach ($hsp_odr as $xbp => $ybp) {
					$hspodr[$kxbp] = $ybp;
					$kxbp++;
				}
				foreach ($bit_scr as $xbs => $ybs) {
					$btscr[$kxbs] = $ybs;
					$kxbs++;
				}
				print "<div class=\"leftGr grpos\">";
				if ($yfr[0] == 1) {
					$diff = ($yto[0] - $yfr[0]) + 1;
					$px_ratio = $px_unit * $diff;
					print "<div class=\"" . color_key($btscr[0]) . "\">";
					print "<a title=\"" . $ht_tle[$i] . "\" class=\"graphSeq h4\" href=\"#" . $ii . $hspodr[0] . "\" style=\"width:" . $px_ratio . "px;\"></a>";
					print "</div>";
					for ($k = 1; $k < $ht_cnt[$i]; $k++) {
						$kk = $k + 1;
						if ($yfr[$k] > $yto[$k-1]) {
							if ($yfr[$k] - $yto[$k-1] == 1) {
								print "<div style=\"width:1px;\" class=\"h6 black\"></div>";
								$diff = ($yto[$k] - $yfr[$k]) - 1;
								$px_ratio = $px_unit * $diff;
								print "<div class=\"" . color_key($btscr[$k]) . "\">";
								print "<a title=\"" . $ht_tle[$i] . "\" class=\"graphSeq h4\" href=\"#" . $ii . $hspodr[$k] . "\" style=\"width:" . $px_ratio . "px;\"></a>";
								print "</div>";
							} elseif ($yfr[$k] - $yto[$k-1] == 2) {
								print "<div style=\"width:1px;\" class=\"h6 black\"></div>";
								$diff = ($yto[$k] - $yfr[$k]) - 1;
								$px_ratio = $px_unit * $diff;
								print "<div class=\"" . color_key($btscr[$k]) . "\">";
								print "<a title=\"" . $ht_tle[$i] . "\" class=\"graphSeq h4\" href=\"#" . $ii . $hspodr[$k] . "\" style=\"width:" . $px_ratio . "px;\"></a>";
								print "</div>";
							} elseif ($yfr[$k] - $yto[$k-1] > 2) {
								$diff = ($yfr[$k] - $yto[$k-1]) - 1;
								$px_ratio = $px_unit * $diff;
								print "<div style=\"width:" . $px_ratio . "px;\" class=\"h1 grey\"></div>";
								$diff = ($yto[$k] - $yfr[$k]) + 1;
								$px_ratio = $px_unit * $diff;
								print "<div class=\"" . color_key($btscr[$k]) . "\">";
								print "<a title=\"" . $ht_tle[$i] . "\" class=\"graphSeq h4\" href=\"#" . $ii . $hspodr[$k] . "\" style=\"width:" . $px_ratio . "px;\"></a>";
								print "</div>";
							}
						} elseif ($yfr[$k] == $yto[$k-1]) {
							print "<div style=\"width:1px;\" class=\"h6 black\"></div>";
							$diff = ($yto[$k] - $yfr[$k]) - 1;
							$px_ratio = $px_unit * $diff;
							print "<div class=\"" . color_key($btscr[$k]) . "\">";
							print "<a title=\"" . $ht_tle[$i] . "\" class=\"graphSeq h4\" href=\"#" . $ii . $hspodr[$k] . "\" style=\"width:" . $px_ratio . "px;\"></a>";
							print "</div>";
						} elseif ($yfr[$k] < $yto[$k-1]) {
							if ($yto[$k] < $yto[$k-1]) {
								print "";
							} else {
								print "<div style=\"width:1px;\" class=\"h6 black\"></div>";
								$diff = ($yto[$k] - $yto[$k-1]) - 1;
								$px_ratio = $px_unit * $diff;
								print "<div class=\"" . color_key($btscr[$k]) . "\">";
								print "<a title=\"" . $ht_tle[$i] . "\" class=\"graphSeq h4\" href=\"#" . $ii . $hspodr[$k] . "\" style=\"width:" . $px_ratio . "px;\"></a>";
								print "</div>";
							}
						} else {
							print "";
						}
					}
				} else {
					$px_ratio = $px_unit * ($yfr[0] - 1);
					print "<div style=\"width:" . $px_ratio . "px;\" class=\"h4 white\"></div>";
					$diff = ($yto[0] - $yfr[0]) + 1;
					$px_ratio = $px_unit * $diff;
					print "<div class=\"" . color_key($btscr[0]) . "\">";
					print "<a title=\"" . $ht_tle[$i] . "\" class=\"graphSeq h4\" href=\"#" . $ii . $hspodr[0] . "\" style=\"width:" . $px_ratio . "px;\"></a>";
					print "</div>";
					for ($k = 1; $k < $ht_cnt[$i]; $k++) {
						$kk = $k + 1;
						if ($yfr[$k] > $yto[$k-1]) {
							if ($yfr[$k] - $yto[$k-1] == 1) {
								print "<div style=\"width:1px;\" class=\"h6 black\"></div>";
								$diff = ($yto[$k] - $yfr[$k]) - 1;
								$px_ratio = $px_unit * $diff;
								print "<div class=\"" . color_key($btscr[$k]) . "\">";
								print "<a title=\"" . $ht_tle[$i] . "\" class=\"graphSeq h4\" href=\"#" . $ii . $hspodr[$k] . "\" style=\"width:" . $px_ratio . "px;\"></a>";
								print "</div>";
							} elseif ($yfr[$k] - $yto[$k-1] == 2) {
								print "<div style=\"width:1px;\" class=\"h6 black\"></div>";
								$diff = ($yto[$k] - $yfr[$k]) - 1;
								$px_ratio = $px_unit * $diff;
								print "<div class=\"" . color_key($btscr[$k]) . "\">";
								print "<a title=\"" . $ht_tle[$i] . "\" class=\"graphSeq h4\" href=\"#" . $ii . $hspodr[$k] . "\" style=\"width:" . $px_ratio . "px;\"></a>";
								print "</div>";
							} elseif ($yfr[$k] - $yto[$k-1] > 2) {
								$diff = ($yfr[$k] - $yto[$k-1]) - 1;
								$px_ratio = $px_unit * $diff;
								print "<div style=\"width:" . $px_ratio . "px;\" class=\"h1 grey\"></div>";
								$diff = ($yto[$k] - $yfr[$k]) + 1;
								$px_ratio = $px_unit * $diff;
								print "<div class=\"" . color_key($btscr[$k]) . "\">";
								print "<a title=\"" . $ht_tle[$i] . "\" class=\"graphSeq h4\" href=\"#" . $ii . $hspodr[$k] . "\" style=\"width:" . $px_ratio . "px;\"></a>";
								print "</div>";
							}
						} elseif ($yfr[$k] == $yto[$k-1]) {
							print "<div style=\"width:1px;\" class=\"h6 black\"></div>";
							$diff = ($yto[$k] - $yfr[$k]) - 1;
							$px_ratio = $px_unit * $diff;
							print "<div class=\"" . color_key($btscr[$k]) . "\">";
							print "<a title=\"" . $ht_tle[$i] . "\" class=\"graphSeq h4\" href=\"#" . $ii . $hspodr[$k] . "\" style=\"width:" . $px_ratio . "px;\"></a>";
							print "</div>";
						} elseif ($yfr[$k] < $yto[$k-1]) {
							if ($yto[$k] < $yto[$k-1]) {
								print "";
							} else {
								print "<div style=\"width:1px;\" class=\"h6 black\"></div>";
								$diff = ($yto[$k] - $yto[$k-1]) - 1;
								$px_ratio = $px_unit * $diff;
								print "<div class=\"" . color_key($btscr[$k]) . "\">";
								print "<a title=\"" . $ht_tle[$i] . "\" class=\"graphSeq h4\" href=\"#" . $ii . $hspodr[$k] . "\" style=\"width:" . $px_ratio . "px;\"></a>";
								print "</div>";
							}
						} else {
							print "";
						}
					}
				}
				print "</div>\n\n";
				unset($q_range);
				$q_range = array();
				unset($btscr);
				$btscr = array();
				unset($hspodr);
				$hspodr = array();
			} else {
				print "<div class=\"leftGr grpos\">";
				$diff = ($haln_qto[$i][0] - $haln_qfrm[$i][0]) + 1;
				if ($diff == $q_ln) {
					print "<div class=\"" . color_key($haln_bt_scr[$i][0]) . "\">";
						print "<a title=\"" . $ht_tle[$i] . "\" class=\"graphSeq h4\" href=\"#" . $ii . $ht_cnt[$i] . "\" style=\"width:500px;\"></a>";
					print "</div>";
				} else {
					if ($haln_qfrm[$i][0] == 1) {
						$px_ratio = $px_unit * $diff;
						print "<div class=\"" . color_key($haln_bt_scr[$i][0]) . "\">";
						print "<a title=\"" . $ht_tle[$i] . "\" class=\"graphSeq h4\" href=\"#" . $ii . $ht_cnt[$i] . "\" style=\"width:" . $px_ratio . "px;\"></a>";
						print "</div>";
					} else {
						$px_l = $px_unit * ($haln_qfrm[$i][0] - 1);
						$px_r = $px_unit * $diff;
						print "<div style=\"width:" . $px_l . "px;\" class=\"h4 white\"></div>";
						print "<div class=\"" . color_key($haln_bt_scr[$i][0]) . "\">";
						print "<a title=\"" . $ht_tle[$i] . "\" class=\"graphSeq h4\" href=\"#" . $ii . $ht_cnt[$i] . "\" style=\"width:" . $px_r . "px;\"></a>";
						print "</div>";
					}
				}
				print "</div>\n\n";
			}
		}
	}
	?>

	<p>
		<div class="section">
		<table id="definition" align="center">
			<tbody>
				<caption><h3>Search Parameters</h3></caption>
				<tr><td>Program</td><td><?php print $Report->program; ?></td></tr>
				<tr><td>Version</td><td><?php print $Report->version; ?></td></tr>
				<tr><td>Reference</td><td><?php print $Report->reference; ?></td></tr>
				<tr><td>Database</td><td><?php print $Report->{'search-target'}->Target->db; ?></td></tr>
				<tr><td>Query ID</td><td><?php print $Search->{'query-id'}; ?></td></tr>
				<tr><td>Definition</td><td><?php print $Search->{'query-title'}; ?></td></tr>
				<tr><td>Length</td><td><?php print $Search->{'query-len'}; ?></td></tr>
				<?php
				if (isset($Parameters->matrix)) {?>
					<tr><td>Matrix</td><td><?php print $Parameters->matrix; ?></td></tr><?php 
				}?>
				<tr><td>E-value</td><td><?php print $Parameters->expect; ?></td></tr>
				<?php
				if (isset($Parameters->{'gap-open'})) {?>
					<tr><td>Gap&nbsp;Open</td><td><?php print $Parameters->{'gap-open'}; ?></td></tr>
					<?php 
				}
				if (isset($Parameters->{'gap-extend'})) {?>
					<tr><td>Gap&nbsp;Extend</td><td><?php print $Parameters->{'gap-extend'}; ?></td></tr>
					<?php 
				}
				if (isset($Parameters->{'query-gencode'})) {?>
					<tr><td>Query&nbsp;Genetic&nbsp;Code</td><td><?php print $Parameters->{'query-gencode'}; ?></td></tr>
					<?php 
				}
				if (isset($Parameters->{'db-gencode'})) {?>
					<tr><td>Database&nbsp;Genetic&nbsp;Code</td><td><?php print $Parameters->{'db-gencode'}; ?></td></tr>
					<?php 
				}?>
				<tr><td>Filter</td><td><?php print $Parameters->filter; ?></td></tr>
				<?php
				if (isset($Parameters->cbs)) {?>
					<tr><td>Composition&minus;based&nbsp;Statistics</td><td><?php print $Parameters->cbs; ?></td></tr><?php 
				}?>
			</tbody>
		</table>
		</div>
	</p>


	<?php
	$total_hsp = 0;
	foreach ($Hit as $ght) {
		$htn = $ght->num;
		foreach($ght->hsps->Hsp as $ialn) {
			$total_hsp++;
		}
	}
	if (isset($htn)) {
		$htsn = $htn;
	?>
	<p>
		<div class="section">
			<div id="graphic">
				<h3>Distribution of the top <?php print $total_hsp; ?> Blast Hits on <?php print $htn; ?> subject sequences</h3>
				<div id="grapArea">
					<div id="grBlastHits">
						<div id="df">Mouse over to see the title, click to show alignments</div>

						<div id="clkey">
							<div class="clKeyTl"> Color key for alignment scores</div>

							<div class="leftGr masterLen">
								<div class="clkey"><span class="black ck"></span><span class="cl">&lt;40</span></div>
								<div class="clkey"><span class="blue ck"></span><span class="cl">40-50</span></div>
								<div class="clkey"><span class="green ck"></span><span class="cl">50-80</span></div>
								<div class="clkey"><span class="purple ck"></span><span class="cl">80-200</span></div>
								<div class="clkey"><span class="red ck"></span><span class="cl">&gt;=200</span></div>
							</div>

							<div class="grQuery leftGr masterLen"><span>Query</span></div>
							
							<div class="leftGr grpos">
								<div class="scale" style="margin-left:0px"></div>
								<?php scale($Search->{'query-len'}); ?>
							</div>

							<div class="leftGr grpos">
								<div class="sdg" style="margin-left: 0px; width: 10px;">1</div>
								<?php unit($Search->{'query-len'}); ?>
							</div>

							<?php
							$total_hsp = 0;
							foreach ($Hit as $ght) {
								$htn = $ght->num;
								$ht_acc[$htn-1] = $ght->description->HitDescr->accession;
								$ht_tle[$htn-1] = $ght->description->HitDescr->title;
								foreach($ght->hsps->Hsp as $ialn) {
									$hspn = $ialn->num;
									$haln_bt_scr[$htn-1][$hspn-1] = $ialn->{'bit-score'};
									$haln_qfrm[$htn-1][$hspn-1] = $ialn->{'query-from'};
									$haln_qto[$htn-1][$hspn-1] = $ialn->{'query-to'};
									if (isset($ialn->{'query-frame'}) && !empty($ialn->{'query-frame'})) {
										$haln_qfram[$htn-1][$hspn-1] = $ialn->{'query-frame'};
									}
									$total_hsp++;
								}
								$ht_cnt[$htn-1] = $hspn;
							}
							$htsn = $htn;
							if (!isset($haln_qfram) || empty($haln_qfram)) {
								$haln_qfram = array();
							}
							graph($Search->{'query-len'}, $htsn, $ht_acc, $ht_tle, $ht_cnt, $haln_bt_scr, $haln_qfrm, $haln_qto, $haln_qfram);
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</p>
		
	<p>
		<div class="section">
		<div class="caption">Sequences producing significant alignments:</div>
		<table id="hlist" align="center">
			<tbody>
				<tr>
					<th>Sequence Description</th>
					<th>Total<br/>score</th>
					<th>Query<br/>cover</th>
					<th>E<br/>Value</th>
					<th>Ident</th>
					<th>Accession</th>
				</tr>
		<?php
		foreach ($Hit as $ht) {
			$Hit_def = $ht->description->HitDescr->title;
			$Hit_accession = $ht->description->HitDescr->accession;
			$Hsp_bit_score = $ht->hsps->Hsp->{'bit-score'};
			$Hsp_evalue = $ht->hsps->Hsp->evalue;
			$Hsp_identity = $ht->hsps->Hsp->identity;
			$Hsp_align_len = $ht->hsps->Hsp->{'align-len'};
			$Hit_len = $ht->len;
			$query_len = $Search->{'query-len'};
			$Hsp_qseq = $ht->hsps->Hsp->qseq;
			?>
				<tr>
					<td id="dsphide"><?php print "<a title='Go to alignment for " . $Hit_def . "' href='#" . $Hit_accession . "' id='ilnk'>" . $Hit_def . "</a>"; ?></td>
					<td id="tscr"><?php print btscre($Hsp_bit_score); ?></td>
					<td id="qcvr"><?php print scvr($Hsp_qseq, $query_len); ?>%</td>
					<td id="evfix"><?php print evfmt($Hsp_evalue); ?></td>
					<td id="idp"><?php print round(($Hsp_identity/$Hsp_align_len)*100); ?>%</td>
					<td align="center">
					<?php
					if (in_array($datalib, $online_db)) {
						print "<a href='https://www.ncbi.nlm.nih.gov/"; if ($molecule == "aa") { print "protein"; } else { print "nucleotide"; } print "/" . $Hit_accession . "' id='ilnk'>" . $Hit_accession . "</a>";
					} else {
						print $Hit_accession;
					}
					?>
					</td>
				</tr>
		<?php
		}
		?>
			</tbody>
		</table>
		</div>
	</p>
		
	<?php
	foreach ($Hit as $ht) {
		$Hit_num = $ht->num;
		$Hit_accession = $ht->description->HitDescr->accession;
		$Hit_def = $ht->description->HitDescr->title;
		$Hit_len = $ht->len;
		foreach($ht->hsps->Hsp as $ialgn) {
			$Hsp_num = $ialgn->num;
			$Hsp_bit_score = $ialgn->{'bit-score'};
			$Hsp_score = $ialgn->score;
			$Hsp_evalue = $ialgn->evalue;
			$Hsp_query_from = $ialgn->{'query-from'};
			$Hsp_query_to = $ialgn->{'query-to'};
			$Hsp_hit_from = $ialgn->{'hit-from'};
			$Hsp_hit_to = $ialgn->{'hit-to'};
			
			$Hsp_query_frame = $ialgn->{'query-frame'};
			$Hsp_hit_frame = $ialgn->{'hit-frame'};
			
			$Hsp_query_strand = $ialgn->{'query-strand'};
			$Hsp_hit_strand = $ialgn->{'hit-strand'};
			$Hsp_identity = $ialgn->identity;
			$Hsp_positive = $ialgn->positive;
			$Hsp_gaps = $ialgn->gaps;
			$Hsp_align_len = $ialgn->{'align-len'};
			$Hsp_qseq = $ialgn->qseq;
			$Hsp_midline = $ialgn->midline;
			$Hsp_hseq = $ialgn->hseq;
			if (isset($ialgn->{'hit-strand'})) {
				$plus_minus = $Hsp_hit_strand;
			} else {
				$plus_minus = "Plus";
			}
			?>
			<p>
				<div class="section">
				<table id="hits" align="center">
					<tbody>
						<tr><th><?php print "Alignment ( Hit Number: " . $Hit_num . ", Accession Number: <span id='" . $Hit_accession . "'>" . $Hit_accession; ?></span>, <?php print "<span id='" . $Hit_num . $Hsp_num . "'>Range " . $Hsp_num . "</span>: " . min((int)$Hsp_hit_from, (int)$Hsp_hit_to) . " to " . max((int)$Hsp_hit_from, (int)$Hsp_hit_to) . " )"; ?></th></tr>
						<tr><td>
						<?php
						$i = 0;
						foreach ($ht->description->HitDescr as $htdsc) {
							//print $htdsc->id . " " . $htdsc->title . "<br>";
							$hdscs[$i][0] = $htdsc->id;
							$hdscs[$i][1] = $htdsc->title;
							$i++;
						}
						$j = $i;
						print annotate($hdscs[0][0]) . " " . $hdscs[0][1] . "<br>";
						if ($j > 1) {
							print "<div id='lshow". $enid . "'><a id='rilnk' href='javascript:void(0)' onclick=\"document.getElementById('alns". $enid . "').style.display = 'block'; document.getElementById('lhide". $enid . "').style.display = 'block'; document.getElementById('lshow". $enid . "').style.display = 'none';\">See " . ($j-1) . " more title(s)</a></div>";
							print "<div style='display: none;' id='lhide". $enid . "'><a id='rilnk' href='javascript:void(0)' onclick=\"document.getElementById('alns". $enid . "').style.display = 'none'; document.getElementById('lshow". $enid . "').style.display = 'block'; document.getElementById('lhide". $enid . "').style.display = 'none';\">Hide " . ($j-1) . " title(s) below</a></div>";
							print "<div id='alns". $enid . "' style='display: none;'>";
							for ($k = 1; $k <$j; $k++) {
								print annotate($hdscs[$k][0]) . " " . $hdscs[$k][1] . "<br>";
							}
							print "</div>";
							$enid++;
						}
						//$sdef = def_split($Hit_id, $Hit_def); print annotate($sdef); 
						?>
						</td></tr>
						<tr><td><a href='javascript:void(0)' id="dwn-fas" onclick="download_fasta('<?php print $Report->{'search-target'}->Target->db . "', '" . $hdscs[0][0] . "', '" . $Hit_accession . "', '" . $Hit_def . "', '" . $Hsp_hit_from . "', '" . $Hsp_hit_to . "', '" . seq_split($Hsp_hseq); ?>'); return false;" title="Save to Disk"><img src='data:image/png;base64,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' style="float:left; padding:0 5px 0 3px;"></a><?php print "<b>Length</b> = ". $Hit_len . ", <b>Score</b> =  " . btscre($Hsp_bit_score) . " bits (" . $Hsp_score . "), <b>Expect</b> = " . evfmt($Hsp_evalue) . ",";
						if (isset($ialgn->{'query-frame'}) && isset($ialgn->{'hit-frame'})) {
							print " <b>Frame</b> = ";
							if ($Hsp_query_frame > 0) {
								print "+" . $Hsp_query_frame;
							} else {
								print $Hsp_query_frame;
							}
							if ($Hsp_hit_frame > 0) {
								print "/+" . $Hsp_hit_frame;
							} else {
								print "/" . $Hsp_hit_frame;
							}
						}
						
						if (!isset($ialgn->{'query-frame'}) && !isset($ialgn->{'hit-frame'})) {
							$Hsp_query_frame = 0;
							$Hsp_hit_frame = 0;
						}
						
						if (isset($ialgn->{'query-frame'}) && !isset($ialgn->{'hit-frame'})) {
							print " <b>Frame</b> = ";
							if ($Hsp_query_frame > 0) {
								print "+" . $Hsp_query_frame;
							} else {
								print $Hsp_query_frame;
							}
							$Hsp_hit_frame = 0;
						}
						
						if (!isset($ialgn->{'query-frame'}) && isset($ialgn->{'hit-frame'})) {
							print " <b>Frame</b> = ";
							if ($Hsp_hit_frame > 0) {
								print "+" . $Hsp_hit_frame;
							} else {
								print "" . $Hsp_hit_frame;
							}
							$Hsp_query_frame = 0;
						}
						print "<br><b>Identities</b> = " . $Hsp_identity . "/" . $Hsp_align_len . " (" . round(($Hsp_identity/$Hsp_align_len)*100) . "%), ";
						if (isset($ialgn->positive)) {
							print "<b>Positives</b> = " . $Hsp_positive . "/" . $Hsp_align_len . " (" . round(($Hsp_positive/$Hsp_align_len)*100) . "%), "; 
						}
						print "<b>Gaps</b> = ". $Hsp_gaps . "/" . $Hsp_align_len . " (" . round(($Hsp_gaps/$Hsp_align_len)*100) . "%)";
						if (isset($ialgn->{'query-strand'})) {
							print ", <b>Strand</b> = " . $Hsp_query_strand . "/" . $Hsp_hit_strand; 
						}
						?></td></tr>
						<tr><td><pre id="algfmt"><?php fmtprint($Hsp_align_len, $Hsp_qseq, $Hsp_query_from, $Hsp_query_to, $Hsp_midline, $Hsp_hseq, $Hsp_hit_from, $Hsp_hit_to, $plus_minus, $Hsp_query_frame, $Hsp_hit_frame); ?></pre></td></tr>
					</tbody>
				</table>
				</div>
			</p>
			<?php
			}
		}
	} else {
		print "<p><div class=\"section\"><center><h1 style=\"color: red;\">No Similar Sequences Found!</h1></center></div></p>";
	}
	?>
	<p>
		<div class="section">
			<table id="statistics" align="center">
				<tbody>
					<caption><h3>Karlin-Altschul Statistics</h3></caption>
					<tr><td>Number of Sequences</td><td><?php print $Statistics->{'db-num'}; ?></td></tr>
					<tr><td>Length of database</td><td><?php print $Statistics->{'db-len'}; ?></td></tr>
					<tr><td>Length adjustment</td><td><?php print $Statistics->{'hsp-len'}; ?></td></tr>
					<tr><td>Effective search space</td><td><?php print $Statistics->{'eff-space'}; ?></td></tr>
					<tr><td>Kappa (&kappa;)</td><td><?php print $Statistics->{'kappa'}; ?></td></tr>
					<tr><td>Lambda (&lambda;)</td><td><?php print $Statistics->{'lambda'}; ?></td></tr>
					<tr><td>Entropy (H)</td><td><?php print $Statistics->{'entropy'}; ?></td></tr>
				</tbody>
			</table>
		</div>
	</p>
</div>
