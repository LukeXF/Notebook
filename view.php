<?php include('assets/header.php'); ?>

<div class="wrapper">
	<div class="jumbotron smaller">
		<div class="texture-overlay"></div>
	</div>


<div class="bg-white">
	<div class="container">
		<div class="row">
			<h2 align="center">View Project</h2>
			<div class="col-md-8 col-md-offset-2" data-appear-top-offset='-300'>





			<div role="tabpanel">

				<!-- Nav tabs -->
				<ul class="nav nav-tabs" role="tablist" id="tickets">
					<li role="presentation"><a href="#<?php echo $_GET['name']; ?>" style="text-transform:capitalize;" aria-controls="all" role="tab" data-toggle="tab"><?php echo normalUrl($_GET['name']); ?></a></li>
				</ul>

				<!-- Tab panes -->
				<div class="tab-content">
					<div role="tabpanel" class="tab-pane" id="<?php echo $_GET['name']; ?>">
						<h3><?php echo normalUrl($_GET['name']); ?></h3>

						<?php sqlComment("SELECT * FROM comments WHERE `comment_project` = '" . $_GET['project'] . "' ", false); ?>

					</div>
				</div>

			</div>

			<a href="<?php echo $url; ?>">Return Home</a>


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

