<?php echo render_cell ('admin_frame_cell', 'header');?>

<div id='container' class='<?php echo !$frame_sides ? 'no_sides': '';?>'>
<?php echo render_cell ('admin_frame_cell', 'sides', $frame_sides);?>
  <div class='contents'>
  <?php
    if (isset ($message) && $message) { ?>
      <div class='info'><?php echo $message;?></div>
  <?php
    } ?>
    <form action='<?php echo base_url ('admin', 'goal_tags', 'cate_index');?>' method='get'>
      <div class='conditions'>
        <div class='l'>
          <input type='text' name='id' value='<?php echo isset ($columns['id']) ? $columns['id'] : '';?>' placeholder='請輸入ID..' />
          <input type='text' name='name' value='<?php echo isset ($columns['name']) ? $columns['name'] : '';?>' placeholder='請輸入名稱..' />
          <button type='submit'>尋找</button>
        </div>
        <div class='r'>
          <a class='new' href='<?php echo base_url ('admin', 'goal_tags', 'cate_add');?>'>新增</a>
        </div>
      </div>
    </form>

    <table class='table-list'>
      <thead>
        <tr>
          <th width='60'>ID</th>
          <th >名稱</th>
          <th width='400'>標簽</th>
          <th width='100'>編輯</th>
        </tr>
      </thead>
      <tbody>
    <?php
        if ($goal_tag_categories) {
          foreach ($goal_tag_categories as $goal_tag_category) { ?>
            <tr>
              <td><?php echo $goal_tag_category->id;?></td>
              <td><?php echo $goal_tag_category->name;?></td>
              <td class='left'><?php echo $goal_tag_category->tags ? implode ('', array_map (function ($tag) {return '<div class="tag">' . $tag . '</div>';}, column_array ($goal_tag_category->tags, 'name'))) : '(無標簽)';?></td>
              <td class='edit'>
                <a href='<?php echo base_url ('admin', 'goal_tags', 'cate_edit', $goal_tag_category->id);?>'><svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="32" height="32" viewBox="0 0 32 32"><path fill="#444444" d="M12 20l4-2 14-14-2-2-14 14-2 4zM9.041 27.097c-0.989-2.085-2.052-3.149-4.137-4.137l3.097-8.525 4-2.435 12-12h-6l-12 12-6 20 20-6 12-12v-6l-12 12-2.435 4z"></path></svg></a>
                /
                <a href='<?php echo base_url ('admin', 'goal_tags', 'cate_destroy', $goal_tag_category->id);?>'><svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="32" height="32" viewBox="0 0 32 32"><path fill="#444444" d="M4 10v20c0 1.1 0.9 2 2 2h18c1.1 0 2-0.9 2-2v-20h-22zM10 28h-2v-14h2v14zM14 28h-2v-14h2v14zM18 28h-2v-14h2v14zM22 28h-2v-14h2v14z"></path><path fill="#444444" d="M26.5 4h-6.5v-2.5c0-0.825-0.675-1.5-1.5-1.5h-7c-0.825 0-1.5 0.675-1.5 1.5v2.5h-6.5c-0.825 0-1.5 0.675-1.5 1.5v2.5h26v-2.5c0-0.825-0.675-1.5-1.5-1.5zM18 4h-6v-1.975h6v1.975z"></path></svg></a>
              </td>
            </tr>
    <?php }
        } else { ?>
          <tr><td colspan='4'>目前沒有任何資料。</td></tr>
    <?php
        } ?>
      <tbody>
    </table>

  <?php echo $pagination;?>

  </div>
</div>

<?php echo render_cell ('admin_frame_cell', 'footer');?>