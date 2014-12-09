<?php

include "./api/current.php";
require_once "./api/template.php";

$tpl = new Template($response);
echo $tpl->render();

?>