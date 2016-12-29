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
      <div class="col norm-3 tab-4 mob-4" style="padding-top:15px;padding-bottom:15px;">
        <form action="" method="post">
          <label class="move-left mb5">Article title:</label>
          <input type="text" id="content-title" class="form-el form-input fill-up mb15" name="title" value="<?=$article->getTitle();?>" placeholder="Enter article title (recommended: 70-100 characters)" />
          <span class="error-text"></span>
            <div class="clearfix"></div>

          <label class="move-left mb5">Brief description:</label>
          <textarea id="content-description"  class="form-el form-input fill-up mb15" name="description" placeholder="Brief description about the article" style="height:80px;"><?=$article->getDescription();?></textarea>
          <span class="error-text"></span>
            <div class="clearfix"></div>

          <label class="move-left mb5">Knowledge base:</label>
          <select id="content-kb" class="form-el form-select fill-up mb15" name="kb">
            <option value="0" disabled selected="">Select knowledge base</option>
            <option value="1" <?php if($article->getKb() == 1) echo "selected"; ?>>Dummy KB Library</option>
            <option value="2" <?php if($article->getKb() == 2) echo "selected"; ?>>Public library</option>
          </select>
          <span class="error-text"></span>
            <div class="clearfix"></div>

          <label class="move-left mb5">Category/Section:</label>
          <select id="content-category" class="form-el form-select fill-up mb15" name="category">
            <option value="0" disabled selected="">Select desired section:</option>
            <option value="1" <?php if($article->getCategory() == 1) echo "selected"; ?>>Web development</option>
            <option value="2" <?php if($article->getCategory() == 2) echo "selected"; ?>>Web design</option>
            <option value="3" <?php if($article->getCategory() == 3) echo "selected"; ?>>Fund raising</option>
            <option value="4" <?php if($article->getCategory() == 4) echo "selected"; ?>>Marketing</option>
            <option value="5" <?php if($article->getCategory() == 5) echo "selected"; ?>>Social media</option>
          </select>
          <span class="error-text"></span>
            <div class="clearfix"></div>

          <label class="move-left mb5">Content:</label>
          <textarea id="content-body" class="form-el form-input fill-up mb15" name="content" placeholder="Brief description about the article" style="height:200px;"><?=$article->getContent();?></textarea>
          <span class="error-text"></span>
            <div class="clearfix"></div>

          <input type="submit" name="update" value="Save" onclick="validateCreate()" class="btn btn-green move-right wtm stmr0"/>
        </form>
        <form action="" method="post">
          <input type="submit" name="delete" value="Delete article" class="btn btn-red move-right" style="margin-right: 15px;" />
        </form>
      </div>
    </div>
  </div>
</section>
  <div class="clearfix"></div>
