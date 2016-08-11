<?php

/*
	tool hacker 
	by Pablo Santhus
	08/05/2016
	LFD check Vuln
*/

	error_reporting(0);
	set_time_limit(0);
	
	if(isset($argv[2]) && $argv[1] == "-u"){

print"\n";
echo"		 (                         (                                 \n";     
echo" )\ )          )  (        )\ )                 )    )            	 \n";
echo"(()/(    )  ( /(  )\      (()/(    )         ( /( ( /(    (       	 \n";
echo"/(_))( /(  )\())((_) (    /(_))( /(   (     )\()))\())  ))\  (      \n";
echo"(_))  )(_))((_)\  _   )\  (_))  )(_))  )\ ) (_))/((_)\  /((_) )\    \n";
echo"| _ \((_)_ | |(_)| | ((_) / __|((_)_  _(_/( | |_ | |(_)(_))( ((_) 	 \n";
echo"|  _// _` || '_ \| |/ _ \ \__ \/ _` || ' \))|  _|| ' \ | || |(_-< 	 \n";
echo"|_|  \__,_||_.__/|_|\___/ |___/\__,_||_||_|  \__||_||_| \_,_|/__/	 \n";
print"\n";
echo "LFD Check \n";
echo "Criado por Pablo Santhus \n";
echo "Escaneando website: " . $argv[2] . "\n";
sleep(3);
print "\n";


		$url = $argv[2] . "/";
		$webs = array('download.php?arq=', 'download.php?arquivo=', 'download.php?file=', 
		'baixar.php?arquivo=', 'baixar.php?arq=', 'baixar.php?file=', 'download.php?url=', 
		'download.php?id=', 'baixar.php?url=', 'baixar.php?id=', 'anexos/download.php?file=',
		'anexos/download.php?file=', 'baixar.php?doc=', 'download.php?doc=', 'baixar.php?pdf=', 'download.php?doc=',
		'download.php?pdf=','albuns/marketing/baixar.php?arquivo=','portaldocolaborador/baixar.php?arquivo=','uploads/baixar.php?arquivo=','site/baixar.php?arquivo=','site/baixar.php?arq=','wp-content/themes/download/baixar.php?arquivo=','wp-content/themes/download/baixar.php?arq=','wp-content/download/baixar.php?arquivo=');

		foreach($webs as $web){
			$site = $url . $web;
			$header = get_headers($site);
			if(eregi('200', $header[0])){
				print "\n";
				print "----------------------------------------------------------------------- \n";
				print "\n";
				print "  [+] website vulneravel: " .$url.$web. 			   "\n";
				print "\n";
				print "----------------------------------------------------------------------- \n";
				print "\n";
				$fp = @fopen("vuln.txt", 'a');
				fwrite($fp, $url.$web);
			}else{
				print "[-] website NOT vuln: " .$url.$web. 			   "\n";
			}
		}
	}else{
		echo topo();
	}

	if($argv[1] == "-l" && isset($argv[2])){
		$list = $argv[2];
		$sites = file($list);
		foreach($sites as $site){
			$site = str_replace("\r", "", $site);
			$site = str_replace("\n","",$site);

			$site = $site . "/";
			$w = array('download.php?arq=', 'download.php?arquivo=', 'download.php?file=', 
		'baixar.php?arquivo=', 'baixar.php?arq=', 'baixar.php?file=', 'download.php?url=', 
		'download.php?id=', 'baixar.php?url=', 'baixar.php?id=', 'anexos/download.php?file=',
		'anexos/download.php?file=', 'baixar.php?doc=', 'download.php?doc=', 'baixar.php?pdf=', 'download.php?doc=',
		'download.php?pdf=','albuns/marketing/baixar.php?arquivo=','portaldocolaborador/baixar.php?arquivo=','uploads/baixar.php?arquivo=','site/baixar.php?arquivo=','site/baixar.php?arq=','wp-content/themes/download/baixar.php?arquivo=','wp-content/themes/download/baixar.php?arq=','wp-content/download/baixar.php?arquivo=');
			foreach($w as $ww){
				$local = $site.$ww;
				$h = get_headers($local);
				if(eregi('200', $h[0])){
				print "\n";
				print "----------------------------------------------------------------------- \n";
				print "\n";
				print "  [+] website vulneravel: " .$site.$ww. 			   "\n";
				print "\n";
				print "----------------------------------------------------------------------- \n";
				print "\n";
				$fp = @fopen("vuln.txt", 'a');
				fwrite($fp, $site.$ww."\n");
				}else{
					print "[-] website NOT vuln: " .$site.$ww. 			   "\n";
					}
				}
			}
		}

	function help(){

		echo "Opcoes: [-u, -l, -h] \n";
		print " -u" . "        " . "Voce ira adicionar um site / exemplo: php lfdcheck.php -u http://exemplo.com.br \n";
		print " -l" . "        " . "Voce ira adicionar o caminho de sua lista de sites / exemplo: php lfdcheck.php -l sites.txt \n";
		print " -h" . "        " . "Exibe o menu de ajudas / exemplo: php lfdcheck.php -h \n";
	}

	if($argv[1] == "-h"){
		help();
	}

function topo(){
print"\n";
echo"		 (                         (                                 \n";     
echo" )\ )          )  (        )\ )                 )    )            	 \n";
echo"(()/(    )  ( /(  )\      (()/(    )         ( /( ( /(    (       	 \n";
echo"/(_))( /(  )\())((_) (    /(_))( /(   (     )\()))\())  ))\  (      \n";
echo"(_))  )(_))((_)\  _   )\  (_))  )(_))  )\ ) (_))/((_)\  /((_) )\    \n";
echo"| _ \((_)_ | |(_)| | ((_) / __|((_)_  _(_/( | |_ | |(_)(_))( ((_) 	 \n";
echo"|  _// _` || '_ \| |/ _ \ \__ \/ _` || ' \))|  _|| ' \ | || |(_-< 	 \n";
echo"|_|  \__,_||_.__/|_|\___/ |___/\__,_||_||_|  \__||_||_| \_,_|/__/	 \n";
print"\n";
echo "LFD Check \n";
echo "Criado por Pablo Santhus \n";
echo "AJUDA: php lfdcheck.php -h \n";
print "\n";
}

?>
