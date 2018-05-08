<?php 
include(HTML_DIR . 'overall/header.php');
if (!isset($_SESSION['app_id'])) {
    header("location: index.php?view=index");
}
include(HTML_DIR . 'overall/topnav.php');
?>
    <body id="page-top" class="fixed-nav sticky-footer bg-dark">
        <div class="content-wrapper">
            <div class="container-fluid">
                <?php
                    if(isset($_GET['module'])) {
                        if(file_exists('core/controllers/'. strtolower($_GET['module']).'Controller.php')) {
                            include('core/controllers/'. strtolower($_GET['module']).'Controller.php');
                        } else {
                            include('core/controllers/errorController.php');
                        }
                    }
                ?>
            </div>
        </div>
        <?php include(HTML_DIR . 'overall/footer.php'); ?>
        <?php include(HTML_DIR . 'overall/scripts.php'); ?>
	</body>
</html>