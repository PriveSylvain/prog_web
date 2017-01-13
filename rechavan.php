<?php include("template.php");?>

<?php
include 'connexionBDD.php';
$req=$bdd->query('SELECT distinct (PROJECT_TYPE) FROM `project`');
$req2=$bdd->query('SELECT distinct (PROJECT_STATUS) FROM `project`');
$req3=$bdd->query('SELECT DISTINCT `SEQUENCING_STATUS` FROM `project`');
$req4=$bdd->query('SELECT DISTINCT `SEQUENCING_CENTERS` FROM `project`');
$req5=$bdd->query('SELECT DISTINCT `FUNDING` FROM `project`');
$req6=$bdd->query('SELECT DISTINCT `CONTACT_NAME` FROM `project`');

$reqDOM=$bdd->query('SELECT DISTINCT `DOMAIN` FROM `taxon`');
$reqKIN=$bdd->query('SELECT DISTINCT `KINGDOM` FROM `taxon`');

/*TEST

while ($tab_rep = $req->fetch()){
	echo $tab_rep['PROJECT_TYPE'];
}
/TEST*/

?>
<script language="javascript" type="text/javascript">
 
function showHideText(divID)
{
	if (document.getElementById(divID).style.display=='block'){
		document.getElementById(divID).style.display='none';
        }
    else
    {
        document.getElementById(divID).style.display='block';
    }
}
</script>
<section>
	<div id="center">
		<form method="post" action="rechavan_.php">
		<!--<?php echo $_SERVER['PHP_SELF'];?>-->
		<div id ="tax_or_proj">
			<fieldset>
			<legend><label><INPUT type="checkbox" id="proj" name="cbproj" onclick="showHideText('li_proj')">Projet</label></legend>
			<div id="li_proj" style="display:none;" >
				<label><INPUT type="checkbox" id="formgold" name="cbgold" onclick="showHideText('divgold')">GOLDSTAMP</label>
				<label><INPUT type="checkbox" id="formleg" name="cbleg" onclick="showHideText('divleg')">LEGACY_GOLDSTAMP</label>
				<label><INPUT type="checkbox" id="formpn" name="cbpn" onclick="showHideText('divpn')">PROJECT_NAME</label>
				<label><INPUT type="checkbox" id="formpt" name="cbpt" onclick="showHideText('divpt')">PROJECT_TYPE</label>
				<label><INPUT type="checkbox" id="formps" name="cbps" onclick="showHideText('divps')">PROJECT_STATUS</label>
				<label><INPUT type="checkbox" id="formss" name="cbss" onclick="showHideText('divss')">SEQUENCING_STATUS</label>
				<label><INPUT type="checkbox" id="formsc" name="cbsc" onclick="showHideText('divsc')">SEQUENCING_CENTERS</label>
				<label><INPUT type="checkbox" id="formf" name="cbf" onclick="showHideText('divf')">FUNDING</label>
				<label><INPUT type="checkbox" id="formcn" name="cbcn" onclick="showHideText('divcn')">CONTACT_NAME</label>
				<label><INPUT type="checkbox" id="formnbi" name="cbnbi" onclick="showHideText('divnbi')">NCBI_BIOPROJECT_ID</label>
				<label><INPUT type="checkbox" id="formnpn" name="cbnpn" onclick="showHideText('divnpn')">NCBI_PROJECT_NAME</label>
			</div>
			</fieldset>	
			<fieldset>
			<legend><label><INPUT type="checkbox" id="tax" name="cbtax" onclick="showHideText('li_tax')">Taxon</label></legend>
			<div id="li_tax" style="display:none;">
				<label><INPUT type="checkbox" id="formtaxID" name="cbtaxid" onclick="showHideText('divnti')">NCBI_TAXON_ID</label>
				<label><INPUT type="checkbox" id="formdom" name="cbdom" onclick="showHideText('divDOM')">DOMAIN</label>
				<label><INPUT type="checkbox" id="formkin" name="cbkin" onclick="showHideText('divKIN')">KINGDOM</label>
				<label><INPUT type="checkbox" id="formphy" name="cbphy" onclick="showHideText('divPHY')">PHYLUM</label>
				<label><INPUT type="checkbox" id="formcla" name="cbsla" onclick="showHideText('divCLA')">CLASS</label>
				<label><INPUT type="checkbox" id="formord" name="cbord" onclick="showHideText('divORD')">ORDER_</label>
				<label><INPUT type="checkbox" id="fromfam" name="cbfam" onclick="showHideText('divFAM')">FAMILY</label>
				<label><INPUT type="checkbox" id="fromgen" name="cbgen" onclick="showHideText('divGEN')">GENUS</label>
				<label><INPUT type="checkbox" id="fromspecies" name="cbspecies" onclick="showHideText('divSPE')">SPECIES</label>
			</div>
			</fieldset>
		</div>
		<div id="choix_projet">
			<div id="divgold" style="display:none;">
				<p>GOLDSTAMP</br>
				<input type="text" name="GOLDSTAMP" /></p>
			</div>
			<div id="divleg" style="display:none;">
				<p>LEGACY_GOLDSTAMP</br>
				<input type="text" name="LEGACY_GOLDSTAMP" /></p>
			</div>
			<div id="divpn" style="display:none;">
				<p>PROJECT_NAME</br>
				<input type="text" name="PROJECT_NAME" /></p>
			</div>
			<div id="divpt" style="display:none;">
				<p><label for="PROJECT_TYPE">PROJECT_TYPE</label></br>
				<select style='width:300px' name="PROJECT_TYPE" id="PROJECT_TYPE">
				<option value=""></option>
				<?php
					while ($tab_rep = $req->fetch()){
						?><option value="<?php echo $tab_rep['PROJECT_TYPE'] ?>" > <?php echo $tab_rep['PROJECT_TYPE'] ?></option> <?php
					}
					$req->closeCursor();
				?>
				</select></p>
			</div>
			<div id="divps" style="display:none;">
				<p><label for="PROJECT_STATUS">PROJECT_STATUS</label></br>
				<select style='width:300px' name="PROJECT_STATUS" id="PROJECT_STATUS">
				<option value=""></option>
				<?php
				while ($tab_rep = $req2->fetch()){
					?><option value="<?php echo $tab_rep['PROJECT_STATUS'] ?>" > <?php echo $tab_rep['PROJECT_STATUS'] ?></option> <?php
				}
				$req2->closeCursor();
				?>
				</select></p>
			</div>
			<div id="divss" style="display:none;">
				<p><label for="SEQUENCING_STATUS">SEQUENCING_STATUS</label></br>
				<select style='width:300px' name="SEQUENCING_STATUS" id="SEQUENCING_STATUS">
				<option value=""></option>
				<?php
				while ($tab_rep = $req3->fetch()){
					?><option value="<?php echo $tab_rep['SEQUENCING_STATUS'] ?>" > <?php echo $tab_rep['SEQUENCING_STATUS'] ?></option> <?php
				}
				$req3->closeCursor();
				?>
				</select></p>
			</div>
			<div id="divsc" style="display:none;">
				<p><label for="SEQUENCING_CENTERS">SEQUENCING_CENTERS</label></br>
				<select style='width:300px' name="SEQUENCING_CENTERS" id="SEQUENCING_CENTERS">
				<option value=""></option>
				<?php
				while ($tab_rep = $req4->fetch()){
					?><option value="<?php echo $tab_rep['SEQUENCING_CENTERS'] ?>" > <?php echo $tab_rep['SEQUENCING_CENTERS'] ?></option> <?php
				}
				$req4->closeCursor();
				?>
				</select></p>
			</div>
			<div id="divf" style="display:none;">
				<p><label for="FUNDING">FUNDING</label></br>
				<select style='width:300px' name="FUNDING" id="FUNDING">
				<option value=""></option>
				<?php
				while ($tab_rep = $req5->fetch()){
					?><option value="<?php echo $tab_rep['FUNDING'] ?>" > <?php echo $tab_rep['FUNDING'] ?></option> <?php
				}
				$req5->closeCursor();
				?>
				</select></p>
			</div>
			<div id="divcn" style="display:none;">
				<p><label for="CONTACT_NAME">CONTACT_NAME</label></br>
				<select style='width:300px' name="CONTACT_NAME" id="CONTACT_NAME">
				<option value=""></option>
				<?php
				while ($tab_rep = $req6->fetch()){
					?><option value="<?php echo $tab_rep['CONTACT_NAME'] ?>" > <?php echo $tab_rep['CONTACT_NAME'] ?></option> <?php
				}
				$req6->closeCursor();
				?>
				</select></p>
			</div>
			<div id="divnbi" style="display:none;">
				<p>NCBI_BIOPROJECT_ID</br>
				<input type="number"  name="NCBI_BIOPROJECT_ID" id="NCBI_BIOPROJECT_ID"/></p>
			</div>
			<div id="divnpn" style="display:none;">
				<p>NCBI_PROJECT_NAME</br>
				<input type="text" name="NCBI_PROJECT_NAME" /></p>
			</div>
		</div>
		<div id="choix_taxon">
			<div id="divnti" style="display:none;">
				<p>NCBI_TAXON_ID</br>
				<input type="number"  name="NCBI_TAXON_ID" id="NCBI_TAXON_ID"/></p>
			</div>
			<div id="divDOM" style="display:none;">
				<p><label for="DOMAIN">DOMAIN</label></br>
				<select style='width:300px' name="DOMAIN" id="DOMAIN">
				<option value=""></option>
				<?php
				while ($tab_rep = $reqDOM->fetch()){
					?><option value="<?php echo $tab_rep['DOMAIN'] ?>" > <?php echo $tab_rep['DOMAIN'] ?></option> <?php
				}
				$reqDOM->closeCursor();
				?>
				</select></p>
			</div>
			<div id="divKIN" style="display:none;">
				<p><label for="KINGDOM">KINGDOM</label></br>
				<select style='width:300px' name="KINGDOM" id="KINGDOM">
				<option value=""></option>
				<?php
				while ($tab_rep = $reqKIN->fetch()){
					?><option value="<?php echo $tab_rep['KINGDOM'] ?>"> <?php echo $tab_rep['KINGDOM'] ?></option> <?php
				}
				$reqKIN->closeCursor();
				?>
				</select></p>
			</div>
			<div id="divPHY" style="display:none;">
				<p>PHYLUM</br>
				<input type="text"  name="PHYLUM" id="PHYLUM"/></p>
			</div>
			<div id="divCLA" style="display:none;">
				<p>CLASS</br>
				<input type="text"  name="CLASS" id="CLASS"/></p>
			</div>
			<div id="divORD" style="display:none;">
				<p>ORDER_</br>
				<input type="text"  name="ORDER_" id="ORDER_"/></p>
			</div>
			<div id="divFAM" style="display:none;">
				<p>FAMILY</br>
				<input type="text"  name="FAMILY" id="FAMILY"/></p>
			</div>
			<div id="divGEN" style="display:none;">
				<p>GENUS</br>
				<input type="text"  name="GENUS" id="GENUS"/></p>
			</div>
			<div id="divSPE" style="display:none;">
				<p>SPECIES</br>
				<input type="text"  name="SPECIES" id="SPECIES"/></p>
			</div>
		</div>
		<input type="submit" value="RECHERCHER"/>
	</form>
	</div>
</section>
