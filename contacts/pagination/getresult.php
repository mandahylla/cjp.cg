<?php
require_once("dbcontroller.php");
require_once("pagination.class.php");

$db_handle = new DBController();
$perPage = new PerPage();

$sql = "SELECT id_admin, email, name, categorie, departement.nom AS departement, centre.nom AS centre, etat_connexion FROM admin_verity, departement, centre WHERE departement.id_departement = admin_verity.id_departement AND centre.id_centre = admin_verity.id_centre ORDER BY name";

$paginationlink = "pagination/getresult.php?page=";	
$pagination_setting = $_GET["pagination_setting"];
				
$page = 1;
if(!empty($_GET["page"])) {
    $page = $_GET["page"];
}

if(!empty($_GET["perpage"])) {

    $perPage = new PerPage($_GET["perpage"]);
}

$start = ($page-1)*$perPage->perpage;
if($start < 0) $start = 0;

$query =  $sql . " limit " . $start . "," . $perPage->perpage; 
//print($query);
$faq = $db_handle->runQuery($query);

if(empty($_GET["rowcount"])) {
$_GET["rowcount"] = $db_handle->numRows($sql);
}

if($pagination_setting == "prev-next") {
	$perpageresult = $perPage->getPrevNext($_GET["rowcount"], $paginationlink,$pagination_setting);	
} else {
	$perpageresult = $perPage->getAllPageLinks($_GET["rowcount"], $paginationlink,$pagination_setting);	
}


$output = '<thead>
                <tr>
                    <th><span>Administrateur</span></th>                    
                    <th class="text-center"><span>Status</span></th>
                    <th><span>Email</span></th>
                    <th><span>Département</span></th>
                    <th><span>Centre</span></th>
                    <th>&nbsp;<div class="question"><input type="hidden" id="rowcount" name="rowcount" value="' . $_GET["rowcount"] . '" /></div></th>
                </tr>
            </thead>
            <tbody class="admins" >
            ';
$i = 0;
foreach($faq as $k=>$v) {
 $output .= '';
 $i++;
 $output .= '<tr>
                <td>
                    <img src="https://bootdey.com/img/Content/avatar/avatar'.$i.'.png" alt="">
                    <a href="#" class="user-link">' . $faq[$k]["name"] . '</a>
                    <span class="user-subhead">' .(($faq[$k]["categorie"] == 0)? "Administrateur Principal" : "Administrateur de centre") . '</span>
                </td>
                <!--<td>
                    2013/08/08
                </td>-->
                <td class="text-center">
                    <span class="label label-default">' .(($faq[$k]["etat_connnexion"] == 0)? "Inactif(ve)" : "Actif(ve)") . '</span>
                </td>
                <td>
                    <a href="#">' . $faq[$k]["email"] . '</a>
                </td>
                <td>
                    <a href="#">' . $faq[$k]["departement"] . '</a>
                </td>
                <td>
                    <a href="#">' . $faq[$k]["centre"] . '</a>
                </td>
                <td style="width: 20%;">
                    <a href="#" class="table-link">
                        <span class="fa-stack">
                            <i class="fa fa-square fa-stack-2x"></i>
                            <i class="fa fa-search-plus fa-stack-1x fa-inverse"></i>
                        </span>
                    </a>
                    <a href="#" class="table-link">
                        <span class="fa-stack">
                            <i class="fa fa-square fa-stack-2x"></i>
                            <i class="fa fa-pencil fa-stack-1x fa-inverse"></i>
                        </span>
                    </a>
                    <a href="#" class="table-link danger">
                        <span class="fa-stack">
                            <i class="fa fa-square fa-stack-2x"></i>
                            <i class="fa fa-trash-o fa-stack-1x fa-inverse"></i>
                        </span>
                    </a>                    
                </td>
            </tr>';
}

$output .='</tbody>';

if(!empty($perpageresult)) {
$output .= '<tfoot><td> <div id="pagination">' . $perpageresult . '</div> </td></tfoot>';
}
print $output;
?>
