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
		        <div class="">
		            <div class="portlet-title">
						<ul class="nav nav-tabs">
							<li class="active">
								<a data-toggle="tab" href="#general_tab" aria-expanded="false"> General </a>
							</li>
							<li class="">
								<a data-toggle="tab" href="#social_tab" aria-expanded="false"> Social Media </a>
							</li>
							<li class="">
								<a data-toggle="tab" href="#logo_tab" aria-expanded="true"> Logo </a>
							</li>
						</ul>                

		            </div>
		            <div class="portlet-body ">
		           		<?php echo $this->Session->flash(); ?>
						<div class="tab-content">
							<div id="general_tab" class="tab-pane form active">
								<?php echo $this->Form->create( 'WebSetting', array( 'class' => 'form-horizontal', 'role' => 'form' ,'type' => 'file', 'enctype' => 'multipart/form-data') ); ?>
									<legend>Localisation</legend>
									<div class="form-group">
										<label class="col-md-3 control-label"><?php echo __('Address') ?></label>
										<div class="col-md-9">
											<?php 
												echo $this->Form->input('localisation.address', 
																		array(
																			'class' => 'form-control input-md', 
																			'label' => false, 
																			'div' => false,
																			'placeholder' => __('Input Address Localisation'),
																			'type' => 'textarea',
																			'id' => 'editor1'
																		)
																	); 
											?>
										</div>
									</div>	

									<legend>Youtube</legend>
									<div class="form-group">
										<label class="col-md-3 control-label"><?php echo __('Link') ?></label>
										<div class="col-md-9">
											<?php 
												echo $this->Form->input('youtube.link', 
																		array(
																			'class' => 'form-control input-md', 
																			'label' => false, 
																			'div' => false,
																			'placeholder' => __('Input Youtube Link')
																		)
																	); 
											?>
										</div>
									</div>

									<legend>Meta</legend>
									<div class="form-group">
										<label class="col-md-3 control-label"><?php echo __('Keyword') ?></label>
										<div class="col-md-9">
											<?php 
												echo $this->Form->input('meta.keyword', 
																		array(
																			'class' => 'form-control input-md', 
																			'label' => false, 
																			'div' => false,
																			'placeholder' => __('Input Meta Keyword')
																		)
																	); 
											?>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label"><?php echo __('Description') ?></label>
										<div class="col-md-9">
											<?php 
												echo $this->Form->input('meta.description', 
																		array(
																			'class' => 'form-control input-md', 
																			'label' => false, 
																			'div' => false,
																			'placeholder' => __('Input Meta Description')
																		)
																	); 
											?>
										</div>
									</div>
									<hr />
									<?php echo $this->Form->submit(__('Save Changes'), array('class' => 'btn btn-primary')); ?>
								<?php //echo $this->Form->end(); ?>

							</div>
							<div id="social_tab" class="tab-pane form">
								<?php //echo $this->Form->create( 'Setting', array( 'class' => 'form-horizontal', 'role' => 'form' ) ); ?>
								
									<div class="form-body">

										<div class="form-group clearfix">
											<label class="col-md-3 control-label"><?php echo __('Facebook') ?></label>
											<div class="col-md-9">
												<?php 
													echo $this->Form->input('Medsos.facebook', 
																			array(
																				'class' => 'form-control input-md', 
																				'label' => false, 
																				'div' => false,
																				'placeholder' => __('Input Facebook Link')
																			)
																		); 
												?>
											</div>
										</div>
										<div class="form-group clearfix">
											<label class="col-md-3 control-label"><?php echo __('Twitter') ?></label>
											<div class="col-md-9">
												<?php 
													echo $this->Form->input('Medsos.twitter', 
																			array(
																				'class' => 'form-control input-md', 
																				'label' => false, 
																				'div' => false,
																				'placeholder' => __('Input Twitter Link')
																			)
																		); 
												?>

											</div>
										</div>
										<div class="form-group clearfix">
											<label class="col-md-3 control-label"><?php echo __('Instagram') ?></label>
											<div class="col-md-9">
												<?php 
													echo $this->Form->input('Medsos.ig', 
																			array(
																				'class' => 'form-control input-md', 
																				'label' => false, 
																				'div' => false,
																				'placeholder' => __('Input Insatgram Link')
																			)
																		); 
												?>

											</div>
										</div>
										<div class="form-group clearfix">
											<label class="col-md-3 control-label"><?php echo __('Google') ?></label>
											<div class="col-md-9">
												<?php 
													echo $this->Form->input('Medsos.gplus', 
																			array(
																				'class' => 'form-control input-md', 
																				'label' => false, 
																				'div' => false,
																				'placeholder' => __('Input Google Plus Link')
																			)
																		); 
												?>

											</div>
										</div>										
										<hr />
										<?php echo $this->Form->submit(__('Save Changes'), array('class' => 'btn btn-primary')); ?>																
									</div>

								<?php //echo $this->Form->end(); ?>

							</div>
							<div id="logo_tab" class="tab-pane">
								<?php //echo $this->Form->create( 'Setting', array( 'class' => 'form-horizontal', 'role' => 'form','type' => 'file', 'enctype' => 'multipart/form-data' ) ); ?>
									<div class="form-body">
										<div class="form-group clearfix">
											<label class="col-md-3 control-label"><?php echo __('Logo') ?></label>
											<div class="col-md-9">
												<?php
													$urlfile = "/frontend/img/not-found.png";
													if(!empty($this->request->data['Site']['logo']))
													{
														$urlfile = "/frontend/img/logos/".$this->request->data['Site']['logo'];
													}

													echo $this->Html->image($urlfile, array('class' => 'img-responsive', 'width' => 400 ));
												?>
												<?php 
													echo $this->Form->input('Site.logo', 
																			array(
																				'class' => '', 
																				'label' => false, 
																				'div' => false,
																				'placeholder' => __('Input Photo Link'),
																				'type' => 'file'
																			)
																		); 

												?>

											</div>
										</div>
										
										<hr />
										<?php echo $this->Form->submit(__('Save Changes'), array('class' => 'btn btn-primary')); ?>																
									</div>

								<?php echo $this->Form->end(); ?>
							</div>
						</div>

					</div>
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
