<?php
$str_order_list = "";
$str_carousel = "";
$str_carousel_thumbnail = "";
$result = $qlgame->queryDB("SELECT * FROM GAME ORDER BY MA_GAME DESC LIMIT 5");

$i = 0;
while ($row = mysqli_fetch_array($result)) {
  $str_order_list .= "
    <li data-target='#carouselId' data-slide-to='0' class='" . (($i == 0) ? "active" : "") . "'></li>
  ";

  $str_carousel .= "
    <div class='carousel-item " . (($i == 0) ? "active" : "") . "'>
      <div class='mark-slider w-100'>
        <img class='d-block w-100' style='border-radius: 15px;' src='" . $row[4] . "'>
      </div>
      <div class='carousel-caption d-none d-md-block'>
        <h3>" . $row[1] . "</h3>
        <p>Description</p>
      </div>
    </div>
  ";

  $str_carousel_thumbnail .= "
    <li class='slider d-flex flex-row " . (($i == 0) ? "active" : "") . "'>
      <div class='thumbnail'><img src='" . $row[4] . "'></div>
      <div class='title-thumbnail'>" . $row[1] . "</div>
    </li>
  ";
  $i++;
}
?>
<div class="d-flex flex-row">
  <div id="carouselId" class="carousel slide w-100" data-ride="carousel">
    <ol class="carousel-indicators">
      <?php echo $str_order_list; ?>
    </ol>
    <div class="carousel-inner" role="listbox">
      <?php echo $str_carousel; ?>
    </div>
    <a class="carousel-control-prev" href="#carouselId" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselId" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>

  <div id="list-slider">
    <ul class="d-flex flex-column">
      <?php echo $str_carousel_thumbnail; ?>
    </ul>
  </div>
</div>

<script>
  const list_slider = document.getElementById("list-slider");
  const sliders = document.getElementsByClassName("slider");
  const carousel = document.getElementById("carouselId");
  for (let i = 0; i < sliders.length; i++) {
    sliders[i].addEventListener('click', function() {
      var current = list_slider.getElementsByClassName("active");
      if (current.length > 0) {
        current[0].className = current[0].className.replace(" active", "");
      }
      this.className += " active";
      $('#carouselId').carousel(i);
    });
  }
</script>