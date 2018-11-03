<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>locBLAST - Local NCBI BLAST+ Search</title>
	<link href="style.css" rel="stylesheet" type="text/css" />
</head>
<body>
	<div class="output">
		<h2 style="text-align: center;"><i style="font-size: medium">loc</i><span style="color:blue; font-size: large">BLAST</span> - <span style="font-size: large;">local NCBI BLAST</span></h2>
		<hr class="heffect" />
		<div style="font: 90%/1.5 arial, tahoma, verdana, sans-serif;">
			<a href="index.php" title="Go Back to Home"><div style="padding: 0 5px 0 0;" id="back"></div></a>
			<h4 style="text-align:center; color:blue" id="top">Advanced BLAST Search Options</h4>
			<ol>
				<li><a href="#blastn">BlastN - Commandline Parameters</a></li>
				<li><a href="#blastp">BlastP - Commandline Parameters</a></li>
				<li><a href="#blastx">BlastX - Commandline Parameters</a></li>
				<li><a href="#tblastn">tBlastN - Commandline Parameters</a></li>
				<li><a href="#tblastx">tBlastX - Commandline Parameters</a></li>
				<li><a href="#deltablast">DeltaBlast - Commandline Parameters</a></li>
				<li><a href="#psiblast">PSI-Blast - Commandline Parameters</a></li>
				<li><a href="#rpsblast">RPS-Blast - Commandline Parameters</a></li>
				<li><a href="#rpstblastn">RPS-tBlastn - Commandline Parameters</a></li>
			</ol>
			<hr style="background-image: linear-gradient(to right, white, blue, white); color: blue; height: 1px; border: 0;"/>
			<h4 style="text-align:center; color:blue;" id="blastn">BlastN - Commandline Parameters</h4>
			<div style="padding: 0 15px 0 15px;">
				blastn&nbsp;[<b>&#8209;h</b>]&nbsp;[<b>&#8209;help</b>]<br/>
				[<b>&#8209;import_search_strategy</b>&nbsp;filename]<br/>
				[<b>&#8209;export_search_strategy</b>&nbsp;filename]<br/>
				[<b>&#8209;task</b>&nbsp;task_name]<br/>
				[<b>&#8209;db</b>&nbsp;database_name]<br/>
				[<b>&#8209;dbsize</b>&nbsp;num_letters]<br/>
				[<b>&#8209;gilist</b>&nbsp;filename]<br/>
				[<b>&#8209;seqidlist</b>&nbsp;filename]<br/>
				[<b>&#8209;negative_gilist</b>&nbsp;filename]<br/>
				[<b>&#8209;entrez_query</b>&nbsp;entrez_query]<br/>
				[<b>&#8209;db_soft_mask</b>&nbsp;filtering_algorithm]<br/>
				[<b>&#8209;db_hard_mask</b>&nbsp;filtering_algorithm]<br/>
				[<b>&#8209;subject</b>&nbsp;subject_input_file]<br/>
				[<b>&#8209;subject_loc</b>&nbsp;range]<br/>
				[<b>&#8209;query</b>&nbsp;input_file]<br/>
				[<b>&#8209;out</b>&nbsp;output_file]<br/>
				[<b>&#8209;evalue</b>&nbsp;evalue]<br/>
				[<b>&#8209;word_size</b>&nbsp;int_value]<br/>
				[<b>&#8209;gapopen</b>&nbsp;open_penalty]<br/>
				[<b>&#8209;gapextend</b>&nbsp;extend_penalty]<br/>
				[<b>&#8209;perc_identity</b>&nbsp;float_value]<br/>
				[<b>&#8209;qcov_hsp_perc</b>&nbsp;float_value]<br/>
				[<b>&#8209;max_hsps</b>&nbsp;int_value]<br/>
				[<b>&#8209;xdrop_ungap</b>&nbsp;float_value]<br/>
				[<b>&#8209;xdrop_gap</b>&nbsp;float_value]<br/>
				[<b>&#8209;xdrop_gap_final</b>&nbsp;float_value]<br/>
				[<b>&#8209;searchsp</b>&nbsp;int_value]<br/>
				[<b>&#8209;sum_stats</b>&nbsp;bool_value]<br/>
				[<b>&#8209;penalty</b>&nbsp;penalty]<br/>
				[<b>&#8209;reward</b>&nbsp;reward]<br/>
				[<b>&#8209;no_greedy</b>]<br/>
				[<b>&#8209;min_raw_gapped_score</b>&nbsp;int_value]<br/>
				[<b>&#8209;template_type</b>&nbsp;type]<br/>
				[<b>&#8209;template_length</b>&nbsp;int_value]<br/>
				[<b>&#8209;dust</b>&nbsp;DUST_options]<br/>
				[<b>&#8209;filtering_db</b>&nbsp;filtering_database]<br/>
				[<b>&#8209;window_masker_taxid</b>&nbsp;window_masker_taxid]<br/>
				[<b>&#8209;window_masker_db</b>&nbsp;window_masker_db]<br/>
				[<b>&#8209;soft_masking</b>&nbsp;soft_masking]<br/>
				[<b>&#8209;ungapped</b>]<br/>
				[<b>&#8209;culling_limit</b>&nbsp;int_value]<br/>
				[<b>&#8209;best_hit_overhang</b>&nbsp;float_value]<br/>
				[<b>&#8209;best_hit_score_edge</b>&nbsp;float_value]<br/>
				[<b>&#8209;window_size</b>&nbsp;int_value]<br/>
				[<b>&#8209;off_diagonal_range</b>&nbsp;int_value]<br/>
				[<b>&#8209;use_index</b>&nbsp;boolean]<br/>
				[<b>&#8209;index_name</b>&nbsp;string]<br/>
				[<b>&#8209;lcase_masking</b>]<br/>
				[<b>&#8209;query_loc</b>&nbsp;range]<br/>
				[<b>&#8209;strand</b>&nbsp;strand]<br/>
				[<b>&#8209;parse_deflines</b>]<br/>
				[<b>&#8209;outfmt</b>&nbsp;format]<br/>
				[<b>&#8209;show_gis</b>]<br/>
				[<b>&#8209;num_descriptions</b>&nbsp;int_value]<br/>
				[<b>&#8209;num_alignments</b>&nbsp;int_value]<br/>
				[<b>&#8209;line_length</b>&nbsp;line_length]<br/>
				[<b>&#8209;html</b>]<br/>
				[<b>&#8209;max_target_seqs</b>&nbsp;num_sequences]<br/>
				[<b>&#8209;num_threads</b>&nbsp;int_value]<br/>
				[<b>&#8209;remote</b>]<br/>
				[<b>&#8209;version</b>]<span style="float:right"><a href="#top">TOP</a></span>
			</div>
			<hr style="background-image: linear-gradient(to right, white, blue, white); color: blue; height: 1px; border: 0;"/>
			<h4 style="text-align:center; color:blue;" id="blastp">BlastP - Commandline Parameters</h4>
			<div style="padding: 0 15px 0 15px;">
				blastp&nbsp;[<b>&#8209;h</b>]&nbsp;[<b>&#8209;help</b>]<br/>
				[<b>&#8209;import_search_strategy</b>&nbsp;filename]<br/>
				[<b>&#8209;export_search_strategy</b>&nbsp;filename]<br/>
				[<b>&#8209;task</b>&nbsp;task_name]<br/>
				[<b>&#8209;db</b>&nbsp;database_name]<br/>
				[<b>&#8209;dbsize</b>&nbsp;num_letters]<br/>
				[<b>&#8209;gilist</b>&nbsp;filename]<br/>
				[<b>&#8209;seqidlist</b>&nbsp;filename]<br/>
				[<b>&#8209;negative_gilist</b>&nbsp;filename]<br/>
				[<b>&#8209;entrez_query</b>&nbsp;entrez_query]<br/>
				[<b>&#8209;db_soft_mask</b>&nbsp;filtering_algorithm]<br/>
				[<b>&#8209;db_hard_mask</b>&nbsp;filtering_algorithm]<br/>
				[<b>&#8209;subject</b>&nbsp;subject_input_file]<br/>
				[<b>&#8209;subject_loc</b>&nbsp;range]<br/>
				[<b>&#8209;query</b>&nbsp;input_file]<br/>
				[<b>&#8209;out</b>&nbsp;output_file]<br/>
				[<b>&#8209;evalue</b>&nbsp;evalue]<br/>
				[<b>&#8209;word_size</b>&nbsp;int_value]<br/>
				[<b>&#8209;gapopen</b>&nbsp;open_penalty]<br/>
				[<b>&#8209;gapextend</b>&nbsp;extend_penalty]<br/>
				[<b>&#8209;qcov_hsp_perc</b>&nbsp;float_value]<br/>
				[<b>&#8209;max_hsps</b>&nbsp;int_value]<br/>
				[<b>&#8209;xdrop_ungap</b>&nbsp;float_value]<br/>
				[<b>&#8209;xdrop_gap</b>&nbsp;float_value]<br/>
				[<b>&#8209;xdrop_gap_final</b>&nbsp;float_value]<br/>
				[<b>&#8209;searchsp</b>&nbsp;int_value]<br/>
				[<b>&#8209;sum_stats</b>&nbsp;bool_value]<br/>
				[<b>&#8209;seg</b>&nbsp;SEG_options]<br/>
				[<b>&#8209;soft_masking</b>&nbsp;soft_masking]<br/>
				[<b>&#8209;matrix</b>&nbsp;matrix_name]<br/>
				[<b>&#8209;threshold</b>&nbsp;float_value]<br/>
				[<b>&#8209;culling_limit</b>&nbsp;int_value]<br/>
				[<b>&#8209;best_hit_overhang</b>&nbsp;float_value]<br/>
				[<b>&#8209;best_hit_score_edge</b>&nbsp;float_value]<br/>
				[<b>&#8209;window_size</b>&nbsp;int_value]<br/>
				[<b>&#8209;lcase_masking</b>]<br/>
				[<b>&#8209;query_loc</b>&nbsp;range]<br/>
				[<b>&#8209;parse_deflines</b>]<br/>
				[<b>&#8209;outfmt</b>&nbsp;format]<br/>
				[<b>&#8209;show_gis</b>]<br/>
				[<b>&#8209;num_descriptions</b>&nbsp;int_value]<br/>
				[<b>&#8209;num_alignments</b>&nbsp;int_value]<br/>
				[<b>&#8209;line_length</b>&nbsp;line_length]<br/>
				[<b>&#8209;html</b>]<br/>
				[<b>&#8209;max_target_seqs</b>&nbsp;num_sequences]<br/>
				[<b>&#8209;num_threads</b>&nbsp;int_value]<br/>
				[<b>&#8209;ungapped</b>]<br/>
				[<b>&#8209;remote</b>]<br/>
				[<b>&#8209;comp_based_stats</b>&nbsp;compo]<br/>
				[<b>&#8209;use_sw_tback</b>]<br/>
				[<b>&#8209;version</b>]<span style="float:right"><a href="#top">TOP</a></span>
			</div>
			<hr style="background-image: linear-gradient(to right, white, blue, white); color: blue; height: 1px; border: 0;"/>
			<h4 style="text-align:center; color:blue;" id="blastx">BlastX - Commandline Parameters</h4>
			<div style="padding: 0 15px 0 15px;">
				blastx&nbsp;[<b>&#8209;h</b>]&nbsp;[<b>&#8209;help</b>]<br/>
				[<b>&#8209;import_search_strategy</b>&nbsp;filename]<br/>
				[<b>&#8209;export_search_strategy</b>&nbsp;filename]<br/>
				[<b>&#8209;task</b>&nbsp;task_name]<br/>
				[<b>&#8209;db</b>&nbsp;database_name]<br/>
				[<b>&#8209;dbsize</b>&nbsp;num_letters]<br/>
				[<b>&#8209;gilist</b>&nbsp;filename]<br/>
				[<b>&#8209;seqidlist</b>&nbsp;filename]<br/>
				[<b>&#8209;negative_gilist</b>&nbsp;filename]<br/>
				[<b>&#8209;entrez_query</b>&nbsp;entrez_query]<br/>
				[<b>&#8209;db_soft_mask</b>&nbsp;filtering_algorithm]<br/>
				[<b>&#8209;db_hard_mask</b>&nbsp;filtering_algorithm]<br/>
				[<b>&#8209;subject</b>&nbsp;subject_input_file]<br/>
				[<b>&#8209;subject_loc</b>&nbsp;range]<br/>
				[<b>&#8209;query</b>&nbsp;input_file]<br/>
				[<b>&#8209;out</b>&nbsp;output_file]<br/>
				[<b>&#8209;evalue</b>&nbsp;evalue]<br/>
				[<b>&#8209;word_size</b>&nbsp;int_value]<br/>
				[<b>&#8209;gapopen</b>&nbsp;open_penalty]<br/>
				[<b>&#8209;gapextend</b>&nbsp;extend_penalty]<br/>
				[<b>&#8209;qcov_hsp_perc</b>&nbsp;float_value]<br/>
				[<b>&#8209;max_hsps</b>&nbsp;int_value]<br/>
				[<b>&#8209;xdrop_ungap</b>&nbsp;float_value]<br/>
				[<b>&#8209;xdrop_gap</b>&nbsp;float_value]<br/>
				[<b>&#8209;xdrop_gap_final</b>&nbsp;float_value]<br/>
				[<b>&#8209;searchsp</b>&nbsp;int_value]<br/>
				[<b>&#8209;sum_stats</b>&nbsp;bool_value]<br/>
				[<b>&#8209;max_intron_length</b>&nbsp;length]<br/>
				[<b>&#8209;seg</b>&nbsp;SEG_options]<br/>
				[<b>&#8209;soft_masking</b>&nbsp;soft_masking]<br/>
				[<b>&#8209;matrix</b>&nbsp;matrix_name]<br/>
				[<b>&#8209;threshold</b>&nbsp;float_value]<br/>
				[<b>&#8209;culling_limit</b>&nbsp;int_value]<br/>
				[<b>&#8209;best_hit_overhang</b>&nbsp;float_value]<br/>
				[<b>&#8209;best_hit_score_edge</b>&nbsp;float_value]<br/>
				[<b>&#8209;window_size</b>&nbsp;int_value]<br/>
				[<b>&#8209;ungapped</b>]<br/>
				[<b>&#8209;lcase_masking</b>]<br/>
				[<b>&#8209;query_loc</b>&nbsp;range]<br/>
				[<b>&#8209;strand</b>&nbsp;strand]<br/>
				[<b>&#8209;parse_deflines</b>]<br/>
				[<b>&#8209;query_gencode</b>&nbsp;int_value]<br/>
				[<b>&#8209;outfmt</b>&nbsp;format]<br/>
				[<b>&#8209;show_gis</b>]<br/>
				[<b>&#8209;num_descriptions</b>&nbsp;int_value]<br/>
				[<b>&#8209;num_alignments</b>&nbsp;int_value]<br/>
				[<b>&#8209;line_length</b>&nbsp;line_length]<br/>
				[<b>&#8209;html</b>]<br/>
				[<b>&#8209;max_target_seqs</b>&nbsp;num_sequences]<br/>
				[<b>&#8209;num_threads</b>&nbsp;int_value]<br/>
				[<b>&#8209;remote</b>]<br/>
				[<b>&#8209;comp_based_stats</b>&nbsp;compo]<br/>
				[<b>&#8209;use_sw_tback</b>]<br/>
				[<b>&#8209;version</b>]<span style="float:right"><a href="#top">TOP</a></span>
			</div>
			<hr style="background-image: linear-gradient(to right, white, blue, white); color: blue; height: 1px; border: 0;"/>
			<h4 style="text-align:center; color:blue;" id="tblastn">tBlastN - Commandline Parameters</h4>
			<div style="padding: 0 15px 0 15px;">
				tblastn&nbsp;[<b>&#8209;h</b>]&nbsp;[<b>&#8209;help</b>]<br/>
				[<b>&#8209;import_search_strategy</b>&nbsp;filename]<br/>
				[<b>&#8209;export_search_strategy</b>&nbsp;filename]<br/>
				[<b>&#8209;task</b>&nbsp;task_name]<br/>
				[<b>&#8209;db</b>&nbsp;database_name]<br/>
				[<b>&#8209;dbsize</b>&nbsp;num_letters]<br/>
				[<b>&#8209;gilist</b>&nbsp;filename]<br/>
				[<b>&#8209;seqidlist</b>&nbsp;filename]<br/>
				[<b>&#8209;negative_gilist</b>&nbsp;filename]<br/>
				[<b>&#8209;entrez_query</b>&nbsp;entrez_query]<br/>
				[<b>&#8209;db_soft_mask</b>&nbsp;filtering_algorithm]<br/>
				[<b>&#8209;db_hard_mask</b>&nbsp;filtering_algorithm]<br/>
				[<b>&#8209;subject</b>&nbsp;subject_input_file]<br/>
				[<b>&#8209;subject_loc</b>&nbsp;range]<br/>
				[<b>&#8209;query</b>&nbsp;input_file]<br/>
				[<b>&#8209;out</b>&nbsp;output_file]<br/>
				[<b>&#8209;evalue</b>&nbsp;evalue]<br/>
				[<b>&#8209;word_size</b>&nbsp;int_value]<br/>
				[<b>&#8209;gapopen</b>&nbsp;open_penalty]<br/>
				[<b>&#8209;gapextend</b>&nbsp;extend_penalty]<br/>
				[<b>&#8209;qcov_hsp_perc</b>&nbsp;float_value]<br/>
				[<b>&#8209;max_hsps</b>&nbsp;int_value]<br/>
				[<b>&#8209;xdrop_ungap</b>&nbsp;float_value]<br/>
				[<b>&#8209;xdrop_gap</b>&nbsp;float_value]<br/>
				[<b>&#8209;xdrop_gap_final</b>&nbsp;float_value]<br/>
				[<b>&#8209;searchsp</b>&nbsp;int_value]<br/>
				[<b>&#8209;sum_stats</b>&nbsp;bool_value]<br/>
				[<b>&#8209;db_gencode</b>&nbsp;int_value]<br/>
				[<b>&#8209;ungapped</b>]<br/>
				[<b>&#8209;max_intron_length</b>&nbsp;length]<br/>
				[<b>&#8209;seg</b>&nbsp;SEG_options]<br/>
				[<b>&#8209;soft_masking</b>&nbsp;soft_masking]<br/>
				[<b>&#8209;matrix</b>&nbsp;matrix_name]<br/>
				[<b>&#8209;threshold</b>&nbsp;float_value]<br/>
				[<b>&#8209;culling_limit</b>&nbsp;int_value]<br/>
				[<b>&#8209;best_hit_overhang</b>&nbsp;float_value]<br/>
				[<b>&#8209;best_hit_score_edge</b>&nbsp;float_value]<br/>
				[<b>&#8209;window_size</b>&nbsp;int_value]<br/>
				[<b>&#8209;lcase_masking</b>]<br/>
				[<b>&#8209;query_loc</b>&nbsp;range]<br/>
				[<b>&#8209;parse_deflines</b>]<br/>
				[<b>&#8209;outfmt</b>&nbsp;format]<br/>
				[<b>&#8209;show_gis</b>]<br/>
				[<b>&#8209;num_descriptions</b>&nbsp;int_value]<br/>
				[<b>&#8209;num_alignments</b>&nbsp;int_value]<br/>
				[<b>&#8209;line_length</b>&nbsp;line_length]<br/>
				[<b>&#8209;html</b>]<br/>
				[<b>&#8209;max_target_seqs</b>&nbsp;num_sequences]<br/>
				[<b>&#8209;num_threads</b>&nbsp;int_value]<br/>
				[<b>&#8209;remote</b>]<br/>
				[<b>&#8209;comp_based_stats</b>&nbsp;compo]<br/>
				[<b>&#8209;use_sw_tback</b>]<br/>
				[<b>&#8209;in_pssm</b>&nbsp;psi_chkpt_file]<br/>
				[<b>&#8209;version</b>]<span style="float:right"><a href="#top">TOP</a></span>
			</div>
			<hr style="background-image: linear-gradient(to right, white, blue, white); color: blue; height: 1px; border: 0;"/>
			<h4 style="text-align:center; color:blue;" id="tblastx">tBlastX - Commandline Parameters</h4>
			<div style="padding: 0 15px 0 15px;">
				tblastx&nbsp;[<b>&#8209;h</b>]&nbsp;[<b>&#8209;help</b>]<br/>
				[<b>&#8209;import_search_strategy</b>&nbsp;filename]<br/>
				[<b>&#8209;export_search_strategy</b>&nbsp;filename]<br/>
				[<b>&#8209;db</b>&nbsp;database_name]<br/>
				[<b>&#8209;dbsize</b>&nbsp;num_letters]<br/>
				[<b>&#8209;gilist</b>&nbsp;filename]<br/>
				[<b>&#8209;seqidlist</b>&nbsp;filename]<br/>
				[<b>&#8209;negative_gilist</b>&nbsp;filename]<br/>
				[<b>&#8209;entrez_query</b>&nbsp;entrez_query]<br/>
				[<b>&#8209;db_soft_mask</b>&nbsp;filtering_algorithm]<br/>
				[<b>&#8209;db_hard_mask</b>&nbsp;filtering_algorithm]<br/>
				[<b>&#8209;subject</b>&nbsp;subject_input_file]<br/>
				[<b>&#8209;subject_loc</b>&nbsp;range]<br/>
				[<b>&#8209;query</b>&nbsp;input_file]<br/>
				[<b>&#8209;out</b>&nbsp;output_file]<br/>
				[<b>&#8209;evalue</b>&nbsp;evalue]<br/>
				[<b>&#8209;word_size</b>&nbsp;int_value]<br/>
				[<b>&#8209;qcov_hsp_perc</b>&nbsp;float_value]<br/>
				[<b>&#8209;max_hsps</b>&nbsp;int_value]<br/>
				[<b>&#8209;xdrop_ungap</b>&nbsp;float_value]<br/>
				[<b>&#8209;searchsp</b>&nbsp;int_value]<br/>
				[<b>&#8209;sum_stats</b>&nbsp;bool_value]<br/>
				[<b>&#8209;max_intron_length</b>&nbsp;length]<br/>
				[<b>&#8209;seg</b>&nbsp;SEG_options]<br/>
				[<b>&#8209;soft_masking</b>&nbsp;soft_masking]<br/>
				[<b>&#8209;matrix</b>&nbsp;matrix_name]<br/>
				[<b>&#8209;threshold</b>&nbsp;float_value]<br/>
				[<b>&#8209;culling_limit</b>&nbsp;int_value]<br/>
				[<b>&#8209;best_hit_overhang</b>&nbsp;float_value]<br/>
				[<b>&#8209;best_hit_score_edge</b>&nbsp;float_value]<br/>
				[<b>&#8209;window_size</b>&nbsp;int_value]<br/>
				[<b>&#8209;lcase_masking</b>]<br/>
				[<b>&#8209;query_loc</b>&nbsp;range]<br/>
				[<b>&#8209;strand</b>&nbsp;strand]<br/>
				[<b>&#8209;parse_deflines</b>]<br/>
				[<b>&#8209;query_gencode</b>&nbsp;int_value]<br/>
				[<b>&#8209;db_gencode</b>&nbsp;int_value]<br/>
				[<b>&#8209;outfmt</b>&nbsp;format]<br/>
				[<b>&#8209;show_gis</b>]<br/>
				[<b>&#8209;num_descriptions</b>&nbsp;int_value]<br/>
				[<b>&#8209;num_alignments</b>&nbsp;int_value]<br/>
				[<b>&#8209;line_length</b>&nbsp;line_length]<br/>
				[<b>&#8209;html</b>]<br/>
				[<b>&#8209;max_target_seqs</b>&nbsp;num_sequences]<br/>
				[<b>&#8209;num_threads</b>&nbsp;int_value]<br/>
				[<b>&#8209;remote</b>]<br/>
				[<b>&#8209;version</b>]<span style="float:right"><a href="#top">TOP</a></span>
			</div>
			<hr style="background-image: linear-gradient(to right, white, blue, white); color: blue; height: 1px; border: 0;"/>
			<h4 style="text-align:center; color:blue;" id="deltablast">DeltaBlast - Commandline Parameters</h4>
			<div style="padding: 0 15px 0 15px;">
				deltablast&nbsp;[<b>&#8209;h</b>]&nbsp;[<b>&#8209;help</b>]<br/>
				[<b>&#8209;import_search_strategy</b>&nbsp;filename]<br/>
				[<b>&#8209;export_search_strategy</b>&nbsp;filename]<br/>
				[<b>&#8209;db</b>&nbsp;database_name]<br/>
				[<b>&#8209;dbsize</b>&nbsp;num_letters]<br/>
				[<b>&#8209;gilist</b>&nbsp;filename]<br/>
				[<b>&#8209;seqidlist</b>&nbsp;filename]<br/>
				[<b>&#8209;negative_gilist</b>&nbsp;filename]<br/>
				[<b>&#8209;entrez_query</b>&nbsp;entrez_query]<br/>
				[<b>&#8209;subject</b>&nbsp;subject_input_file]<br/>
				[<b>&#8209;subject_loc</b>&nbsp;range]<br/>
				[<b>&#8209;query</b>&nbsp;input_file]<br/>
				[<b>&#8209;out</b>&nbsp;output_file]<br/>
				[<b>&#8209;evalue</b>&nbsp;evalue]<br/>
				[<b>&#8209;word_size</b>&nbsp;int_value]<br/>
				[<b>&#8209;gapopen</b>&nbsp;open_penalty]<br/>
				[<b>&#8209;gapextend</b>&nbsp;extend_penalty]<br/>
				[<b>&#8209;qcov_hsp_perc</b>&nbsp;float_value]<br/>
				[<b>&#8209;max_hsps</b>&nbsp;int_value]<br/>
				[<b>&#8209;xdrop_ungap</b>&nbsp;float_value]<br/>
				[<b>&#8209;xdrop_gap</b>&nbsp;float_value]<br/>
				[<b>&#8209;xdrop_gap_final</b>&nbsp;float_value]<br/>
				[<b>&#8209;searchsp</b>&nbsp;int_value]<br/>
				[<b>&#8209;sum_stats</b>&nbsp;bool_value]<br/>
				[<b>&#8209;seg</b>&nbsp;SEG_options]<br/>
				[<b>&#8209;soft_masking</b>&nbsp;soft_masking]<br/>
				[<b>&#8209;matrix</b>&nbsp;matrix_name]<br/>
				[<b>&#8209;threshold</b>&nbsp;float_value]<br/>
				[<b>&#8209;culling_limit</b>&nbsp;int_value]<br/>
				[<b>&#8209;best_hit_overhang</b>&nbsp;float_value]<br/>
				[<b>&#8209;best_hit_score_edge</b>&nbsp;float_value]<br/>
				[<b>&#8209;window_size</b>&nbsp;int_value]<br/>
				[<b>&#8209;lcase_masking</b>]<br/>
				[<b>&#8209;query_loc</b>&nbsp;range]<br/>
				[<b>&#8209;parse_deflines</b>]<br/>
				[<b>&#8209;outfmt</b>&nbsp;format]<br/>
				[<b>&#8209;show_gis</b>]<br/>
				[<b>&#8209;num_descriptions</b>&nbsp;int_value]<br/>
				[<b>&#8209;num_alignments</b>&nbsp;int_value]<br/>
				[<b>&#8209;line_length</b>&nbsp;line_length]<br/>
				[<b>&#8209;html</b>]<br/>
				[<b>&#8209;max_target_seqs</b>&nbsp;num_sequences]<br/>
				[<b>&#8209;num_threads</b>&nbsp;int_value]<br/>
				[<b>&#8209;remote</b>]<br/>
				[<b>&#8209;comp_based_stats</b>&nbsp;compo]<br/>
				[<b>&#8209;use_sw_tback</b>]<br/>
				[<b>&#8209;gap_trigger</b>&nbsp;float_value]<br/>
				[<b>&#8209;num_iterations</b>&nbsp;int_value]<br/>
				[<b>&#8209;out_pssm</b>&nbsp;checkpoint_file]<br/>
				[<b>&#8209;out_ascii_pssm</b>&nbsp;ascii_mtx_file]<br/>
				[<b>&#8209;save_pssm_after_last_round</b>]<br/>
				[<b>&#8209;save_each_pssm</b>]<br/>
				[<b>&#8209;pseudocount</b>&nbsp;pseudocount]<br/>
				[<b>&#8209;domain_inclusion_ethresh</b>&nbsp;ethresh]<br/>
				[<b>&#8209;inclusion_ethresh</b>&nbsp;ethresh]<br/>
				[<b>&#8209;rpsdb</b>&nbsp;database_name]<br/>
				[<b>&#8209;show_domain_hits</b>]<br/>
				[<b>&#8209;version</b>]<span style="float:right"><a href="#top">TOP</a></span>
			</div>
			<hr style="background-image: linear-gradient(to right, white, blue, white); color: blue; height: 1px; border: 0;"/>
			<h4 style="text-align:center; color:blue;" id="psiblast">PSI-Blast - Commandline Parameters</h4>
			<div style="padding: 0 15px 0 15px;">
				psiblast&nbsp;[<b>&#8209;h</b>]&nbsp;[<b>&#8209;help</b>]<br/>
				[<b>&#8209;import_search_strategy</b>&nbsp;filename]<br/>
				[<b>&#8209;export_search_strategy</b>&nbsp;filename]<br/>
				[<b>&#8209;db</b>&nbsp;database_name]<br/>
				[<b>&#8209;dbsize</b>&nbsp;num_letters]<br/>
				[<b>&#8209;gilist</b>&nbsp;filename]<br/>
				[<b>&#8209;seqidlist</b>&nbsp;filename]<br/>
				[<b>&#8209;negative_gilist</b>&nbsp;filename]<br/>
				[<b>&#8209;entrez_query</b>&nbsp;entrez_query]<br/>
				[<b>&#8209;subject</b>&nbsp;subject_input_file]<br/>
				[<b>&#8209;subject_loc</b>&nbsp;range]<br/>
				[<b>&#8209;query</b>&nbsp;input_file]<br/>
				[<b>&#8209;out</b>&nbsp;output_file]<br/>
				[<b>&#8209;evalue</b>&nbsp;evalue]<br/>
				[<b>&#8209;word_size</b>&nbsp;int_value]<br/>
				[<b>&#8209;gapopen</b>&nbsp;open_penalty]<br/>
				[<b>&#8209;gapextend</b>&nbsp;extend_penalty]<br/>
				[<b>&#8209;qcov_hsp_perc</b>&nbsp;float_value]<br/>
				[<b>&#8209;max_hsps</b>&nbsp;int_value]<br/>
				[<b>&#8209;xdrop_ungap</b>&nbsp;float_value]<br/>
				[<b>&#8209;xdrop_gap</b>&nbsp;float_value]<br/>
				[<b>&#8209;xdrop_gap_final</b>&nbsp;float_value]<br/>
				[<b>&#8209;searchsp</b>&nbsp;int_value]<br/>
				[<b>&#8209;sum_stats</b>&nbsp;bool_value]<br/>
				[<b>&#8209;seg</b>&nbsp;SEG_options]<br/>
				[<b>&#8209;soft_masking</b>&nbsp;soft_masking]<br/>
				[<b>&#8209;matrix</b>&nbsp;matrix_name]<br/>
				[<b>&#8209;threshold</b>&nbsp;float_value]<br/>
				[<b>&#8209;culling_limit</b>&nbsp;int_value]<br/>
				[<b>&#8209;best_hit_overhang</b>&nbsp;float_value]<br/>
				[<b>&#8209;best_hit_score_edge</b>&nbsp;float_value]<br/>
				[<b>&#8209;window_size</b>&nbsp;int_value]<br/>
				[<b>&#8209;lcase_masking</b>]<br/>
				[<b>&#8209;query_loc</b>&nbsp;range]<br/>
				[<b>&#8209;parse_deflines</b>]<br/>
				[<b>&#8209;outfmt</b>&nbsp;format]<br/>
				[<b>&#8209;show_gis</b>]<br/>
				[<b>&#8209;num_descriptions</b>&nbsp;int_value]<br/>
				[<b>&#8209;num_alignments</b>&nbsp;int_value]<br/>
				[<b>&#8209;line_length</b>&nbsp;line_length]<br/>
				[<b>&#8209;html</b>]<br/>
				[<b>&#8209;max_target_seqs</b>&nbsp;num_sequences]<br/>
				[<b>&#8209;num_threads</b>&nbsp;int_value]<br/>
				[<b>&#8209;remote</b>]<br/>
				[<b>&#8209;comp_based_stats</b>&nbsp;compo]<br/>
				[<b>&#8209;use_sw_tback</b>]<br/>
				[<b>&#8209;gap_trigger</b>&nbsp;float_value]<br/>
				[<b>&#8209;num_iterations</b>&nbsp;int_value]<br/>
				[<b>&#8209;out_pssm</b>&nbsp;checkpoint_file]<br/>
				[<b>&#8209;out_ascii_pssm</b>&nbsp;ascii_mtx_file]<br/>
				[<b>&#8209;save_pssm_after_last_round</b>]<br/>
				[<b>&#8209;save_each_pssm</b>]<br/>
				[<b>&#8209;in_msa</b>&nbsp;align_restart]<br/>
				[<b>&#8209;msa_master_idx</b>&nbsp;index]<br/>
				[<b>&#8209;ignore_msa_master</b>]<br/>
				[<b>&#8209;in_pssm</b>&nbsp;psi_chkpt_file]<br/>
				[<b>&#8209;pseudocount</b>&nbsp;pseudocount]<br/>
				[<b>&#8209;inclusion_ethresh</b>&nbsp;ethresh]<br/>
				[<b>&#8209;phi_pattern</b>&nbsp;file]<br/>
				[<b>&#8209;version</b>]<span style="float:right"><a href="#top">TOP</a></span>
			</div>
			<hr style="background-image: linear-gradient(to right, white, blue, white); color: blue; height: 1px; border: 0;"/>
			<h4 style="text-align:center; color:blue;" id="rpsblast">RPS-Blast - Commandline Parameters</h4>
			<div style="padding: 0 15px 0 15px;">
				rpsblast&nbsp;[<b>&#8209;h</b>]&nbsp;[<b>&#8209;help</b>]<br/>
				[<b>&#8209;import_search_strategy</b>&nbsp;filename]<br/>
				[<b>&#8209;export_search_strategy</b>&nbsp;filename]<br/>
				[<b>&#8209;db</b>&nbsp;database_name]<br/>
				[<b>&#8209;dbsize</b>&nbsp;num_letters]<br/>
				[<b>&#8209;entrez_query</b>&nbsp;entrez_query]<br/>
				[<b>&#8209;query</b>&nbsp;input_file]<br/>
				[<b>&#8209;out</b>&nbsp;output_file]<br/>
				[<b>&#8209;evalue</b>&nbsp;evalue]<br/>
				[<b>&#8209;qcov_hsp_perc</b>&nbsp;float_value]<br/>
				[<b>&#8209;max_hsps</b>&nbsp;int_value]<br/>
				[<b>&#8209;xdrop_ungap</b>&nbsp;float_value]<br/>
				[<b>&#8209;xdrop_gap</b>&nbsp;float_value]<br/>
				[<b>&#8209;xdrop_gap_final</b>&nbsp;float_value]<br/>
				[<b>&#8209;searchsp</b>&nbsp;int_value]<br/>
				[<b>&#8209;sum_stats</b>&nbsp;bool_value]<br/>
				[<b>&#8209;seg</b>&nbsp;SEG_options]<br/>
				[<b>&#8209;soft_masking</b>&nbsp;soft_masking]<br/>
				[<b>&#8209;culling_limit</b>&nbsp;int_value]<br/>
				[<b>&#8209;best_hit_overhang</b>&nbsp;float_value]<br/>
				[<b>&#8209;best_hit_score_edge</b>&nbsp;float_value]<br/>
				[<b>&#8209;window_size</b>&nbsp;int_value]<br/>
				[<b>&#8209;lcase_masking</b>]<br/>
				[<b>&#8209;query_loc</b>&nbsp;range]<br/>
				[<b>&#8209;parse_deflines</b>]<br/>
				[<b>&#8209;outfmt</b>&nbsp;format]<br/>
				[<b>&#8209;show_gis</b>]<br/>
				[<b>&#8209;num_descriptions</b>&nbsp;int_value]<br/>
				[<b>&#8209;num_alignments</b>&nbsp;int_value]<br/>
				[<b>&#8209;line_length</b>&nbsp;line_length]<br/>
				[<b>&#8209;html</b>]<br/>
				[<b>&#8209;max_target_seqs</b>&nbsp;num_sequences]<br/>
				[<b>&#8209;num_threads</b>&nbsp;int_value]<br/>
				[<b>&#8209;remote</b>]<br/>
				[<b>&#8209;comp_based_stats</b>&nbsp;compo]<br/>
				[<b>&#8209;use_sw_tback</b>]<br/>
				[<b>&#8209;version</b>]<span style="float:right"><a href="#top">TOP</a></span>
			</div>
			<hr style="background-image: linear-gradient(to right, white, blue, white); color: blue; height: 1px; border: 0;"/>
			<h4 style="text-align:center; color:blue;" id="rpstblastn">RPS-tBlastN - Commandline Parameters</h4>
			<div style="padding: 0 15px 0 15px;">
				rpstblastn&nbsp;[<b>&#8209;h</b>]&nbsp;[<b>&#8209;help</b>]<br/>
				[<b>&#8209;import_search_strategy</b>&nbsp;filename]<br/>
				[<b>&#8209;export_search_strategy</b>&nbsp;filename]<br/>
				[<b>&#8209;db</b>&nbsp;database_name]<br/>
				[<b>&#8209;dbsize</b>&nbsp;num_letters]<br/>
				[<b>&#8209;entrez_query</b>&nbsp;entrez_query]<br/>
				[<b>&#8209;query</b>&nbsp;input_file]<br/>
				[<b>&#8209;out</b>&nbsp;output_file]<br/>
				[<b>&#8209;evalue</b>&nbsp;evalue]<br/>
				[<b>&#8209;qcov_hsp_perc</b>&nbsp;float_value]<br/>
				[<b>&#8209;max_hsps</b>&nbsp;int_value]<br/>
				[<b>&#8209;xdrop_ungap</b>&nbsp;float_value]<br/>
				[<b>&#8209;xdrop_gap</b>&nbsp;float_value]<br/>
				[<b>&#8209;xdrop_gap_final</b>&nbsp;float_value]<br/>
				[<b>&#8209;searchsp</b>&nbsp;int_value]<br/>
				[<b>&#8209;sum_stats</b>&nbsp;bool_value]<br/>
				[<b>&#8209;query_gencode</b>&nbsp;int_value]<br/>
				[<b>&#8209;seg</b>&nbsp;SEG_options]<br/>
				[<b>&#8209;soft_masking</b>&nbsp;soft_masking]<br/>
				[<b>&#8209;window_size</b>&nbsp;int_value]<br/>
				[<b>&#8209;ungapped</b>]<br/>
				[<b>&#8209;lcase_masking</b>]<br/>
				[<b>&#8209;query_loc</b>&nbsp;range]<br/>
				[<b>&#8209;strand</b>&nbsp;strand]<br/>
				[<b>&#8209;parse_deflines</b>]<br/>
				[<b>&#8209;outfmt</b>&nbsp;format]<br/>
				[<b>&#8209;show_gis</b>]<br/>
				[<b>&#8209;num_descriptions</b>&nbsp;int_value]<br/>
				[<b>&#8209;num_alignments</b>&nbsp;int_value]<br/>
				[<b>&#8209;line_length</b>&nbsp;line_length]<br/>
				[<b>&#8209;html</b>]<br/>
				[<b>&#8209;max_target_seqs</b>&nbsp;num_sequences]<br/>
				[<b>&#8209;num_threads</b>&nbsp;int_value]<br/>
				[<b>&#8209;remote</b>]<br/>
				[<b>&#8209;comp_based_stats</b>&nbsp;compo]<br/>
				[<b>&#8209;use_sw_tback</b>]<br/>
				[<b>&#8209;version</b>]<span style="float:right"><a href="#top">TOP</a></span>
			</div>
		</div>
	</div>
</body>
</html>