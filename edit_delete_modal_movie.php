<!-- Edit Modal -->
<div class="modal fade" id="edit_<?php echo $row['MovieId']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Edit Movie</h4></center>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form method="POST" action="edit_movie.php">
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label modal-label">Movie ID:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="movieId" value="<?php echo $row['MovieId']; ?>" readonly>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label modal-label">Title:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="title" value="<?php echo $row['Title']; ?>" required>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label modal-label">Release Year:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" name="releaseYear" value="<?php echo $row['ReleaseYear']; ?>" required>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label modal-label">Director:</label>
                            </div>
                            <div class="col-sm-10">
                                <select name="directorId" class="form-control">
                                    <?php
                                    include_once('connection_ashensori.php');
                                    $directorQuery = "SELECT * FROM directors";
                                    $directorResult = mysqli_query($conn, $directorQuery);
                                    while ($director = mysqli_fetch_assoc($directorResult)) {
                                        $selected = $director['DirectorId'] == $row['DirectorId'] ? "selected" : "";
                                        echo "<option value='{$director['DirectorId']}' $selected>{$director['Name']}</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">
                                <span class="glyphicon glyphicon-remove"></span> Cancel
                            </button>
                            <button type="submit" name="edit" class="btn btn-success">
                                <span class="glyphicon glyphicon-check"></span> Update
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Delete Modal -->
<div class="modal fade" id="delete_<?php echo $row['MovieId']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Delete Movie</h4>
            </div>
            <div class="modal-body">
                <p class="text-center">Are you sure you want to delete this movie?</p>
                <h2 class="text-center"><?php echo $row['Title']; ?></h2>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <a href="delete_movie.php?MovieId=<?php echo $row['MovieId']; ?>" class="btn btn-danger">Delete</a>
            </div>
        </div>
    </div>
</div>
