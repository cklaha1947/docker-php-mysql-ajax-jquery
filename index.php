<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, world!</title>
    <style>
        .form-container {
            max-width: 700px;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-family: Arial, sans-serif;
        }

        .form-row {
            display: flex;
            align-items: center;
            margin-bottom: 12px;
            flex-wrap: wrap;
        }

        .form-row label {
            width: 120px;
            margin-right: 10px;
            font-weight: bold;
        }

        .form-row input[type="text"],
        .form-row select,
        .form-row input[type="file"] {
            flex: 1;
            padding: 6px 8px;
            border: 1px solid #aaa;
            border-radius: 4px;
            min-width: 200px;
        }

        .form-row input[type="radio"],
        .form-row input[type="checkbox"] {
            margin-right: 5px;
        }

        .subject-group label,
        .gender-group label {
            margin-right: 15px;
        }

        .form-row input[type="submit"] {
            padding: 8px 16px;
            background-color: #28a745;
            border: none;
            color: white;
            border-radius: 4px;
            cursor: pointer;
        }

        .form-row input[type="submit"]:hover {
            background-color: #218838;
        }
    </style>



</head>

<body>




    <form id="studentForm" class="form-container" action="ins.php" method="post" enctype="multipart/form-data">
        <h2 style="text-align: center;">Insert Form</h2>

        <div class="form-row">
            <label>Name</label>
            <input type="text" name="name" required>
        </div>

        <div class="form-row">
            <label>Gender</label>
            <div class="gender-group" required>
                <label><input type="radio" name="gender" value="Male" required>Male</label>
                <label><input type="radio" name="gender" value="Female" required>Female</label>
                <label><input type="radio" name="gender" value="Other" required>Other</label>
            </div>
        </div>

        <div class="form-row">
            <label>Stream</label>
            <select name="stream" required>
                <option value="">--Select--</option>
                <option value="BCA">BCA</option>
                <option value="BBA">BBA</option>
                <option value="MCA">MCA</option>
                <option value="B.Tech">B.Tech</option>
            </select>
        </div>

        <div class="form-row">
            <label>Subjects</label>
            <div class="subject-group">
                <label><input type="checkbox" name="sub[]" value="C">C</label>
                <label><input type="checkbox" name="sub[]" value="C++">C++</label>
                <label><input type="checkbox" name="sub[]" value="Java">Java</label>
                <label><input type="checkbox" name="sub[]" value="Python">Python</label>
            </div>
        </div>

        <div class="form-row">
            <label>Image</label>
            <input type="file" name="simg" accept="image/*" required>
        </div>

        <div class="form-row">
            <input type="submit" name="save" value="Save">
        </div>
    </form>

    <div id="response"></div>

    <hr>
    <h1>Table Record</h1>
    <div id="table-data"></div>


    <!--slide up-down for edit data-->

    <!-- Modal Wrapper (Backdrop) -->
    <div id="modal" style="  display: none;
    position: fixed;
    top: 0; left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0,0,0,0.5);
    z-index: 999;
    display: flex;
    align-items: center;
    justify-content: center;">

        <!-- Modal Content -->
        <div style="width: 500px; background: #fff; border-radius: 5px; overflow: hidden;">

            <!-- Modal Header (Fixed) -->
            <div style="background: #f1f1f1; padding: 10px; position: sticky; top: 0; z-index: 1; display: flex; justify-content: space-between; align-items: center;">
                <strong>Edit Record</strong>
                <button id="close-btn" style="background: red; color: white; border: none; padding: 5px 10px; cursor: pointer;">X</button>
            </div>

            <!-- Modal Body (Scrollable Content) -->
            <div id="modal-form" style="height: 400px; overflow-y: auto; padding: 15px;">

            </div>

        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script type="text/javascript" src="./js/jquery-3.7.1.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {

            $("#modal").hide();

            //load-table---------------------------------------------------(1)
            function loadTable() {
                $.ajax({
                    url: "ajax-load.php",
                    type: "POST",
                    success: function(data) {
                        $("#table-data").html(data);
                    }
                });
            }
            loadTable();

            //load-table on click of submit button


            //Insert data---------------------------------------------------------(2)
            $('#studentForm').on('submit', function(e) {
                e.preventDefault(); // prevent default form submission

                var formData = new FormData(this); // create FormData from form

                $.ajax({
                    url: 'ins.php',
                    type: 'POST',
                    data: formData,
                    contentType: false, // prevent jQuery from setting contentType
                    processData: false, // prevent jQuery from processing data
                    success: function(response) {
                        $('#response').html(response); // display success or error message
                        $('#studentForm')[0].reset(); // optional: reset form
                        loadTable();
                    }

                });
            });


            //delete:- --------------------------------------------------------------------(3)
            $(document).on("click", ".delete-btn", function() {
                if (confirm("Do you really want to dalete this record ?")) {


                    var studentId = $(this).data("id");
                    //var element=this;
                    //alert(studentId); 
                    $.ajax({
                        url: "ajax-delete.php",
                        type: "POST",
                        data: {
                            id: studentId
                        },
                        success: function(data) {
                            if (data == 1) {
                                //$(element).closest("tr").fadeOut();
                                loadTable();
                            }
                        }
                    });
                }
            });


            // Show modal box for edit-------------------------------------------------(4)
            $(document).on("click", ".edit-btn", function() {
                var studentId = $(this).data("eid");

                $.ajax({
                    url: "load-update-form.php",
                    type: "POST",
                    data: { 
                        id: studentId
                    },
                    success: function(data) {
                        $("#modal-form").html(data);
                        $("#modal").slideDown(); // show modal
                    }
                });
            });

            // Hide modal box on close----------------------------------------------(5)
            $(document).on("click", "#close-btn", function() {
                $("#modal").slideUp(); // hide modal
            });


            //save update form----------------------------------------------------------------(6)
            $(document).on("submit", "#updateForm", function(e) {
                e.preventDefault();

                var formData = new FormData(this);

                $.ajax({
                    url: "ajax-update-form.php",
                    type: "POST",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        if (data == 1) {
                            $("#modal").fadeOut(); // hide modal
                            loadTable(); // reload table
                        } else {
                            alert("Update failed: " + data); // show actual error
                        }
                    }
                });
            });
        });
    </script>

</body>

</html>