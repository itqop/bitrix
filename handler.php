<?
function call($method, $params){
    $queryUrl = 'http://'.$_REQUEST['DOMAIN'].'/rest/'.$method.'.json';
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
