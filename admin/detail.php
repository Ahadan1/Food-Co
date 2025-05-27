<?php
include("check_admin.php");
include("../connection/connect.php");
error_reporting(E_ALL);

$first = $sec = $th = $q = '';

// Edit operation
if(isset($_POST['edit'])) {
    $id = mysqli_real_escape_string($db, $_POST['id']);
    $recipe_id = mysqli_real_escape_string($db, $_POST['recipe_id']);
    $title = mysqli_real_escape_string($db, $_POST['title']);
    $title_text = mysqli_real_escape_string($db, $_POST['title_text']);
    $ingredients = mysqli_real_escape_string($db, $_POST['ingredients']);
    $disc = mysqli_real_escape_string($db, $_POST['disc']);
    
    $sql = "UPDATE full_recipy SET 
            title = '$title',
            title_text = '$title_text',
            ing_text = '$ingredients',
            disc = '$disc',
            rid = '$recipe_id'
            WHERE id = '$id'";
            
    if(mysqli_query($db, $sql)) {
        $q = '<div class="alert alert-success">
              <button type="button" class="close" data-dismiss="alert">&times;</button>
              <h4>Success</h4>
              Recipe details updated successfully
              </div>';
    } else {
        $q = '<div class="alert alert-error">
              <button type="button" class="close" data-dismiss="alert">&times;</button>
              <h4>Error</h4>
              '.mysqli_error($db).'
              </div>';
    }
}

// Delete operation
if(isset($_GET['id'])) {
    $id = mysqli_real_escape_string($db, $_GET['id']);
    $sql = "DELETE FROM full_recipy WHERE id='$id'";
    if(mysqli_query($db, $sql)) {
        $q = '<div class="alert alert-success">
              <button type="button" class="close" data-dismiss="alert">&times;</button>
              <h4>Success</h4>
              Recipe details deleted successfully
              </div>';
    }
}

if(isset($_POST['submit']))           //if upload btn is pressed
{
	
		$rtext = $_POST['rtext'];   
		$ing = $_POST['ing'];   
		$disc = $_POST['disc'];  
        $rid = $_POST['rid'];

		if(!$title=''||!$rtext==''||!$fnew==''||!$ing==''||!$disc==''||!$rid=='')
		{	
										$sec= 	'<div class="alert alert-error alert-block">
													<a class="close" data-dismiss="alert" href="#">&times;</a>
													<h4 class="alert-heading">Error!</h4>
												All fields must be required
									
												</div>';						
		}
	else
		{
				$fname = $_FILES['file']['name'];
								$temp = $_FILES['file']['tmp_name'];
								$fsize = $_FILES['file']['size'];
								$extension = explode('.',$fname);
								$extension = strtolower(end($extension));  
								$fnew = uniqid().'.'.$extension;
								$store = "img/".basename($fnew);  // the path to store the upload image
					if($extension == 'jpg'||$extension == 'png'||$extension == 'gif' )
					{        
									if($fsize>=1000000)
										{
												$first= 	'<div class="alert alert-error alert-block">
															<a class="close" data-dismiss="alert" href="#">&times;</a>
															<h4 class="alert-heading">Error!</h4>
														Maximum upload size is 1Mb 
									
															</div>';
	   
										}		
									else
										{
												$title = $_POST['title'];
												
												move_uploaded_file($temp, $store);
				                                 
												$sql = "INSERT INTO full_recipy(title,title_text,image,ing_text,disc,rid) VALUE('$title','$rtext ','$fnew','$ing','$disc','$rid')";  // store the submited data ino the database :images
												mysqli_query($db, $sql); 
	          
			  
												$q=	'<div class="alert alert-success">
													<button type="button" class="close" data-dismiss="alert">&times;</button>
														<h4>Success</h4>
															The Record Inserted successfully
							
													</div>';
                
			   
			
			
			 
					
				
	   
		
	
										}
					}
						
	    }



	
	
	

}




			


















?>
<!DOCTYPE html>
<html class="no-js">
    
    <head>
        <title>Admin Home Page</title>
        <!-- Bootstrap -->
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
        <link href="vendors/easypiechart/jquery.easy-pie-chart.css" rel="stylesheet" media="screen">
        <link href="assets/styles.css" rel="stylesheet" media="screen">
        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <script src="vendors/modernizr-2.6.2-respond-1.1.0.min.js"></script>
		 <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
        <link href="assets/styles.css" rel="stylesheet" media="screen">
        <!--[if lte IE 8]><script language="javascript" type="text/javascript" src="vendors/flot/excanvas.min.js"></script><![endif]-->
        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <script src="vendors/modernizr-2.6.2-respond-1.1.0.min.js"></script>
	
	
	
    </head>
    
    <body>
        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container-fluid">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                    </a>
                    <a class="brand" href="#">Admin Panel</a>
                    <div class="nav-collapse collapse">
                        <ul class="nav pull-right">
                            <li class="dropdown">
                                <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-user"></i>Admin <i class="caret"></i>

                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a tabindex="-1" href="#">Profile</a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a tabindex="-1" href="index.php">Logout</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        <ul class="nav">
                            <li class="active">
                                <a href="#">Dashboard</a>
                            </li>
                          
                          
                            
                        </ul>
                    </div>
                    <!--/.nav-collapse -->
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row-fluid">
                <div class="span3" id="sidebar">
                    <ul class="nav nav-list bs-docs-sidenav nav-collapse collapse">
                        <li >
                            <a href="dashboard.php"><i class="icon-chevron-right"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="recipes.php"><i class="icon-chevron-right"></i> Recipes</a>
                        </li>
                        <li class="active">
                            <a href="detail.php"><i class="icon-chevron-right"></i>Detail Recipes</a>
                        </li>
						 <li >
                            <a href="users.php"><i class="icon-chevron-right"></i>users</a>
                        </li>
						<li>
                            <a href="comment.php"><i class="icon-chevron-right"></i>Comments</a>
                        </li>
                       
                       
                    </ul>
                </div>
                
                <!--/span-->
                <div class="span9" id="content">
                    <div class="row-fluid">
					
					  <?php 
				    echo  $first;
					 echo  $sec;
					 echo  $th;
					
					
				   
					echo   $q;
					 
				  
				  ?>
                        
                        	<div class="navbar">
                            	<div class="navbar-inner">
	                                <ul class="breadcrumb">
	                                    <i class="icon-chevron-left hide-sidebar"><a href='#' title="Hide Sidebar" rel='tooltip'>&nbsp;</a></i>
	                                    <i class="icon-chevron-right show-sidebar" style="display:none;"><a href='#' title="Show Sidebar" rel='tooltip'>&nbsp;</a></i>
	                                    <li>
	                                        <a href="#">Dashboard</a> <span class="divider">/</span>	
	                                    </li>
	                                    <li class="active">
	                                        <a href="#"> Detail Recipes</a>
	                                    </li>
	                                   
	                                    
	                                </ul>
                            	</div>
                        	</div>
                    	</div>
                    <div class="row-fluid">
					
					
					     <div class="row-fluid">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left"> Detail Recipes Table</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
  									<table class="table table-bordered">
						              <thead>
						                <tr>
						                  <th>#</th>
						                  <th>title</th>
						                  <th>title text</th>
						                  <th>image</th>
										   <th>Ingredient text</th>
										    <th>discription </th>
											 <th>recipe ID </th>
											 <th>operation </th>
						                </tr>
						              </thead>
						              <tbody>
									  
	<?php                                                                          //for printing the  text
    
    $sql = "SELECT f.*, r.resname 
            FROM full_recipy f 
            LEFT JOIN recipes r ON f.rid = r.rid 
            ORDER BY f.id DESC";
	 $result = mysqli_query($db, $sql);
while($row = mysqli_fetch_array($result))
{
	  $id =$row['id'];
       $rid =$row['rid'];
	    $image =$row['image'];
		 $title =$row['title'];
		  $title_text =$row['title_text'];
		  $ing_text =$row['ing_text'];
		  $disc =$row['disc'];
		  
		  
									echo	'<tr>';
						             echo    " <td>".$id ."</td>";
						             echo     " <td>".$title ."</td>";
						             echo     " <td>".$title_text ."</td>";
						             echo    " <td>".$image ."</td>";
									   echo     " <td>".$ing_text ."</td>";
						             echo    " <td>".$disc ."</td>";
									   echo     " <td>".$rid ." - ".$row['resname']."</td>";
						          
									echo	'   <td><button class="btn btn-primary" onclick="editDetail('.$id.',\''.$rid.'\',\''.addslashes($title).'\',\''.addslashes($title_text).'\',\''.addslashes($ing_text).'\',\''.addslashes($disc).'\')">
													<i class="icon-pencil icon-white"></i> Edit
												</button>
												<a class="btn btn-danger" href="?id='.$id.'" onclick="return confirm(\'Are you sure?\')">
													<i class="icon-remove icon-white"></i> Delete
												</a></td>';
									
									
						              echo  '</tr>';
	   
}
?>								  
									  
									  
									  
									  
						                
						                
										
										
										
										
										
										
						              </tbody>
						            </table>
                                </div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>
					
					
					
					   <div class="row-fluid">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Add a new Record</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
								
								
                                    <form class="form-horizontal" action='' method='post'  enctype="multipart/form-data">
                                      <fieldset>
                                        <legend>ADD Recipes in Detail </legend>
										
										
										
                                        <div class="control-group">
                                          <label class="control-label" for="typeahead">Recipe Title </label>
                                          <div class="controls">
										  
                                            <input type="text" class="span6" name='title' id="typeahead"  />
                                           
                                          </div>
										  
                                        </div>
										
										 <div class="control-group">
                                          <label class="control-label" for="textarea2"> Recipe Text</label>
                                          <div class="controls">
                                            <textarea class="input-xlarge textarea"  name='rtext' placeholder="Enter text ..." style="width: 810px; height: 200px"></textarea>
                                          </div>
                                        </div>
										
										 <div class="control-group">
                                          <label class="control-label" for="fileInput"  >File input</label>
                                          <div class="controls">
										  
                                            <input class="input-file uniform_on" id="fileInput" type="file"  name="file" >
                                          
										  </div>
                                        </div>
                                       
									   <div class="control-group">
                                          <label class="control-label" for="textarea2">Ingredients</label>
                                          <div class="controls">
                                            <textarea class="input-xlarge textarea"  name='ing' placeholder="Enter text ..." style="width: 810px; height: 200px"></textarea>
                                          </div>
                                        </div>
									   
									   
									   
                                      
		                       
										<div class="control-group">
                                          <label class="control-label" for="textarea2">About</label>
                                          <div class="controls">
                                            <textarea class="input-xlarge textarea"  name='disc' placeholder="Enter text ..." style="width: 810px; height: 200px"></textarea>
                                          </div>
                                        </div>
		                      
										
										 <div class="control-group">
                                          <label class="control-label" for="typeahead">Recipe ID(important) </label>
                                          <div class="controls">
										  
                                            <input type="text" class="span6" name='rid' id="typeahead"  data-provide="typeahead" data-items="4" data-source='["Alabama","Alaska","Arizona","Arkansas","California","Colorado","Connecticut","Delaware","Florida","Georgia","Hawaii","Idaho","Illinois","Indiana","Iowa","Kansas","Kentucky","Louisiana","Maine","Maryland","Massachusetts","Michigan","Minnesota","Mississippi","Missouri","Montana","Nebraska","Nevada","New Hampshire","New Jersey","New Mexico","New York","North Dakota","North Carolina","Ohio","Oklahoma","Oregon","Pennsylvania","Rhode Island","South Carolina","South Dakota","Tennessee","Texas","Utah","Vermont","Virginia","Washington","West Virginia","Wisconsin","Wyoming"]'>
                                          </br>
										  <p>Please be sure Recipe ID should be the same in Recipe Table.</p>
                                          </div>
                                        </div>
										
                                        <div class="form-actions">
                                         <input type='submit' name='submit' value='Add New'class="btn btn-primary"/>
                                          <button type="reset" class="btn">Cancel</button>
                                        </div>
										
										
									
                                      </fieldset>
                                    </form>

                                </div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
                       
            </div>
            <hr>
            <footer>
                <p>&copy; Kelompok 6</p>
            </footer>
        </div>
       
		
		 <!--/.fluid-container-->
        <link href="vendors/datepicker.css" rel="stylesheet" media="screen">
        <link href="vendors/uniform.default.css" rel="stylesheet" media="screen">
        <link href="vendors/chosen.min.css" rel="stylesheet" media="screen">

        <link href="vendors/wysiwyg/bootstrap-wysihtml5.css" rel="stylesheet" media="screen">

        <script src="vendors/jquery-1.9.1.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <script src="vendors/jquery.uniform.min.js"></script>
        <script src="vendors/chosen.jquery.min.js"></script>
        <script src="vendors/bootstrap-datepicker.js"></script>

        <script src="vendors/wysiwyg/wysihtml5-0.3.0.js"></script>
        <script src="vendors/wysiwyg/bootstrap-wysihtml5.js"></script>

        <script src="vendors/wizard/jquery.bootstrap.wizard.min.js"></script>

	<script type="text/javascript" src="vendors/jquery-validation/dist/jquery.validate.min.js"></script>
	<script src="assets/form-validation.js"></script>
        
	<script src="assets/scripts.js"></script>
        <script>

	jQuery(document).ready(function() {   
	   FormValidation.init();
	});
	

        $(function() {
            $(".datepicker").datepicker();
            $(".uniform_on").uniform();
            $(".chzn-select").chosen();
            $('.textarea').wysihtml5();

            $('#rootwizard').bootstrapWizard({onTabShow: function(tab, navigation, index) {
                var $total = navigation.find('li').length;
                var $current = index+1;
                var $percent = ($current/$total) * 100;
                $('#rootwizard').find('.bar').css({width:$percent+'%'});
                // If it's the last tab then hide the last button and show the finish instead
                if($current >= $total) {
                    $('#rootwizard').find('.pager .next').hide();
                    $('#rootwizard').find('.pager .finish').show();
                    $('#rootwizard').find('.pager .finish').removeClass('disabled');
                } else {
                    $('#rootwizard').find('.pager .next').show();
                    $('#rootwizard').find('.pager .finish').hide();
                }
            }});
            $('#rootwizard .finish').click(function() {
                alert('Finished!, Starting over!');
                $('#rootwizard').find("a[href*='tab1']").trigger('click');
            });
        });
        </script>
		

		
    </body>

</html>

<!-- Edit Modal -->
<div id="editModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="editModalLabel">Edit Recipe Details</h3>
    </div>
    <form action="" method="post">
        <div class="modal-body">
            <input type="hidden" name="id" id="edit_id">
            <div class="control-group">
                <label class="control-label">Recipe ID:</label>
                <div class="controls">
                    <input type="text" name="recipe_id" id="edit_recipe_id" required>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Title:</label>
                <div class="controls">
                    <input type="text" name="title" id="edit_title" required>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Title Text:</label>
                <div class="controls">
                    <textarea name="title_text" id="edit_title_text" rows="3" required></textarea>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Ingredients:</label>
                <div class="controls">
                    <textarea name="ingredients" id="edit_ingredients" rows="5" required></textarea>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Description:</label>
                <div class="controls">
                    <textarea name="disc" id="edit_disc" rows="5" required></textarea>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
            <button type="submit" name="edit" class="btn btn-primary">Save changes</button>
        </div>
    </form>
</div>

<script>
function editDetail(id, recipe_id, title, title_text, ingredients, description) {
    // Decode any HTML entities in the text
    var textarea = document.createElement('textarea');
    
    textarea.innerHTML = title;
    title = textarea.value;
    
    textarea.innerHTML = title_text;
    title_text = textarea.value;
    
    textarea.innerHTML = ingredients;
    ingredients = textarea.value;
    
    textarea.innerHTML = description;
    description = textarea.value;
    
    document.getElementById('edit_id').value = id;
    document.getElementById('edit_recipe_id').value = recipe_id;
    document.getElementById('edit_title').value = title;
    document.getElementById('edit_title_text').value = title_text;
    document.getElementById('edit_ingredients').value = ingredients;
    document.getElementById('edit_disc').value = description;
    
    $('#editModal').modal('show');
}
</script>