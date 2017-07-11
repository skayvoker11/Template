<div class="wrap">
	<style>
		[draggable] {
			-moz-user-select: none;
			-khtml-user-select: none;
			-webkit-user-select: none;
			user-select: none;
			-khtml-user-drag: element;
			-webkit-user-drag: element;
		}
		.column {
			height: 150px;
			width: 150px;
			float: left;
			border: 2px solid #666666;
			background-color: #ccc;
			margin-right: 5px;
			-webkit-border-radius: 10px;
			-ms-border-radius: 10px;
			-moz-border-radius: 10px;
			border-radius: 10px;
			-webkit-box-shadow: inset 0 0 3px #000;
			-ms-box-shadow: inset 0 0 3px #000;
			box-shadow: inset 0 0 3px #000;
			text-align: center;
			cursor: move;
		}
		.column header {
			color: #fff;
			text-shadow: #000 0 1px;
			box-shadow: 5px;
			padding: 5px;
			background: -moz-linear-gradient(left center, rgb(0,0,0), rgb(79,79,79), rgb(21,21,21));
			background: -webkit-gradient(linear, left top, right top,
				color-stop(0, rgb(0,0,0)),
				color-stop(0.50, rgb(79,79,79)),
				color-stop(1, rgb(21,21,21)));
			background: -webkit-linear-gradient(left center, rgb(0,0,0), rgb(79,79,79), rgb(21,21,21));
			background: -ms-linear-gradient(left center, rgb(0,0,0), rgb(79,79,79), rgb(21,21,21));
			border-bottom: 1px solid #ddd;
			-webkit-border-top-left-radius: 10px;
			-moz-border-radius-topleft: 10px;
			-ms-border-radius-topleft: 10px;
			border-top-left-radius: 10px;
			-webkit-border-top-right-radius: 10px;
			-ms-border-top-right-radius: 10px;
			-moz-border-radius-topright: 10px;
			border-top-right-radius: 10px;
		}
		.column.over {
			border: 2px dashed #000;
		}
	</style>
	<h1>Dragndrop</h1>
	<h3><?php settings_errors();?></h3>
	<form method="post" action="options.php">
		<section class="services-settings">
			<?php settings_fields('zzrt-services-group'); ?>
			<?php do_settings_sections('zzrt-services'); ?>
			<div id="columns">
				<div class="column" draggable="true"><header>A</header></div>
				<div class="column" draggable="true"><header>B</header></div>
				<div class="column" draggable="true"><header>C</header></div>
			</div>
		</section>
		<?php submit_button(); ?>
	</form>


	<script type="text/javascript">
		var dragSrcEl = null;
		function handleDragStart(e) {
			dragSrcEl = this;
			e.dataTransfer.effectAllowed = 'move';
			e.dataTransfer.setData('text/html', this.innerHTML);
		}
		function handleDragOver(e) {
			if (e.preventDefault) {
				e.preventDefault();
			}
			e.dataTransfer.dropEffect = 'move'; 
			return false;
		}
		function handleDragEnter(e) {
			this.classList.add('over');
		}
		function handleDragLeave(e) {
			this.classList.remove('over');
		}
		function handleDrop(e) {
			if (e.stopPropagation) {
				e.stopPropagation(); 
			}
			if (dragSrcEl != this) {
				dragSrcEl.innerHTML = this.innerHTML;
				this.innerHTML = e.dataTransfer.getData('text/html');
			}
			return false;
		}

		function handleDragEnd(e) {
			[].forEach.call(cols, function (col) {
				col.classList.remove('over');
			});
		}
		var cols = document.querySelectorAll('#columns .column');
		[].forEach.call(cols, function(col) {
			col.addEventListener('dragstart', handleDragStart, false);
			col.addEventListener('dragenter', handleDragEnter, false)
			col.addEventListener('dragover', handleDragOver, false);
			col.addEventListener('dragleave', handleDragLeave, false);
			col.addEventListener('drop', handleDrop, false);
			col.addEventListener('dragend', handleDragEnd, false);
		});
	</script>