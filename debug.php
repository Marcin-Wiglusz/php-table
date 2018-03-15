<?php

function treinit() {
    file_put_contents('tre.txt', '');
}

function tre($o, $label = null) {
    if ($label) {
        file_put_contents('tre.txt', "\n\n{$label}\n\n", FILE_APPEND);
    }
    file_put_contents('tre.txt', "\n\n", FILE_APPEND);
    if (is_scalar($o)) {
        $v = $o;
    } else {
        $v = var_export($o, true);
    }
//    if ($remEscape) {
//        $v = preg_replace("|\\\\'|", "'", $v);
//    }
    file_put_contents('tre.txt', $v, FILE_APPEND);
    file_put_contents('tre.txt', "\n\n", FILE_APPEND);
}

function pprint_r($d) {
    print '<pre>';
    print_r($d);
    print '</pre>';
}

function p($d) {
	pprint_r($d);
}

function pd($d, $checkRemoteAddress=0) {
    if (1 || $checkRemoteAddress && $_SERVER['REMOTE_ADDR'] == '89.228.25.63') {
	    print '<div style="border: 1px solid #FF0000; width:100%;">';
	    p($d);
	    print '</div>';
    }
    exit;
}

function pdd($d) {
    static $c;
    $c++;
    $id = "pdd_{$c}";
    print '<textarea id="'.$id.'" style="height:100px;width:100%;border:1px solid red;font-size:9pt;">';
    print_r($d);
    print '</textarea>';
    print '<script>document.getElementById(\''.$id.'\').select();document.getElementById(\''.$id.'\').focus();</script>';
}


    function pd2($o) {
	  return;
	if(!@$_GET['debug']) {
	  return;
	}
	print "\n";
	print_r($o);
	print "\n";
    }

    function pd3($o) {
	  return;
	if(!@$_GET['debug']) {
	  return;
	}
	print "\n";
	print_r($o);
	print "\n";
    }

    function pd4($o) {
	return;
	if(!@$_GET['debug']) {
	  return;
	}
	print "\n";
	print_r($o);
	print "\n";
    }