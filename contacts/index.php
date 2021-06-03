<?php include_once('c_handler.php') ;?>
<?php compter_visite();?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width minimum-scale=1.0 maximum-scale=1.0 user-scalable=no" />
        <title>My webpage</title>
        <link href="<?php echo('css/mystyle.css')?>" rel="stylesheet" />
    </head>
    <body>
        <!-- The page 
        <div id="my-page">
            <div id="my-header">
                <a href="#my-menu">Open the menu</a>
            </div>
            <div id="my-content"></div>
        </div>-->
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="main-box clearfix">
                        <div id="overlay"><div><img src="pagination/loading.gif" width="64px" height="64px"/></div></div>
                        <div class="table-responsive page-content">                
                            <div style="border-bottom: #F0F0F0 1px solid;margin-bottom: 15px;">
                                Nombre par page:<br> 
                                <select name="perpage" onChange="changePagination(this.value);" class="pagination-setting" id="perpage">
                                    <option value="10">10</option>
                                    <option value="20">20</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                </select>
                            </div>                
                            <table class="table user-list" id="pagination-result">
                                <thead>
                                    <tr>
                                        <th><span>Administrateur</span></th>
                                        <!--<th><span>Created</span></th>-->
                                        <th class="text-center"><span>Status</span></th>
                                        <th><span>Email</span></th>
                                        <th><span>département</span></th>
                                        <th><span>Centre</span></th>
                                        <th>&nbsp;</th>
                                    </tr>
                                </thead>
                                <tbody class="admins" >
                                    
                                </tbody>                                                                 
                            </table>
                        </div>
                    </div>
                    <div class="visiteur">
                        Utilisateurs connectés : <?php echo update_connectes(); ?>
                    </div>                    
                </div>
                <div class="visiteur">
                        nombre de visiteur : <?php echo get_nbrVisiteurs(); ?>
                    </div>
            </div>
        </div>        
        <script src="http://code.jquery.com/jquery-2.1.1.js"></script>      
        <script src="js/contact.js"></script>        
    </body>
</html>