<?php
$csv = shell_exec('cat /home/snchau/scripts/ucrex_querier/querier_php_output.txt');
function csvToJson($csv) {
    $rows = explode("\n", trim($csv));
    $csvarr = array_map(function ($row) {
        $keys = array('qname','qtime','qsite1','qsite2','qsite3','qsite4');
        return array_combine($keys, str_getcsv($row));
    }, $rows);
    $json = json_encode($csvarr);

    return $json;
}

$json = csvToJson($csv);

header('Content-Type: application/json');
header('Cache-Control: no-cache');
echo "$json";
?>

