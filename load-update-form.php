<?php
$student_id = $_POST["id"];
include "db.php";

$sql = "SELECT * FROM students WHERE id = {$student_id}";
$result = mysqli_query($conn, $sql) or die("SQL Query Failed");

$output = "";
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);

    // Explode subjects string into array
    $subjects = explode(",", $row['subject']);

    $output .= "
    <form id='updateForm'  enctype='multipart/form-data'>
        <input type='hidden' name='id' value='{$row["id"]}'>

        <p>Name</p>
        <p><input type='text' name='name' value='{$row["name"]}'></p>

        <p>Gender</p>
        <p><label><input type='radio' name='gender' value='Male' " . ($row["gender"] == "Male" ? "checked" : "") . ">Male</label></p>
        <p><label><input type='radio' name='gender' value='Female' " . ($row["gender"] == "Female" ? "checked" : "") . ">Female</label></p>
        <p><label><input type='radio' name='gender' value='Other' " . ($row["gender"] == "Other" ? "checked" : "") . ">Other</label></p>

        <p>Stream</p>
        <select name='stream'>
            <option value=''>--Select--</option>
            <option value='BCA' " . ($row["stream"] == "BCA" ? "selected" : "") . ">BCA</option>
            <option value='BBA' " . ($row["stream"] == "BBA" ? "selected" : "") . ">BBA</option>
            <option value='MCA' " . ($row["stream"] == "MCA" ? "selected" : "") . ">MCA</option>
            <option value='B.Tech' " . ($row["stream"] == "B.Tech" ? "selected" : "") . ">B.Tech</option>
        </select>

        <p>Subject</p>
        <p><label><input type='checkbox' name='sub[]' value='C' " . (in_array("C", $subjects) ? "checked" : "") . ">C</label></p>
        <p><label><input type='checkbox' name='sub[]' value='C++' " . (in_array("C++", $subjects) ? "checked" : "") . ">C++</label></p>
        <p><label><input type='checkbox' name='sub[]' value='Java' " . (in_array("Java", $subjects) ? "checked" : "") . ">Java</label></p>
        <p><label><input type='checkbox' name='sub[]' value='Python' " . (in_array("Python", $subjects) ? "checked" : "") . ">Python</label></p>

        <p>Image</p>
        <p><input type='file' name='simg'></p>
        <p>Current Image: <img src='image_folder/{$row["stdimg"]}' style='width: 100px;'></p>

        <p><input  type='submit' name='update' value='Update'></p>
    </form>
    ";

    mysqli_close($conn);
    echo $output;
} else {
    echo "<h2>No Record Found</h2>";
}
