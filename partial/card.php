<?php
require("./utils/darkModeCookie.php");
$requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
?>
<div class="container-card flex items-center w-full p-[20px] flex-col">
  <h1 class="text-center text-[1.7rem] font-cinzel ">Anime Populer</h1>
  <div class="anime-card-container w-[90%] grid md:grid-cols-4 sm:grid-cols-3 grid-cols-2 gap-5"></div>
</div>
<script>
  let page = 1;
  let ui = ``;
  function getResponse(page = 1) {
    axios.get(`https://api.jikan.moe/v4/top/anime?page=${page}`)
      .then((res) => {
        const data = res.data;
        ui = '';
        data.data?.map((anime, i) => {
          ui += `
                              <div class="${i} w-full my-2 shadow-xl rounded-xl overflow-hidden hover:scale-[105%] transition-all cursor-pointer">
                                <img src="${anime.images.webp.image_url}" alt="" class="w-full card-ratio p-2 rounded-2xl">
                                <h1 class="px-4 pb-2 text-[1.1rem] font-cinzel">${anime.title}</h1>
                              </div>
                            `;
        });
        document.querySelector("div.anime-card-container").innerHTML = ui;
      });
  }
  getResponse();
</script>
<?php
?>