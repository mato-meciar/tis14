<?php

function hideMail($email) {
	$character_set = '+-.0123456789@ABCDEFGHIJKLMNOPQRSTUVWXYZ_abcdefghijklmnopqrstuvwxyz';
	$key = str_shuffle($character_set); $cipher_text = ''; $id = 'e'.rand(1,999999999);
	for ($i=0;$i<strlen($email);$i+=1) $cipher_text.= $key[strpos($character_set,$email[$i])];
	$script = 'var a="'.$key.'";var b=a.split("").sort().join("");var c="'.$cipher_text.'";var d="";';
	$script.= 'for(var e=0;e<c.length;e++)d+=b.charAt(a.indexOf(c.charAt(e)));';
	$script.= 'document.getElementById("'.$id.'").innerHTML="<a href=\\"mailto:"+d+"\\">"+d+"</a>"';
	$script = "eval(\"".str_replace(array("\\",'"'),array("\\\\",'\"'), $script)."\")"; 
 	$script = '<script type="text/javascript">/*<![CDATA[*/'.$script.'/*]]>*/</script>';
 	return '<span id="'.$id.'">[javascript protected email address]</span>'.$script;
}

function katedra($kat) {
	switch ($kat) {
		case "KAGDM":
			return "<a href='http://www.ddm.fmph.uniba.sk/index-KATEDRA.html'>KAGDM";
			break;
		case "KAMS":
			return "<a href='http://www.iam.fmph.uniba.sk/index-sk.html'>KAMS";
			break;
		case "KMANM":
			return "<a href='http://hore.dnom.fmph.uniba.sk/'>KMANM";
			break;
		case "KAFZM":
			return "<a href='http://www.fyzikazeme.sk/kafzm/'>KAFZM";
			break;
		case "KEF":
			return "<a href='http://www.dep.fmph.uniba.sk/mambo/'>KEF";
			break;
		case "KJFB":
			return "<a href='http://www.dnp.fmph.uniba.sk/index-sk.html'>KJFB";
			break;
		case "KTFDF":
			return "<a href='http://www.ddp.fmph.uniba.sk/'>KTFDF";
			break;
		case "KAI":
			return "<a href='http://dai.fmph.uniba.sk/'>KAI";
			break;
		case "KI":
			return "<a href='http://www.dcs.fmph.uniba.sk/'>KI";
			break;
		case "KZVI":
			return "<a href='http://www.edi.fmph.uniba.sk/'>KZVI";
			break;
		case "KJP":
			return "<a href='http://www.fmph.uniba.sk/index.php?id=1719'>KJP";
			break;
		case "KTVS":
			return "<a href='http://ktvs.fmph.uniba.sk/'>KTVS";
			break;
		case "DEK":
			return "<a href='http://www.fmph.uniba.sk/index.php?id=548'>DEK";
			break;
		case "VC":
			return "<a href='http://www.fmph.uniba.sk/index.php?id=549'>VC";
			break;
		case "KEC":
			return "<a href='http://www.fmph.uniba.sk/index.php?id=550'>KEC";
			break;
		case "CPP":
			return "<a href='http://fyzikus.fmph.uniba.sk/cpp/'>CPP";
			break;
		case "CEF":
			return "<a href='http://www.fmph.uniba.sk/index.php?id=554'>CEF";
			break;
		case "VL":
			return "<a href='http://www.fmph.uniba.sk/index.php?id=555'>VL";
			break;
		case "SB":
			return "<a href='http://www.fmph.uniba.sk/index.php?id=3214'>SB";
			break;			
	}
}

?>