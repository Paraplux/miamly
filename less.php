<?php 

require './components/lessc.inc.php';

$less = new lessc;
$less->checkedCompile("./css/less/", "./css/main.css");

