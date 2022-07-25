<?php if ($_SESSION['section'] == 'Secondary') :
                                            ?>
                                                <div class="col-md-2">
                                                    <?php
                                                    require_once "controller/class_logic.php";
                                                    $select_sql = "SELECT * FROM classes WHERE section = 'Secondary' ORDER BY className ASC";
                                                    $sql_result = $conn->query($select_sql);
                                                    ?>
                                                    <label for="class">Class:</label>
                                                    <select name="student_class" id="student_class" class="form-control ">
                                                        // using a while loop to iterate the class table
                                                        <?php
                                                        while ($row = $sql_result->fetch_assoc()) : ?>
                                                            <option value="<?php echo $row['className']; ?>"><?php echo $row['className']; ?></option>
                                                        <?php endwhile; ?>
                                                    </select>
                                                </div>

                                                <div class="col-md-2 form-group">
                                                    <label for="class">Arm</label>
                                                    <select name="arm" id="arm" class="form-control ">
                                                        <option value="Goodness"> Goodness</option>
                                                        <option value="Holiness"> Holiness</option>
                                                        <option value="Science"> Science</option>
                                                        <option value="Art"> Art</option>
                                                    </select>
                                                </div>
                                            <?php elseif ($_SESSION['section'] == 'Primary') :  ?>
                                                <div class="col-md-2">
                                                    <?php
                                                    require_once "controller/class_logic.php";
                                                    $select_sql = "SELECT * FROM classes WHERE section ='Primary'  ORDER BY className ASC";
                                                    $sql_result = $conn->query($select_sql);
                                                    ?>
                                                    <label for="class">Class:</label>
                                                    <select name="student_class" id="student_class" class="form-control ">
                                                        // using a while loop to iterate the class table
                                                        <?php
                                                        while ($row = $sql_result->fetch_assoc()) : ?>
                                                            <option value="<?php echo $row['className']; ?>"><?php echo $row['className']; ?></option>
                                                        <?php endwhile; ?>
                                                    </select>
                                                </div>

                                                <div class="col-md-2 form-group">
                                                    <label for="class">Arm</label>
                                                    <select name="arm" id="arm" class="form-control ">
                                                    <option value="Faithfulness"> Faithfulness</option>
                                                        <option value="Gracefulness"> Gracefulness</option>
                                                        <option value="Goodness"> Goodness</option>
                                                        <option value="Holiness"> Holiness</option>                                                       
                                                        <option value="Joyfulness"> Joyfulness</option>
                                                        <option value="Kindness"> Kindness</option>
                                                        <option value="Love"> Love</option>
                                                        <option value="Meekness"> Meekness</option>                                               
                                                        <option value="Virtue"> Virtue</option>
                                                       
                                                    </select>
                                                </div>

                                                <?php else :  ?>
                                                <div class="col-md-2">
                                                    <?php
                                                    require_once "controller/class_logic.php";
                                                    $select_sql = "SELECT * FROM classes  WHERE section ='Nursery' ORDER BY className ASC";
                                                    $sql_result = $conn->query($select_sql);
                                                    ?>
                                                    <label for="class">Class:</label>
                                                    <select name="student_class" id="student_class" class="form-control ">
                                                        // using a while loop to iterate the class table
                                                        <?php
                                                        while ($row = $sql_result->fetch_assoc()) : ?>
                                                            <option value="<?php echo $row['className']; ?>"><?php echo $row['className']; ?></option>
                                                        <?php endwhile; ?>
                                                    </select>
                                                </div>

                                                <div class="col-md-2 form-group">
                                                    <label for="class">Arm</label>
                                                    <select name="arm" id="arm" class="form-control ">
                                                       
                                                        <option value="Humility"> Humility</option>
                                                        <option value="Joyfulness"> Joyfulness</option>                                                    
                                                        <option value="Meekness"> Meekness</option>
                                                        <option value="Peace"> Peace</option>
                                                        <option value="Purity"> Purity</option>
                                                        <option value="Virtue"> Virtue</option>
                                                       

                                                    </select>
                                                </div>
                                          
                                                <?php endif; ?>