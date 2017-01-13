<?php include("template.php");?>

<!--Ajouter Verif!!-->

<section>
<?php
	if (isset($_GET['Gp']))
	{
		include ('connexionBDD.php');
		$answer = $bdd->prepare('SELECT DISTINCT * FROM project,taxon WHERE GOLDSTAMP=? AND project.NCBI_TAXON_ID=taxon.NCBI_TAXON_ID');
		$answer->execute(array($_GET['Gp']));
		$data = $answer->fetch();
		$answer->closeCursor();
		$goldstamp=str_replace("Gp","Go",$data['GOLDSTAMP']);
	}
?>
	<div id="fiche">
		<h1>Fiche</h1>
		<table class="proj">
			<caption style="font-weight:bold;font-size:18px">Project</caption>
			<TR><TH>Goldstamp</TH><TD><a href="https://gold.jgi.doe.gov/organism?id=<?php echo $goldstamp?>"><?php echo $data['GOLDSTAMP']?></a></TD></TR>
			<TR><TH>Legacy Goldstamp</TH><TD><?php echo $data['LEGACY_GOLDSTAMP']?></TD></TR>
			<TR><TH>Project Name</TH><TD><?php echo $data['PROJECT_NAME']?></TD></TR>
			<TR><TH>Project Type</TH><TD><?php echo $data['PROJECT_TYPE']?></TD></TR>
			<TR><TH>Project Status</TH><TD><?php echo $data['PROJECT_STATUS']?></TD></TR>
			<TR><TH>Sequencing Status</TH><TD><?php echo $data['SEQUENCING_STATUS']?></TD></TR>
			<TR><TH>Sequencing Centers</TH><TD><?php echo $data['SEQUENCING_CENTERS']?></TD></TR>
			<TR><TH>Funding</TH><TD><?php echo $data['FUNDING']?></TD></TR>
			<TR><TH>Contact Name</TH><TD><?php echo $data['CONTACT_NAME']?></TD></TR>
			<TR><TH>NCBI Bioproject ID</TH><TD><?php echo $data['NCBI_BIOPROJECT_ID']?></TD></TR>
			<TR><TH>NCBI Project Name</TH><TD><?php echo $data['NCBI_PROJECT_NAME']?></TD></TR>
			<TR><TH>NCBI Taxon ID</TH><TD><a href="https://www.ncbi.nlm.nih.gov/Taxonomy/Browser/wwwtax.cgi?id=<?php echo $data['NCBI_TAXON_ID']?>"><?php echo $data['NCBI_TAXON_ID']?></a></TD></TR>
		</table>
		<table class="taxon">
			<caption style="font-weight:bold;font-size:18px">Taxon</caption>
			<TR><TH>Domain</TH><TD><?php echo $data['DOMAIN']?></TD></TR>
			<TR><TH>Kingdom</TH><TD><?php echo $data['KINGDOM']?></TD></TR>
			<TR><TH>Phylum</TH><TD><?php echo $data['PHYLUM']?></TD></TR>
			<TR><TH>Class</TH><TD><?php echo $data['CLASS']?></TD></TR>
			<TR><TH>Order</TH><TD><?php echo $data['ORDER_']?></TD></TR>
			<TR><TH>Family</TH><TD><?php echo $data['FAMILY']?></TD></TR>
			<TR><TH>Genus</TH><TD><?php echo $data['GENUS']?></TD></TR>
			<TR><TH>Species</TH><TD><?php echo $data['SPECIES']?></TD></TR>
		</table>
	</div>
</section>