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
                            <form class="" role="form" method="post" action="addUser.php">
                                <div class="form-group">
                                    <label for="user_name">Username:</label>
                                    <input type="text" class="form-control" name="user_name" id="user_name" placeholder="Enter username..." required>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email:</label>
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Enter email..." required>
                                </div>
                                <div class="form-group">
                                    <label for="pwd">Password:</label>
                                    <input type="password" class="form-control" name="pwd" id="pwd" placeholder="Enter password..." required>
                                </div>
                                <div class="checkbox">
                                    <label><input type="checkbox" required>Agree to the terms </label><a data-toggle="modal" data-target="#myModal"> View</a>
                                    <div id="myModal" class="modal fade" role="dialog">
                                      <div class="modal-dialog">
                                        <!-- Modal content-->
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Terms of agreement</h4>
                                          </div>
                                          <div class="modal-body">
                                            <p>The terms here.</p>
                                          </div>
                                          <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
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