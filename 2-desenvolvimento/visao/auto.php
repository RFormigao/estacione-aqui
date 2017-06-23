<?php
function __autoload($classe)
{
    require_once "../modelo/{$classe}.php";
}
?>
