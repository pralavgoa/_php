<table class="table table-striped">
<tbody>
<?php

  $ucrexRecursiveUrl = array('http://xxx/diagnostics/diagnostics.php');
    echo "<tr><td>Getting information from the hub</td></tr>\n";
    foreach ($ucrexRecursiveUrl as $value){
        recursiveUrlIsReachable($value);
    }

  function recursiveUrlIsReachable($url){
        $curlRequest = curl_init($url);
        curl_setopt($curlRequest, CURLOPT_HTTPHEADER, false);
        curl_setopt($curlRequest, CURLOPT_RETURNTRANSFER, true);
        $output = curl_exec($curlRequest);
        echo "$output\n";
        curl_close($curlRequest);
    }


  function urlIsReachable($url){
        $curlRequest = curl_init($url);
        curl_setopt($curlRequest, CURLOPT_HEADER, false);
        curl_setopt($curlRequest, CURLOPT_FAILONERROR, true);  // this works
        curl_setopt($curlRequest, CURLOPT_HTTPHEADER, Array("User-Agent: Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.15) Gecko/20080623 Firefox/2.0.0.15") ); // request as if Firefox
        curl_setopt($curlRequest, CURLOPT_NOBODY, true);
        curl_setopt($curlRequest, CURLOPT_RETURNTRANSFER,false);
        curl_setopt($curlRequest, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curlRequest, CURLOPT_NOBODY, true);
        curl_setopt($curlRequest, CURLOPT_CONNECTTIMEOUT ,0);
        curl_setopt($curlRequest, CURLOPT_TIMEOUT, 400);
        $output = curl_exec($curlRequest);
        curl_close($curlRequest);
        if($output==1){
            echo "<tr class='success'><td>$url : success</td></tr>\n";
        }
        else{
            echo "<tr class='danger'><td>$url : failed</td></tr>\n";
        }
    }
?>
</tbody>
</table>

