<?php
//$conn = mysqli_connect("localhost", "root", "", "ajaxcrud") or die("Connection Failed");
include "db.php";

$sql = "SELECT * FROM students";
$result = mysqli_query($conn, $sql) or die("SQL Query Failed");
$output = "";
if (mysqli_num_rows($result) > 0) {
  $output = '<table border="1" width="100%" cellspacing="0" cellpadding="10px">
      <tr> 
        <th width="100px">Id</th>
        <th width="100px">Name</th>
        <th width="100px">Gender</th>
        <th width="100px">Stream</th>
        <th width="100px">Subject</th>
        <th width="100px">Image</th>
        <th width="100px">Edit</th>
        <th width="100px">Delete</th>
      </tr>';
  while ($row = mysqli_fetch_assoc($result)) {
    $output .= "<tr>
                        <td align='center'>{$row["id"]}</td>
                        <td>{$row["name"]}</td>
                        <td>{$row["gender"]}</td>
                        <td>{$row["stream"]}</td>
                        <td>{$row["subject"]}</td>
                        <td><img style='width: 100px;' src='image_folder/{$row['stdimg']}'></td>
                        <td align='center'><button class='edit-btn btn btn-success ' data-eid='{$row["id"]}'>Edit</button></td>
                        <td><button class='delete-btn btn btn-danger' data-id='{$row['id']}'>Delete</button></td>
                    </tr>";
  }
  $output .= "</table>";
  mysqli_close($conn);

  echo $output;
} else {
  echo "<h2>No Record Found.</h2>";
}


?>
<!--"<tr><td>{$row["id"]}</td><td>{$row["first_name"]} {$row["last_name"]}</td><td><button class='delete-btn' data-id='{$row['id']}'>Delete</button></td></tr>";-->