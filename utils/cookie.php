<?php
function cookieSet($name, $value)
{
  $ex = time() + 3600 * 24 * 32; //  
  setCookie($name, $value, $ex, "/");
}

function removeCookie($name, $value)
{
  setcookie($name, $value, time() - 3600, '/');
}