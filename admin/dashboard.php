<?php
include("check_admin.php");
include("../connection/connect.php");
error_reporting(E_ALL);

// Get unread notifications count
$notification_count_query = "SELECT COUNT(*) as count FROM admin_notifications WHERE is_read = 0";
$count_result = mysqli_query($db, $notification_count_query);
$notification_count = mysqli_fetch_assoc($count_result)['count'];

// Mark notifications as read if requested
if(isset($_GET['mark_read'])) {
    $mark_read_query = "UPDATE admin_notifications SET is_read = 1 WHERE id = ?";
    $stmt = mysqli_prepare($db, $mark_read_query);
    mysqli_stmt_bind_param($stmt, "i", $_GET['mark_read']);
    mysqli_stmt_execute($stmt);
    header("Location: dashboard.php");
    exit();
}

// Get recent notifications
$notifications_query = "SELECT * FROM admin_notifications ORDER BY created_at DESC LIMIT 10";
$notifications_result = mysqli_query($db, $notifications_query);
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
        <style>
            .notification-badge {
                background-color: #ff4444;
                color: white;
                padding: 2px 6px;
                border-radius: 50%;
                font-size: 12px;
                margin-left: 5px;
            }
            .notification-item {
                padding: 10px;
                border-bottom: 1px solid #eee;
            }
            .notification-item:hover {
                background-color: #f5f5f5;
            }
            .notification-unread {
                background-color: #f0f8ff;
            }
            .notification-time {
                color: #888;
                font-size: 12px;
            }
        </style>
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
                                <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-user"></i>Admin 
                                    <?php if($notification_count > 0): ?>
                                        <span class="notification-badge"><?php echo $notification_count; ?></span>
                                    <?php endif; ?>
                                    <i class="caret"></i>
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
                        <li class="active">
                            <a href="dashboard.php"><i class="icon-chevron-right"></i> Dashboard
                                <?php if($notification_count > 0): ?>
                                    <span class="notification-badge"><?php echo $notification_count; ?></span>
                                <?php endif; ?></a>
                        </li>
                        <li>
                            <a href="recipes.php"><i class="icon-chevron-right"></i> Recipes</a>
                        </li>
                        <li>
                            <a href="detail.php"><i class="icon-chevron-right"></i>Detail Recipes</a>
                        </li>
						 <li>
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
                        <div class="alert alert-success">
							<button type="button" class="close" data-dismiss="alert">&times;</button>
                            <h4>Success</h4>
                        	your'e  successfully Login to Main Frame Account.</div>
                        	<div class="navbar">
                            	<div class="navbar-inner">
	                                <ul class="breadcrumb">
	                                    <i class="icon-chevron-left hide-sidebar"><a href='#' title="Hide Sidebar" rel='tooltip'>&nbsp;</a></i>
	                                    <i class="icon-chevron-right show-sidebar" style="display:none;"><a href='#' title="Show Sidebar" rel='tooltip'>&nbsp;</a></i>
	                                    <li>
	                                        <a href="#">Dashboard</a> 
	                                    </li>
	                                    
	                                </ul>
                            	</div>
                        	</div>
                    	</div>
                    <div class="row-fluid">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Recent Notifications</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="notifications-container">
                                    <?php while($notification = mysqli_fetch_assoc($notifications_result)): ?>
                                        <div class="notification-item <?php echo $notification['is_read'] ? '' : 'notification-unread'; ?>">
                                            <div class="row-fluid">
                                                <div class="span10">
                                                    <strong><?php echo htmlspecialchars($notification['type']); ?>:</strong>
                                                    <?php echo htmlspecialchars($notification['message']); ?>
                                                    <div class="notification-time">
                                                        <?php echo date('F j, Y, g:i a', strtotime($notification['created_at'])); ?>
                                                    </div>
                                                </div>
                                                <?php if(!$notification['is_read']): ?>
                                                    <div class="span2">
                                                        <a href="?mark_read=<?php echo $notification['id']; ?>" 
                                                           class="btn btn-mini btn-info">Mark as Read</a>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    <?php endwhile; ?>
                                </div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>
                   
                        
                 
                       
                      
                    <div class="row-fluid">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Statistics</div>
                                <div class="pull-right">

                                </div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span3">
                                    <div class="chart" data-percent="73">73%</div>
                                    <div class="chart-bottom-heading"><span class="label label-info">Visitors</span>

                                    </div>
                                </div>
                                <div class="span3">
                                    <div class="chart" data-percent="53">53%</div>
                                    <div class="chart-bottom-heading"><span class="label label-info">Page Views</span>

                                    </div>
                                </div>
                                <div class="span3">
                                    <div class="chart" data-percent="83">83%</div>
                                    <div class="chart-bottom-heading"><span class="label label-info">Users</span>

                                    </div>
                                </div>
                                <div class="span3">
                                    <div class="chart" data-percent="13">13%</div>
                                    <div class="chart-bottom-heading"><span class="label label-info">Orders</span>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>
                   
                        
                 
                       
                      
                    <div class="row-fluid">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Gallery</div>
                                <div class="pull-right">

                                </div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="row-fluid padd-bottom">
                                  <div class="span3">
                                      <a href="#" class="thumbnail">
                                        <img data-src="holder.js/260x180" alt="260x180" style="width: 260px; height: 180px;" src='images/salade-weizener-birdge-260x180.jpg'/>
										
									 </a>
                                  </div>
                                  <div class="span3">
                                      <a href="#" class="thumbnail">
                                          <img data-src="holder.js/260x180" alt="260x180" style="width: 260px; height: 180px;" src='images/food-salad-healthy-lunch-260x180.jpg'/>
										
									
									</a>
                                  </div>
                                  <div class="span3">
                                      <a href="#" class="thumbnail">
                                          <img data-src="holder.js/260x180" alt="260x180" style="width: 260px; height: 180px;" src='images/Breakfast_1_Sirloin_111810-260x180.png'/>
										
									 </a>
                                  </div>
                                  <div class="span3">
                                      <a href="#" class="thumbnail">
                                          <img data-src="holder.js/260x180" alt="260x180" style="width: 260px; height: 180px;" src='images/cd96acab-c9eb-4d6a-9d14-c72bd3e382a9_pl-card-web.jpg'/>
										
									  </a>
                                  </div>
                                </div>

                                <div class="row-fluid padd-bottom">
                                  <div class="span3">
                                      <a href="#" class="thumbnail">
                                          <img data-src="holder.js/260x180" alt="260x180" style="width: 260px; height: 180px;" src='images/images.jpg'/>
										
									  </a>
                                  </div>
                                  <div class="span3">
                                      <a href="#" class="thumbnail">
                                          <img data-src="holder.js/260x180" alt="260x180" style="width: 260px; height: 180px;" src='images/Breakfast_3_114349-260x180.png'/>
										
									 </a>
                                  </div>
                                  <div class="span3">
                                      <a href="#" class="thumbnail">
                                          <img data-src="holder.js/260x180" alt="260x180" style="width: 260px; height: 180px;" src='images/jannis-brandt-107231-2-260x180.jpg'/>
									 
								   </a>
                                  </div>
                                  <div class="span3">
                                      <a href="#" class="thumbnail">
                                          <img data-src="holder.js/260x180" alt="260x180" style="width: 260px; height: 180px;" src='images/images (1).jpg'/>
										 
									  </a>
                                  </div>
                                </div>

                                <div class="row-fluid padd-bottom">
                                  <div class="span3">
                                      <a href="#" class="thumbnail">
                                          <img data-src="holder.js/260x180" alt="260x180" style="width: 260px; height: 180px;" src='images/images (2).jpg'/>
										 
									 </a>
                                  </div>
                                  <div class="span3">
                                      <a href="#" class="thumbnail">
                                          <img data-src="holder.js/260x180" alt="260x180" style="width: 260px; height: 180px;" src='images/images (3).jpg'/>
										
									  </a>
                                  </div>
                                  <div class="span3">
                                      <a href="#" class="thumbnail">
                                          <img data-src="holder.js/260x180" alt="260x180" style="width: 260px; height: 180px;" src='images/12.6.16-Baked-Potato-Soup-12-260x180.jpg'/>
										 
									  </a>
                                  </div>
                                  <div class="span3">
                                      <a href="#" class="thumbnail">
                                          <img data-src="holder.js/260x180" alt="260x180" style="width: 260px; height: 180px;" src='images/8.17.16-Peruvian-Chicken-5-260x180.jpg'/>
										  
									 </a>
                                  </div>
                                </div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>
                </div>
            </div>
            <hr>
            <footer>
                <p>&copy; Kelompok 6</p>
            </footer>
        </div>
        <!--/.fluid-container-->
        <script src="vendors/jquery-1.9.1.min.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <script src="vendors/easypiechart/jquery.easy-pie-chart.js"></script>
        <script src="assets/scripts.js"></script>
        <script>
        $(function() {
            // Easy pie charts
            $('.chart').easyPieChart({animate: 1000});
        });
        </script>
    </body>

</html>