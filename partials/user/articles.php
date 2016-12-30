<section class="create" style="margin-top:60px;">
  <div class="cont">
    <div class="row">
      <div class="col norm-1 tab-4 mob-4">
        <div style="margin-top: 15px;">
          <form action="" method="post">
            <input onkeyup="triggersearch();" class="form-el form-input fill-up" placeholder="Search term" id="search" />
            <input type="submit" class="btn btn-green" style="width: 100%;margin-top: 15px;" value="Search" />
          </form>
        </div>

        <div class="side-menu">
          <a id="ca-tv" href="create.php">Create article</a>
          <a href="articles.php">KB Articles</a>
          <?php if(isset($_SESSION['user'])){ ?>
            <a href="logout.php">Log out</a>
          <?php } ?>
        </div>
      </div>
      <div class="article col norm-3 tab-4 mob-4" style="padding-top:15px;padding-bottom:15px;">
        <div id="show">
          <?php
            if(!isset($_GET['search'])){
              echo $article->listArticles();
            }else{
              echo $article->listArticles($_GET['search']);
            }
          ?>
        </div>
      </div>
    </div>
  </div>
</section>
  <div class="clearfix"></div>
