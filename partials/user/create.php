<section class="create" style="margin-top:60px;">
  <div class="cont">
    <div class="row">
      <div class="col norm-1 tab-4 mob-4">
        <div class="side-menu">
          <a id="ca-tv" href="create.php">Create article</a>
          <a href="articles.php">KB Articles</a>
          <?php if(isset($_SESSION['user'])){ ?>
            <a href="logout.php">Log out</a>
          <?php } ?>
        </div>
      </div>
      <div class="col norm-3 tab-4 mob-4" style="padding-top:15px;padding-bottom:15px;">
        <form action="" method="post">
          <label class="move-left mb5">Article title:</label>
          <input type="text" id="content-title" class="form-el form-input fill-up mb15" name="title" placeholder="Enter article title (recommended: 70-100 characters)" />
          <span class="error-text"></span>
            <div class="clearfix"></div>

          <label class="move-left mb5">Brief description:</label>
          <textarea id="content-description"  class="form-el form-input fill-up mb15" name="description" placeholder="Brief description about the article" style="height:80px;"></textarea>
          <span class="error-text"></span>
            <div class="clearfix"></div>

          <label class="move-left mb5">Knowledge base:</label>
          <select id="content-kb" class="form-el form-select fill-up mb15" name="kb">
            <option value="0" disabled selected="">Select knowledge base</option>
            <?php
              $kb = $db->query("SELECT * FROM knowledgebase");
              while($row = $kb->fetch_assoc()){
                ?>
                  <option value="<?=$row['_id'];?>"><?=$row['name'];?></option>
                <?php
              }
            ?>
          </select>
          <span class="error-text"></span>
            <div class="clearfix"></div>

          <label class="move-left mb5">Category/Section:</label>
          <select id="content-category" class="form-el form-select fill-up mb15" name="category">
            <option value="0" disabled selected="">Select desired section:</option>
            <?php
              $kb = $db->query("SELECT * FROM category");
              while($row = $kb->fetch_assoc()){
                ?>
                  <option value="<?=$row['_id'];?>"><?=$row['name'];?></option>
                <?php
              }
            ?>
          </select>
          <span class="error-text"></span>
            <div class="clearfix"></div>

          <label class="move-left mb5">Content:</label>
          <textarea id="content-body" class="form-el form-input fill-up mb15" name="content" placeholder="Brief description about the article" style="height:200px;"></textarea>
          <span class="error-text"></span>
            <div class="clearfix"></div>

          <input type="submit" name="create" value="Save and publish" onclick="validateCreate()" class="btn btn-green move-right wtm stmr0"/>
        </form>
      </div>
    </div>
  </div>
</section>
  <div class="clearfix"></div>
