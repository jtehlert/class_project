<div id="sidebar">
	<div id="sidebar-buttons">
		<a href="">
			<div class="sidebar-button">
				<!-- <img src="http://<?php //echo $_SERVER['HTTP_HOST'];?>/assets/images/notebook.png" alt="" > -->
			</div>
		</a>
		<a href="">
			<div class="sidebar-button">
				<!-- <img src="http://<?php //echo $_SERVER['HTTP_HOST'];?>/assets/images/note.png" alt=""> -->
			</div>
		</a>
		<a href="">
			<div class="sidebar-button">
				<!-- <img src="http://<?php //echo $_SERVER['HTTP_HOST'];?>/assets/images/alerts.png" alt=""> -->
			</div>
		</a>
		<div class="sidebar-add-button" onclick="showOverlay()">
			Add
		</div>
	</div>
	<div id="sidebar-search" >
		<form id="sidebar-search-form" method="get" action="">
		        <input type="text" class="sidebar-search-input" name="q" size="21" maxlength="120" placeholder="Search...">
		        <button type="submit">Search</button>
		</form>
	</div>
	<div id="sidebar-title">
		My Clippings
	</div>
	<div id="sidebar-list">
		<?php
			for($i = 0; $i < 10; $i++)
			{
		?>
		<a href="">
			<div id="sidebar-list-cell">
				<div class="title">
					Clipping Name
				</div>
				<div class="subtitle">
					Clipping Subtitle
				</div>
			</div>
		</a>
		<?php
			}
		?>
	</div>
</div>

<script>

document.querySelector('#sidebar-search').onclick = function(){
	swal("Feature not implemented", "We'll get that working right away!")
};

</script>