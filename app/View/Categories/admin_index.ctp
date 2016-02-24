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
                    <!-- MAIN CONTENT -->
                    <table class="table table-hover table-stripped table-consended">
                        <thead>
                            <tr>
                                <th width="5%">No</th>
                                <th>Category Name</th>
                                <th width="15%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(count($data) > 0){ ?>
                                <?php 
                                    $no = 1; $old = ''; $tampil = ''; foreach ($data as $key => $value) { 

                                        $tampil = $this->Utilities->getParentPath($key);

                                ?>
                                    <tr>
                                        <td><?=$no;?></td>
                                        <td><?=$tampil  ;?></td>
                                        <!-- <td><?=$key;?></td> -->
                                        <td>
                                            <?php
                                                echo $this->Html->link(
                                                        'Edit',
                                                        [
                                                            'controller' => 'categories',
                                                            'action' => 'edit',
                                                            $key
                                                        ],
                                                        [
                                                            'class' => 'btn btn-success'
                                                        ]
                                                    );

                                            if(strpos($tampil, '>>') !== false){
                                                echo $this->Form->postLink(
                                                        'Delete',
                                                        [
                                                            'controller' => 'categories',
                                                            'action' => 'delete',
                                                            $key
                                                        ],
                                                        [
                                                            'class' => 'btn btn-danger'
                                                        ],
                                                        [   
                                                            'are you sure?'
                                                        ]
                                                    );
                                                }
                                            ?>
                                        </td>
                                    </tr>
                                <?php $no++; } ?>
                            <?php } ?>
                        </tbody>
                    </table>
                    <!-- /MAIN CONTENT -->
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