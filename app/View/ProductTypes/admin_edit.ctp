<?php

        $js_plugin = array(
            'jquery.dataTables.min',
            'dataTables.bootstrap',
        );

        echo $this->Html->script($js_plugin,array('pathPrefix'=>'/plugin/datatable/js/','block'=>'scriptPlugin'));

?>

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
                <?=$this->Form->create('ProductType', ['role' => 'form', 'class' => 'form-horizontal']);?>
                    <div class="form-group">
                        <label class="label-control col-md-2">Category Name</label>
                        <div class="col-md-6">
                            <?=$this->Form->input('product_category_id', ['class' => 'form-control input-sm', 'div' => false, 'label' => false, 'empty' => 'Pilih kategory', 'required', 'options' => $category_list]);?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="label-control col-md-2">Brand Name</label>
                        <div class="col-md-6">
                            <?=$this->Form->input('brand_id', ['class' => 'form-control input-sm', 'div' => false, 'label' => false, 'empty' => 'Pilih brand', 'required', 'options' => $brand_list]);?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="label-control col-md-2">Type Name</label>
                        <div class="col-md-6">
                            <?=$this->Form->input('type_name', ['class' => 'form-control input-sm', 'div' => false, 'label' => false, 'placeholder' => 'Masukan nama tipe', 'required']);?>
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
            'jquery.dataTables.min',
            'dataTables.bootstrap',
        );

        echo $this->Html->script($js_plugin,array('pathPrefix'=>'/plugins/datatable/js/','block'=>'pluginScript'));

?>