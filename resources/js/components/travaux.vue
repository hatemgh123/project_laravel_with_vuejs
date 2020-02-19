<template>
    <div class="container"  style="    padding-top: 22px;">
          <div class="row">
       <h1 class="page-header"><div class="crush">Travaux </div></h1>
 
    </div>  
    <div class="row"  >
  <aucun-r v-if="catcours.length==0"></aucun-r>
  
<div class="col-lg-7">
 <!--  start card -->

<div class="card"  v-for="(catcour, index)  in catcours" :key="index">
  
<!-- end card -->
<!--  :id="'toggle'+chap.id" -->
  <div class="card-body" style="" >
    <blockquote class="blockquote ml-3 mb-0 row">
   <!-- <i class="fas fa-star col-1" style="color: rgb(255, 191, 0);     font-size: 28px;"></i> -->
   <a  :href="'http://127.0.0.1:8000/travaux/'+catcour.user_id+'/'+catcour.id"  class="col-8 list__cour__etud"> <h5  ><strong> {{catcour.name_cat_cour}}</strong></h5></a>

<!--   <footer class="blockquote-footer" v-for="(prof, index)  in profs" :key="index" v-if="prof.id==catcour.user_id">M.{{prof.name}}</footer>  -->
    </blockquote>
  </div>
</div>
</div>
<div class="col-md-12 col-lg-5">
  <img class="card-img-top" src="http://127.0.0.1:8000/images/svg/undraw_co-working_825n.svg" style="    height: 337px;" alt="Photo of sunset">
  
</div>


	</div>	
	
</div>
</template>
<script>
export default {
  props: ["catcours"],

};
</script>
