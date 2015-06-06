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

<form  for="form" name="myForm" method="post" action="insert_topic.php?cat=<?php echo $_GET['cat']; ?>">
    <div class="form-group">
        <label for="topic_title">Name:</label>
        <input type="text" class="form-control" name="topic_title" id="topic_title" required/>
    </div>
    <div class="form-group">
        <label for="topic_desc">Description:</label>
        <input type="text" class="form-control" name="topic_desc" id="topic_desc">
    </div>
    <div class="form-group">
        <label for="content">First Post:</label><br>
        <div class="panel panel-default">
            <div class="panel-heading">
                <button type="button" class="btn btn-default bold-button" value="B" data-toggle="tooltip" data-placement="bottom" title="Bold" onclick="AddPStart(content,'b')"><span class="glyphicon glyphicon-bold"></span></button>
                <button type="button" class="btn btn-default italicize-button" data-toggle="tooltip" data-placement="bottom" title="Italic" onclick="AddPStart(content,'i')"><span class="glyphicon glyphicon-italic"></span></button>
                <button type="button" class="btn btn-default" value="u" data-toggle="tooltip" data-placement="bottom" title="Underline" onclick="AddPStart(content,'u')"><span class="glyphicon glyphicon-text-width"></span></button>
                <button type="button" class="btn btn-default" value="Link" data-toggle="tooltip" data-placement="bottom" title="URL Link" onclick="AddLinkStart()"><span class="glyphicon glyphicon-link"></span></button>
                <button type="button" class="btn btn-default" value="Img" data-toggle="tooltip" data-placement="bottom" title="Image" onclick="Image()"><span class="glyphicon glyphicon-picture"></span></button>
                <button type="button" class="btn btn-default" value="Video" data-toggle="tooltip" data-placement="bottom" title="Add Youtube Video" onclick="AddVideo()"><span class="glyphicon glyphicon-film"></span></button>
                <button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="bottom" title="List" onclick="List()"><span class="glyphicon glyphicon-th-list"></span></button>
            </div>
            <div class="panel-body">
                <textarea class="form-control" name="content" id="content" rows="20" cols="100" required></textarea><br>
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

    

