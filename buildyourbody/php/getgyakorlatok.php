<?php
require_once '../php/init.php';
if ($_SERVER['REQUEST_METHOD'] == "POST" && !empty($_POST['izomcsid'])) {
  $record_per_page = 6;
$html = '';
$page = '';
$link = '';
if (isset($_POST['page'])) {
    $page = $_POST['page'];
} else {
    $page = 1;
}
$start_from = ($page - 1) * $record_per_page;
  $izomcsoportid = $_POST['izomcsid'];
  $sql = "SELECT * FROM gyakorlatok WHERE izomcsoport_id = '$izomcsoportid' LIMIT $start_from, $record_per_page;";
  $res = $con->query($sql);
    while ($row = $res->fetch_assoc()) {
      $html .= '<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
      <div class="card" style="height: 420px; ">
  <div class="card-body">
    <h5 class="card-title">'.$row['gynev'].'</h5>
    <p class="card-text">'.$row['leiras'].'</p>
  </div>
</div>
  </div>';
    }
    $page_query = "SELECT * FROM gyakorlatok WHERE izomcsoport_id = '$izomcsoportid';";
    $page_result = $con->query($page_query);
    $total_record = mysqli_num_rows($page_result);
    $total_pages = ceil($total_record / $record_per_page);
    $link .= "<div class='col-lg-12 col-md-12' align='center' style='margin: 1rem 0 1rem 0;'>";
    for ($i=1; $i <= $total_pages; $i++) { 
      $link .= "<span class='pagination_link_gyakorlatok' id='$i'>" . $i . "</span>";
    }
    $link .= "</div>";
    echo $link;
  echo $html;

 
  $con->close();
}

