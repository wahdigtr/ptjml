<?php
    $css_plugin   = array(
        'dataTables.bootstrap',
    );

    echo $this->Html->css( $css_plugin ,array('pathPrefix'=>'/plugins/datatable/css/','block'=>'pluginCss'));
?>
<?php
    $style_list = [
        'simpleGallery/css/jquery.simpleGallery',
        'simpleGallery/css/jquery.simpleLens'
    ];

    echo $this->Html->css($style_list, ['inline' => false, 'block' => 'cssCustom', 'pathPrefix' => '/plugins/']);
?>
    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Title</h3>
                <div class="box-tools pull-right">
                    <?php
                        echo $this->Html->link(
                                '<i class="fa fa-plus"></i> Tambah',
                                [
                                    'action' => 'add'
                                ],
                                [
                                    'escape' => false
                                ]
                            );
                    ?>
                </div>
            </div>
            <div class="box-body">
                <div class="">
                    <div class="content-header no-padding">
                        <h3><?=$data_product['Product']['product_name'];?></h3>
                    </div>
                    <div class="image-area">
                        <div class="simpleLens-gallery-container" id="demo-1">
                            <div class="simpleLens-container">
                                <div class="simpleLens-big-image-container">
                                    <a class="simpleLens-lens-image" data-lens-image="<?=Router::url('/', true).'frontend/img/products/'.$data_product['Product']['cover_dir'].'/'.$data_product['Product']['cover'];?>">
                                        <img src="<?=Router::url('/', true).'frontend/img/products/'.$data_product['Product']['cover_dir'].'/lens_200h_'.$data_product['Product']['cover'];?>" class="simpleLens-big-image">
                                    </a>
                                </div>
                            </div>

                            <div class="simpleLens-thumbnails-container">
                                <a href="#" class="simpleLens-thumbnail-wrapper"
                                   data-lens-image="<?=Router::url('/', true).'frontend/img/products/'.$data_product['Product']['cover_dir'].'/'.$data_product['Product']['cover'];?>"
                                   data-big-image="<?=Router::url('/', true).'frontend/img/products/'.$data_product['Product']['cover_dir'].'/lens_200h_'.$data_product['Product']['cover'];?>">
                                    <img src="<?=Router::url('/', true).'frontend/img/products/'.$data_product['Product']['cover_dir'].'/100h_100h_'.$data_product['Product']['cover'];?>">
                                </a>                    
                                <?php foreach ($data_image as $key => $value) { ?>
                                    <a href="#" class="simpleLens-thumbnail-wrapper"
                                       data-lens-image="<?=Router::url('/', true).'frontend/img/products/addon/'.$value['ProductImage']['image_dir'].'/'.$value['ProductImage']['image'];?>"
                                       data-big-image="<?=Router::url('/', true).'frontend/img/products/addon/'.$value['ProductImage']['image_dir'].'/lens_200h_'.$value['ProductImage']['image'];?>">
                                        <img src="<?=Router::url('/', true).'frontend/img/products/addon/'.$value['ProductImage']['image_dir'].'/100h_100h_'.$value['ProductImage']['image'];?>">
                                    </a>
                                <?php } ?>                                          
                      
                            </div>
                        </div>                      
                    </div>
                    <div class="inner-main-content">
                        <div class="col-md-12">
                            <table class="table table-stripped table-consended">
                                <tr>
                                    <td width="15%">Brand</td>
                                    <td width="2%">:</td>
                                    <td><?=$this->Utilities->getBrandData($data_product['Product']['brand_id'], 'brand_name');?></td>
                                </tr>
                                <tr>
                                    <td>Type</td>
                                    <td>:</td>
                                    <td><?=$this->Utilities->getProductTypeData($data_product['Product']['product_type_id'], 'type_name');?></td>
                                </tr>
                                <tr>
                                    <td>Origin</td>
                                    <td>:</td>
                                    <td><?=$data_product['Product']['origin_product'];?></td>
                                </tr>
                                <tr>
                                    <td>S/N</td>
                                    <td>:</td>
                                    <td><?=$data_product['Product']['serial_number'];?></td>
                                </tr>
                                <tr>
                                    <td>Price</td>
                                    <td>:</td>
                                    <td><?=$data_product['Product']['price'];?></td>
                                </tr>
                                <tr>
                                    <td>Condition</td>
                                    <td>:</td>
                                    <td><?=$this->Utilities->getProductCondition($data_product['Product']['product_condition']);?></td>
                                </tr>
                                <tr>
                                    <td>Status</td>
                                    <td>:</td>
                                    <td><?=$this->Utilities->getStatusProduct($data_product['Product']['status_baru']);?></td>
                                </tr>
                                <tr>
                                    <td>Position</td>
                                    <td>:</td>
                                    <td><?=$data_product['Product']['position'];?></td>
                                </tr>
                                <tr>
                                    <td colspan="3">Other Info</td>
                                </tr>
                                <tr>
                                    <td colspan="3"><?=$data_product['Product']['other_info'];?></td>
                                </tr>
                            </table>
                        </div>
                    </div>

                </div>
            </div><!-- /.box-body -->
        </div><!-- /.box -->

    </section><!-- /.content -->

<?php

        $js_plugin = array(
            'jquery.dataTables.min',
            'dataTables.bootstrap',
        );

        echo $this->Html->script($js_plugin,array('pathPrefix'=>'/plugins/datatable/js/','block'=>'pluginScript'));

?>

<?php

    $url_get_brand = Router::url(['controller' => 'brands', 'action' => 'findby_cateogry'], true);
    $url_get_type = Router::url(['controller' => 'product_types', 'action' => 'findby_brand'], true);
    $script_list = [
        'simpleGallery/js/jquery.simpleGallery',
        'simpleGallery/js/jquery.simpleLens'
    ];

    $img_loading = Router::url('/', true).'frontend/img/loading.gif';

    echo $this->Html->script($script_list, ['inline' => false, 'block' => 'customScript', 'pathPrefix' => '/plugins/']);
    echo $this->Html->scriptBlock(
            '

                $(document).ready(function(){
                    $(\'.image-area .simpleLens-thumbnails-container img\').simpleGallery({
                        loading_image: \''.$img_loading.'\',
                        show_event: \'click\'
                    });

                    $(\'.image-area .simpleLens-big-image\').simpleLens({
                        loading_image: \''.$img_loading.'\',
                        // open_lens_event: \'click\'
                    });
                });
        
                $("#category_list").bind("change", function(){
                    var category_id = $(this).val();
                    $.ajax({
                        url : "'.$url_get_brand.'",
                        data : {"category_id" : category_id},
                        dataType : "json",
                        method : "post",
                        beforeSend: function(e){
                            $("#loader_brand").html(\'<span class="fa fa-spinner fa-spin"></span>\');
                        },
                        error: function(e){
                            $("#loader_brand").html(\'<span class="fa fa-exclamation-circle fa-red"></span>\');

                        },
                        success: function(data){
                            $("#loader_brand").html(\'\');
                            var sel = $("#brand_list");
                            var data_brand = data.brand;

                            sel.empty();
                             $("#brand_list")
                                 .append($("<option></option>")
                                 .attr("value","")
                                 .text("Pilih Brand"));

                            $.each(data.brand, function(i, item){
                             $("#brand_list")
                                 .append($("<option></option>")
                                 .attr("value",i)
                                 .text(item));
                            });

                        }
                    });
                });

                $("#brand_list").bind("change", function(){
                    var category_id = $("#category_list").val();
                    var brand_id    = $(this).val();
                    $.ajax({
                        url : "'.$url_get_type.'",
                        data : {"category_id" : category_id, "brand_id" : brand_id},
                        dataType : "json",
                        method : "post",
                        beforeSend: function(e){
                            $("#loader_type").html(\'<span class="fa fa-spinner fa-spin"></span>\');
                        },
                        error: function(e){
                            $("#loader_type").html(\'<span class="fa fa-exclamation-circle fa-red"></span>\');

                        },
                        success: function(data){
                            $("#loader_type").html(\'\');
                            var sel = $("#type_list");
                            var data_type = data.type;

                            sel.empty();
                            $("#type_list")
                             .append($("<option></option>")
                             .attr("value","")
                             .text("Pilih Type"));

                            $.each(data.type, function(i, item){
                                $("#type_list")
                                 .append($("<option></option>")
                                 .attr("value",i)
                                 .text(item));
                            });
                        }
                    });
                });

            ',
            [
                'inline' => false,
                'block' => 'customScript'
            ]

        );

?>