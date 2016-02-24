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
                        // echo $this->Html->link(
                        //         '<i class="fa fa-plus"></i> Tambah',
                        //         [
                        //             'action' => 'add'
                        //         ],
                        //         [
                        //             'escape' => false
                        //         ]
                        //     );
                    ?>
                </div>
            </div>
            <div class="box-body">
                <dl>
                    <dt>Name</dt>
                    <dl><?=$data_detail['PoList']['name'];?></dl>
                    <dt>Email</dt>
                    <dl><?=$data_detail['PoList']['email'];?></dl>
                    <dt>Phone Number</dt>
                    <dl><?=$data_detail['PoList']['phone_number'];?></dl>
                    <dt>Subject</dt>
                    <dl><?=$data_detail['PoList']['subject'];?></dl>
                    <dt>Description</dt>
                    <dl><?=$data_detail['PoList']['description'];?></dl>
                    <dt>Created</dt>
                    <dl><?=$data_detail['PoList']['created'];?></dl>
                </dl>
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