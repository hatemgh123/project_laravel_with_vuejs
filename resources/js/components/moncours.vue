<template>
    <div class="container"  style="    padding-top: 22px;">
          <div class="row">
       <h1 class="page-header"><div class="crush">Mon cours </div></h1>
 
    </div>  
    <div class="row"  >
 <aucun-r v-if="catcours.length==0"></aucun-r>

<div class="col-11" v-for="(catcour, index)  in catcours" :key="index">
 <!--  start card -->

<div class="card">
  
<!-- end card -->
<!--  :id="'toggle'+chap.id" -->
  <div class="card-body" style="" >
    <blockquote class="blockquote ml-3 mb-0 row">
      <a data-toggle="modal" :data-target="'#deletecatcours'+catcour.id" class="fas fa-star col-1" style="color: rgb(255, 191, 0);     font-size: 28px;" href="#"></a>

   <a  :href="'http://127.0.0.1:8000/Cat_cours/'+catcour.user_id+'/'+catcour.id"  class="col-8 list__cour__etud"> <h5  ><strong> {{catcour.name_cat_cour}}</strong></h5></a>

<!-- start model delete  -->
  <div class="modal fade" style="    text-align: initial;" :id="'deletecatcours'+catcour.id"  tabindex="-1" role="dialog" aria-labelledby="clefTitle" aria-hidden="true">

 <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" ><strong>suppression</strong> ({{catcour.name_cat_cour}})</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="form-group">
            <label :for="'password'+catcour.id">Mot De Passe</label>
            <input type="password" class="form-control" name="" :id="'password'+catcour.id" />
          </div>
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annule</button>
        <button type="button" class="btn btn-danger" @click="deletecatcours(catcour.id,catcour.mon_id,index)" data-dismiss="modal">confirmer</button>
      </div>
    </div>
  </div>
  </div>
<!-- end model delete -->

  <footer class="blockquote-footer" v-for="(prof, index)  in profs" :key="index" v-if="prof.id==catcour.user_id">M.{{prof.name}}</footer> 
    </blockquote>
  </div>
</div>
</div>
	</div>	
	
</div>
</template>
<script>
export default {
  props: ["catcours","profs","iduser"],
  mounted() {
 
  },
  

  methods: {
  
    deletecatcours(id,mon_cour,index){
     let password ='#password'+id;
     let valpass=$(password).val()

     if(valpass!=''){
       axios.post("http://127.0.0.1:8000/api/delete_moncours",{id:mon_cour,password:valpass,id_user:this.iduser})
      .then(
        ress =>{
       if(ress.data=='oki')
        this.catcours.splice(index, 1);
    
        }
        
      ).catch(error => console.log(error)); 
     }
 
    }
  
  }
};
</script>
