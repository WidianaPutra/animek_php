<?php
require("./utils/data/navlink_data.php");
?>

<nav class="fixed z-[99] w-full bg-white">
  <div class="desktop w-full flex md:justify-center justify-end h-[55px] items-center">
    <!-- desktop -->
    <div class="nav-liks flex w-[40%] flex items-center justify-between md:flex hidden">
      <?php foreach ($navbarData as $data): ?>
        <a href="<?= $data['link'] ?>" class="text-black font-cinzel font-[18px]"><?= $data['title'] ?></a>
      <?php endforeach; ?>
    </div>

    <div class="md:hidden md:w-full p-3">
      <img src="./public/icons/humberger.svg" alt="" class="btn-toggle-navbar w-[30px] cursor-pointer">
    </div>
  </div>
  <!-- mobile -->
  <div
    class="mobile-nav-drop-down nav-liks flex flex-col w-full md:hidden items-center gap-2 overflow-hidden h-[0px] height-transition">
    <?php foreach ($navbarData as $data): ?>
      <a href="<?= $data['link'] ?>" class="text-black font-cinzel font-[18px] p-5"><?= $data['title'] ?></a>
    <?php endforeach; ?>
  </div>
  <?php require("./partial/icons/darkMode.php") ?>
</nav>

<script>
  const navToggle = document.querySelector("img.btn-toggle-navbar");
  let isShow = false;

  navToggle.addEventListener("click", () => {
    document.querySelector("div.mobile-nav-drop-down").classList.toggle("h-[0px]");
    isShow = !isShow;
    if (isShow) {
      return navToggle.setAttribute("src", "./public/icons/closee.svg");
    }
    return navToggle.setAttribute("src", "./public/icons/humberger.svg");

  })
</script>