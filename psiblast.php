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
		<div style="padding: 0 15px 0 15px;">
		<a href="index.php" title="Go Back to Home"><div style="padding: 0 5px 0 0;" id="back"></div></a>
		<h4 style="text-align:center; color:blue" id="top">PSI-BLAST Program Description</h4>
<pre>
USAGE
  psiblast [-h] [-help] [-import_search_strategy filename]
    [-export_search_strategy filename] [-db database_name]
    [-dbsize num_letters] [-gilist filename] [-seqidlist filename]
    [-negative_gilist filename] [-entrez_query entrez_query]
    [-subject subject_input_file] [-subject_loc range] [-query input_file]
    [-out output_file] [-evalue evalue] [-word_size int_value]
    [-gapopen open_penalty] [-gapextend extend_penalty]
    [-qcov_hsp_perc float_value] [-max_hsps int_value]
    [-xdrop_ungap float_value] [-xdrop_gap float_value]
    [-xdrop_gap_final float_value] [-searchsp int_value]
    [-sum_stats bool_value] [-seg SEG_options] [-soft_masking soft_masking]
    [-matrix matrix_name] [-threshold float_value] [-culling_limit int_value]
    [-best_hit_overhang float_value] [-best_hit_score_edge float_value]
    [-window_size int_value] [-lcase_masking] [-query_loc range]
    [-parse_deflines] [-outfmt format] [-show_gis]
    [-num_descriptions int_value] [-num_alignments int_value]
    [-line_length line_length] [-html] [-max_target_seqs num_sequences]
    [-num_threads int_value] [-remote] [-comp_based_stats compo]
    [-use_sw_tback] [-gap_trigger float_value] [-num_iterations int_value]
    [-out_pssm checkpoint_file] [-out_ascii_pssm ascii_mtx_file]
    [-save_pssm_after_last_round] [-save_each_pssm] [-in_msa align_restart]
    [-msa_master_idx index] [-ignore_msa_master] [-in_pssm psi_chkpt_file]
    [-pseudocount pseudocount] [-inclusion_ethresh ethresh]
    [-phi_pattern file] [-version]

DESCRIPTION
   Position-Specific Initiated BLAST 2.5.0+

OPTIONAL ARGUMENTS
 -h
   Print USAGE and DESCRIPTION;  ignore all other parameters
 -help
   Print USAGE, DESCRIPTION and ARGUMENTS; ignore all other parameters
 -version
   Print version number;  ignore other arguments

 *** Input query options
 -query <File_In>
   Input file name
   Default = `-'
    * Incompatible with:  in_msa, msa_master_idx, ignore_msa_master, in_pssm
 -query_loc <String>
   Location on the query sequence in 1-based offsets (Format: start-stop)
    * Incompatible with:  in_msa, msa_master_idx, ignore_msa_master, in_pssm

 *** General search options
 -db <String>
   BLAST database name
    * Incompatible with:  subject, subject_loc
 -out <File_Out>
   Output file name
   Default = `-'
 -evalue <Real>
   Expectation value (E) threshold for saving hits
   Default = `10'
 -word_size <Integer, >=2>
   Word size for wordfinder algorithm
 -gapopen <Integer>
   Cost to open a gap
 -gapextend <Integer>
   Cost to extend a gap
 -matrix <String>
   Scoring matrix name (normally BLOSUM62)
 -threshold <Real, >=0>
   Minimum word score such that the word is added to the BLAST lookup table
 -comp_based_stats <String>
   Use composition-based statistics:
       D or d: default (equivalent to 2 )
       0 or F or f: No composition-based statistics
       1: Composition-based statistics as in NAR 29:2994-3005, 2001
       2 or T or t : Composition-based score adjustment as in Bioinformatics
   21:902-911,
       2005, conditioned on sequence properties
       3: Composition-based score adjustment as in Bioinformatics 21:902-911,
       2005, unconditionally
   Default = `2'

 *** BLAST-2-Sequences options
 -subject <File_In>
   Subject sequence(s) to search
    * Incompatible with:  db, gilist, seqidlist, negative_gilist
 -subject_loc <String>
   Location on the subject sequence in 1-based offsets (Format: start-stop)
    * Incompatible with:  db, gilist, seqidlist, negative_gilist, remote

 *** Formatting options
 -outfmt <String>
   alignment view options:
     0 = Pairwise,
     1 = Query-anchored showing identities,
     2 = Query-anchored no identities,
     3 = Flat query-anchored showing identities,
     4 = Flat query-anchored no identities,
     5 = BLAST XML,
     6 = Tabular,
     7 = Tabular with comment lines,
     8 = Seqalign (Text ASN.1),
     9 = Seqalign (Binary ASN.1),
    10 = Comma-separated values,
    11 = BLAST archive (ASN.1),
    12 = Seqalign (JSON),
    13 = Multiple-file BLAST JSON,
    14 = Multiple-file BLAST XML2,
    15 = Single-file BLAST JSON,
    16 = Single-file BLAST XML2,
    18 = Organism Report

   Options 6, 7 and 10 can be additionally configured to produce
   a custom format specified by space delimited format specifiers.
   The supported format specifiers are:
            qseqid means Query Seq-id
               qgi means Query GI
              qacc means Query accesion
           qaccver means Query accesion.version
              qlen means Query sequence length
            sseqid means Subject Seq-id
         sallseqid means All subject Seq-id(s), separated by a ';'
               sgi means Subject GI
            sallgi means All subject GIs
              sacc means Subject accession
           saccver means Subject accession.version
           sallacc means All subject accessions
              slen means Subject sequence length
            qstart means Start of alignment in query
              qend means End of alignment in query
            sstart means Start of alignment in subject
              send means End of alignment in subject
              qseq means Aligned part of query sequence
              sseq means Aligned part of subject sequence
            evalue means Expect value
          bitscore means Bit score
             score means Raw score
            length means Alignment length
            pident means Percentage of identical matches
            nident means Number of identical matches
          mismatch means Number of mismatches
          positive means Number of positive-scoring matches
           gapopen means Number of gap openings
              gaps means Total number of gaps
              ppos means Percentage of positive-scoring matches
            frames means Query and subject frames separated by a '/'
            qframe means Query frame
            sframe means Subject frame
              btop means Blast traceback operations (BTOP)
            staxid means Subject Taxonomy ID
          ssciname means Subject Scientific Name
          scomname means Subject Common Name
        sblastname means Subject Blast Name
         sskingdom means Subject Super Kingdom
           staxids means unique Subject Taxonomy ID(s), separated by a ';'
                         (in numerical order)
         sscinames means unique Subject Scientific Name(s), separated by a ';'
         scomnames means unique Subject Common Name(s), separated by a ';'
        sblastnames means unique Subject Blast Name(s), separated by a ';'
                         (in alphabetical order)
        sskingdoms means unique Subject Super Kingdom(s), separated by a ';'
                         (in alphabetical order)
            stitle means Subject Title
        salltitles means All Subject Title(s), separated by a '<>'
           sstrand means Subject Strand
             qcovs means Query Coverage Per Subject
           qcovhsp means Query Coverage Per HSP
            qcovus means Query Coverage Per Unique Subject (blastn only)
   When not provided, the default value is:
   'qacc sacc pident length mismatch gapopen qstart qend sstart send evalue
   bitscore', which is equivalent to the keyword 'std'
   Default = `0'
 -show_gis
   Show NCBI GIs in deflines?
 -num_descriptions <Integer, >=0>
   Number of database sequences to show one-line descriptions for
   Not applicable for outfmt > 4
   Default = `500'
    * Incompatible with:  max_target_seqs
 -num_alignments <Integer, >=0>
   Number of database sequences to show alignments for
   Default = `250'
    * Incompatible with:  max_target_seqs
 -line_length <Integer, >=1>
   Line length for formatting alignments
   Not applicable for outfmt > 4
   Default = `60'
 -html
   Produce HTML output?

 *** Query filtering options
 -seg <String>
   Filter query sequence with SEG (Format: 'yes', 'window locut hicut', or
   'no' to disable)
   Default = `no'
 -soft_masking <Boolean>
   Apply filtering locations as soft masks
   Default = `false'
 -lcase_masking
   Use lower case filtering in query and subject sequence(s)?

 *** Restrict search or results
 -gilist <String>
   Restrict search of database to list of GI's
    * Incompatible with:  negative_gilist, seqidlist, remote, subject,
   subject_loc
 -seqidlist <String>
   Restrict search of database to list of SeqId's
    * Incompatible with:  gilist, negative_gilist, remote, subject,
   subject_loc
 -negative_gilist <String>
   Restrict search of database to everything except the listed GIs
    * Incompatible with:  gilist, seqidlist, remote, subject, subject_loc
 -entrez_query <String>
   Restrict search with the given Entrez query
    * Requires:  remote
 -qcov_hsp_perc <Real, 0..100>
   Percent query coverage per hsp
 -max_hsps <Integer, >=1>
   Set maximum number of HSPs per subject sequence to save for each query
 -culling_limit <Integer, >=0>
   If the query range of a hit is enveloped by that of at least this many
   higher-scoring hits, delete the hit
    * Incompatible with:  best_hit_overhang, best_hit_score_edge
 -best_hit_overhang <Real, (>0 and <0.5)>
   Best Hit algorithm overhang value (recommended value: 0.1)
    * Incompatible with:  culling_limit
 -best_hit_score_edge <Real, (>0 and <0.5)>
   Best Hit algorithm score edge value (recommended value: 0.1)
    * Incompatible with:  culling_limit
 -max_target_seqs <Integer, >=1>
   Maximum number of aligned sequences to keep
   Not applicable for outfmt <= 4
   Default = `500'
    * Incompatible with:  num_descriptions, num_alignments

 *** Statistical options
 -dbsize <Int8>
   Effective length of the database
 -searchsp <Int8, >=0>
   Effective length of the search space
 -sum_stats <Boolean>
   Use sum statistics

 *** Search strategy options
 -import_search_strategy <File_In>
   Search strategy to use
    * Incompatible with:  export_search_strategy
 -export_search_strategy <File_Out>
   File name to record the search strategy used
    * Incompatible with:  import_search_strategy

 *** Extension options
 -xdrop_ungap <Real>
   X-dropoff value (in bits) for ungapped extensions
 -xdrop_gap <Real>
   X-dropoff value (in bits) for preliminary gapped extensions
 -xdrop_gap_final <Real>
   X-dropoff value (in bits) for final gapped alignment
 -window_size <Integer, >=0>
   Multiple hits window size, use 0 to specify 1-hit algorithm
 -gap_trigger <Real>
   Number of bits to trigger gapping
   Default = `22'

 *** Miscellaneous options
 -parse_deflines
   Should the query and subject defline(s) be parsed?
 -num_threads <Integer, >=1>
   Number of threads (CPUs) to use in the BLAST search
   Default = `1'
    * Incompatible with:  remote
 -remote
   Execute search remotely?
    * Incompatible with:  gilist, seqidlist, negative_gilist, subject_loc,
   num_threads, num_iterations
 -use_sw_tback
   Compute locally optimal Smith-Waterman alignments?

 *** PSI-BLAST options
 -num_iterations <Integer, >=0>
   Number of iterations to perform (0 means run until convergence)
   Default = `1'
    * Incompatible with:  remote
 -out_pssm <File_Out>
   File name to store checkpoint file
 -out_ascii_pssm <File_Out>
   File name to store ASCII version of PSSM
 -save_pssm_after_last_round
   Save PSSM after the last database search
 -save_each_pssm
   Save PSSM after each iteration (file name is given in -save_pssm or
   -save_ascii_pssm options)

 *** PSSM engine options
 -in_msa <File_In>
   File name of multiple sequence alignment to restart PSI-BLAST
    * Incompatible with:  in_pssm, query, query_loc, phi_pattern
 -msa_master_idx <Integer, >=1>
   Ordinal number (1-based index) of the sequence to use as a master in the
   multiple sequence alignment. If not provided, the first sequence in the
   multiple sequence alignment will be used
    * Requires:  in_msa
    * Incompatible with:  in_pssm, query, query_loc, phi_pattern,
   ignore_msa_master
 -ignore_msa_master
   Ignore the master sequence when creating PSSM
    * Requires:  in_msa
    * Incompatible with:  msa_master_idx, in_pssm, query, query_loc,
   phi_pattern
 -in_pssm <File_In>
   PSI-BLAST checkpoint file
    * Incompatible with:  in_msa, msa_master_idx, ignore_msa_master, query,
   query_loc, phi_pattern
 -pseudocount <Integer>
   Pseudo-count value used when constructing PSSM
   Default = `0'
 -inclusion_ethresh <Real>
   E-value inclusion threshold for pairwise alignments
   Default = `0.002'

 *** PHI-BLAST options
 -phi_pattern <File_In>
   File name containing pattern to search
    * Incompatible with:  in_msa, msa_master_idx, ignore_msa_master, in_pssm
</pre>
		</div>
	</div>
</body>
</html>