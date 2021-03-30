<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="Assets/bulma.css" rel="stylesheet">
<!--    Font Awesome -->
    <script defer src="Assets/Font-Awesome-All.js"></script>
    <title>Teachers' page</title>
</head>
<body>
    <div class="container is-max-widescreen mt-4">
        <div class="columns has-background-primary-light">
            <div class="column">
<!--                Classes dropdown menu -->
                <div class="dropdown block">
                    <?php
                    include "../db.php";
                    $groups = "SELECT DISTINCT GroupID FROM groups order by GroupID";
                    $result = $conn->query($groups);
                    ?>

                    <!--                NEW dropdown menu-->
                    <div class="select dropdown block">
                        <select id="courses-select" class="form-control">
                            <option value="course1">Course 1</option>
                            <option value="course2">Course 2</option>
                            <option value="course3">Course 3</option>
                            <option value="course4">Course 4</option>
                            <option value="course5">Course 5</option>
                        </select>
                    </div>
                </div>

<!--                MODAL BUTTONS-->

    <!--            Another PHP / MySQL script to loop the number of groups-->
                <div class="columns is-multiline is-mobile">
                    <?php
                        if ($result->num_rows > 0) {
                            // output data of each row
                            foreach ($result as $row) {
                                echo
                                    '<div class="column is-one-quarter has-text-centered">
                                    <button class="button is-info modal-button" data-target="'.$row["GroupID"].'" aria-haspopup="true">
                                    '.$row["GroupID"].'
                                    </button>
                                </div>';

                            }
                        } else {
                            echo "0 results";
                        }
                    ?>
                </div>
                <?php
                $course = $_POST['course-select'];
                echo $course;
                ?>
                <div class="block has-text-right">
                    <button id="generate-groups" class="button is-info">
                        <span class="icon is-small">
                          <em class="fas fa-plus"></em>
                        </span>
                        <span>Generate groups</span>
                    </button>
                    <button id="done-button" class="button is-success">
                        <span class="icon is-small">
                          <em class="fas fa-check"></em>
                        </span>
                        <span>Done</span>
                    </button>
                </div>
            </div>
        </div>

        <!--                Modals-->
        <?php
        $names = "SELECT DISTINCT GroupID FROM groups order by GroupID";
        $result = $conn->query($names);
        $studGroup = 'SELECT groups.GroupID, groups.StudentID from groups LEFT JOIN students on groups.StudentID = students.UID';

        if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $group = $row["GroupID"];
            echo '<div id="'.$row['GroupID'].'" class="modal">
            <div class="modal-background"></div>
            <div class="modal-content">
                <div class="box">
                    <div class="columns is-multiline">
                            '?>
                            <?php
//                          Query for getting the students' names for each group individually
                            $test = "SELECT groups.GroupID, groups.StudentID, students.StudentName from groups LEFT JOIN students on groups.StudentID = students.UID WHERE groups.GroupID ='$group'";
                            $result1 = $conn->query($test);
//                            Loop for individual students to be put into modals
                            while($row = $result1->fetch_assoc()) {
                                echo '
                                    <div class="column is-full is-size-4">'.
                                        $row['StudentName'].
                                    '</div>
                                    <div class="column divider is-full">
                                        <hr class="group-box">
                                    </div>';
                            }?>
                        <?php echo'
                    </div>
                </div>
            </div>
            <button class="modal-close is-large" aria-label="close"></button>
        </div>';
        }
        } else {
        echo "0 results";
        }

        $conn->close();
        
        ?>
        
    </div>
</body>
<script>
//    Gets the ID of the select menu
    let selectedCourse = document.getElementById("courses-select");
    //Changes the value of the select menu depending on the URL parameter
    switch ("<?php echo $_GET['course'];?>") {
        case "course1":
            selectedCourse.selectedIndex = 0;
            break;
        case "course2":
            selectedCourse.selectedIndex = 1;
            break;
        case "course3":
            selectedCourse.selectedIndex = 2;
            break;
        case "course4":
            selectedCourse.selectedIndex = 3;
            break;
        case "course5":
            selectedCourse.selectedIndex = 4;
            break;
    }
</script>
<script src="Assets/modal.js"></script>
<script src="Assets/dropdown.js"></script>
<script src="Assets/course-select.js"></script>