<?php

if ( !isset($_REQUEST['term']) )
    exit;

$dblink = mysql_connect('localhost', '', '') or die( mysql_error() );
mysql_select_db('cla-constituents');

$rs = mysql_query('select per_FirstName, per_LastName, per_ID from person_per where per_FirstName or per_LastName like "'. mysql_real_escape_string($_REQUEST['term']) .'%" order by per_FirstName asc limit 0,10', $dblink);

$data = array();
if ( $rs && mysql_num_rows($rs) )
{
    while( $row = mysql_fetch_array($rs, MYSQL_ASSOC) )
    {
        $data[] = array(
            'label' => $row['per_FirstName'] .', '. $row['per_LastName'] .' '. $row['per_ID'] ,
            'value' => $row['per_FirstName']
        );
    }
}

echo json_encode($data);
flush();
