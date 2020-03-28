<?php
require_once '../php/init.php';
if ($_SERVER['REQUEST_METHOD'] == "POST" && !empty($_POST['izomcsid'])) {
  $record_per_page = 9;
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
      <div class="card-header">
      <h5 class="card-title">' . $row['gynev'] . '</h5>
      </div>
  <div class="card-body">
    
    <p class="card-text">' . $row['leiras'] . '</p>
  </div>
  <div class="card-footer">
      <div class="row">
        <div class="col-lg-12">
           <span class="float-right"><img data-id=' . $row["gyakorlatok_id"] . ' id="del-gyakorlatok" src=../img/trash.png alt=""></span>
            <span class="float-left"><img data-toggle="modal" data-target="#exampleModalCenterUpdateGyakorlat" data-id=' . $row["gyakorlatok_id"] . ' id="update-gyakorlatok" src=../img/refresh.png alt=""></span>
      </div>
  </div>
  </div>
</div>
  </div>';
  }
  $page_query = "SELECT * FROM gyakorlatok WHERE izomcsoport_id = '$izomcsoportid';";
  $page_result = $con->query($page_query);
  $total_record = mysqli_num_rows($page_result);
  if($total_record == 0){
    $html .= "<div class='container'><h4 class='text-danger'>Ehhez az izomcsoporthoz még nem tartozik gyakorlat!<h4><div>";
  }
  $total_pages = ceil($total_record / $record_per_page);
  $link .= "<div class='col-lg-12 col-md-12' align='center' style='margin: 1rem 0 1rem 0;'>";
  for ($i = 1; $i <= $total_pages; $i++) {
    $link .= "<span class='pagination_link_gyakorlatok' id='$i'>" . $i . "</span>";
  }
  $link .= "</div>";
  echo $html;
  echo $link;

  $con->close();
}
