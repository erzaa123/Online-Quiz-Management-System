<?php  session_start(); ?>
<!-- Add New -->
<div class="modal fade" id="addnew" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Add New</h4></center>
            </div>
            <div class="modal-body">
			<div class="container-fluid">
				<?php 
				if(isset($_SESSION['status'])){
					echo"<h4>".$_SESSION['status']."</h4>";
					unset( $_SESSION['status']);
				}
				
				?>
			<form method="POST" action="add.php">
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">Firstname:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="firstname" required>
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">Lastname:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="lastname" required>
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">Address:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="address" required>
					</div>
					<div class="col-sm-2">
						<label class="control-label modal-label">Chef:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="chef" required>
					</div>
					
					<label for="ChefId">Chef Id:</label>
						<select name="chef" class="form-control">
							<option value="">All Chefs</option>
							<option value="Male">Male</option>	
							<option value="Female">Female</option>
						</select>
			<div class="form-group">
				<button type="submit" name="save_select" class="btn btn-primary" >Save Selectbox</button> 
			</div>
				</div>
            </div> 
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                <button type="submit" name="add" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Save</a>
			</form>
            </div>

        </div>
    </div>
</div>
