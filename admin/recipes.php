<?php
include("check_admin.php");
include("../connection/connect.php");
error_reporting(E_ALL); // Changed from 0 to E_ALL for better error reporting during development

// Initialize variables to prevent undefined variable warnings
$first = $sec = $th = $q = '';

// Edit operation
if(isset($_POST['edit'])) {
    $rid = mysqli_real_escape_string($db, $_POST['rid']);
    $recipyname = mysqli_real_escape_string($db, $_POST['recipyname']);
    $disc = mysqli_real_escape_string($db, $_POST['disc']);
    
    $sql = "UPDATE recipes SET resname='$recipyname', rtext='$disc' WHERE rid='$rid'";
    
    if(isset($_FILES['file']) && $_FILES['file']['error'] == UPLOAD_ERR_OK) {
        $fname = $_FILES['file']['name'];
        $temp = $_FILES['file']['tmp_name'];
        $fsize = $_FILES['file']['size'];
        $extension = strtolower(pathinfo($fname, PATHINFO_EXTENSION));
        
        if(in_array($extension, ['jpg', 'png', 'gif']) && $fsize <= 1000000) {
            $fnew = uniqid().'.'.$extension;
            $store = "img/".basename($fnew);
            
            if(move_uploaded_file($temp, $store)) {
                $sql = "UPDATE recipes SET rimage='$fnew', resname='$recipyname', rtext='$disc' WHERE rid='$rid'";
            }
        }
    }
    
    if(mysqli_query($db, $sql)) {
        $q = '<div class="alert alert-success">
              <button type="button" class="close" data-dismiss="alert">&times;</button>
              <h4>Success</h4>
              The recipe was updated successfully
              </div>';
    }
}

// Delete operation
if(isset($_GET['id'])) {
    $id = mysqli_real_escape_string($db, $_GET['id']); // Sanitize input
    $sql = "DELETE FROM recipes WHERE rid='$id'";
    mysqli_query($db, $sql);
    
    // Add success message for deletion
    $q = '<div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <h4>Success</h4>
            The record was deleted successfully
          </div>';
}

// Insert operation
if(isset($_POST['submit'])) {
    $disc = mysqli_real_escape_string($db, $_POST['disc']);
    $respname = mysqli_real_escape_string($db, $_POST['recipyname']);
    $error = false;
    
    // Validate inputs
    
    if(empty($disc)) {
        $sec = '<div class="alert alert-error alert-block">
                <a class="close" data-dismiss="alert" href="#">&times;</a>
                <h4 class="alert-heading">Error!</h4>
                Description is required
                </div>';
        $error = true;
    }
    
    // File upload handling
    if(!$error && isset($_FILES['file']) && $_FILES['file']['error'] == UPLOAD_ERR_OK) {
        $fname = $_FILES['file']['name'];
        $temp = $_FILES['file']['tmp_name'];
        $fsize = $_FILES['file']['size'];
        $extension = strtolower(pathinfo($fname, PATHINFO_EXTENSION));
        $allowed_extensions = ['jpg', 'png', 'gif'];
        
        if(!in_array($extension, $allowed_extensions)) {
            $first = '<div class="alert alert-error alert-block">
                      <a class="close" data-dismiss="alert" href="#">&times;</a>
                      <h4 class="alert-heading">Error!</h4>
                      Only JPG, PNG, and GIF files are allowed
                      </div>';
            $error = true;
        }
        
        if($fsize > 1000000) {
            $first = '<div class="alert alert-error alert-block">
                      <a class="close" data-dismiss="alert" href="#">&times;</a>
                      <h4 class="alert-heading">Error!</h4>
                      Maximum upload size is 1MB
                      </div>';
            $error = true;
        }
        
        if(!$error) {
            $fnew = uniqid().'.'.$extension;
            $store = "img/".basename($fnew);
            
            if(move_uploaded_file($temp, $store)) {
                $sql = "INSERT INTO recipes(rimage, resname, rtext) VALUES('$fnew', '$respname', '$disc')";
                if(mysqli_query($db, $sql)) {
                    $q = '<div class="alert alert-success">
                          <button type="button" class="close" data-dismiss="alert">&times;</button>
                          <h4>Success</h4>
                          The record was inserted successfully
                          </div>';
                } else {
                    $sec = '<div class="alert alert-error alert-block">
                            <a class="close" data-dismiss="alert" href="#">&times;</a>
                            <h4 class="alert-heading">Error!</h4>
                            Database error: '.mysqli_error($db).'
                            </div>';
                }
            } else {
                $sec = '<div class="alert alert-error alert-block">
                        <a class="close" data-dismiss="alert" href="#">&times;</a>
                        <h4 class="alert-heading">Error!</h4>
                        File upload failed
                        </div>';
            }
        }
    } elseif(!$error) {
        $first = '<div class="alert alert-error alert-block">
                  <a class="close" data-dismiss="alert" href="#">&times;</a>
                  <h4 class="alert-heading">Error!</h4>
                  Please select a file to upload
                  </div>';
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
</head>
    
<body>
    <div class="navbar navbar-fixed-top">
        <div class="navbar-inner">
            <div class="container-fluid">
                <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> 
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <a class="brand" href="#">Admin Panel</a>
                <div class="nav-collapse collapse">
                    <ul class="nav pull-right">
                        <li class="dropdown">
                            <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="icon-user"></i>Admin <i class="caret"></i>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a tabindex="-1" href="#">Profile</a></li>
                                <li class="divider"></li>
                                <li><a tabindex="-1" href="index.php">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                    <ul class="nav">
                        <li><a href="#">Dashboard</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span3" id="sidebar">
                <ul class="nav nav-list bs-docs-sidenav nav-collapse collapse">
                    <li><a href="dashboard.php"><i class="icon-chevron-right"></i> Dashboard</a></li>
                    <li class="active"><a href="recipes.php"><i class="icon-chevron-right"></i> Recipes</a></li>
                    <li><a href="detail.php"><i class="icon-chevron-right"></i>Detail Recipes</a></li>
                    <li><a href="users.php"><i class="icon-chevron-right"></i>users</a></li>
                    <li><a href="comment.php"><i class="icon-chevron-right"></i>Comments</a></li>
                </ul>
            </div>
            
            <div class="span9" id="content">
                <div class="row-fluid">
                    <?php 
                    echo $first;
                    echo $sec;
                    echo $th;
                    echo $q;
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
                                    <a href="#">Recipes</a>
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
                                <div class="muted pull-left">Recipes Table</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Recipe ID</th>
                                                <th>Image</th>
                                                <th>Recipe Name</th>
                                                <th>Description</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $sql = "SELECT * FROM recipes ORDER BY rid DESC";
                                            $query = mysqli_query($db, $sql);
                                            
                                            while($row = mysqli_fetch_array($query)) {
                                                echo '<tr>
                                                    <td>'.$row['rid'].'</td>
                                                    <td><img src="img/'.$row['rimage'].'" style="max-width: 100px;"></td>
                                                    <td>'.$row['resname'].'</td>
                                                    <td>'.substr($row['rtext'], 0, 100).'...</td>
                                                    <td>
                                                        <button class="btn btn-primary" onclick="editRecipe('.$row['rid'].',\''.$row['resname'].'\',`'.$row['rtext'].'`)">
                                                            <i class="icon-pencil icon-white"></i> Edit
                                                        </button>
                                                        <a href="?id='.$row['rid'].'" class="btn btn-danger" onclick="return confirm(\'Are you sure?\')">
                                                            <i class="icon-remove icon-white"></i> Delete
                                                        </a>
                                                    </td>
                                                </tr>';
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
                                    <form class="form-horizontal" action='' method='post' enctype="multipart/form-data">
                                        <fieldset>
                                            <legend>ADD Recipes</legend>
                                            
                                            <div class="control-group">
                                                <label class="control-label" for="fileInput">File input</label>
                                                <div class="controls">
                                                    <input class="input-file uniform_on" id="fileInput" type="file" name="file" required>
                                                </div>
                                            </div>
                                            
                                            <div class="control-group">
                                                <label class="control-label">Recipe Name</label>
                                                <div class="controls">
                                                    <input type="text" name="recipyname" class="span6" id="typeahead" required>
                                                </div>
                                            </div>
                                            
                                            <div class="control-group">
                                                <label class="control-label" for="textarea2">About Recipe</label>
                                                <div class="controls">
                                                    <textarea class="input-xlarge textarea" name='disc' placeholder="Enter text ..." style="width: 810px; height: 200px" required></textarea>
                                                </div>
                                            </div>
                                            
                                            <div class="form-actions">
                                                <input type='submit' name='submit' value='Add New' class="btn btn-primary"/>
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
            </div>
        </div>
        
        <hr>
        <footer>
            <p>&copy; Kelompok 6</p>
        </footer>
    </div>
    
    <!-- Edit Modal -->
    <div id="editModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="editModalLabel">Edit Recipe</h3>
        </div>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="modal-body">
                <input type="hidden" name="rid" id="edit_rid">
                <div class="control-group">
                    <label class="control-label">Recipe Name:</label>
                    <div class="controls">
                        <input type="text" name="recipyname" id="edit_recipyname" required>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Description:</label>
                    <div class="controls">
                        <textarea name="disc" id="edit_disc" rows="5" required></textarea>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">New Image (optional):</label>
                    <div class="controls">
                        <input type="file" name="file">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                <button type="submit" name="edit" class="btn btn-primary">Save changes</button>
            </div>
        </form>
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
    
    function editRecipe(rid, name, description) {
        // Decode any HTML entities in the text
        var textarea = document.createElement('textarea');
        textarea.innerHTML = description;
        description = textarea.value;
        
        document.getElementById('edit_rid').value = rid;
        document.getElementById('edit_recipyname').value = name;
        document.getElementById('edit_disc').value = description;
        $('#editModal').modal('show');
    }
    </script>
</body>
</html>