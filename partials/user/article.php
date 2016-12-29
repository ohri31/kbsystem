<section class="create" style="margin-top:60px;">
  <div class="cont">
    <div class="row">
      <div class="col norm-1 tab-4 mob-4">
        <div class="side-menu">
          <a id="ca-tv" href="create.php">Create article</a>
          <a href="articles.php">KB Articles</a>
          <a href="logout.php">Log out</a>
        </div>
      </div>
      <div class="article col norm-3 tab-4 mob-4" style="padding-top:15px;padding-bottom:15px;">
        <h1><?=$article->getTitle();?></h1>
        <span class="body">
          <p style="font-size: 20px;line-height: 28px;"><?=$article->getDescription();?></p>
          <br/>
            <hr />
          <br/>
          <?=$article->getContent();?>

        </span>
          <div class="clearfix"></div>

        <a href="edit.php?id=<?=$article->getId();?>" class="btn btn-midnight move-right">Edit article</a>
        <form action="" method="post">
          <input type="submit" name="delete" value="Delete article" class="btn btn-red move-right" style="margin-right: 15px;" />
        </form>

      </div>
    </div>
  </div>
</section>
  <div class="clearfix"></div>
