<div class="col col-sm-12 col-md-6 col-lg-6 col-xl-6 shadow-lg p-1 mb-5 bg-white">
    <form action="updatehandler.php" method="post"  enctype= "multipart/form-data">
        <input type="number" name="id" value="<?php echo $id?>" hidden>
        <div class="form-group">
            <label for="">Username</label>
            <input type="text" name="username" value="<?php echo $username?>" class="form-control">
        </div>
        <div class="form-group">
            <label for="">Email</label>
            <input type="email" name="email" value="<?php echo $email?>"  class="form-control">
        </div>
        <div class="form-group">
            <input type="file" name="fileToUpload" id="fileToUpload">
        </div>
        <div class="form-group">
            <input type="submit"  name="btnUpdate" class="btn btn-info btn-lg" value="Update">
            <a href="delete.php?id=<?php echo $id?>" class="btn btn-danger btn-lg" >Delete</a>
        </div>
    </form>
</div>