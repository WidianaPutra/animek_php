<?php
session_start();
function setSession($key, $value)
{
  $_SESSION["$key"] = $key;
}
;

function unSetSession()
{
  session_unset();
  session_destroy();
}