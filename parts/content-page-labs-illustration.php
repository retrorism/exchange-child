<figure class="section__slice section__image labs-wrapper">
	<h1 class="page-title">Labs</h1>
	<div id="labs">
	<?php 
		if ( $lab_circle ) {
			for ( $i = 0; $i < 5; $i++ ) {
				echo $lab_circle[$i]['logo'];
			}
		}
	?>
	</div>
</figure>