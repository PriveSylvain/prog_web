
<?php
include 'connexionBDD.php';

$sql = "SELECT * FROM `table 1`";
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
$tab_taxon = array();
while($data = mysql_fetch_assoc($req)){
	$GOLDSTAMP=$data['GOLDSTAMP'];
	$LEGACY_GOLDSTAMP=$data['LEGACY GOLDSTAMP'];
	$PROJECT_NAME=$data['PROJECT NAME'];
	$NCBI_PROJECT_NAME=$data['NCBI PROJECT NAME'];
	$NCBI_BIOPROJECT_ID=$data['NCBI BIOPROJECT ID'];
	$NCBI_TAXON_ID=$data['NCBI TAXON ID'];
	$PROJECT_TYPE=$data['PROJECT TYPE'];
	$PROJECT_STATUS=$data['PROJECT STATUS'];
	$DOMAIN=$data['DOMAIN'];
	$KINGDOM=$data['KINGDOM'];
	$PHYLUM=$data['PHYLUM'];
	$CLASS=$data['CLASS'];
	$ORDER_=$data['ORDER'];
	$FAMILY=$data['FAMILY'];
	$GENUS=$data['GENUS'];
	$SPECIES=$data['SPECIES'];
	$SPECIES=str_replace( "'", '', $SPECIES);
	$CONTACT_NAME=$data['CONTACT NAME'];
	$SEQUENCING_STATUS=$data['SEQUENCING STATUS'];
	$SEQUENCING_CENTERS=$data['SEQUENCING CENTERS'];
	$FUNDING=$data['FUNDING'];
	$sql="INSERT INTO `Project` VALUES ('".$GOLDSTAMP."','".$LEGACY_GOLDSTAMP."','".$PROJECT_NAME."','".$PROJECT_TYPE."','".$PROJECT_STATUS."','".$SEQUENCING_STATUS."','".$SEQUENCING_CENTERS."','".$FUNDING."','".$CONTACT_NAME."','".$NCBI_BIOPROJECT_ID."','".$PROJECT_NAME."','".$NCBI_TAXON_ID."')";
	mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
	if ( in_array($NCBI_TAXON_ID, $tab_taxon) == FALSE ){
		$sql="INSERT INTO `Taxon` VALUES ('".$NCBI_TAXON_ID."','".$DOMAIN."','".$KINGDOM."','".$PHYLUM."','".$CLASS."','".$ORDER_."','".$FAMILY."','".$GENUS."','".$SPECIES."')";
		$tab_taxon[]=$NCBI_TAXON_ID;
		mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
	}
}
mysql_close($connect);
?>