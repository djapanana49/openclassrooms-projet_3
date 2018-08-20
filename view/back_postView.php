<div class="col-lg-8 col-md-10 mx-auto">
    
    <h2>Modifier un article</h2>
    <form action="admin.php?action=changePosts&AMP;id=<?=$posts['id']?>" method="post">
        <div>
            
            <label for="title">Titre</label><br />
            <input type="text" id="title" name="title" size=50 value="<?php echo $posts['title']?>"/>
        </div>
        <div>
            <label for="comment">Article</label><br />
            <textarea id="content" name="content" rows=10 cols=50><?php echo $posts['content']?></textarea>
        </div>
        <div><br>
            <input class="btn btn-primary" type="submit" value="publier"/>

        </div>
    </form>
</div>


