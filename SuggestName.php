<?php

require "Include/Config.php";


if ( !isset($_REQUEST['term']) )
    exit;

$rs = mysql_query('select per_FirstName, per_LastName, per_ID from person_per where per_FirstName like "'. mysql_real_escape_string($_REQUEST['term']) .'%" OR per_LastName like "'. mysql_real_escape_string($_REQUEST['term']) .'%"order by per_FirstName asc limit 0,10');

$data = array();
if ( $rs && mysql_num_rows($rs) )
{
    while( $row = mysql_fetch_array($rs, MYSQL_ASSOC) )
    {
        $data[] = array(
            'label' => $row['per_FirstName'] .', '. $row['per_LastName'] .' '. $row['per_ID'] ,
            'value' => $row['per_ID']
        );
    }
}

echo json_encode($data);
flush();

