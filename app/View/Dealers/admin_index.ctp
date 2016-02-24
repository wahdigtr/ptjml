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
                    <?=$this->Session->flash();?>
                    <?php 
                        echo $this->DataTable->render('Dealer',array(),
                              array(
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
                                            'sWidth'=>'10%',
                                            'aTargets'=>array(3)
                                        ),
                                    array(
                                            'sWidth'=>'20%',
                                            'aTargets'=>array(4)
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