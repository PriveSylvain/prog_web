<!--/*Eviter recherche vide!!*/-->

<?php
	if (isset($_GET['query']) && !(empty($_GET['query'])))
	{
		include ('connexionBDD.php');
		
		$answer = $bdd->prepare('SELECT DISTINCT * FROM project WHERE GOLDSTAMP LIKE ?');
		$answer->execute(array("%".$_GET['query']."%"));
		$answer2 = $bdd->prepare('SELECT COUNT(DISTINCT GOLDSTAMP) FROM project WHERE GOLDSTAMP LIKE ?');
		$answer2->execute(array("%".$_GET['query']."%"));
		$count = $answer2->fetch();
		
		include("template.php");
?>
<section>
	<div id="center">
		<h1>Results</h1>
		<h4>Query:<?php echo '"'.$_GET['query'].'"<br>'.$count["COUNT(DISTINCT GOLDSTAMP)"].' results';?></h4>
		<table class="tab">
			<tr>
				<th class="col">#</th>
				<th class="col">Goldstamp</th>
				<th class="col">NCBI Project Name</th>
				<th class="col">Sequencing Centers</th>
				<th class="col">NCBI Bioproject ID</th>
			</tr>
	<?php
		$i=0;
		while ($data = $answer->fetch())
		{
			$i++;
	?>
			<tr>
				<td class="col"><?php echo $i?></td>
				<td class="col"><a href="fiche.php?Gp=<?php echo $data['GOLDSTAMP'];?>"> <?php echo $data['GOLDSTAMP'];?></a></td>
				<td class="col"><?php echo $data['NCBI_PROJECT_NAME'];?></td>
				<td class="col"><?php echo $data['SEQUENCING_CENTERS'];?></td>
				<td class="col"><?php echo $data['NCBI_BIOPROJECT_ID'];?></td>
			</tr>
	<?php 
		}

		$answer->closeCursor();
	}
	else
	{
		include("home.php");
	}

	?>
		</table>
	</div>

</section>
