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
			return "<a href='http://www.ddm.fmph.uniba.sk/index-KATEDRA.html' target='_blank'>KAGDM";
			break;
		case "KAMS":
			return "<a href='http://www.iam.fmph.uniba.sk/index-sk.html' target='_blank'>KAMS";
			break;
		case "KMANM":
			return "<a href='http://hore.dnom.fmph.uniba.sk/' target='_blank'>KMANM";
			break;
		case "KAFZM":
			return "<a href='http://www.fyzikazeme.sk/kafzm/' target='_blank'>KAFZM";
			break;
		case "KEF":
			return "<a href='http://www.dep.fmph.uniba.sk/mambo/' target='_blank'>KEF";
			break;
		case "KJFB":
			return "<a href='http://www.dnp.fmph.uniba.sk/index-sk.html' target='_blank'>KJFB";
			break;
		case "KTFDF":
			return "<a href='http://www.ddp.fmph.uniba.sk/' target='_blank'>KTFDF";
			break;
		case "KAI":
			return "<a href='http://dai.fmph.uniba.sk/' target='_blank'>KAI";
			break;
		case "KI":
			return "<a href='http://www.dcs.fmph.uniba.sk/' target='_blank'>KI";
			break;
		case "KZVI":
			return "<a href='http://www.edi.fmph.uniba.sk/' target='_blank'>KZVI";
			break;
		case "KJP":
			return "<a href='http://www.fmph.uniba.sk/index.php?id=1719' target='_blank'>KJP";
			break;
		case "KTVS":
			return "<a href='http://ktvs.fmph.uniba.sk/' target='_blank'>KTVS";
			break;
		case "DEK":
			return "<a href='http://www.fmph.uniba.sk/index.php?id=548' target='_blank'>DEK";
			break;
		case "VC":
			return "<a href='http://www.fmph.uniba.sk/index.php?id=549' target='_blank'>VC";
			break;
		case "KEC":
			return "<a href='http://www.fmph.uniba.sk/index.php?id=550' target='_blank'>KEC";
			break;
		case "CPP":
			return "<a href='http://fyzikus.fmph.uniba.sk/cpp/' target='_blank'>CPP";
			break;
		case "CEF":
			return "<a href='http://www.fmph.uniba.sk/index.php?id=554' target='_blank'>CEF";
			break;
		case "VL":
			return "<a href='http://www.fmph.uniba.sk/index.php?id=555' target='_blank'>VL";
			break;
		case "SB":
			return "<a href='http://www.fmph.uniba.sk/index.php?id=3214' target='_blank'>SB";
			break;			
	}
}

?>
