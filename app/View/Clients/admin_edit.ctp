<?php
    $css_plugin   = array(
        'datatable/css/dataTables.bootstrap',
    );

    echo $this->Html->css( $css_plugin ,array('pathPrefix'=>'/plugins/','block'=>'pluginCss'));
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
                <?=$this->Form->create('Client', ['role' => 'form', 'class' => 'form-horizontal', 'type' => 'file']);?>
                    <div class="form-group">
                        <label class="label-control col-md-2">Image</label>
                        <div class="col-md-6">
                            <?=$this->Form->file('image', ['div' => false, 'label' => false, 'required']);?>
                            <?=$this->Form->hidden('image_dir', ['div' => false, 'label' => false]);?>
                            <small>Recomended size W: 160px H:108px</small>
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

        echo $this->Html->script($js_plugin,array('pathPrefix'=>'/plugins/','block'=>'pluginScript'));
        echo $this->Html->scriptBlock(
                '
                    CKEDITOR.replace( \'editor1\' );
                ',
                [
                    'inline'    => false,
                    'block'     => 'script'
                ]
            );

?>