<template>
    <div class="container"  style="    padding-top: 22px;">
          <div class="row">
       <h1 class="page-header"><div class="crush"> {{catcours[0]['name_cat_cour']}} </div></h1>
 
    </div>  
    <div class="row"  >
<aucun-r v-if="chaps.length==0"></aucun-r>
<div class="col-11" v-for="(chap, index)  in chaps" :key="index">
 <!--  start card -->

<div class="card">
  <div class="card-header " style="    background: #f0f0ff;">
      <div class="row">
      
 <h5  class="col-9"><strong> {{chap.name_chap}}</strong></h5>

  </div>

  </div>
<!-- end card -->

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
  props: ["chaps", "cours","catcours"],
 
};
</script>
