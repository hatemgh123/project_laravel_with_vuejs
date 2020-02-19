<template>
    <div class="container">
    <div class="row"   style="    padding-top: 22px;">
        <div class="col-11">
           
        </div>
<div class="col-11">
  <div class="card">
  <div class="card-body">
    <blockquote class="blockquote mb-0">
     <button id="addcat" v-on:click="addmodele()" class=" btn btn-outline-primary fas fa-folder-plus main__bg" style="    font-size: 19px;"></button>
             <strong  id='textajoute'>Ajouter nouveaux  travaux à faire..</strong>
       <!--       start modèle -->
<div class='row'  id='itemmodele' style="display:none ;    padding-bottom: 13px;">
  <div class='col-lg-8 col-md-12'>
    <label for='title'>Nom travaux à faire:</label>
     <input type='text' id='title' v-model='to_do.title' placeholder=' travaux à faire..' aria-label='Last name' class='form-control'>
    
    <label for='fichier'>fichier pdf:</label>
      <input  class="form-control form-control-lg" type="file" id="fichier1" ref="file1" @change="handleFileurlUpload($event.target.name,$event.target.files)" />
        <label for='findate'> fin date:(optionnel)</label>
      <input  class="form-control form-control-lg"  id='findate' type="date" v-model=" to_do.fin_date" />
        <br/>
             <input type='button' id='namekey' v-on:click="addtodo()" placeholder='optionnelle'  value='Ajouter'  aria-label='Last name' class='form-control btn btn-primary'>
    
    
     </div>

       <div class='col-lg-2 col-md-12' >
      

         </div>
         </div>
<!--  end modèle -->
  
    </blockquote>
  </div>
</div>
<aucun-r v-if="trvaux.length==0"></aucun-r>
      <div class="list-group" v-for="(trv, index)  in trvaux" :key="index">
            <div class="list-group-item">
                <div class="row">
                    <div class="col-lg-2 col-md-6"><p></p><h3>{{trv.title}}</h3></div>
                <div class="col-lg-3 col-md-6"><p></p>
  <h5>        <i class="fas fa-file-pdf" style="    color: red;"></i> {{geturl(trv.url_pdf)}} <a :href="'http://127.0.0.1:8000/storage/images/pdf/'+trv.url_pdf"  target="_blank"><i class="fas fa-download"></i></a></h5>   </div>
                
                
                 <div class="col-lg-2 col-md-6 text-center"><h2><strong>1245</strong></h2>telecharge  </div>
                  <div class="col-lg-2  col-md-6 text-center"><h2><strong>13</strong></h2>effectué </div>
 <div class="col-lg-2  col-md-6 text-center" v-if="trv.fin_date"><h3 ><strong>{{trv.fin_date}}</strong></h3>fin date  </div>
 <div class="col-lg-2  col-md-6 text-center" v-else> </div>
          <div class="col-lg-1  col-md-6 text-center"><br/>
          <a href="#" class=" fas fa-trash-alt " style="color:red"  data-toggle="modal" :data-target="'#deletetrav'+trv.id"></a>

       
    
          
           </div>


         

                </div>
   
               
                
            </div>
               <!-- start travaux delete -->
  <div class="modal fade" style="    text-align: initial;" :id="'deletetrav'+trv.id"  tabindex="-1" role="dialog" aria-labelledby="trv" aria-hidden="true">

 <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" >suppression de travaux</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          
      <strong>{{  trv.title}}</strong>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annule</button>
        <button type="button" class="btn btn-danger" @click="supp_trv(trv.id,index)"  data-dismiss="modal">supprime</button>
      </div>
    </div>
  </div>
  </div>
<!-- end travaux delete -->
         </div>	</div>	      
            
            
	</div>	
</div>
</template>
<script>
export default {
  props: ["trav", "courId"],
  mounted() {
 
  },
  data() {
    return {
      to_do: {
        id: null,
        file:'',
        fin_date:null,
        title: null,
        cour_id: null
      },
    
      trvaux: [],
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
       Event.$on("addedtravaux", (id,file,cour_id,title,fin_date) => {
      this.trvaux.push({
        id:id,
        title:title,
       cour_id:cour_id,
       url_pdf:file,

      });
    });
  },

  methods: {
    getinfo() {
      this.to_do.cour_id = JSON.parse(this.courId);
      this.trvaux = JSON.parse(this.trav);
    },
    addmodele() {
      let addmodele = $("#itemmodele");
      $("#textajoute").toggle();

      addmodele.toggle();
    },
      handleFileurlUpload(fieldName, fileList){
   this.to_do.file=fileList[0];
  },
    addtodo() {
    if (this.to_do.file != null && this.to_do.title != "") {     
  let formData = new FormData();
formData.append('file', this.to_do.file);
formData.append('cour_id',this.to_do.cour_id);
formData.append('title',this.to_do.title);
formData.append('fin_date',this.to_do.fin_date);

const config = { headers: { 'Content-Type': 'multipart/form-data' } };
axios.post( 'http://127.0.0.1:8000/api/ajouter_travaux_pdf',
               formData, config
            ).then((ress)=>{
             Event.$emit("addedtravaux",
             ress.data.id,
             ress.data.file,
            this.to_do.cour_id,
            this.to_do.title,
            this.to_do.fin_date); 
          this.to_do.file=null;
          this.to_do.title=null; 
          this.to_do.fin_date=null; 
         
            let addtodo = $("#itemmodele");
            $("#textajoute").css("display", "contents");

            addtodo.css("display", "none");

        })
        .catch(()=>{
       
        });
      }
    },
  
   
  supp_trv(id,index){
     
      axios.post("http://127.0.0.1:8000/api/delete_travaux",{id:id})
      .then(
        ress =>{
       let vm=this.trvaux;
    
         vm.splice(index, 1);
    
        }
        
      ).catch(error => console.log(error));
    },
      geturl(url){


          return url.length > 10 ? url.substring(0, 10) + '...' : url;           
       
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
    },
     
  }
};
</script>
