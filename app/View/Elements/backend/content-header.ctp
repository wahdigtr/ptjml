  <section class="content-header">
    <h1>
      <?=$data_page['page_header'];?>
      <small><?=$data_page['small_page_header'];?></small>
    </h1>
    <ol class="breadcrumb">
      <?php
        foreach ($data_page['breadcrumb'] as $key => $value) {
          # code...
          $url_open     = '';
          $url_close    = '';
          $class        = '';

          if($value['active']){
            $class        = 'class="active"';
          }else{
            $url_open     = '<a href="'.$value['url'].'">';
            $url_close    = '</a>';
          }
      ?>
          <li <?=$class;?>><?=$url_open.' '.$value['content'].' '.$url_close;?></li>
      <?php
        }
      ?>
    </ol>
  </section>
