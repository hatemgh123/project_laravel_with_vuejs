<template>
    <div class="container">
    <div class="row"   style="    padding-top: 22px;">
        <div class="col-11">
             <h1 class="page-header"><div class="crush"> {{catcours[0]['name_cat_cour']}} </div></h1>
        </div>
<div class="col-11">

<aucun-r v-if="trvaux.length==0"></aucun-r>
      <div class="list-group" v-for="(trv, index)  in trvaux" :key="index">
            <div class="list-group-item ">
                <div class="row">
                    <div class="col-lg-3 col-md-6"><p></p><h3>{{trv.title}}</h3></div>
                <div class="col-lg-4 col-md-6"><p></p>
  <h5>        <i class="fas fa-file-pdf" style="    color: red;"></i> {{geturl(trv.url_pdf)}} <a :href="'http://127.0.0.1:8000/storage/images/pdf/'+trv.url_pdf"  target="_blank"><i class="fas fa-download"></i></a></h5>
               </div>
                  <div class="col-lg-2 col-md-6 text-center" :id="'am'+trv.id" >  <a  class="h3"  @click="getmodify"  href="#" style="    color: #3490dc;"  data-toggle="modal" :data-target="'#ajoutertrv'+trv.id"> <i class="fas fa-file-upload"></i></a> Ajouter</div>
                   <div class="col-lg-1 col-md-6 text-center" :id="'aa'+trv.id"  style="display:none">  <a  class="h3"   href="#" style="    color: #3490dc;"  data-toggle="modal" :data-target="'#modifiertrv'+trv.id"><i class="fas fa-edit"></i></a> modifier</div>
                  <div class="col-lg-1  col-md-6 text-center"  v-for="(trvetud, index)  in trvetuds" :key="index"  v-if="trvetud.id_trv == trv.id" >

                 <h2 style="color:green"><i class="fas fa-check-circle"></i></h2>effectué
                </div>
           
<!--  <div class="col-lg-3 row  col-md-6 text-center"  v-else >

               <div class="col-6 ">  <h2 style="color:red"><i class="fas fa-times-circle"></i></h2>non effectué</div>
  </div>
          -->

                
                  
 <div class="col-lg-2  col-md-6 text-center" v-if="trv.fin_date"><h3 ><strong>{{trv.fin_date}}</strong></h3>fin date  </div>
 <div class="col-lg-2  col-md-6 text-center" v-else> </div>



         

                </div>
   
               
                
            </div>
                
                <!-- start trv ajouter-->
  <div class="modal fade"   style="    text-align: initial;" :id="'ajoutertrv'+trv.id"  tabindex="-1" role="dialog" aria-labelledby="clefTitle" aria-hidden="true">

 <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" >Ajouter de travaux</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
              <label :for="'filetrv'+trv.id" class="h5">obligatoir .pdf ou .rar maximal taille 1mb </label>
              <input type="file"   class=" form-control"  @change="handleFileUpload($event.target.name,$event.target.files)" /> 
  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annule</button>
        <button  :id="'filetrv'+trv.id" type="button" class="btn btn-succes"  @click="ajouter_trv(trv.id,index,0)" data-dismiss="modal">Ajouter</button>
      </div>
    </div>
  </div>
  </div>
<!-- end trv ajouter -->

<!-- start trv modify-->
  <div class="modal fade"   style="    text-align: initial;" :id="'modifiertrv'+trv.id"  tabindex="-1" role="dialog" aria-labelledby="clefTitle" aria-hidden="true">

 <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" >Modifier de travaux</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
              <label :for="'filetrv'+trv.id" class="h5">obligatoir .pdf ou .rar maximal taille 1mb </label>
              <input type="file"   class=" form-control"  @change="handleFileUpload($event.target.name,$event.target.files)" /> 
  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annule</button>
        <button  :id="'mod'+trv.id" type="button" class="btn btn-succes"  @click="ajouter_trv(trv.id,index,$event)" data-dismiss="modal">Modifier</button>
      </div>
    </div>
  </div>
  </div>
<!-- end trv modify -->
              
         </div>	</div>	
            
	</div>	
</div>
</template>
<script>
export default {
  props: ["trvaux", "id_cat","catcours","trvetuds","iduser"],
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
      file:''
    };
  },
  created() {
    this.getinfo();
    Event.$on("addedtrv", (id_trv,file) => {
      this.trvetuds.push({
        id_trv:id_trv,
   
       file:file
      });
    });
  },
  mounted() {
        this.getmodify();
    },
  methods: {
    getinfo() {
      this.to_do.cour_id = this.id_cat
       

    },
 getmodify(){

this.trvaux.forEach((element)=> {
  this.trvetuds.forEach((trv) =>{
  if(element.id==trv.id_trv) {$("#am"+element.id).css('display','none'); 
  $("#aa"+element.id).css('display','flow-root');
  $("#mod"+element.id).attr('name', trv.id);
  
 }
  else return; 
});
});
    
 }, 
      geturl(url){


          return url.length > 15 ? url.substring(0, 15) + '...' : url;           
       
        },
         handleFileUpload(fieldName, fileList){
   this.file=fileList[0];
  },
        ajouter_trv(id,index,type){
      /*     let file= $('#filetrv'+id); */
        if(this.file!="")
              {
          if(type!=0) type=type.toElement.name;   
                let formData = new FormData();
formData.append('file', this.file);
formData.append('id',id);
formData.append('iduser',this.iduser);
formData.append('id_cat',this.id_cat);
formData.append('type',type);

const config = { headers: { 'Content-Type': 'multipart/form-data' } };

axios.post( 'http://127.0.0.1:8000/api/ajouter_etud_travaux_pdf',
               formData, config
                
                
           
            ).then((ress)=>{
               Event.$emit("addedtrv",
                ress.data.id,
            
               ress.data.file,
                );
             
          
      

        })
        .catch(()=>{
    
        });
                
              }  
            
        } 
   
     
  }
};
</script>
