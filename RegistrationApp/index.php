<?php include "header.php";?>
<?php include "config.php";?>

<div class="container">
    <?php
    $sql = "SELECT * FROM `users`";
    $results = mysqli_query($conn,$sql);
    if(mysqli_num_rows($results) > 0){
        echo "<div class='row'>";
            while($row = mysqli_fetch_assoc($results)){
                $id = $row['id'];
                $email = $row['email'];
                $username = $row['username'];

                echo "<div class='col col-sm-12 col-md-4 col-lg-4 col-xl-4'>";
                    echo "<div class='shadow-lg p-1 mb-5 bg-white'>";
                        echo "<a href='detail.php?id=$id>'";
                            echo "";
                            echo "<img src='images/img.jpg' alt='' class='card-img' style='height: 218px;' id='$id'>";
                            ?>
                <img src='images/img.jpg' alt='' class='card-img' style='height: 218px;' id='$id'>
                            <?php
                            echo "<div class='caption'>";
                                echo $username."<br>";
                                echo $email."<br>";
                            echo "</div>";
                        echo "</a>";
                    echo "</div>";
                echo "</div>";
            }
        echo "</div>";
    }

    ?>

</div>














<?php include "footer.php";?>