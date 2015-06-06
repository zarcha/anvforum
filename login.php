<html>
    <?php   
        include('db.php');
        include('header.php'); 
    ?>
    
    <body>
        <div class="container">
            <? include('title.php'); ?>
            <div class="row">
                <div class="col-lg-12">
                    <?//php include('navbar.php'); ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-9">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <?php
                                if($_GET['error'] != "")
                                { ?>
                                    <div class="alert alert-danger fade in">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                        <strong>Warning!</strong> <?php echo $_GET['error'] ?>
                                    </div>
                               <?php }
                                else if($_GET['msg'] != ""){?>
                                    <div class="alert alert-success fade in">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                        <strong>Success!</strong> <?php echo $_GET['msg'] ?>
                                    </div>
                            <?php } ?>
                                    
                            <form class="form-inline" role="form" method="post" action="checklogin.php">
                                <div class="form-group">
                                    <label for="user_name">Username:</label>
                                    <input type="text" class="form-control" name="user_name" id="user_name" placeholder="Enter username" required>
                                </div>
                                <div class="form-group">
                                    <label for="pwd">Password:</label>
                                    <input type="password" class="form-control" name="pwd" id="pwd" placeholder="Enter password" required>
                                </div>
                                <button type="submit" class="btn btn-default">Submit</button>
                            </form>
                        </div>
                    </div>
                    
                </div>
                <div class="col-md-3">
                    <?php include('sidemenu.php'); ?>
                </div>
            </div>
        </div>
        
        <script>
            $(document).ready(function(){
                $('[data-toggle="tooltip"]').tooltip();   
            });
        </script>
    </body>
</html>