<?php
ob_start();
?>

<div class="container" style="min-height:400px;">
    <div class="col-md-11">
        <h2>Art Add</h2>
        <?php
        if(isset($test)) {
            if($test == true)
            {
        ?>
        <div class="alert alert-info">
            <strong>Entry added. </strong><a href="artsAdmin">Arts List</a>
        </div>
        <?php
            } else if($test == false) {
        ?>
        <div class="alert alert-warning">
            <strong>Error adding entry! </strong><a href="artsAdmin">Arts List</a>
        </div>
        <?php
            }
        } else {
        ?>
        <form method="POST" action="artAddResult" enctype="multipart/form-data">
            <table class="table table-bordered">
                <tr>
                    <td>Art title (eng)</td>
                    <td><input type="text" name="title_eng" class="form-control" required></td>
                </tr>
                <tr>
                    <td>Art text (eng)</td>
                    <td><textarea rows="5" name="text_eng" class="form-control" required></textarea></td>
                </tr>
                <tr>
                    <td>Art title (est)</td>
                    <td><input type="text" name="title_est" class="form-control" required></td>
                </tr>
                <tr>
                    <td>Art text (est)</td>
                    <td><textarea rows="5" name="text_est" class="form-control" required></textarea></td>
                </tr>
                <tr>
                    <td>Category</td>
                    <td>
                        <select name="idCategory" class="form-control">
                            <?php
                            foreach($arr as $row) {
                                echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Picture</td>
                    <td>
                        <div>
                            <input type=file name="picture" style="color:black;">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <button type="submit" class="btn btn-primary" name="save">
                            <span class="glyphicon glyphicon-plus"></span> Save
                        </button>
                        <a href="artsAdmin" class="btn btn-large btn-success">
                            <i class="glyphicon glyphicon-backward"></i> &nbsp;Back to list
                        </a>
                    </td>
                </tr>
            </table>
        </form>
        <?php
        }
        ?>
    </div>
</div>
<?php $content = ob_get_clean(); ?>
<?php include "viewAdmin/templates/layout.php"; ?>