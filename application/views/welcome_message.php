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
                    <li>
                        <a href="#">About</a>
                    </li>
                    <li>
                        <a href="#">Services</a>
                    </li>
                    <li>
                        <a href="#">Contact</a>
                    </li>
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
							<button class="btn btn-md btn-danger">Add Task</button>
						</div>
					</div>
					<br/>
					<?php
						$i=0;
						foreach($tasks as $t){
							$i++;
							if($i%4 === 0){
								echo "<div class='row'>";//echo a row when three tasks are placed already
							}
							echo '<div class="task-item col-md-4">';
							echo 	'<div class="panel panel-primary">';
							echo 		'<div class="task-heading panel-heading">'.$t->title.'</div>';
							echo 		'<div class="task-body panel-body">';
							echo 			'<div class="col-md-9">';
							echo 				$t->description;
							echo 			'</div>';
							echo 			'<div class="col-md-3">';
							echo				'<div class="btn-group-vertical btn-group-md" role="group">
												<button class="btn btn-xs btn-default">Remove</button>
												<button class="btn btn-xs btn-default">Edit</button>
											</div>
										</div><!-- button group-->
									</div><!-- task-body-->
								</div><!-- task-panel-->
							</div><!--task-item -->' ;
							if($i%4 === 0){
								echo "</div>"; //echo a row when 3 items are placed already
							}
						}
					?>


				</div><!--content-body -->

			</div><!-- main panel-->
		</div><!-- row-->
	</div><!-- content container-->
</body>
</html>
