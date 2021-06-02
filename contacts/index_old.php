<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width minimum-scale=1.0 maximum-scale=1.0 user-scalable=no" />
        <title>My webpage</title>
        <link href="<?php echo('css/mystyle.css')?>" rel="stylesheet" />
    </head>
    <body>
        <!-- The page -->
        <div id="my-page">
            <div id="my-header">
                <a href="#my-menu">Open the menu</a>
            </div>
            <div id="my-content"></div>
        </div>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<div class="container">
<div class="row">
    <div class="col-lg-12">
        <div class="main-box clearfix">
            <div class="table-responsive">
                <table class="table user-list">
                    <thead>
                        <tr>
                            <th><span>User</span></th>
                            <!--<th><span>Created</span></th>-->
                            <th class="text-center"><span>Status</span></th>
                            <th><span>Email</span></th>
                            <th><span>département</span></th>
                            <th>&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody class="admins" id="pagination-result">
                        <tr>
                            <td>
                                <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="">
                                <a href="#" class="user-link">Mila Kunis</a>
                                <span class="user-subhead">Admin</span>
                            </td>
                            <td>
                                2013/08/08
                            </td>
                            <td class="text-center">
                                <span class="label label-default">Inactive</span>
                            </td>
                            <td>
                                <a href="#">mila@kunis.com</a>
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
                        </tr>                                                     
                       
                        <tr>
                            <td>
                                <img src="https://bootdey.com/img/Content/avatar/avatar6.png" alt="">
                                <a href="#" class="user-link">Robert Downey Jr.</a>
                                <span class="user-subhead">Admin</span>
                            </td>
                            <td>
                                2013/12/31
                            </td>
                            <td class="text-center">
                                <span class="label label-success">Active</span>
                            </td>
                            <td>
                                <a href="#">spencer@tracy</a>
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
                        </tr>
                    </tbody>
                </table>
            </div>
            <div id="overlay"><div><img src="pagination/loading.gif" width="64px" height="64px"/></div></div>
            <div class="page-content">
                <!--<div style="border-bottom: #F0F0F0 1px solid;margin-bottom: 15px;">
                Pagination Setting:<br> <select name="pagination-setting" onChange="changePagination(this.value);" class="pagination-setting" id="pagination-setting">
                <option value="all-links">Display All Page Link</option>
                <option value="prev-next">Display Prev Next Only</option>
                </select>
                </div>-->
                
                <div >
                <input type="hidden" name="rowcount" id="rowcount" />
                </div>
            </div>
        </div>
    </div>
</div>
</div>
        <!-- The menu 
        <div id="my-menu">
            <ul id="my-contacts">
                <li>
                    <span>
                        <img src="path/to/alan.png" />
                        Alan<br />
                        <small>Thompson</small>
                    </span>                   
                    <div class="Panel">
                        <img src="path/to/alan.png" />
                        <strong>Alan Thompson</strong>
                        <dl>
                            <dt>First name</dt>
                            <dd>Alan</dd>

                            <dt>Last name</dt>
                            <dd>Thompson</dd>

                            <dt>Telephone</dt>
                            <dd>012-345-6789</dd>

                             more <dt />s and <dd />s -->
                       <!--  </dl>
                    </div>
                </li> -->
                <!-- more <li />s -->
           <!-- </ul>
        </div> -->  
        <script src="http://code.jquery.com/jquery-2.1.1.js"></script>      
         <script src="js/contact.js"></script>
        <!--<script>
            Mmenu.configs.offCanvas.page.selector = "#my-page";

            document.addEventListener(
                "DOMContentLoaded", () => {
                    new Mmenu( "#my-menu", {
                        dividers: {
                            add: true,
                            addTo: "#my-contacts",
                            fixed: true
                        },
                        searchfield: {
                            add: true,
                            addTo: "#my-contacts"
                        },
                        sectionIndexer: {
                            add: true,
                            addTo: "#my-contacts"
                        }
                    });
                }
            );
        </script>-->
    </body>
</html>