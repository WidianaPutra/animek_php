<?php
require("./service/db.php");
require("./utils/session.php");

if (isset($_POST['submit'])) {
  $username = $_POST['username'];
  $password = hash("sha256", $_POST['password']);


  if (!(empty($username) && empty($password))) {
    $sql = "SELECT * FROM users WHERE password = '$password' AND username ='$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      setSession("isLogin", true);
      setSession("username", $username);
      header("Location: ./");
    } else {
      echo "<script>
      Swal.fire({
      title: 'Error',
      text: 'Username atau password salah',
      icon: 'error'
    })</script>";

    }
  }
}
?>

<div class="flex w-full h-screen justify-center items-center bg-gray-400">
  <div class="w-full max-w-md bg-white rounded-lg shadow-md p-6 m-3">
    <h2 class="text-2xl font-bold text-center text-gray-700 mb-6">Login</h2>
    <form method="POST" class="space-y-4">

      <!-- Username -->
      <div>
        <label for="username" class="block text-sm font-medium text-gray-600">Username</label>
        <input type="text" id="username" name="username" required
          class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
      </div>

      <!-- Password -->
      <div>
        <label for="password" class="block text-sm font-medium text-gray-600">Password</label>
        <div class="flex items-center border border-gray-300 rounded-lg">
          <input type="password" id="password" name="password" required
            class="w-full mt-1 px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
          <img src="./public/assets/icons/eyeClose.svg" alt="Toggle Password Visibility" id="toglePassword"
            class=" w-[25px] mx-2 cursor-pointer">
        </div>
      </div>

      <div class="flex flex-col">
        <a class="text-[13px] cursor-pointer">*forget password</a>
        <a href="?login=false" class="text-[13px] cursor-pointer">create new account</a>
      </div>

      <!-- Submit Button -->
      <div>
        <button type="submit" name="submit"
          class="w-full py-2 px-4 bg-blue-500 hover:bg-blue-600 text-white font-semibold rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
          Login
        </button>
      </div>
    </form>
  </div>
</div>
<script>
  const inputPassword = document.getElementById("password");
  const togglePassword = document.getElementById("toglePassword");
  let showPassword = false;
  togglePassword.addEventListener("click", () => {
    showPassword = !showPassword;
    if (showPassword) {
      inputPassword.setAttribute("type", "text");
      return togglePassword.setAttribute("src", "./public/assets/icons/eye.svg");
    }
    togglePassword.setAttribute("src", "./public/assets/icons/eyeClose.svg");
    return inputPassword.setAttribute("type", "password")
  });
</script>