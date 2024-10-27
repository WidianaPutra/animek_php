<?php
require("./service/db.php");
require("./utils/session.php");
$isShowPassword = true;
if (isset($_POST['submit'])) {
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = hash("sha256", $_POST['password']);

  if (!(empty($username) && empty($email) && empty($password))) {
    $sql = "SELECT * FROM users WHERE  email = '$email' AND username ='$username'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      echo "<script>
      Swal.fire({
      title: 'Error',
      text: 'Email atau Username sudah digunakan',
      icon: 'error'
    })</script>";
    } else {
      $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
      $conn->query($sql);
      setSession("isLogin", true);
      setSession("username", $username);
      header("Location: ./");
    }
  } else {
    echo "<script>
      Swal.fire({
      title: 'Error',
      text: 'Lengkapi form',
      icon: 'error'
  })</script>";
  }

}
?>

<div class="flex w-full h-screen justify-center items-center bg-gray-400">
  <div class="w-full max-w-md bg-white rounded-lg shadow-md p-6 m-3">
    <h2 class="text-2xl font-bold text-center text-gray-700 mb-6">Register User</h2>
    <form method="POST" class="space-y-4">

      <!-- Username -->
      <div>
        <label for="username" class="block text-sm font-medium text-gray-600">Username</label>
        <input type="text" id="username" name="username" required
          class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
      </div>

      <!-- Email -->
      <div>
        <label for="email" class="block text-sm font-medium text-gray-600">Email</label>
        <input type="email" id="email" name="email" required
          class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
      </div>

      <!-- Password -->
      <div>
        <label for="password" class="block text-sm font-medium text-gray-600">Password</label>
        <div class="felx">
          <input type="<?= $isShowPassword === true ? "text" : "password" ?>" id="password" name="password" required
            class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
          <img src="./public/icons/eye.svg" alt="">
        </div>
      </div>

      <div class="flex flex-col">
        <a href="?login=true" class="text-[13px] underline cursor-pointer">Login</a>
      </div>

      <!-- Submit Button -->
      <div>
        <button type="submit" name="submit"
          class="w-full py-2 px-4 bg-blue-500 hover:bg-blue-600 text-white font-semibold rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
          Register
        </button>
      </div>
    </form>
  </div>
</div>