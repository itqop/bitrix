<?
file_put_contents(
    __DIR__ . '/log/' . time() . '.txt',
    var_export($_REQUEST, true)
 );
function out($var, $var_name = '') {
    echo '<pre style="outline: 1px dashed red;padding:5px;margin:10px;color:white;background:black;">';
    if ( !empty($var_name)) {
            echo '<h3>' + $var_name + '</h3>';
    }
    if (is_string($var)) {
            $var = htmlspecialchars($var);
    }
    print_r($var);
    echo '</pre>';
}

function call($method, $params){
    $queryUrl = 'http://10.11.0.49/rest/58/u6cichq19ndha8gf/'.$method.'.json';
    //$queryUrl = 'http://'.$_REQUEST['DOMAIN'].'/rest/'.$method.'.json';
    $queryData = http_build_query(array_merge($params, array("auth" => $_REQUEST['AUTH_ID'])));
    
    
    $curl = curl_init();
    curl_setopt_array($curl, array(
            CURLOPT_SSL_VERIFYPEER => 0,
            CURLOPT_POST => 1,
            CURLOPT_HEADER => 0,
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => $queryUrl,
            CURLOPT_POSTFIELDS => $queryData,
    ));
    
    
    $result = json_decode(curl_exec($curl), true);
    
    curl_close($curl);
    out($result);
    
    };

call('tasks.task.update', ['taskId' => 29, 'fields' => ['TITLE' => 'YRA']]);


