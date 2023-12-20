<?php
ini_set('display_errors', 1);
error_reporting(E_ALL | E_STRICT);

require_once '../QuickBooks.php';
if (!defined('QUICKBOOKS_SERVER_SQL_ON_ERROR'))
{
    /**
     *
     */
    define('QUICKBOOKS_SERVER_SQL_ON_ERROR', 'continueOnError');
}

$requestID = null;
$user = 'quickbooks';
$action = 'ItemSitesQuery';
$ID = '1234';
$extra = array('Item_ListID' => ['1',2], 'Site_FullName' => ['1GAV']);
$err = '';
$last_action_time = time();
$last_actionident_time = time();
//$xml = file_get_contents('/Users/kpalmer/Projects/QuickBooks/docs/responses/CustomerQuery.xml');
$xml = '';
$idents = array();
$xml = (QuickBooks_Callbacks_SQL_Callbacks::ItemSitesQueryRequest($requestID, $user, $action, $ID, $extra, $err, $last_action_time, $last_actionident_time, $xml, $idents, $config = array() ));



function formatXmlString($xml){
    $xml = preg_replace('/(>)(<)(\/*)/', "$1\n$2$3", $xml);
    $token      = strtok($xml, "\n");
    $result     = '';
    $pad        = 0;
    $matches    = array();
    while ($token !== false) :
        $token = trim($token);
        if (preg_match('/.+<\/\w[^>]*>$/', $token, $matches)) :
            $indent=0;
        elseif (preg_match('/^<\/\w/', $token, $matches)) :
            $pad--;
            $indent = 0;
        elseif (preg_match('/^<\w[^>]*[^\/]>.*$/', $token, $matches)) :
            $indent=1;
        else :
            $indent = 0;
        endif;
        $line    = str_pad($token, strlen($token)+$pad, ' ', STR_PAD_LEFT);
        $result .= $line . "\n";
        $token   = strtok("\n");
        $pad    += $indent;
    endwhile;
    return $result;
}

echo formatXmlString($xml);
