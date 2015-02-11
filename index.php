<?php include('assets/header.php'); ?>

<div class="wrapper">
	<div class="jumbotron smaller">
		<div class="texture-overlay"></div>
	</div>


<div class="bg-white">
	<div class="container">
		<div class="row">
			<h2 align="center">Your commission viewer</h2>
			<div class="col-md-8 col-md-offset-2" data-appear-top-offset='-300'>





			<div role="tabpanel">

				<!-- Nav tabs -->
				<ul class="nav nav-tabs" role="tablist" id="tickets">
					<li role="presentation"><a href="#all" aria-controls="all" role="tab" data-toggle="tab">All Projects</a></li>
					<li role="presentation"><a href="#closed" aria-controls="closed" role="tab" data-toggle="tab">Finished Projects</a></li>
					<li role="presentation"><a href="#open" aria-controls="open" role="tab" data-toggle="tab">Open Project</a></li>
				</ul>

				<!-- Tab panes -->
				<div class="tab-content"> 
					<div role="tabpanel" class="tab-pane" id="all">
						All Projects


						<?php sqlProject("SELECT * FROM projects", false); ?>

					</div>
					<div role="tabpanel" class="tab-pane" id="closed">
						Closed Projects

						<?php sqlProject("SELECT * FROM projects WHERE `project_status` = 'closed' ", false); ?>

					</div>
					<div role="tabpanel" class="tab-pane" id="open">
						Open Project


						<?php sqlProject("SELECT * FROM projects WHERE `project_status` = 'opened' ", false); ?>

						

					</div>
				</div>

			</div>


			<script type="text/javascript">
			$('#tickets a').tab('show')
			</script>







			</div>
		</div>
	</div>
</div>

<div class="bg-grey">
	<div class="container">
		<div class="row">
			<h1>Let <?php echo $brand; ?> increase your workflow</h1>
			<h4><i>Use our unique tools to rocket your productivity up.</i></h4>
		</div>
	</div>
</div>


<?php include('assets/footer.php'); ?>

