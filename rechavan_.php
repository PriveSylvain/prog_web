<?php include("template.php");?>
<section>
<?php
//preparation de la requete
$requete="SELECT GOLDSTAMP,NCBI_PROJECT_NAME,SEQUENCING_CENTERS,NCBI_BIOPROJECT_ID FROM `project` as p,`taxon` as t WHERE p.`NCBI_TAXON_ID`=t.`NCBI_TAXON_ID` ";
//nom des variables
//print_r($_POST);
if (isset($_POST["cbproj"])){
	if (isset($_POST["cbgold"]) and !empty($_POST["GOLDSTAMP"])){
		$GOLDSTAMP=$_POST["GOLDSTAMP"];
		$requete=$requete.' and GOLDSTAMP=\''.$GOLDSTAMP.'\'';
	}
	if (isset($_POST["cbleg"]) and !empty($_POST["LEGACY_GOLDSTAMP"])){
		$LEGACY_GOLDSTAMP=$_POST["LEGACY_GOLDSTAMP"];
		$requete=$requete.' and LEGACY_GOLDSTAMP=\''.$LEGACY_GOLDSTAMP.'\'';
	}
	if (isset($_POST["cbpn"]) and !empty($_POST["PROJECT_NAME"])){
		$PROJECT_NAME=$_POST["PROJECT_NAME"];
		$requete=$requete.' and PROJECT_NAME=\''.$PROJECT_NAME.'\'';
	}
	if (isset($_POST["cbpt"]) and !empty($_POST["PROJECT_TYPE"])){
		$PROJECT_TYPE=$_POST["PROJECT_TYPE"];
		$requete=$requete.' and PROJECT_TYPE=\''.$PROJECT_TYPE.'\'';
	}
	if (isset($_POST["cbps"]) and !empty($_POST["PROJECT_STATUS"])){
		$PROJECT_STATUS=$_POST["PROJECT_STATUS"];
		$requete=$requete.' and PROJECT_STATUS=\''.$PROJECT_STATUS.'\'';
	}
	if (isset($_POST["cbss"]) and !empty($_POST["SEQUENCING_STATUS"])){
		$SEQUENCING_STATUS=$_POST["SEQUENCING_STATUS"];
		$requete=$requete.' and SEQUENCING_STATUS=\''.$SEQUENCING_STATUS.'\'';
	}
	if (isset($_POST["cbsc"]) and !empty($_POST["SEQUENCING_CENTERS"])){
		$SEQUENCING_CENTERS=$_POST["SEQUENCING_CENTERS"];
		$requete=$requete.' and SEQUENCING_CENTERS=\''.$SEQUENCING_CENTERS.'\'';
	}
	if (isset($_POST["cbf"]) and !empty($_POST["FUNDING"])){
		$FUNDING=$_POST["FUNDING"];
		$requete=$requete.' and FUNDING=\''.$FUNDING.'\'';
	}
	if (isset($_POST["cbcn"]) and !empty($_POST["CONTACT_NAME"])){
		$CONTACT_NAME=$_POST["CONTACT_NAME"];
		$requete=$requete.' and CONTACT_NAME=\''.$CONTACT_NAME.'\'';
	}
	if (isset($_POST["cbnbi"]) and !empty($_POST["NCBI_BIOPROJECT_ID"])){
		$NCBI_BIOPROJECT_ID=$_POST["NCBI_BIOPROJECT_ID"];
		$requete=$requete.' and NCBI_BIOPROJECT_ID=\''.$NCBI_BIOPROJECT_ID.'\'';
	}
	if (isset($_POST["cbnpn"]) and !empty($_POST["NCBI_PROJECT_NAME"])){
		$NCBI_PROJECT_NAME=$_POST["NCBI_PROJECT_NAME"];
		$requete=$requete.' and NCBI_PROJECT_NAME=\''.$NCBI_PROJECT_NAME.'\'';
	}
}
if (isset($_POST["cbtax"])){
	if (isset($_POST["cbtaxid"]) and !empty($_POST["NCBI_TAXON_ID"])){
		$NCBI_TAXON_ID=$_POST['NCBI_TAXON_ID'];
		$requete=$requete.' and NCBI_TAXON_ID=\''.$NCBI_TAXON_ID.'\'';
	}
	if (isset($_POST["cbdom"]) and !empty($_POST["DOMAIN"])){
		$DOMAIN=$_POST['DOMAIN'];
		$requete=$requete.' and DOMAIN=\''.$DOMAIN.'\'';
	}
	if (isset($_POST["cbkin"]) and !empty($_POST["KINGDOM"])){
		$KINGDOM=$_POST['KINGDOM'];
		$requete=$requete.' and KINGDOM=\''.$KINGDOM.'\'';
	}
	if (isset($_POST["cbphy"]) and !empty($_POST["PHYLUM"])){
		$PHYLUM=$_POST['PHYLUM'];
		$requete=$requete.' and PHYLUM=\''.$PHYLUM.'\'';
	}
	if (isset($_POST["cbsla"]) and !empty($_POST["CLASS"])){
		$CLASS=$_POST['CLASS'];
		$requete=$requete.' and CLASS=\''.$CLASS.'\'';
	}
	if (isset($_POST["cbord"]) and !empty($_POST["ORDER_"])){
		$ORDER_=$_POST["ORDER_"];
		$requete=$requete.' and ORDER_=\''.$ORDER_.'\'';
	}
	if (isset($_POST["cbfam"]) and !empty($_POST["FAMILY"])){
		$FAMILY=$_POST["FAMILY"];
		$requete=$requete.' and FAMILY=\''.$FAMILY.'\'';
	}
	if (isset($_POST["cbgen"]) and !empty($_POST["GENUS"])){
		$GENUS=$_["GENUS"];
		$requete=$requete.' and GENUS=\''.$GENUS.'\'';
	}
	if (isset($_POST["cbspecies"]) and !empty($_POST["SPECIES"])){
		$SPECIES=$_POST["SPECIES"];
		$requete=$requete.' and SPECIES=\''.$SPECIES.'\'';
	}
}
//connexion a la base de donnees
include 'connexionBDD.php';
//echo $requete;
$answer = $bdd->prepare($requete);
$answer->execute(array());
?>
<div id="center">
	<h1>Results</h1>
	<h4>Query: <?php echo $requete;?> </h4>
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
		?>
	</table>
</div>

</section>