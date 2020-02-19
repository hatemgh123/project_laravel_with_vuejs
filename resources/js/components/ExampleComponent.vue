<template>
    <div class="container">
        <div class="table-responsive">
            
                <table class="table table-sm table-hover">
                  <thead class="thead-default">
                  
                    <tr class="add-category-row" >
                      <th style="width: 30px;">
                            <button id="addcat" v-on:click="addcat()" class=" btn btn-outline-primary fas fa-folder-plus main__bg" style="    font-size: 19px;"></button>
         
                      </th>
                      
                      
                      <th colspan="2" class="addcat"> <span  id='textajoute'>Ajouter nouveaux cours..</span>
                          <div class='row' id='itemcat' style="display:none"><div class='col-lg-6 col-md-12'><label for='namecat'>Ajouter Un Nouveaux Catégories De Cours:</label> <input type='text' id='namecat' v-model='cat.name_cat_cour' placeholder='Catégories De Cours..' aria-label='Last name' class='form-control'></div><div class='col-lg-2 col-md-12'><label for='namekey'>Clef :</label><input type='text' id='namekey' v-model='cat.clef' placeholder='optionnelle'  style='background: #4950571f;' aria-label='Last name' class='form-control'> </div><div class='col-lg-2 col-md-12'><label>  &nbsp;&nbsp;&nbsp;</label><input type='button' id='namekey' v-on:click="addcat_cour()" placeholder='optionnelle'  value='Ajouter'  aria-label='Last name' class='form-control btn btn-primary'></div></div>
                      </th>
                      
                      <th style="width: 70px;"></th>
                    </tr>
                </thead>

                <tbody>

                      
                   <tr class="category-row"  v-for="(cour_prof, index)  in cours_prof" :key="index">
                      <th style="width: 30px;"> <button type="button" class="btn btn-outline-danger btn-sm fas fa-trash-alt" style="  
    font-size: 15px;" data-toggle="modal" data-target="#delete"></button>
                       <!-- Modal --> 
<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="deleteTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="docu ment">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteTitle">suppression de cours</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        supprime tous le {{cour_prof.name_cat_cour}}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annule</button>
        <button type="button" class="btn btn-danger">Supprime</button>
      </div>
    </div>
  </div>
</div>
                      </th>
                      
                      <th style="width: 30px;">  <button type="button" class="btn btn-outline-dark btn-sm  fas fa-user-lock"  data-toggle="modal" data-target="#clef" title="Clef d'inscription" ></button>
                         <div class="modal fade" style="    text-align: initial;" id="clef" tabindex="-1" role="dialog" aria-labelledby="clefTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="clefTitle">{{cour_prof.name_cat_cour}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <input type="checkbox" id="showkey" aria-label="Checkbox for following text input" checked> mettre un Clef d'inscription
      <input type="text" id="key"  :value="cour_prof.clef">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annule</button>
        <button type="button" class="btn btn-primary">confirmer</button>
      </div>
    </div>
  </div>
</div>

                        </th>
                      
                      <th style="text-align: center;"><a href="#" style="">{{cour_prof.name_cat_cour}}</a></th>
                      
                      <th style="text-align: right;">
                         
                         
                      </th>
            
                    </tr>
                  
                <!--   start -->
                <!--   debut cours  -->
             <tr class="warning">
                        <td colspan="3">
                            <div class="row q_row">
                                <div class="col-lg-1"></div>
                                <div class="col-lg-9">
                                    <strong> Chapitre 1 :</strong>
                                </div>
                               <!--  
                                <div class="col-lg-2">
                                    <div class="btn-group pull-right" role="group" aria-label="...">
                                      <button type="button" class="btn btn-danger btn-xs">Good</button>
                                      <button type="button" class="btn btn-default  btn-xs">UA</button>
                                    </div>
                                </div>
                                -->
                                
                            </div>
                        </td>
                        <td style="text-align: right;">
                        
                        </td>
                </tr>  
               <!--   fin cours  -->  
               
                    <tr>
                        <td>
                  
                        </td>

                        <td colspan="2">
                            <div class="row q_row"><div class="col-lg-11"><span> Fondements des réseaux</span></div><div class="col-lg-1">                       </div> </div>
                        </td>
                        <td style="text-align: right;">
                        

                        </td>
                                                
                         

                    </tr>
                 <!--    end -->
                   <!--   start -->
                <!--   debut cours  -->
             <tr class="warning">
                        <td colspan="3">
                            <div class="row q_row">
                                <div class="col-lg-1"></div>
                                <div class="col-lg-9">
                                    <strong> Chapitre 1 :</strong>
                                </div>
                               <!--  
                                <div class="col-lg-2">
                                    <div class="btn-group pull-right" role="group" aria-label="...">
                                      <button type="button" class="btn btn-danger btn-xs">Good</button>
                                      <button type="button" class="btn btn-default  btn-xs">UA</button>
                                    </div>
                                </div>
                                -->
                                
                            </div>
                        </td>
                        <td style="text-align: right;">
                        
                        </td>
                </tr>  
               <!--   fin cours  -->  
               
                    <tr>
                        <td>
                  
                        </td>

                        <td colspan="2">
                            <div class="row q_row"><div class="col-lg-11"><span> Fondements des réseaux</span></div><div class="col-lg-1">                       </div> </div>
                        </td>
                        <td style="text-align: right;">
                        

                        </td>
                                                
                         

                    </tr>
                 <!--    end -->
                   <!--   start -->
                <!--   debut cours  -->
             <tr class="warning">
                        <td colspan="3">
                            <div class="row q_row">
                                <div class="col-lg-1"></div>
                                <div class="col-lg-9">
                                    <strong> Chapitre 1 :</strong>
                                </div>
                               <!--  
                                <div class="col-lg-2">
                                    <div class="btn-group pull-right" role="group" aria-label="...">
                                      <button type="button" class="btn btn-danger btn-xs">Good</button>
                                      <button type="button" class="btn btn-default  btn-xs">UA</button>
                                    </div>
                                </div>
                                -->
                                
                            </div>
                        </td>
                        <td style="text-align: right;">
                        
                        </td>
                </tr>  
               <!--   fin cours  -->  
               
                    <tr>
                        <td>
                  
                        </td>

                        <td colspan="2">
                            <div class="row q_row"><div class="col-lg-11"><span> Fondements des réseaux</span></div><div class="col-lg-1">                       </div> </div>
                        </td>
                        <td style="text-align: right;">
                        

                        </td>
                                                
                         

                    </tr>
                 <!--    end -->
                   <!--   start -->
                <!--   debut cours  -->
             <tr class="warning">
                        <td colspan="3">
                            <div class="row q_row">
                                <div class="col-lg-1"></div>
                                <div class="col-lg-9">
                                    <strong> Chapitre 1 :</strong>
                                </div>
                               <!--  
                                <div class="col-lg-2">
                                    <div class="btn-group pull-right" role="group" aria-label="...">
                                      <button type="button" class="btn btn-danger btn-xs">Good</button>
                                      <button type="button" class="btn btn-default  btn-xs">UA</button>
                                    </div>
                                </div>
                                -->
                                
                            </div>
                        </td>
                        <td style="text-align: right;">
                        
                        </td>
                </tr>  
               <!--   fin cours  -->  
               
                    <tr>
                        <td>
                  
                        </td>

                        <td colspan="2">
                            <div class="row q_row"><div class="col-lg-11"><span> Fondements des réseaux</span></div><div class="col-lg-1">                       </div> </div>
                        </td>
                        <td style="text-align: right;">
                        

                        </td>
                                                
                         

                    </tr>
                 <!--    end -->
                   <!--   start -->
                <!--   debut cours  -->
             <tr class="warning">
                        <td colspan="3">
                            <div class="row q_row">
                                <div class="col-lg-1"></div>
                                <div class="col-lg-9">
                                    <strong> Chapitre 1 :</strong>
                                </div>
                               <!--  
                                <div class="col-lg-2">
                                    <div class="btn-group pull-right" role="group" aria-label="...">
                                      <button type="button" class="btn btn-danger btn-xs">Good</button>
                                      <button type="button" class="btn btn-default  btn-xs">UA</button>
                                    </div>
                                </div>
                                -->
                                
                            </div>
                        </td>
                        <td style="text-align: right;">
                        
                        </td>
                </tr>  
               <!--   fin cours  -->  
               
                    <tr>
                        <td>
                  
                        </td>

                        <td colspan="2">
                            <div class="row q_row"><div class="col-lg-11"><span> Fondements des réseaux</span></div><div class="col-lg-1">                       </div> </div>
                        </td>
                        <td style="text-align: right;">
                        

                        </td>
                                                
                         

                    </tr>
                 <!--    end -->
                </tbody>
                </table>
    
            </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
