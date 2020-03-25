<?php
require_once '../php/init.php';
$record_per_page = 5;
$html = '';
$page = '';
$link = '';
$date = $_POST['date'];
$uid = $_SESSION['uid'];
if (isset($_POST['page'])) {
    $page = $_POST['page'];
} else {
    $page = 1;
}
$start_from = ($page - 1) * $record_per_page;
$query = "SELECT gyakorlatok.gynev, edzestervek.sorozatszam, edzestervek.ismetlesszam, edzestervek.edzesterv_id 
FROM edzestervek INNER JOIN gyakorlatok ON edzestervek.gyakorlat_id = gyakorlatok.gyakorlatok_id INNER JOIN edzesek ON edzesek.edzesterv_id = edzestervek.edzesterv_id
WHERE edzesek.idopont = '$date' AND edzesek.f_id = '$uid' LIMIT $start_from, $record_per_page;";
$result = $con->query($query);
$html = "<table class='table table-edzes table-light table-striped table-borderless'><thead class=''>
<tr>
    <th>Gyakorlat</th>
    <th>Sorozatszám</th>
    <th>Ismétlésszám</th>
    <th>Törlés</th>
</tr>

</thead><tbody>";
while ($row = $result->fetch_array()) {
    $html .= '
    <tr>
    <td>' . $row[0] . '</td>
    <td>' . $row[1] . '</td>
    <td>' . $row[2] . '</td>
    <td><img data-id=' . $row[3] . ' id="edzes_trash" src=../img/trash.png alt=""></td>
    </tr>
    ';
}
$html .= "</tbody></table>";
$page_query = "SELECT gyakorlatok.gynev, edzestervek.sorozatszam, edzestervek.ismetlesszam, edzestervek.edzesterv_id 
FROM edzestervek INNER JOIN gyakorlatok ON edzestervek.gyakorlat_id = gyakorlatok.gyakorlatok_id INNER JOIN edzesek ON edzesek.edzesterv_id = edzestervek.edzesterv_id
WHERE edzesek.idopont = '$date';";
$page_result = $con->query($page_query);
$total_records = mysqli_num_rows($page_result);
$total_pages = ceil($total_records / $record_per_page);
$link .= "<div class='col-lg-12 col-md-12 col-sm-12' align='center'>";
for ($i = 1; $i <= $total_pages; $i++) {
    $link .= "<span class='pagination_link' id='$i'>" . $i . "</span>";
}
$link .= "</div>";
echo $html;
echo $link;
