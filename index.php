<?php

include "./api/current.php";
require_once "./api/template.php";

$tpl = new Template(json_decode($response, true));
echo $tpl->render();

?>