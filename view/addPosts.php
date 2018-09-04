<!DOCTYPE html>
<!-- page d'ajout d'articles avec tinymce-->
<html>
<head>
  <script src="../public/back/js/tinymce/tinymce.min.js"></script>
  <script>tinymce.init({ selector:'textarea' });</script>
</head>
<body>
   <div class="col-lg-8 col-md-10 mx-auto">
	<h2>Ajouter un article</h2>

<form action="../admin.php?action=addPosts" method="post">
    <div>
        <label for="title">Titre</label><br />
        <input type="text" id="title" name="title" size=50>
  </div>
  <div>
        <label for="author">Auteur</label><br />
        <input type="text" id="post_author" name="post_author" size=50>
    </div>
    <div>
        <label for="comment">Article</label><br />
        <textarea id="content" name="content" rows=10 cols=50></textarea>
    </div>
    <div><br>
        <input class="btn btn-primary" type="submit" />
        
    </div>
</form>
</div>
</body>
</html>