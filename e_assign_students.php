<?php
require './controller/e_videos_logic.php';
$title = "BCA | E-Videos";
include_once './model/inc/student_dash_header.php';

?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h4">E-Videos</h1>
        <div class=" mb-2 mb-md-0">
            <div class="mr-2">

                <p><?php echo $_SESSION['st-username']; ?></p>

            </div>

        </div>
    </div>


    <section>
        <div class=" container-fluid  justify-content-center">
            <div>
                <h5>How to Watch the E-Videos</h5>
                <ul>
                    <li>Go through the available topics.</li>
                    <li>Tap on the Watch Video Button</li>
                    <li>Scroll down to watch the video</li>
                </ul>
            </div>
            <hr>
            <?php

            if (isset($_SESSION['message'])) : ?>
                <div class="alert alert-<?= $_SESSION['msg_type'] ?>">
                    <?php echo $_SESSION['message'];
                    unset($_SESSION['message']);
                    ?>
                </div>
            <?php endif ?>


            <?php
            $student_class = $_SESSION['student_class'];
            //echo $student_class;

            $select_sql = "SELECT * FROM e_videos WHERE target_class =  '$student_class' ";
            $sql_result = $conn->query($select_sql);
            ?>
            <div class="table-responsive" id="videoSelector">
                <table class="table table-striped table-sm display" id="example" style="width:100%">
                    <thead class="thead-dark ">
                        <tr>
                            <th scope="col">Subject</th>
                            <th scope="col">Topic</th>
                            <th scope="col">Target Class</th>
                            <th scope="col">Video Link</th>
                        </tr>
                    </thead>
                    <tbody class="ml-2">
                        <?php
                        while ($row = $sql_result->fetch_assoc()) : ?>

                            <tr>
                                <td><?php echo $row['e_subject'] ?></td>
                                <td><?php echo $row['topic'] ?></td>
                                <td><?php echo $row['target_class'] ?></td>
                                <td>
                                    <button class="btn btn-sm btn-danger" id="hideButton">
                                        <a href="<?php echo $row['video_url'] ?>" target="video" id="videoPick">

                                            <span class="fa fa-youtube"></span> Watch Video

                                        </a>
                                    </button>
                                </td>

                            </tr>

                        <?php endwhile; ?>

                    </tbody>
                </table>
            </div>
        </div>
        <iframe width="100%" height="500" src="" name="video" title="YouTube video player" frameborder="0" transparency="true" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>


    </section>


    <hr>

    <?php

    include_once './model/inc/dashboard_footer.php';

    ?>