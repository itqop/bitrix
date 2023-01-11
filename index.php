<?
require_once (__DIR__.'/crest.php');

$result = CRest::call(
		'event.bind',
		{{query[params][PARAMS]}}
	);

echo '<pre>';
	print_r($result);
echo '</pre>';