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
                <?=$this->Form->create('DataPage', ['role' => 'form', 'class' => 'form-horizontal']);?>
                    <div class="form-group">
                        <label class="label-control col-md-2">Page Key</label>
                        <div class="col-md-6">
                            <?=$this->Form->input('page_key', ['class' => 'form-control input-sm', 'div' => false, 'label' => false, 'placeholder' => 'Masukan page key', 'required']);?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="label-control col-md-2">Konten</label>
                        <div class="col-md-6">
                            <?=$this->Form->input('content', ['class' => 'form-control input-sm', 'div' => false, 'label' => false, 'placeholder' => 'Masukan Konten', 'required', 'id' => 'editor1']);?>
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