<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to ToDo</title>
	<link href="css/bootstrap.min.css" rel="stylesheet"> <!-- use appropriate method to set the urls for css and js-->
	<link href="css/main.css" rel="stylesheet">
</head>
<body>
	<!--modal to add new task hidden : to add a new task a modal is displayed-->
	<div id="AddModal" class="modal fade add-modal" role="dialog">
	 	<div class="modal-dialog">
		    <!-- Modal content-->
		    <div class="modal-content">
		    	<div class="modal-header">
		        	<button type="button" class="close" data-dismiss="modal">&times;</button>
		        	<h4 class="modal-title">Add New Task</h4>
		      	</div>
		      	<div class="modal-body">
					<form id="task_add_form" class="form-horizontal task-add-form" role="form" method="POST" action="/index.php/task/add">
				     	<div class="form-group">
				          	<label for="title" class="col-md-2 control-label left">Title</label>

				          	<div class="col-md-10">
				            	<input id="title" type="text" class="form-control" name="title" required autofocus>
				          	</div>
						</div>
						<div class="form-group">
				          	<label for="description" class="col-md-2 control-label left">Description</label>

				          	<div class="col-md-10">
				            	<textarea id="description" class="form-control" name="description" required></textarea>
				          	</div>

		      			</div>
						<div class="form-group">
				          	<label for="deadline" class="col-md-2 control-label left">Deadline</label>

				          	<div class="col-md-10">
				            	<input id="deadline" type="date" class="form-control" name="deadline"></input>
				          	</div>

		      			</div>
			      		<div class="form-group">
			          		<div class="col-md-2 col-md-offset-2">
			              		<button id="submit_button" type="submit" class="btn btn-primary">
			                  		Add
			              		</button>
			          		</div>
			      		</div>
		  				</form>
		      	</div>
		    </div>
		</div>
	</div>
	<!--modal to edit task hidden : to edit a task a modal is displayed-->
	<div id="edit-modal" class="modal fade edit-modal" role="dialog">
	 	<div class="modal-dialog">
		    <!-- Modal content-->
		    <div class="modal-content">
		    	<div class="modal-header">
		        	<button type="button" class="close" data-dismiss="modal">&times;</button>
		        	<h4 class="modal-title">Edit Task</h4>
		      	</div>
		      	<div class="modal-body">
					<form id="task_edit_form" class="form-horizontal task-add-form" role="form" method="POST" action="">
				     	<div class="form-group">
				          	<label for="title" class="col-md-2 control-label left">Title</label>

				          	<div class="col-md-10">
				            	<input id="title" type="text" class="form-control" name="title" required autofocus>
				          	</div>
						</div>
						<div class="form-group">
				          	<label for="description" class="col-md-2 control-label left">Description</label>

				          	<div class="col-md-10">
				            	<textarea id="description" class="form-control" name="description" required></textarea>
				          	</div>

		      			</div>

						<div class="form-group">
							<label for="deadline" class="col-md-2 control-label left">Deadline</label>

							<div class="col-md-10">
								<input id="deadline" type="date" class="form-control" name="deadline"></input>
							</div>

						</div>

			      		<div class="form-group">
			          		<div class="col-md-2 col-md-offset-2">
			              		<button id="submit_button" type="submit" class="btn btn-primary">
			                  		Add
			              		</button>
			          		</div>
			      		</div>
		  				</form>
		      	</div>
		    </div>
		</div>
	</div>


	<!-- Navigation -->
    <nav class="navbar navbar-inverse" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Brand Name</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">

                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
	<div class="container">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="content-heading panel-heading">To do</div>
				<div class="content-body panel-body">
					<div class="col-md-12">
						<div class="btn-group btn-group-md" role="group">
							<button class="btn btn-md btn-danger add-task-button">Add Task</button>
						</div>
					</div>
					<br/>
					<br/>
					<br/>
					<?php
						$i=0;
						foreach($tasks as $t){ // loop through all tasks and display them
							$i++;
							$cls;
							$deadline="";
							if($t->done){
								$cls = "checked";
							}
							else{
								$cls =" ";
							}
							if($t->deadline > 0){
								$deadline =explode(' ',$t->deadline);
								$deadline = '<b>Deadline </b>'.$deadline[0];
							}
							echo '<div class="task-item col-md-4">';
							echo 	'<div class="panel panel-primary">';
							echo 		'<div class="task-heading panel-heading">'.$t->title.'</div>';
							echo 		'<div class="task-body panel-body">';
							echo 			'<div class="col-md-9 description">';
							echo 				$t->description;
							echo 			'</div>';
							echo 			'<div class="col-md-3 ">';
							echo				'<div class="btn-group-vertical btn-group-xs right" role="group">
													<button data-id="'.$t->id.'" class="btn btn-xs btn-default check-task-button '.$cls.'"><span class="glyphicon glyphicon-check"></button>
													<button data-id="'.$t->id.'" class="btn btn-xs btn-default edit-task-button"><span class="glyphicon glyphicon-pencil"></button>
													<button data-id="'.$t->id.'" class="btn btn-xs btn-default remove-task-button"><span class="glyphicon glyphicon-trash"></button>
												</div>
											</div>
											<div class="col-md-9 task-footer">
												'.$deadline.'
											</div>
									</div><!-- task-body-->
									<div class="panel-footer">
										<span class="light">Updated '.$t->updated_at.'</span>
									</div>
								</div><!-- task-panel-->
							</div><!--task-item -->' ;

						}
					?>


				</div><!--content-body -->

			</div><!-- main panel-->
		</div><!-- row-->
	</div><!-- content container-->
	<script src="js/jquery-3.1.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/main.js"></script>
</body>
</html>
