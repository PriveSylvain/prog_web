<?php include("template.php");?>

<section>
	<?php
	if (isset($_GET['query']))
	{
		include ('connexionBDD.php');
		
		$answer = $bdd->prepare('SELECT DISTINCT * FROM project,taxon 
								WHERE project.NCBI_TAXON_ID=taxon.NCBI_TAXON_ID 
								AND (GOLDSTAMP LIKE ?
								OR LEGACY_GOLDSTAMP LIKE ?
								OR PROJECT_NAME LIKE ?
								OR PROJECT_TYPE LIKE ?
								OR PROJECT_STATUS LIKE ?
								OR SEQUENCING_STATUS LIKE ?
								OR SEQUENCING_CENTERS LIKE ?
								OR FUNDING LIKE ?
								OR CONTACT_NAME LIKE ?
								OR NCBI_BIOPROJECT_ID LIKE ?
								OR NCBI_PROJECT_NAME LIKE ?
								OR project.NCBI_TAXON_ID LIKE ?
								OR DOMAIN LIKE ?
								OR KINGDOM LIKE ?
								OR PHYLUM LIKE ?
								OR CLASS LIKE ?
								OR ORDER_ LIKE ?
								OR FAMILY LIKE?
								OR GENUS LIKE ?
								OR SPECIES LIKE ?)');
		$answer->execute(array("%".$_GET['query']."%","%".$_GET['query']."%","%".$_GET['query']."%","%".$_GET['query']."%","%".$_GET['query']."%","%".$_GET['query']."%","%".$_GET['query']."%","%".$_GET['query']."%","%".$_GET['query']."%","%".$_GET['query']."%","%".$_GET['query']."%","%".$_GET['query']."%","%".$_GET['query']."%","%".$_GET['query']."%","%".$_GET['query']."%","%".$_GET['query']."%","%".$_GET['query']."%","%".$_GET['query']."%","%".$_GET['query']."%","%".$_GET['query']."%"));
		
		$answer2 = $bdd->prepare('SELECT COUNT(DISTINCT GOLDSTAMP) FROM project,taxon 
								WHERE project.NCBI_TAXON_ID=taxon.NCBI_TAXON_ID 
								AND (GOLDSTAMP LIKE ?
								OR LEGACY_GOLDSTAMP LIKE ?
								OR PROJECT_NAME LIKE ?
								OR PROJECT_TYPE LIKE ?
								OR PROJECT_STATUS LIKE ?
								OR SEQUENCING_STATUS LIKE ?
								OR SEQUENCING_CENTERS LIKE ?
								OR FUNDING LIKE ?
								OR CONTACT_NAME LIKE ?
								OR NCBI_BIOPROJECT_ID LIKE ?
								OR NCBI_PROJECT_NAME LIKE ?
								OR project.NCBI_TAXON_ID LIKE ?
								OR DOMAIN LIKE ?
								OR KINGDOM LIKE ?
								OR PHYLUM LIKE ?
								OR CLASS LIKE ?
								OR ORDER_ LIKE ?
								OR FAMILY LIKE?
								OR GENUS LIKE ?
								OR SPECIES LIKE ?)');
		$answer2->execute(array("%".$_GET['query']."%","%".$_GET['query']."%","%".$_GET['query']."%","%".$_GET['query']."%","%".$_GET['query']."%","%".$_GET['query']."%","%".$_GET['query']."%","%".$_GET['query']."%","%".$_GET['query']."%","%".$_GET['query']."%","%".$_GET['query']."%","%".$_GET['query']."%","%".$_GET['query']."%","%".$_GET['query']."%","%".$_GET['query']."%","%".$_GET['query']."%","%".$_GET['query']."%","%".$_GET['query']."%","%".$_GET['query']."%","%".$_GET['query']."%"));
		$count = $answer2->fetch();
	?>
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
	<?php	/*CHOIX DES COLONNES!!!*/
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
	?>
		</table>
	</div>

</section>

