<?php include 'header.php' ;?>  	

	<style type="text/css">
		.side-nav {
		    padding: 2em 3em 10em 2em !important;
		    width: 430px;
		}
	</style>
	
	<div class="outer-container row">
		<ul id="slide-out" class="side-nav fixed">
			<li><a class="subheader">Reports</a></li>
			<li><div class="divider"></div></li>
			<?php		

				$posts = array();
				
				$reportType = $crawler->filter('a.facebox')->each(function ($node) {

					// removes (x) from string
					$titles = preg_split('(\(\d+\))', trim($node->text()));
					$titles = array_filter($titles);
					$titles = array_unique($titles);

					return $posts[] = $titles;
				});

				// Remove duplicate document sub headings
				$reportType = array_unique($reportType, SORT_REGULAR);
				
				
				// Merges arrays that are returned into 2 and remove duplicates
				foreach($reportType as $value) {
		    		$mergedArray[] = array_merge($value);
				}							


				// Loop over arrays to display Report notification headings
				foreach ($mergedArray as $value) {
					foreach ($value as $title) {
						// Push to new empty array so they are all contained within one array
						//$push = array_push($allTitles, $title);
						echo '<li>' . $title . '</li>';
					}
				}			


				

				//echo '<p>' . var_dump($allTitles) . '</p>';	
			?>
		</ul>
	</div><!-- End of row -->

<?php include 'footer.php' ;?>