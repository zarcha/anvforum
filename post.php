<?php
    session_start();
    if(isset($_SESSION['user_name']))
    {
        
    }
    else
    {
        header('Location:login.php');   
    }

    $username = $_SESSION['username'];
?>
<script src="js/postbox.js"></script>

<form  for="form" name="myForm" method="post" action="insert_post.php?topic=<?php echo $_GET['topic']; ?>">
    <div class="form-group">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="btn-group">
                    <button type="button" class="btn btn-default" value="B" data-toggle="tooltip" data-placement="bottom" title="Bold" onclick="AddPStart(content,'b')"><span class="glyphicon glyphicon-bold"></span></button>
                    <button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="bottom" title="Italic" onclick="AddPStart(content,'i')"><span class="glyphicon glyphicon-italic"></span></button>
                    <button type="button" class="btn btn-default" value="u" data-toggle="tooltip" data-placement="bottom" title="Underline" onclick="AddPStart(content,'u')"><span class="glyphicon glyphicon-text-width"></span></button>
                </div>
                    <button type="button" class="btn btn-default" value="Link" data-toggle="tooltip" data-placement="bottom" title="URL Link" onclick="AddLinkStart()"><span class="glyphicon glyphicon-link"></span></button>
                    <button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="bottom" title="List" onclick="List()"><span class="glyphicon glyphicon-th-list"></span></button>
                    <button type="button" class="btn btn-default" value="Video" data-toggle="tooltip" data-placement="bottom" title="Add Youtube Video" onclick="AddVideo()"><span class="glyphicon glyphicon-film"></span></button>
                    <span class="glyphicon glyphicon-picture"></span><input type="file" class="btn btn-default" value="Img" data-toggle="tooltip" data-placement="bottom" title="Image" onclick="Image()">
            </div>
            <div class="panel-body">
                <textarea class="form-control" name="content" id="content" rows="20" cols="100" placeholder="Post content..." required></textarea><br>
            </div>
        </div>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-default">Submit</button>
    </div>
</form>

<script>
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();   
    });
</script>

    

