<p align="center"><img src="https://raw.githubusercontent.com/AshokHub/locBLAST/misc/locBLAST%20Logo.png" alt="locBLAST Logo"></p>

*loc*BLAST is a PHP library for enriching command-line NCBI BLAST+ programs to an interactive graphical user interface. It performs both local and remote database search through a PHP supported web server. The PHP library executes the command-line NCBI BLAST+ programs using `exec()` function by passing parameters from the HTML form fields. In PHP, the `system()`, `exec()`, `passthru()`, and `shell_exec()` functions are used to pass system commands.

The *loc*BLAST allows users to input query sequence by pasting in the text box or file uploading. Currently, *loc*BLAST supports nine BLAST+ programs such as *blastn*, *blastp*, *blastx*, *tblastn*, *tblastx*, *deltablast*, *psiblast*, *rpsblast*, and *rpstblastn* for sequence search. Moreover, the latest release ***loc*BLAST v2.0** supports various platforms such as Windows, Linux, and MacOS. The *loc*BLAST PHP library and test database files were freely available at [GitHub](https://github.com/AshokHub/locBLAST/).

<p align="center"><img src="https://raw.githubusercontent.com/AshokHub/locBLAST/master/images/Input.jpg" alt="locBLAST Home Page"></p>

### Requirements for *loc*BLAST Setup

In this tutorial, I have given a brief explanation about embedding the latest NCBI BLAST+ (the latest version of NCBI BLAST+ as on September 29, 2017 is **2.60**.) in any PHP enabled web server. The latest version of NCBI BLAST+ (standalone command-line BLAST programs) can be downloaded from the FTP server of NCBI ([ftp://ftp.ncbi.nih.gov/blast/executables/blast+/LATEST](ftp://ftp.ncbi.nih.gov/blast/executables/blast+/LATEST)). A simple PHP supporting web server is enough to run the local BLAST program through the web browser. Follow the steps given below to setup and run the *loc*BLAST program.

**1.** Download the compressed NCBI BLAST+ software (I have downloaded [ncbi-blast-2.6.0+-x64-win64.tar.gz](ftp://ftp.ncbi.nih.gov/blast/executables/blast+/LATEST/ncbi-blast-2.6.0+-x64-win64.tar.gz) for Windows 64-bit OS) from the NCBI FTP server.

**2.** Create a folder named **locBLAST** in the web directory (usually named **htdocs**, **www**, or **wwwroot**).

**3.** Decompress [ncbi-blast-2.6.0+-x64-win64.tar.gz](ftp://ftp.ncbi.nih.gov/blast/executables/blast+/LATEST/ncbi-blast-2.6.0+-x64-win64.tar.gz) file and copy all the files present in the **bin** folder to **locBLAST** directory.

**4.** Download **index.php** and **db** folder from [GitHub](https://github.com/AshokHub/locBLAST/) and copy to **locBLAST** directory.

**5.** Open the URL [http://localhost/locBLAST](http://localhost/locBLAST) in the web browser to run *loc*BLAST program.

**6.** Click the hyperlink **DEMO** and **Search** button to test local database search. The default parameters will generate an HTML file formatted BLAST search report.

The form fields in *loc*BLAST program can be extended with custom form fields to perform advanced search. Moreover, desired database files can be downloaded from the NCBI FTP directory ([ftp://ftp.ncbi.nih.gov](ftp://ftp.ncbi.nih.gov)) and copied to the **db** directory to perform offline database search.

### Custom Database Creation

We can also create custom database using **makeblastdb** program present in the **locBLAST** directory. To create a custom database, copy the FASTA file formatted multiple sequence file to the **db** directory. Then open the **db** directory and press **ALT** key + **Right** mouse click to open command-line window directing to the current directory. Enter the command "`makeblastdb.exe -in db/pdt.fas -out db/pdt -dbtype prot -title PDTDB`" to create a custom database named **PDTDB** (already included in the **db** folder).

The FASTA file formatted multiple sequence file (**pdt.fas**)is given below:

```
>pdt|pdtdbt00001|pdb|1OKE|A/B
MRCIGISNRDFVEGVSGGSWVDIVLEHGSCVTTMAKNKPTLDFELIKTEAKQPATLRKYC
IEAKLTNTTTESRCPTQGEPTLNEEQDKRFVCKHSMVDRGWGNGCGLFGKGGIVTCAMFT
CKKNMEGKIVQPENLEYTVVITPHSGEEHAVGNDTGKHGKEVKITPQSSITEAELTGYGT
VTMECSPRTGLDFNEMVLLQMKDKAWLVHRQWFLDLPLPWLPGADTQGSNWIQKETLVTF
KNPHAKKQDVVVLGSQEGAMHTALTGATEIQMSSGNLLFTGHLKCRLRMDKLQLKGMSYS
MCTGKFKVVKEIAETQHGTIVIRVQYEGDGSPCKIPFEIMDLEKRHVLGRLITVNPIVTE
KDSPVNIEAEPPFGDSYIIIGVEPGQLKLNWFKK
>pdt|pdtdbt00002|pdb|4O6B|A/B
AHHHHHHSSGVDLGTENLYFQSNADSGCVVSWKNKELKCGSGIFITDNVHTWTEQYKFQP
ESPSKLASAIQKAHEEGICGIRSVTRLENLMWKQITPELNHILSENEVKLTIMTGDIKGI
MQAGKRSLRPQPTELKYSWKTWGKAKMLSTESHNQTFLIDGPETAECPNTNRAWNSLEVE
DYGFGVFTTNIWLKLKEKQDVFCDSKLMSAAIKDNRAVHADMGYWIESALNDTWKIEKAS
FIEVKNCHWPKSHTLWSNGVLESEMIIPKNLAGPVSQHNYRPGYHTQITGPWHLGKLEMD
FDFCDGTTVVVTEDCGNRGPSLRTTTASGKLITEWCCRSCTLPPLRYRGEDGCWYGMEIR
PLKEKEENLVNSLVTA
>pdt|pdtdbt00003|pdb|2IOK|A/B
SKKNSLALSLTADQMVSALLDAEPPILYSEYDPTRPFSEASMMGLLTNLADRELVHMINW
AKRVPGFVDLTLHDQVHLLECAWLEILMIGLVWRSMEHPGKLLFAPNLLLDRNQGKCVEG
MVEIFDMLLATSSRFRMMNLQGEEFVCLKSIILLNSGVYTFLSSTLKSLEEKDHIHRVLD
KITDTLIHLMAKAGLTLQQQHQRLAQLLLILSHIRHMSNKGMEHLYSMKCKNVVPLYDLL
LEMLDAHRLHAPTS
>pdt|pdtdbt00004|pdb|2Q1Y|A/B
MTPPHNYLAVIKVVGIGGGGVNAVNRMIEQGLKGVEFIAINTDAQALLMSDADVKLDVGR
DSTRGLGAGADPEVGRKAAEDAKDEIEELLRGADMVFVTAGEGGGTGTGGAPVVASIARK
LGALTVGVVTRPFSFEGKRRSNQAENGIAALRESCDTLIVIPNDRLLQMGDAAVSLMDAF
RSADEVLLNGVQGITDLITTPGLINVDFADVKGIMSGAGTALMGIGSARGEGRSLKAAEI
AINSPLLEASMEGAQGVLMSIAGGSDLGLFEINEAASLVQDAAHPDANIIFGTVIDDSLG
DEVRVTVIAAGFDVSGPGRKPVMGETGGAHRIESAKAGKLTSTLFEPVDAVSVPLHTNGA
TLSIGGDDDDVDVPPFMRR
>pdt|pdtdbt00005|pdb|3GGE|A/B/C
SMKGIEKEVNVYKSEDSLGLTITDNGVGYAFIKRIKDGGVIDSVKTICVGDHIESINGEN
IVGWRHYDVAKKLKELKKEELFTMKLIEPKKSSEA
>pdt|pdtdbt00006|pdb|2F9Q|A/B/C/D
MAKKTSSKGKLPPGPLPLPGLGNLLHVDFQNTPYCFDQLRRRFGDVFSLQLAWTPVVVLN
GLAAVREALVTHGEDTADRPPVPITQILGFGPRSQGVFLARYGPAWREQRRFSVSTLRNL
GLGKKSLEQWVTEEAACLCAAFANHSGRPFRPNGLLDKAVSNVIASLTCGRRFEYDDPRF
LRLLDLAQEGLKEESGFLREVLNAVPVDRHIPALAGKVLRFQKAFLTQLDELLTEHRMTW
DPAQPPRDLTEAFLAEMEKAKGNPESSFNDENLRIVVADLFSAGMVTTSTTLAWGLLLMI
LHPDVQRRVQQEIDDVIGQVRRPEMGDQAHMPYTTAVIHEVQRFGDIVPLGMTHMTSRDI
EVQGFRIPKGTTLITNLSSVLKDEAVWEKPFRFHPEHFLDAQGHFVKPEAFLPFSAGRRA
CLGEPLARMELFLFFTSLLQHFSFSVPTGQPRPSHHGVFAFLVSPSPYELCAVPRHHHH
>pdt|pdtdbt00007|pdb|3EAH|A/B
PKFPRVKNWEVGSITYDTLSAQAQQDGPCTPRRCLGSLVFPRKLQGRPSPGPPAPEQLLS
QARDFINQYYSSIKRSGSQAHEQRLQEVEAEVAATGTYQLRESELVFGAKQAWRNAPRCV
GRIQWGKLQVFDARDCRSAQEMFTYICNHIKYATNRGNLRSAITVFPQRCPGRGDFRIWN
SQLVRYAGYRQQDGSVRGDPANVEITELCIQHGWTPGNGRFDVLPLLLQAPDEPPELFLL
PPELVLEVPLEHPTLEWFAALGLRWYALPAVSNMLLEIGGLEFPAAPFSGWYMSTEIGTR
NLCDPHRYNILEDVAVCMDLDTRTTSSLWKDKAAVEINVAVLHSYQLAKVTIVDHHAATA
SFMKHLENEQKARGGCPADWAWIVPPISGSLTPVFHQEMVNYFLSPAFRYQPDPWKGSAA
KGTGITR
>pdt|pdtdbt00008|pdb|4PQE|A
EGREDAELLVTVRGGRLRGIRLKTPGGPVSAFLGIPFAEPPMGPRRFLPPEPKQPWSGVV
DATTFQSVCYQYVDTLYPGFEGTEMWNPNRELSEDCLYLNVWTPYPRPTSPTPVLVWIYG
GGFYSGASSLDVYDGRFLVQAERTVLVSMNYRVGAFGFLALPGSREAPGNVGLLDQRLAL
QWVQENVAAFGGDPTSVTLFGESAGAASVGMHLLSPPSRGLFHRAVLQSGAPNGPWATVG
MGEARRRATQLAHLVGCPPGGTGGNDTELVACLRTRPAQVLVNHEWHVLPQESVFRFSFV
PVVDGDFLSDTPEALINAGDFHGLQVLVGVVKDEGSYFLVYGAPGFSKDNESLISRAEFL
AGVRVGVPQVSDLAAEAVVLHYTDWLHPEDPARLREALSDVVGDHNVVCPVAQLAGRLAA
QGARVYAYVFEHRASTLSWPLWMGVPHGYEIEFIFGIPLDPSRNYTAEEKIFAQRLMRYW
ANFARTGDPNEPRDPKAPQWPPYTAGAQQYVSLDLRPLEVRRGLRAQACAFWNRFLPKLL
SAT
```
