<template>
    <div class="container" style="    padding-top: 22px;">
    <div class="row">
        <h1 class="page-header"><div class="crush">Catégories de cours:</div></h1>
    </div>

    <div class="row">
        <div class="col-md-10" style="background: white;">
          <div class="list-group">
               <div  class="  row" style="    border-bottom: 1px solid #dee2e6;
    border-top: 1px solid #dee2e6;">
    <div class="col-1">
     <button id="addcat" v-on:click="addcat()" class=" btn btn-outline-primary fas fa-folder-plus main__bg" style="    font-size: 19px;"></button>

    </div>
    <div class="col-11">
             <strong  id='textajoute'>Ajouter nouveaux cours..</strong>
                          <div class='row' id='itemcat' style="display:none ;    padding-bottom: 13px;"><div class='col-lg-6 col-md-12'><label for='namecat'>Ajouter Un Nouveaux Catégories De Cours:</label> <input type='text' id='namecat' v-model='cat.name_cat_cour' placeholder='Catégories De Cours..' aria-label='Last name' class='form-control'></div><div class='col-lg-2 col-md-12'><label for='namekey'>Clef :</label>
                          <input type='text' id='namekey' v-model='cat.clef' placeholder='optionnelle'  style='background: #4950571f;' aria-label='Last name' class='form-control'> </div><div class='col-lg-2 col-md-12'><label>  &nbsp;&nbsp;&nbsp;</label><input type='button' id='namekey' v-on:click="addcat_cour()" placeholder='optionnelle'  value='Ajouter'  aria-label='Last name' class='form-control btn btn-primary'></div></div>
               </div>
     </div>         
              </div>  
        <div class="list-group"  v-for="(cour_prof, index)  in cours_prof" :key="index">
  <div  class=" list-group-item-action row" style="    border-bottom: 1px solid #dee2e6;
    border-top: 1px solid #dee2e6; padding-bottom: 4px;
    padding-top: 4px;">
    <div class="col-2">
        <div class="btn-group" role="group" aria-label="Basic example">
  <button type="button" class=" btn btn-outline-danger btn-sm fas fa-trash-alt "  data-toggle="modal" :data-target="'#delete'+cour_prof.id"></button>
  <button type="button" class="btn btn-outline-dark btn-sm  fas fa-user-lock"  @click="checkbox(cour_prof.id)"  data-toggle="modal" :data-target="'#clef'+cour_prof.id" title="Clef d'inscription" ></button>
  <button type="button" class=" btn btn-outline-primary btn-sm fas fa-edit"  data-toggle="modal" :data-target="'#modify'+cour_prof.id"></button>

    <!--start  Modal delete--> 
    
<div class="modal fade"  :id="'delete'+cour_prof.id" tabindex="-1" role="dialog" aria-labelledby="deleteTitle" aria-hidden="true">
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
        <button type="button" class="btn btn-danger" @click="supp(cour_prof.id,index)" data-dismiss="modal">Supprime</button>
      </div>
    </div>
  </div>
</div>
<!-- end model delete -->
<!-- start model clef -->
  <div class="modal fade" style="    text-align: initial;" :id="'clef'+cour_prof.id"  tabindex="-1" role="dialog" aria-labelledby="clefTitle" aria-hidden="true">

 <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" >{{cour_prof.name_cat_cour}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <input type="checkbox" :id="'clefcheckbox'+cour_prof.id" aria-label="Checkbox for following text input" checked> mettre un Clef d'inscription
      <input type="text" id="key"  v-model="cour_prof.clef"  >
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annule</button>
        <button type="button" class="btn btn-primary" @click="clef(cour_prof.id,cour_prof.clef)" data-dismiss="modal">confirmer</button>
      </div>
    </div>
  </div>
  </div>
<!-- end model clef-->

<!-- start model modify -->
  <div class="modal fade" style="    text-align: initial;" :id="'modify'+cour_prof.id"  tabindex="-1" role="dialog" aria-labelledby="clefTitle" aria-hidden="true">

 <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" >modifier nom Catégories de cour</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          
      <input type="text" id="key"   style="    width: 100%;"  v-model="cour_prof.name_cat_cour">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annule</button>
        <button type="button" class="btn btn-primary" @click="modifier(cour_prof.id,cour_prof.name_cat_cour)" data-dismiss="modal">confirmer</button>
      </div>
    </div>
  </div>
  </div>
<!-- end model modify -->





</div>
  </div>
  
  <div class="col-10 text-center"> <a class="list__cour__etud"  :href="'Cat_cours/'+cat.user_id+'/'+cour_prof.id" ><strong style="    font-size: 19px;">{{cour_prof.name_cat_cour}}</strong></a>
  </div>
  
  </div>
<div class="row " v-for="(chap, index)  in chaps" :key="index" v-if="chap.cour_id==cour_prof.id" style="   padding-bottom: 4px;
    padding-top: 4px;"> <b class=" col-lg-10 col-md-10 offset-2">{{chap.name_chap}}</b>
     <div class=" col-12 row " v-for="(cour, index)  in cours" :key="index" v-if="cour.chap_id==chap.id" style="   padding-bottom: 4px;
    padding-top: 4px;" >
    
    <div class=" col-lg-9 col-md-11 offset-1"  v-if="cour.title=='NULL'">{{cour.url_pdf}}.pdf</div>
      <div class=" col-lg-9 col-md-11 offset-1"  v-else>{{cour.title}}</div></div>
  </div>
</div>
            
        </div>
    </div>    
        
    
</div>
</template>
<script>
export default {
    props:['idprof','catcour','chap','cour'],
   mounted() {
 
         

 
    },
    data() {
        return {
               cat: {
        id: null,
        user_id:null,
        name_cat_cour:null,
        clef: null

      },
      change_clef:null,
      cours_prof:[],
      chaps:[],
      cours:[]

        }
    },
    created() {
 this.getinfo(); 
   
       Event.$on('addedcat',(name,clef,userid,id)=>
        { 
   this.cours_prof.push({
     clef:clef,
     id:id,
     name_cat_cour:name,
     user_id:userid
   }); 
      
  
        });
},


methods: {
    getinfo(){
       
        this.cat.user_id=JSON.parse(this.idprof);
        this.cours_prof=JSON.parse(this.catcour);
        this.chaps=JSON.parse(this.chap);
        this.cours=JSON.parse(this.cour);
    },
    addcat(){
       let addcat= $("#itemcat") ;
       $("#textajoute").toggle();
     

     addcat.toggle();
    },
    addcat_cour(){
        if(this.cat.name_cat_cour!=null && this.cat.name_cat_cour!=""){

   axios.post("api/ajouter_cat_cour",{cat_cour:this.cat})
      .then(
        ress =>{
        Event.$emit('addedcat',
                this.cat.name_cat_cour,this.cat.clef,this.cat.user_id,ress.data
                ) ;

          this.cat.name_cat_cour=null;

      this.cat.clef= null ;    
              

             let addcat= $("#itemcat") ;
       $("#textajoute").css('display','flex');
     
     addcat.css('display','none');
        
      
    
        }
        
      ).catch(error => console.log(error)); 
      
            
        }
  
    },
    supp(id,index){
        axios.post("api/delete_cat_cour",{id:id})
      .then(
        ress =>{
     
       this.cours_prof.splice(index, 1);
    
        }
        
      ).catch(error => console.log(error));

       
    },
    clef(id,clef){
        if(!$('#clefcheckbox'+id+'').is(':checked')){
   clef=null
        }
  
          axios.post("api/changer_clef",{clef:clef,id:id})
      .then(
        ress =>{
      
      
    
        }
        
      ).catch(error => console.log(error));
    },
    checkbox(id){
   $('#clefcheckbox'+id+'').on('change', function() {
  
   
       
        if($('input:checkbox[checked=false]') ) { 
            $('#key').toggleClass( "display" );
            }
     
    });
    },
    modifier(id,name_cat_cour){
        
if(name_cat_cour!=''){
      axios.post("api/modify_cat_cour",{name_cat_cour:name_cat_cour,id:id})
      .then(
        ress =>{
   
console.log(ress);
      
    
        }
        
      ).catch(error => console.log(error));
}
    }
},

}
</script>
