<?php echo render_cell ('admin_frame_cell', 'header'); ?>
<div id='container'>
  <div class='map'>
    <i></i><i></i><i></i><i></i>
    <div id='map'></div>
    
    <div id='error'>asdasdsd</div>

    <div id='error' <?php echo isset ($message) && $message ? " class='show'":''; ?>>
<?php if (isset ($message) && $message) { ?>
        <?php echo $message;?>
<?php } ?>
    </div>

    <div id='loading_data'>資料讀取中...</div>

    <form id='options' action='<?php echo base_url ('admin', 'goals', 'create');?>' method='post' enctype='multipart/form-data'>
      <input type='text' id='title' name='title' class='title' value='<?php echo $title;?>' placeholder='請輸入標題..' maxlength='200' pattern='.{1,200}' required title='輸入 1~200 個字元!' />

      <input type='hidden' id='latitude' name='latitude' class='latitude' value='<?php echo $latitude;?>' placeholder='請輸入緯度..' maxlength='200' pattern='.{1,200}' required title='輸入 1~200 個字元!' readonly/>
      <input type='hidden' id='longitude' name='longitude' class='longitude' value='<?php echo $longitude;?>' placeholder='請輸入經度..' maxlength='200' pattern='.{1,200}' required title='輸入 1~200 個字元!' readonly/>
      <input type='text' id='address' name='address' class='address' value='<?php echo $address;?>' placeholder='請輸入地址..' maxlength='200' pattern='.{1,200}' required title='輸入 1~200 個字元!' />

      <textarea id='introduction' name='introduction' class='introduction' placeholder='請輸入介紹..'><?php echo $introduction;?></textarea>
      
      <div class='tags'>
  <?php foreach (GoalTagCategory::detail_tags () as $category => $tags) {
          if ($category) { ?>
            <div class='category'><?php echo $category;?></div>
    <?php }
          foreach ($tags as $tag) { ?>
            <div class='tag'>
              <input type='checkbox' name='tag_ids[]' id='tag_<?php echo $tag->id;?>' value='<?php echo $tag->id;?>'<?php echo $tag_ids && in_array ($tag->id, $tag_ids) ? ' checked' : ''?>/>
              <span class='ckb-check'></span>
              <label for='tag_<?php echo $tag->id;?>'><?php echo $tag->name;?></label>
            </div>
    <?php }
        } ?>
      </div>

      <div id='pictures'></div>

      <div id='picture_links'>
  <?php if ($picture_links) {
          foreach ($picture_links as $picture_link) { ?>
            <div class='picture_link'><div class='l'><input type='text' name='picture_links[]' placeholder='請輸入照片鏈結..' value='<?php echo $picture_link;?>'></div><div class='r'><button type='button'><svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="32" height="32" viewBox="0 0 32 32"><path fill="#444444" d="M4 10v20c0 1.1 0.9 2 2 2h18c1.1 0 2-0.9 2-2v-20h-22zM10 28h-2v-14h2v14zM14 28h-2v-14h2v14zM18 28h-2v-14h2v14zM22 28h-2v-14h2v14z"></path><path fill="#444444" d="M26.5 4h-6.5v-2.5c0-0.825-0.675-1.5-1.5-1.5h-7c-0.825 0-1.5 0.675-1.5 1.5v2.5h-6.5c-0.825 0-1.5 0.675-1.5 1.5v2.5h26v-2.5c0-0.825-0.675-1.5-1.5-1.5zM18 4h-6v-1.975h6v1.975z"></path></svg></button></div></div>
    <?php }
        } ?>
      </div>

      <div id='links'>
  <?php if ($links) {
          foreach ($links as $link) { ?>
            <div class='link'><div class='l'><input type='text' name='links[]' placeholder='請輸入參考鏈結..' value='<?php echo $link;?>'></div><div class='r'><button type='button'><svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="32" height="32" viewBox="0 0 32 32"><path fill="#444444" d="M4 10v20c0 1.1 0.9 2 2 2h18c1.1 0 2-0.9 2-2v-20h-22zM10 28h-2v-14h2v14zM14 28h-2v-14h2v14zM18 28h-2v-14h2v14zM22 28h-2v-14h2v14z"></path><path fill="#444444" d="M26.5 4h-6.5v-2.5c0-0.825-0.675-1.5-1.5-1.5h-7c-0.825 0-1.5 0.675-1.5 1.5v2.5h-6.5c-0.825 0-1.5 0.675-1.5 1.5v2.5h26v-2.5c0-0.825-0.675-1.5-1.5-1.5zM18 4h-6v-1.975h6v1.975z"></path></svg></button></div></div>
    <?php }
        } ?>
      </div>

      <div class='btns feature'>
        <button type='button' id='choice_picture_link'>&#10010; 照片鏈結</button>
        <button type='button' id='choice_picture'>&#10010; 上傳照片</button>
        <button type='button' id='add_links'>&#10010; 參考鏈結</button>
      </div>
      
      <div class='btns control'>
        <a href='<?php echo base_url ('admin', 'goals');?>'>回列表</a>
        <button type='submit' id='submit'>確定新增</button>
      </div>
    </form>

  </div>
</div>

<?php echo render_cell ('admin_frame_cell', 'footer');?>
