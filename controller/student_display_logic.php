<?php
require_once 'dbase_conn.php';

$query = "SELECT * FROM student order by class_name ";
$result = $conn->query($query);

$output = '
                <table  class="table table-striped table-bordered">
                    <thead class="dark">
                        <tr style="font-size: 12px;">
                            <th scope="col">S/N</th>
                            <th scope="col">Image</th>
                            <th scope="col">Admission No</th>
                            <th scope="col">Name</th>
                            <th scope="col">Sex</th>
                            <th scope="col">Date Of Birth</th>
                            <th scope="col">Class</th>
                            <th scope="col">Section</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>

                
';

while ($row = mysqli_fetch_assoc($result)) {
    $output .= '
                            <tr>
                               <td> </td>
                            </tr>
                            <tr>
                               <td> ' . $row['surname'] . '</td>
                            </tr>
                             <tr>
                               <td> ' . $row['firstname'] . '</td>
                            </tr>

        ';
}

$output .= '</table>';
echo $output;
