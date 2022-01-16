<?php
exit;
try { 
     $dbh = new PDO("mysql:host=localhost;dbname=db", "username", "pass");
     $dbh->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
     # $dbh->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT );
     # $dbh->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );
}
catch(PDOException $e) {
     echo $e->getMessage();
     file_put_contents('PDOErrors.txt', $e->getMessage(), FILE_APPEND);
}


$book_array=array();

$handle = fopen("books.php", "r");
if ($handle) {
    while (($line = fgets($handle)) !== false) {
        // process the line read.
        // 
        $array=explode('|',trim($line));
        $book=$array[1];
        if($book){
        	$book_array[$book]=$array[0];
        	//echo $book.' => '.$array[0].',';
        	//echo "<br>";
        }
    }

    fclose($handle);
} else {
    // error opening the file.
} 
var_dump($book_array);
echo "<hr>";
//exit;
echo "<hr>";
$a=0;
$strongs="";
$handle = fopen("sept.txt", "r");
if ($handle) {
    while (($line = fgets($handle)) !== false) {
    // process the line read.
    $array=explode('|',$line);

	echo $book_array[strtolower($array[0])].'|'.$array[1].'|'.$array[2].'|'.$array[3].'<br>';

	$stmt = $dbh->prepare("insert into septuagint (`row`, `bookname`, `chapter`, `verse`, `orig_text`, `strongs` ) values (:row, :bookname, :chapter, :verse, :orig_text, :strongs )");
	$stmt->bindParam(':row', $a, PDO::PARAM_STR, 64);
	$stmt->bindParam(':bookname', $book_array[strtolower($array[0])], PDO::PARAM_STR, 64);
	$stmt->bindParam(':chapter', $array[1], PDO::PARAM_STR, 64);
	$stmt->bindParam(':verse', $array[2], PDO::PARAM_STR, 64);
	$stmt->bindParam(':orig_text', $array[3], PDO::PARAM_STR, 64);
	$stmt->bindParam(':strongs', $strongs, PDO::PARAM_STR, 64);
	$executed = $stmt->execute();
	if($executed){
	   $db_message = '<p class="db_success">Successfully saved <b>row : '.$a.'</b> to the database!!</p>';
	}else{
	   $db_message = '<p class="db_error">There was a problem saving <b>row : '.$a.'</b> to the database!!</p>';
	}
$a++;
}

    fclose($handle);
} else {
    // error opening the file.
} 














?>

<pre>
https://www.sacred-texts.com/bib/osrc/	
septuagint

CREATE TABLE `septuagint` (
  `row` int(2) NOT NULL DEFAULT '0',
  `bookname` varchar(20) NOT NULL DEFAULT '',  
  `chapter` int(3) DEFAULT NULL,
  `verse` int(3) DEFAULT NULL,
  `orig_text` text NOT NULL,  
  `strongs` text NOT NULL,
  PRIMARY KEY (`row`),
  KEY `book` (`book`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;	

Gen|1|1|ἐν ἀρχῇ ἐποίησεν ὁ θεὸς τὸν οὐρανὸν καὶ τὴν γῆν 

loop till EOF{
	readline();
	$array=explode('|'); 

	$bookname=BibBookDef($array[0]);
	$chapter=array[1];
	$verse=$array[2];
	$orig_text=$array[3];
}

function BibBookDef($bookname)
{
$bookname=$booknamesearch($bookname);
$booknames=array=(
	{"Genesis","gen"},
	{"Exodus","exo"},
	{"Leviticus","lev"},
	{"Numbers","num"},
	{"Deuteronomy","deu"},
	{"Joshua","jos"},
	{"Judges","jdg"},
	{"Ruth","rut"},
	{"1 Samuel","sa1"},
	{"2 Samuel","sa2"},
	{"1 Kings","kg1"},
	{"2 Kings","kg2"},
	{"1 Chronicles","ch1"},
	{"2 Chronicles","ch2"},
	{"Ezra","ezr"},
	{"Nehemiah","neh"},
	{"Esther","est"},
	{"Job","job"},
	{"Psalms","psa"},
	{"Proverbs","pro"},
	{"Ecclesiastes","ecc"},
	{"Song of Solomon","sol"},
	{"Isaiah","isa"},
	{"Jeremiah","jer"},
	{"Lamentations","lam"},
	{"Ezekiel","eze"},
	{"Daniel","dan"},
	{"Hosea","hos"},
	{"Joel","joe"},
	{"Amos","amo"},
	{"Obadiah","oba"},
	{"Jonah","jon"},
	{"Micah","mic"},
	{"Nahum","nah"},
	{"Habakkuk","hab"},
	{"Zephaniah","zep"},
	{"Haggai","hag"},
	{"Zechariah","zac"},
	{"Malachi","mal"},
	{"1 Esdras","es1"},
	{"2 Esdras","es2"},
	{"Tobias","tob"},
	{"Judith","jdt"},
	{"Additions to Esther","aes"},
	{"Wisdom","wis"},
	{"Baruch","bar"},
	{"Epistle of Jeremiah","epj"},
	{"Susanna","sus"},
	{"Bel and the Dragon","bel"},
	{"Prayer of Manasseh","man"},
	{"1 Macabees","ma1"},
	{"2 Macabees","ma2"},
	{"3 Macabees","ma3"},
	{"4 Macabees","ma4"},
	{"Sirach","sir"},
	{"Prayer of Azariah","aza"},
	{"Laodiceans","lao"},
	{"Joshua B","jsb"},
	{"Joshua A","jsa"},
	{"Judges B","jdb"},
	{"Judges A","jda"},
	{"Tobit BA","toa"},
	{"Tobit S","tos"},
	{"Psalms of Solomon","pss"},
	{"Bel and the Dragon Th","bet"},
	{"Daniel Th","dat"},
	{"Susanna Th","sut"},
	{"Odes","ode"},
	{"Matthew","mat"},
	{"Mark","mar"},
	{"Luke","luk"},
	{"John","joh"},
	{"Acts","act"},
	{"Romans","rom"},
	{"1 Corinthians","co1"},
	{"2 Corinthians","co2"},
	{"Galatians","gal"},
	{"Ephesians","eph"},
	{"Philippians","phi"},
	{"Colossians","col"},
	{"1 Thessalonians","th1"},
	{"2 Thessalonians","th2"},
	{"1 Timothy","ti1"},
	{"2 Timothy","ti2"},
	{"Titus","tit"},
	{"Philemon","plm"},
	{"Hebrews","heb"},
	{"James","jam"},
	{"1 Peter","pe1"},
	{"2 Peter","pe2"},
	{"1 John","jo1"},
	{"2 John","jo2"},
	{"3 John","jo3"},
	{"Jude","jde"},
	{"Revelation","rev"}
	)
	;


return $bookname;

}

</pre>



