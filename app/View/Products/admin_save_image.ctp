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
                    <?=$this->Session->flash();?>
                    <div class="col-sm-12">
                        <div class="media">
                            <div class="media-left">
                                <?=$this->Html->image('/frontend/img/products/'.$data_detail['Product']['cover_dir'].'/200x_200x200_'.$data_detail['Product']['cover'], ['class' => 'img-responsive media-object']);?>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading"><?=$data_detail['Product']['product_name'];?></h4>
                            </div>
                        </div>                        
                    </div>
                    <?=$this->Form->create('ProductImage', ['role' => 'form', 'class' => 'form-horizontal', 'type' => 'file']);?>
                        <div class="form-group">
                            <label class="label-control col-md-2">Upload Image</label>
                            <div class="col-md-6">
                                <?=$this->Form->file('image', [ 'div' => false, 'label' => false] );?>
                                <?=$this->Form->hidden('image_dir', [ 'div' => false, 'label' => false] );?>
                                <small>Recomended size W: 1024px H:768px</small>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-9">
                                <?=$this->Form->submit('Simpan', ['class' => 'btn btn-primary', 'div' => false, 'label' => false] ); ?>
                            </div>
                        </div>
                    <?=$this->Form->end()?> 

                    <?php 
                        echo $this->DataTable->render('ProductImage',array(),
                              array(
                                'sAjaxSource' => Router::url(['controller' => 'products', 'action' => 'save_image', $id, 'admin' => true, ],true).'?model=ProductImage',
                                'bSearchable' => true,
                                'bSortable' => true,
                                'aoColumnDefs' => array(
                                    array(
                                            'bVisible'=>false,
                                            'aTargets'=>array(0)
                                        ),
                                    array(
                                            'bVisible'=>false,
                                            'aTargets'=>array(1)
                                        ),
                                    array(
                                            'sWidth'=>'15%',
                                            'aTargets'=>array(-1)
                                        )
                                    )
                                )

                        ); 
                    ?>                    
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