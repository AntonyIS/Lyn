<?php include "header.php";?>
<?php include "config.php";?>

    <div class="container" style="margin-top: 20px;height: 78vh" id="projects">
        <!--        <h1 class="shadow-lg p-1 mb-5 bg-white" style="text-align: center;padding-top: 30px">Apps</h1>-->
        <hr>

        <?php


        include 'config.php';
        $sql = "SELECT * FROM `users` LIMIT 6";
        $result = mysqli_query($conn,$sql);

        if(mysqli_num_rows($result)> 0){

            echo "<div class='row' id='#section-one'>";
            while($row = mysqli_fetch_array($result)) {
                $image = $row['image'];
                $username = $row['username'];
                $email = $row['email'];
//
                $id = $row['id'];


                echo "<div class='col col-sm-4 col-md-6 col-lg-4' id='item' >";
                echo "<div class='img-thumbnail shadow-lg p-1 mb-5 bg-white' id='item_css'>";
                echo "<a href='detail.php?id=$id' style='text-decoration: none'>";
                ?>

                <?php
                if(strlen($image)==0){
                    echo "<img src='images/img.jpg' alt='' class='card-img' style='height: 218px;' id='$id'>";
                }else{
                    echo "<img src='$image' alt='' class='card-img' style='height: 218px;' id='$id'>";
                }
                ?>

                <?php
                echo "<div class='caption'>";
                echo "<p class='lead ' style='text-align: center;margin-top: 8px;color:orange;font-weight: bold'>$username</p>";
                echo "<hr>";

                echo "</div>";
                echo "</a>";
                echo "</div>";
                echo "</div>";

            }
            echo "</div>";

        }else{
            echo "<div>No apps</div>";
        };
        ?>
    </div>














<?php include "footer.php";?>