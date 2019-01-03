---
title: 'locBLAST: An enhanced PHP web interface to standalone NCBI BLAST+ program'
tags:
  - locBLAST
  - NCBI BLAST+
  - Sequence Alignment
  - Embedding BLAST+
  - locBLAST PHP Library
authors:
  - name: T. Ashok Kumar
    orcid: 0000-0003-2862-028X
    affiliation: 1
affiliations:
 - name: Noorul Islam College of Arts and Science, Kumaracoil, INDIA
   index: 1
date: 3 January 2019
bibliography: paper.bib
---

# Summary

*loc*BLAST is a PHP library for enriching command-line NCBI BLAST+ programs to an interactive graphical user interface. It performs both local and remote database search through a PHP supported web server. The PHP library executes the command-line NCBI BLAST+ programs using `exec()` function by passing parameters from the HTML form fields. The *loc*BLAST allows users to input query sequence by pasting in the text box or file uploading. The *loc*BLAST library was designed using PHP, CSS, pure JavaScript, and standalone NCBI BLAST+ executables.

The web form of latest release *loc*BLAST v2.0 has added with more features, (1) progress bar and status bar, (2) advanced BLAST+ programs `deltablast`, `psiblast`, `rpsblast`, and `rpstblastn`, (3) hyperlink to detailed program description page, with short title, (4) graphical or plain text output, (5) advanced algorithm parameters, (6) tutorial page, and (7) mouse over tooltip text description of the keyword. The graphical summary is mimic to the native format of online NCBI BLAST. The *loc*BLAST PHP library is freely available at https://github.com/AshokHub/locBLAST.

# References
