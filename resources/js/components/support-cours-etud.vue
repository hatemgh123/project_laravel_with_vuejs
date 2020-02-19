<template>
    <div class="container" style="    padding-top: 22px;">
    <div class="row">
       <h1 class="page-header"><div class="crush">Liste Des Enseignants:</div></h1>
 
    </div>    

    <div class="row">
        <div class="col-md-10" >

<div class="panel-group " id="accordion" role="tablist" aria-multiselectable="true">
  <div class="panel panel-default" v-for="(listprof, index)  in list_prof" :key="index">
    <div class="panel-heading" role="tab" id="headingOne">
      <h4 class="panel-title">
         <li class="list-group-item">
        <a data-toggle="collapse"  style="    color: black;
    text-decoration: none;" data-parent="#accordion" :href="'#collapse'+listprof.id" aria-expanded="true" :aria-controls="'#collapse'+listprof.id">
   <i class="fas fa-chevron-right"></i> 
        </a>
        <span>  <strong>Espace de cours M. {{listprof.name}}</strong></span>  </li> 
      </h4>
    </div>
    <div :id="'collapse'+listprof.id"   class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
      <div class="panel-body list-group-item">
        <div class="row" v-for="(listcat, index)  in list_cat" :key="index" v-if="listcat.user_id==listprof.id" >
            <div  class="col-10" >
         <a :href="'http://127.0.0.1:8000/Cat_cours/'+listprof.id+'/'+listcat.id"  class="list__cour__prof" ><i class="fas fa-sign-in-alt"></i> {{listcat.name_cat_cour}}</a>
          </div>
            <div  class="col-2"  style=" font-size: 19px;">
        <i  v-if="listcat.clef=='NULL'"  class="fas fa-lock-open"></i>      
       <i  v-else class=" fas fa-lock"></i>
  <i v-for="(favorites, index)  in favorite" :key="index" v-if="favorites.cat_cour==listcat.id" class="fas fa-star" style="color: #ffbf00;"></i> 
   
          </div>
        </div>
      </div>
    </div>
  </div>

</div>
     </div>





</div>  
</div>
</template>
<script>
export default {
    props:['iduser','list_prof','list_cat','favorite'],

  
    created() {

 Event.$on('addedcat',(cat)=>
    {
    this.cours_prof.push(this.cat);
       

    });
    
   
 
},


methods: {

    addcat(){
       let addcat= $("#itemcat") ;
       $("#textajoute").css('display','none');
     

     addcat.css('display','flex');
    },
    addcat_cour(){
        if(this.cat.name_cat_cour!=null && this.cat.name_cat_cour!=""){
      axios.post("api/ajouter_cat_cour",{cat_cour:this.cat})
      .then(
        ress =>{
          Event.$emit('addedcat',{cat:this.cat}) ;
            
             let addcat= $("#itemcat") ;
       $("#textajoute").css('display','flex');
     
     addcat.css('display','none');
        
      
    
        }
        
      ).catch(error => console.log(error));
        }
   
    },
    supp(id,index){
 this.cours_prof.splice(index, 1);
       
    },
    clef(id){
        if($('#clefcheckbox'+id+'').is(':checked')){
    
        }
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
