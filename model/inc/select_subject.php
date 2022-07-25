                                            <?php if ($_SESSION['section'] == 'Secondary') :?>
                                                <div class="col-md-2">
                                                <label for="subject">Subject</label>
                                                <?php
                                                require_once "controller/subject_logic.php";
                                                $select_sql = "SELECT * FROM subject WHERE section = 'General' || section = 'Secondary' ORDER BY subject_title ASC";
                                                $sql_result = $conn->query($select_sql);
                                                ?>
                                                <select name="subject" id="subject" class="form-control ">
                                                    // using a while loop to iterate the subject table
                                                    <?php
                                                    while ($row = $sql_result->fetch_assoc()) : ?>
                                                        <option value="<?php echo $row['subject_title']; ?>"><?php echo $row['subject_title']; ?></option>
                                                    <?php endwhile; ?>
                                                </select>
                                                </div>

                                               
                                            <?php elseif ($_SESSION['section'] == 'Primary') :  ?>
                                                <div class="col-md-2">
                                                <label for="subject">Subject</label>
                                                <?php
                                                require_once "controller/subject_logic.php";
                                                $select_sql = "SELECT * FROM subject WHERE section = 'General' || section = 'Primary' ORDER BY subject_title ASC";
                                                $sql_result = $conn->query($select_sql);
                                                ?>
                                                <select name="subject" id="subject" class="form-control ">
                                                    // using a while loop to iterate the subject table
                                                    <?php
                                                    while ($row = $sql_result->fetch_assoc()) : ?>
                                                        <option value="<?php echo $row['subject_title']; ?>"><?php echo $row['subject_title']; ?></option>
                                                    <?php endwhile; ?>
                                                </select>
                                                </div>

                                                

                                                <?php else :  ?>
                                                <div class="col-md-2">
                                                <label for="subject">Subject</label>
                                                <?php
                                                require_once "controller/subject_logic.php";
                                                $select_sql = "SELECT * FROM subject WHERE section != 'Secondary'  ORDER BY subject_title ASC";
                                                $sql_result = $conn->query($select_sql);
                                                ?>
                                                <select name="subject" id="subject" class="form-control ">
                                                    // using a while loop to iterate the subject table
                                                    <?php
                                                    while ($row = $sql_result->fetch_assoc()) : ?>
                                                        <option value="<?php echo $row['subject_title']; ?>"><?php echo $row['subject_title']; ?></option>
                                                    <?php endwhile; ?>
                                                </select>
                                                </div>

                                               
                                          
                                            <?php endif; ?>