<template>
    <div class="container">
    <div class="row"   style="    padding-top: 22px;">
<div class="col-11">
  <div class="card">
  <div class="card-body">
    <blockquote class="blockquote mb-0">
     <button id="addcat" v-on:click="addmodele()" class=" btn btn-outline-primary fas fa-folder-plus main__bg" style="    font-size: 19px;"></button>
             <strong  id='textajoute'>Ajouter nouveaux modèle..</strong>
       <!--       start modèle -->
<div class='row'  id='itemmodele' style="display:none ;    padding-bottom: 13px;">
  <div class='col-lg-6 col-md-12'>
    <label for='namecat'>Ajouter Un Nouveaux modèle De Cours:</label>
     <input type='text' id='namecat' v-model='new_chaps.name_chap' placeholder='modèle De Cours..' aria-label='Last name' class='form-control'>
     </div>

       <div class='col-lg-2 col-md-12' >
         <label>  &nbsp;&nbsp;&nbsp;</label>
         <input type='button' id='namekey' v-on:click="addchap()" placeholder='optionnelle'  value='Ajouter'  aria-label='Last name' class='form-control btn btn-primary'>
         </div>
         </div>
<!--  end modèle -->
  
    </blockquote>
  </div>
</div>

     
    </div>
 <aucun-r v-if="chaps.length==0"></aucun-r>
<div class="col-11" v-for="(chap, index)  in chaps" :key="index">
 <!--  start card -->

<div class="card">
  <div class="card-header " style="    background: #f0f0ff;">
      <div class="row">
        <div class="col-2">
    <div class="btn-group" role="group" aria-label="Basic example">
      <button type="button" class=" btn btn-outline-danger btn-sm fas fa-trash-alt "  data-toggle="modal" :data-target="'#deletemodel'+chap.id"></button>
      <button type="button" class=" btn btn-outline-primary btn-sm fas fa-edit"  data-toggle="modal" :data-target="'#modify'+chap.id"></button>
   
   
   
   <!-- start model modify -->
  <div class="modal fade" style="    text-align: initial;" :id="'modify'+chap.id"  tabindex="-1" role="dialog" aria-labelledby="clefTitle" aria-hidden="true">

 <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" >modifier le nom de modéle de cours</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          
      <input type="text" id="key"   style="    width: 100%;"  v-model="chap.name_chap">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annule</button>
        <button type="button" class="btn btn-primary" @click="modifier(chap.id,chap.name_chap)" data-dismiss="modal">confirmer</button>
      </div>
    </div>
  </div>
  </div>
<!-- end model modify -->


<!-- start model delete  -->
  <div class="modal fade" style="    text-align: initial;" :id="'deletemodel'+chap.id"  tabindex="-1" role="dialog" aria-labelledby="clefTitle" aria-hidden="true">

 <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" >suppression de modèle</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          
         <strong>{{chap.name_chap}}</strong>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annule</button>
        <button type="button" class="btn btn-danger" @click="deletemodel(chap.id,index)" data-dismiss="modal">confirmer</button>
      </div>
    </div>
  </div>
  </div>
<!-- end model delete -->

   
   
    </div>

  </div>
 <h5  class="col-9"><strong> {{chap.name_chap}}</strong></h5>
 <div class="col-1">
    <div class="btn-group" role="group" aria-label="Basic example">
      <button type="button" class=" btn btn-outline-dark btn-sm fas fa-plus " @click="toggle_add_cour(chap.id)" ></button>

    </div>
  </div>
  </div>

  </div>
<!-- end card -->

<!--  debut add cour -->
 <div class="container"  :id="'add'+chap.id"  style="    display: none; padding-top: 8px;" >
	<div class="row">
    <div class="col-md-12 col-lg-8">
	
                <h4 class="heading"><strong>ajouter un nouveau cours  </strong> dans {{chap.name_chap}} <span></span></h4>
    </div>
    <div class="col-lg-4 col-md-12 ">
      <select style="width:100%" name='cc' class="form-control form-control-lg" @change="Onchange_menu($event,chap.id)" >
  <option :value="'pdf'+chap.id" >PDF</option>
  <option :value="'text'+chap.id" selected>titre + texte</option>
  <option :value="'video'+chap.id">video</option>
  
</select>

    </div> 
    <div class="col-lg-12 col-md-12 " style="    padding: 12px;" >

      <div class="row" :id="'text'+chap.id">
        <div class="col-12"  >
         <label :for="'addtitre'+chap.id" class="h5">titre: </label>
  <input  style="width:100%" class="form-control form-control-lg"  :id="'addtitre'+chap.id" type="text" placeholder="titre">
<label :for="'addtext'+chap.id" class="h5">text: </label>
  <textarea class="form-control" name="title" style="    height:140px;
                        resize: none;" placeholder="Saisissez un titre descriptif" :id="'addtext'+chap.id" rows="3"></textarea>     
        </div>
          <div class="col-6 mt-3">
        <button type="button" class="btn btn-secondary" style="width:100%">Annuler</button>
        </div>
          <div class="col-6 mt-3">
        <button type="button" class="btn btn-primary " style="width:100%" @click="addcourtext(chap.id)">Ajouter</button>
        </div>
    </div>

     <div class="row" :id="'pdf'+chap.id" style="display:none">
        <div class="col-lg-5  col-md-12"  >
  <input  class="form-control form-control-lg" type="file"  ref="file" @change="handleFileUpload($event.target.name,$event.target.files)" />
        </div>
          <div class="col-lg-4  col-md-12">
        <button type="button" class="btn btn-primary " style="width:100%" @click="addcourpdf(chap.id)">Ajouter</button>
        </div>
    </div>

      <div class="row" :id="'video'+chap.id" style="display:none">
        <div class="col-lg-5  col-md-12"  >
 https://www.youtube.com/watch?v=<input  class="form-control form-control" @change="yt(chap.id,$event)" style="width: 109px;display: inline;" type="text"  />
  
        </div>
      
          <div class="col-lg-4  col-md-12">
        <button type="button" class="btn btn-primary " style="width:100%" @click="addcourpdf(chap.id)">Ajouter</button>
        </div>
        <div  class="col-lg-12 mt-3 text-center">
          <iframe width="560" :id="'yt'+chap.id" height="315" src="https://www.youtube.com/embed/39_OmBO9jVg" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
         </div>
   </div>


    </div>


	</div>
</div>
<!--  fin add cour -->
  <div class="card-body" style="padding: 1px;" v-for="(cour, index)  in cours" :key="index" v-if="cour.chap_id==chap.id" :id="'toggle'+chap.id">
    <blockquote class="blockquote ml-3 mb-0 row">
     <p class="col-lg-10 col-md-12" v-if="cour.title=='NULL'">
        <!-- <i class="fas fa-book"></i> -->
        <i class="fas fa-file-pdf" style="    color: red;"></i>  {{cour.url_pdf}}
        <a :href="'http://127.0.0.1:8000/storage/images/pdf/'+cour.url_pdf"  target="_blank"><i class="fas fa-download"></i></a>
      </p>
      <div class="col-lg-10 col-md-12" v-else>
        <!-- <i class="fas fa-book"></i> -->
        <i class="fas fa-file-alt" style="    color: green;"></i> <span >{{cour.title}} </span>
      <a href="#" class=" fas fa-glasses "  data-toggle="modal" :data-target="'#lirecours'+cour.id"></a>

       <!--  debut model lire cours  -->

       <div class="modal fade" style="    text-align: initial;" :id="'lirecours'+cour.id"  tabindex="-1" role="dialog" aria-labelledby="clefTitle" aria-hidden="true">

 <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
      <strong> {{cour.title}}</strong>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          
         {{cour.body}}
      </div>

    </div>
  </div>
  </div>
       <!--  fin model lire cours  -->
        
      </div>
  
          <div class="">

  <button type="button" class=" btn btn-outline-danger btn-sm fas fa-trash-alt "  data-toggle="modal" :data-target="'#deletec'+cour.id"></button>
  <a v-if="cour.title!='NULL'" href="#" class="fas fa-edit "  data-toggle="modal" :data-target="'#editec'+cour.id"
  style="    padding-right:4px;
    padding-left: 7px;     color: rgba(108, 99, 255, 0.9);"></a>

  <!-- start coursedit -->
  <div class="modal fade"  v-if="cour.title!='NULL'" style="    text-align: initial;" :id="'editec'+cour.id"  tabindex="-1" role="dialog" aria-labelledby="clefTitle" aria-hidden="true">

 <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" >modifier de cours</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
              <label :for="'addtitre'+cour.id" class="h5">titre: </label>
              <input type="text" class=" form-control" :id="'addtitre'+cour.id" :value="cour.title"/>
          <label :for="'addtextc'+cour.id" class="h5">text: </label>
  <textarea class="form-control" name="title" style="    height:280px;
                        resize: none;" placeholder="Saisissez un titre descriptif" v-model="cour.body" :id="'addtextc'+cour.id" rows="3">
                        </textarea>     
  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annule</button>
        <button type="button" class="btn btn-succes" @click="modifier_cour(cour.id,index)"  data-dismiss="modal">modifier</button>
      </div>
    </div>
  </div>
  </div>
<!-- end coursedite -->

       <!-- start cours delete -->
  <div class="modal fade" style="    text-align: initial;" :id="'deletec'+cour.id"  tabindex="-1" role="dialog" aria-labelledby="clefTitle" aria-hidden="true">

 <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" >suppression de cours</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          
      <strong>{{cour.title}}</strong>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annule</button>
        <button type="button" class="btn btn-danger" @click="supp_cour(cour.id,index)"  data-dismiss="modal">supprime</button>
      </div>
    </div>
  </div>
  </div>
<!-- end cours delete -->
  
          </div><br>
         


<!--       <footer class="blockquote-footer"></footer> -->
    </blockquote>
  </div>
</div>
</div>
	</div>	
	
</div>
</template>
<script>
export default {
  props: ["chap", "cour", "courId"],
  mounted() {
 
  },
  data() {
    return {
      new_chaps: {
        id: null,
        name_chap: null,
        cour_id: null
      },
    
      cours_prof: [],
      chaps: [],
      cours: [],
      file:''
    };
  },
  created() {
    this.getinfo();
    Event.$on("addedchap", (id,name,courid) => {
      this.chaps.push({
        id:id,
        name_chap:name,
   
        cour_id:courid
      });
    });
       Event.$on("addedcours", (id,text,chap) => {
      this.cours.push({
        id:id,
        title:text,
        chap_id:chap
      });
    });
     Event.$on("addedcourspdf", (id,file,chap) => {
      this.cours.push({
        id:id,
        url_pdf:file,
        title:"NULL",
        chap_id:chap
      });
    });
  },

  methods: {
    getinfo() {
      /*    this.cat.user_id=JSON.parse(this.idprof);
        this.cours_prof=JSON.parse(this.catcour); */
      this.new_chaps.cour_id = JSON.parse(this.courId);
      this.chaps = JSON.parse(this.chap);
      this.cours = JSON.parse(this.cour);
    },
    addmodele() {
      let addmodele = $("#itemmodele");
      $("#textajoute").toggle();

      addmodele.toggle();
    },
    yt(id,value){
      /* let type=$('#yt'+id);  */
console.log(value.value )
   
    },
    addchap() {
      if (this.new_chaps.name_chap != null && this.new_chaps.name_chap != "") {
        axios
          .post("http://127.0.0.1:8000/api/ajouter_chap", {
            new_chaps: this.new_chaps
          })
          .then(ress => {
            Event.$emit("addedchap",
                ress.data,
                this.new_chaps.name_chap,
                this.new_chaps.cour_id

            );
            this.new_chaps.name_chap=null;
          /*   this.new_chaps.cour_id=null; */

            let addchap = $("#itemmodele");
            $("#textajoute").css("display", "contents");

            addchap.css("display", "none");
          })
          .catch(error => console.log(error));
      }
    },
    addcour(id,new_cours){
   
    },
    toggle_add_cour(id){
    /* $("p").toggle(); */
/*     let addchap = $("#itemmodele");
            $("#textajoute").css("display", "contents"); */
let toggle_add='#toggle'+id;
let toggle='#add'+id;
          $(toggle_add).toggle();
         $(toggle).toggle();
    

    },
   supp_cour(id, index) {
     
      axios.post("http://127.0.0.1:8000/api/delete_cour",{id:id})
      .then(
        ress =>{
       
        this.cours.splice(index, 1);
    
        }
        
      ).catch(error => console.log(error));
    },
     deletemodel(id, index) {
     
      axios.post("http://127.0.0.1:8000/api/delete_model",{id:id})
      .then(
        ress =>{
       
        this.chaps.splice(index, 1);
    
        }
        
      ).catch(error => console.log(error)); 
    },
    Onchange_menu(event,id){
if (onchangeid!='pdf'+id) $('#pdf'+id).css('display','none');
if (onchangeid!='text'+id) $('#text'+id).css('display','none');
if (onchangeid!='video'+id) $('#video'+id).css('display','none');


if (onchangeid!='videotext'+id) $('#videotext'+id).css('display','none');
  const onchangeid = event.target[event.target.selectedIndex].value;
         
            $('#'+onchangeid).css('display','flex');
           
    },
     handleFileUpload(fieldName, fileList){
   this.file=fileList[0];
  },
    addcourpdf(id){
let formData = new FormData();
formData.append('file', this.file);
formData.append('id',id);
const config = { headers: { 'Content-Type': 'multipart/form-data' } };

axios.post( 'http://127.0.0.1:8000/api/ajouter_cours_pdf',
               formData, config
                
                
           
            ).then((ress)=>{
                Event.$emit("addedcourspdf",
                ress.data.id,
               ress.data.file,
                id);
              
        let toggle_add='#toggle'+id;
        let toggle='#add'+id;
          $(toggle_add).toggle();
         $(toggle).toggle();

        })
        .catch(()=>{
       /*    console.log('FAILURE!!'); */
        });
    },
    addcourtext(id){
       let titre =$('#addtitre'+id).val()
        let text =$('#addtext'+id).val()
       axios.post("http://127.0.0.1:8000/api/ajouter_cours",{text:text,titre:titre,chap_id:id})
      .then(
        ress =>{
         Event.$emit("addedcours",
                ress.data,
                titre,
                id
              

            );
        let toggle_add='#toggle'+id;
        let toggle='#add'+id;
          $(toggle_add).toggle();
         $(toggle).toggle();
    
        }
        
      ).catch(error => console.log(error));


    },
    checkbox(id) {
      $("#clefcheckbox" + id + "").on("change", function() {
        if ($("input:checkbox[checked=false]")) {
          $("#key").toggleClass("display");
        }
      });
    },
    modifier(id, name_chap) {
      if (name_chap != "") {
        axios
          .post("http://127.0.0.1:8000/api/modify_name_chap", { name_chap: name_chap, id: id })
          .then(ress => {
            console.log(ress);
          })
          .catch(error => console.log(error));
      }
    }
  }
};
</script>
