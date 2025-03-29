<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Feedback</h1>

                <br /><br /><br />

                <?php 
                    if(isset($_SESSION['update']))
                    {
                        echo $_SESSION['update'];
                        unset($_SESSION['update']);
                    }
                ?>
                <br><br>

                <table class="tbl-full">
                    <tr>
                        <th>Id</th>
                        <th>name</th>
                        <th>email</th>
                        <th>phone</th>
                        <th>feedback</th>
                        <th>suggestions</th>
                    </tr>

                    <?php 
                        //Get all the feedback from database
                        $sql = "SELECT * FROM tbl_feedback ORDER BY id DESC"; // DIsplay the Latest feedback at First
                        //Execute Query
                        $res = mysqli_query($conn, $sql);
                        //Count the Rows
                        $count = mysqli_num_rows($res);

                        $sn = 1; //Create a Serial Number and set its initail value as 1

                        if($count>0)
                        {
                            //Order Available
                            while($row=mysqli_fetch_assoc($res))
                            {
                                //Get all the order details
                                $id = $row['id'];
                                $name = $row['name'];
                                $email = $row['email'];
                                $phone = $row['phone'];
                                $feedback = $row['feedback'];
                                $suggestions = $row['suggestions'];
                                ?>

                                    <tr>
                                        <td><?php echo $sn++; ?>. </td>
                                        <td><?php echo $name; ?></td>
                                        <td><?php echo $email; ?></td>
                                        <td><?php echo $phone; ?></td>
                                        <td><?php echo $feedback; ?></td>
                                        <td><?php echo $suggestions; ?></td>
                                    </tr>

                                <?php

                            }
                        }
                        else
                        {
                            //feedback not Available
                            echo "<tr><td colspan='12' class='error'>Feedback not Available</td></tr>";
                        }
                    ?>

 
                </table>
    </div>
    
</div>

<?php include('partials/footer.php'); ?>