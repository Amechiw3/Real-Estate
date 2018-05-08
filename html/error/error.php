<?php include(HTML_DIR . 'overall/header.php'); ?>
<body>
    <div class="container">
        <div class="jumbotron text-center mx-auto mt-5">
            <h1 class="display-1 text-danger">
                <span class="fa fa-ban"></span>
                Oops!
            </h1>
            <h2 class="mt-1">
                404 Not Found
            </h2>
            <div class="error-details mt-2">
                Sorry, an error has occured, Requested page not found!
            </div>
            <div class="error-actions mt-2">
                <a href="index.php" class="btn btn-primary btn-lg">
                   <span class="fa fa-home"></span>
                        Take Me Home 
                    </a>
                <a href="index.php?view=salir" class="btn btn-danger btn-lg">
                    <span class="fa fa-times"></span>
                    Salir
                </a>
            </div>
        </div>
    </div>
</body>