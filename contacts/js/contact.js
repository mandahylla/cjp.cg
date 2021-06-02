/**
 * Codons un chat en HTML/CSS/Javascript avec nos amis PHP et MySQL
 */

/**
 * Il nous faut une fonction pour récupérer le JSON des
 * messages et les afficher correctement
 */
function getAdmins(){
  // 1. Elle doit créer une requête AJAX pour se connecter au serveur, et notamment au fichier handler.php
  const requeteAjax = new XMLHttpRequest();
  requeteAjax.open("GET", "c_handler.php");

  // 2. Quand elle reçoit les données, il faut qu'elle les traite (en exploitant le JSON) et il faut qu'elle affiche ces données au format HTML
  requeteAjax.onload = function(){
    const resultat = JSON.parse(requeteAjax.responseText);
    console.log(resultat);
    var i = 0;
    const html = resultat.reverse().map(function(admin){      
    i++;
    var active = "";
    var categ = "";

    if(admin.etat_connnexion == 0){
        active = "Inactif(ve)";
    } else active = "Actif(ve)";

    if(admin.categorie == 0){
        categ = "Administrateur Principal";
    } else categ = "Administrateur de centre";

      if(admin){
        return ` 
        <tbody class="admins">
                <tr>
                            <td>
                                <img src="https://bootdey.com/img/Content/avatar/avatar${i}.png" alt="">
                                <a href="#" class="user-link">${admin.name}</a>
                                <span class="user-subhead">${categ}</span>
                            </td>
                            <!--<td>
                                2013/08/08
                            </td>-->
                            <td class="text-center">
                                <span class="label label-default">${active}</span>
                            </td>
                            <td>
                                <a href="#">${admin.email}</a>
                            </td>
                            <td>
                                <a href="#">${admin.departement}</a>
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
              `
      }
      return "";
      
    }).join('');

    const admins = document.querySelector('.admins');

    admins.innerHTML = html;
    admins.scrollTop = admins.scrollHeight;
  }

  // 3. On envoie la requête
  requeteAjax.send();
}


 function getresult(url) {
  $.ajax({
    url: url,
    type: "GET",
    data:  {rowcount:$("#rowcount").val(),perpage:$("#perpage").val()}, //$("#pagination-setting").val()
    beforeSend: function(){$("#overlay").show();},
    success: function(data){
    $("#pagination-result").html(data);
    setInterval(function() {$("#overlay").hide(); },500);
    },
    error: function() 
    {}          
   });
}

function changePagination(option){
  if(option!= "") {
    getresult("pagination/getresult.php");
  }
}

/**
 * Il nous faut une intervale qui demande le rafraichissement
 * des messages toutes les 3 secondes et qui donne 
 * l'illusion du temps réel.
 
const interval = window.setInterval(getMessages, 5000);*/

//getAdmins();
getresult("pagination/getresult.php");