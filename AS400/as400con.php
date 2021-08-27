<?
date_default_timezone_set('Asia/Tashkent');
define('AS400IP','122.212.243.75'); //GMUZ AS/400 tizimining ip-adresi
define('AS400PORT','23'); //GMUZ AS/400 tizimining PORT
define('DBNAME','iasp01'); //database name
$dsn = "DRIVER={Client Access ODBC Driver (32-bit)};system=".AS400IP.";PORT=".AS400PORT.";DATABASE=".DBNAME.";PROTOCOL=TCPIP;USERNAME=;PWD=;CCSID=1208";
$dsnAll = "DRIVER={iSeries Access ODBC Driver};SYSTEM=".AS400IP.";PORT=".AS400PORT.";DATABASE=".DBNAME.";PROTOCOL=TCPIP;USERNAME='';PWD='';CCSID=1208";
//$ConnectionString="Dsn=AS400_ODBC; SYSTEM=".AS400IP.";PORT=".AS400PORT.";DATABASE=".DBNAME.";PROTOCOL=TCPIP;USERNAME='';PWD='';";
//$dsnAll="DRIVER={iSeries Access ODBC Driver}; QRYSTGLMT=-1; PKG=QGPL/DEFAULT(IBM),2,0,1,0,512; LANGUAGEID=ENU; DFTPKGLIB=QGPL; DBQ=QGPL; SYSTEM=122.212.243.75";
$odbc_as400_connect = odbc_connect($dsnAll,'PORTAL','LATROP123');

?>
