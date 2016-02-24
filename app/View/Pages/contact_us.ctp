<section class="wrapper white-bg home-description content-area">
	<div class="content-header">
		<h4>Contact Us</h4>
	</div>
	<div class="inner-content clearfix">
		<?=$this->Session->flash();?>
		<div class="col-8">
			<?=$this->Form->create('DataContact', ['class' => 'form-horizontal', 'url' => ['controller' => 'data_contacts', 'action' => 'new_data']]);?>
				<div class="form-group">
					<label class="label-control col-sm-3">Name</label>
					<div class="col-sm-7">
						<?=$this->Form->input('name', ['class' => 'form-control', 'div' => false, 'label' => false, 'placeholder' => 'Input Name']);?>
					</div>
				</div>
				<div class="form-group">
					<label class="label-control col-sm-3">Email</label>
					<div class="col-sm-7">
						<?=$this->Form->input('email', ['class' => 'form-control', 'div' => false, 'label' => false, 'placeholder' => 'Input Email']);?>
					</div>
				</div>
				<div class="form-group">
					<label class="label-control col-sm-3">Subject</label>
					<div class="col-sm-7">
						<?=$this->Form->input('subject', ['class' => 'form-control', 'div' => false, 'label' => false, 'options' => [ 1 => 'Informasi JML Group', 2 => 'Informasi',  3 => 'Inquiry'], 'empty' => 'Select Subject' ]);?>
					</div>
				</div>
				<div class="form-group">
					<label class="label-control col-sm-3">Message</label>
					<div class="col-sm-7">
						<?=$this->Form->textarea('message', ['class' => 'form-control', 'div' => false, 'label' => false, 'placeholder' => 'Input Message', 'height' => 400]);?>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-7">
						<?=$this->Form->submit('Submit', ['class' => 'btn btn-primary', 'div' => false, 'label' => false]);?>
					</div>
				</div>
			<?=$this->Form->end();?>
		</div>
	</div>
</section>