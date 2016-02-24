<?php
    $css_plugin   = array(
        'dataTables.bootstrap',
    );

    echo $this->Html->css( $css_plugin ,array('pathPrefix'=>'/plugins/datatable/css/','block'=>'pluginCss'));
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
                                '<i class="fa fa-arrow-left"></i> Kembali',
                                [
                                    'action' => 'index'
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
                <?=$this->Form->create('Product', ['role' => 'form', 'class' => 'form-horizontal', 'type' => 'file']);?>
                    <div class="form-group">
                        <label class="label-control col-md-2">Group</label>
                        <div class="col-md-6">
                            <?=$this->Form->input('product_group_id', ['class' => 'form-control input-sm', 'div' => false, 'label' => false, 'empty' => 'Pilih Group', 'required', 'options' => $group_list, 'id' => 'product_group']);?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="label-control col-md-2">Product Category</label>
                        <div class="col-md-6">
                            <?=$this->Form->input('category_id', ['class' => 'form-control input-sm', 'div' => false, 'label' => false, 'empty' => 'Pilih Kategori', 'id' => 'category_list']);?>
                            <div id="category_area">
                                
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="label-control col-md-2">Product Brand</label>
                        <div class="col-md-6">
                            <?=$this->Form->input('brand_id', ['class' => 'form-control input-sm', 'div' => false, 'label' => false, 'empty' => 'Pilih brand', 'required', 'options' => $brand_list]);?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="label-control col-md-2">Product Type</label>
                        <div class="col-md-6">
                            <?=$this->Form->input('product_type_id', ['class' => 'form-control input-sm', 'div' => false, 'label' => false, 'empty' => 'Pilih Tipe', 'required', 'options' => $type_list]);?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="label-control col-md-2">Product Name</label>
                        <div class="col-md-6">
                            <?=$this->Form->input('product_name', ['class' => 'form-control input-sm', 'div' => false, 'label' => false, 'placeholder' => 'Masukan nama produk', 'required']);?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="label-control col-md-2">Cover</label>
                        <div class="col-md-6">
                            <?=$this->Form->file('cover', [ 'div' => false, 'label' => false,'required']);?>
                            <small>Recomended size W: 1024px H:768px</small>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="label-control col-md-2">Detail</label>
                        <div class="col-md-12">
                            <?=$this->Form->textarea('other_info', ['class' => 'form-control input-sm', 'div' => false, 'label' => false, 'placeholder' => 'Masukan informasi lainnya', 'required', 'id' => 'editor1', 'value' => '
                                <table class="table table-stripped table-hover table-condensed">
                                    <tbody>
                                        <tr>
                                            <td width="20%">Brand</td>
                                            <td width="2%">:</td>
                                            <td >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td>Type</td>
                                            <td>:</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>Origin</td>
                                            <td>:</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>S/N</td>
                                            <td>:</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>Price</td>
                                            <td>:</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>Condition</td>
                                            <td>:</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>Status</td>
                                            <td>:</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>Position</td>
                                            <td>:</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">Other Info</td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">
                                                
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>

                            ']);?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="label-control col-md-2">Spec</label>
                        <div class="col-md-12">
                            <?=$this->Form->textarea('spec', ['class' => 'form-control input-sm', 'div' => false, 'label' => false, 'placeholder' => 'Masukan Spesifikasi (jika diperlukan)', 'required', 'id' => 'editor2']);?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="label-control col-md-2">Feature</label>
                        <div class="col-md-12">
                            <?=$this->Form->textarea('feature', ['class' => 'form-control input-sm', 'div' => false, 'label' => false, 'placeholder' => 'Masukan feature  (jika diperlukan)', 'required', 'id' => 'editor3']);?>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-9">
                            <?=$this->Form->submit('Simpan', ['class' => 'btn btn-primary', 'div' => false, 'label' => false] ); ?>
                        </div>
                    </div>
                <?=$this->Form->end()?>                
                </div>
            </div><!-- /.box-body -->
        </div><!-- /.box -->

    </section><!-- /.content -->

<?php

        $js_plugin = array(
            'datatable/js/jquery.dataTables.min',
            'datatable/js/dataTables.bootstrap',

            'ckeditor/ckeditor'
        );

        $url_category = Router::url(['controller' => 'categories', 'action' => 'ajax_get_category'], true);

            
        echo $this->Html->scriptBlock(
                '
                    CKEDITOR.replace( \'editor1\' );
                    CKEDITOR.replace( \'editor2\' );
                    CKEDITOR.replace( \'editor3\' );

                    $("#product_group").change(function(){
                        var id = $(this).val();
                        $.ajax({
                            method: "POST",
                            url: "'.$url_category.'",
                            data: {"id" : id},
                            dataType: "JSON",
                            beforeSend: function(){

                            },
                            error: function(){

                            },
                            success: function(e){
                                if(e.status != 1){
                                    $("#category_area").html(e.message);
                                    setTimeout(function(){
                                        $("#category_area").html("");
                                    }, 3000);
                                }else{
                                    $("#category_list").empty();
                                    $.each(e.data, function(id, item){
                                        $(\'#category_list\').append($(\'<option>\').text(item).attr(\'value\', id));
                                    });
                                }
                            }
                        });
                    });
                ',
                [
                    'inline'    => false,
                    'block'     => 'script'
                ]
            );

        echo $this->Html->script($js_plugin,array('pathPrefix'=>'/plugins/','block'=>'pluginScript'));

?>