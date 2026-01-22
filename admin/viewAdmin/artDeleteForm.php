<?php
ob_start();
?>

<div class="container" style="min-height:400px;">
    <div class="col-md-11">
        <h2>Art delete</h2>
        <?php
        if(isset($test)) {
            if($test == true)
            {
        ?>
        <div class="alert alert-info">
            <strong>The entry has been deleted. </strong><a href="artAdmin">Arts List</a>
        </div>
        <?php
            } else if($test == false) {
        ?>
        <div class="alert alert-warning">
            <strong>Error deleting entry! </strong><a href="artAdmin">Arts List</a>
        </div>
        <?php
            }
        } else {
        ?>
        <form method="POST" action="artDelResult?id=<?php echo $id; ?>" enctype="multipart/form-data">
            <table class="table table-bordered">
                <tr>
                    <td>Art title (eng)</td>
                    <td><input type="text" name="title_eng" class="form-control" required value=<?php echo $detail['title_eng']; ?> readonly></td>
                </tr>
                <tr>
                    <td>Art text (eng)</td>
                    <td><textarea rows="5" name="text_eng" class="form-control" required readonly><?php echo $detail['text_eng']; ?></textarea></td>
                </tr>
                <tr>
                    <td>Art title (est)</td>
                    <td><input type="text" name="title_est" class="form-control" required value=<?php echo $detail['title_est']; ?> readonly></td>
                </tr>
                <tr>
                    <td>Art text (est)</td>
                    <td><textarea rows="5" name="text_est" class="form-control" required readonly><?php echo $detail['text_est']; ?></textarea></td>
                </tr>
                <tr>
                    <td>Category</td>
                    <td>
                        <select name="idCategory" class="form-control" disabled>
                            <?php
                            foreach($arr as $row) {
                                echo '<option value="'.$row['id'].'"';
                                    if($row['id']===$detail['category_id']) echo 'selected';
                                echo '>'.$row['name'].'</option>';
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                  <tr>
                    <td>Old Picture</td>
                    <td>
                        <div>
                            <?php echo '<img src="data:image/jpeg;base64,'.base64_encode( $detail['picture']).'" width=150>'; ?>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <button type="submit" class="btn btn-primary" name="save">
                            <span class="glyphicon glyphicon-plus"></span> Delete
                        </button>
                        <a href="artAdmin" class="btn btn-large btn-success">
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