<?php
session_start();
function Routing($url)
{
  function handleLoginPage()
  {
    if (isset($_SESSION['isLogin'])) {
      return require("./pages/profile.php");
    } else {
      if (isset($_GET['login']))
        return $_GET['login'] == "true" ? require("./pages/login.php") : require("./pages/register.php");
    }
  }

  switch ($url) {
    case "/routing_tes/":
      require("./pages/home.php");
      break;
    case "/routing_tes/anime":
      require("./pages/anime.php");
      break;
    case ("/routing_tes/detail"):
      include "./pages/detailAnime.php";
      break;
    case "/routing_tes/account":
      handleLoginPage();
      break;
    default:
      http_response_code(404);
      echo "Error, page was not found";
      break;
  }
  ;
}