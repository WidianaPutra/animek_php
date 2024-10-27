<?php
require("./routes/route.php");
require("./utils/cookie.php");

$requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
?>
<!DOCTYPE html>
<html lang="en">
<?php require("./partial/metadata.php") ?>

<body class="bg-gray-200">
  <?php
  if ($requestUri !== "/routing_tes/account" && $requestUri !== "/routing_tes/detail") {
    require("./partial/navbar.php");
    echo "<div style='height: 70px;'></div>";
  }
  Routing($requestUri);
  ?>
</body>

</html>