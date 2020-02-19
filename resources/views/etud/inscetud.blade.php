<div class="container"  style="    padding-top: 22px;">
    <blockquote class="blockquote mb-0">
  
           <strong  id='textajoute'>M'inscrire dans ce cours</strong> 
  </blockquote>  

  <div class="row"  >
<div class="col-lg-5 col-md-11">
<div class="card">
<div class="card-body" style="">

{!! Form::open(['action' => ['routepage@inscetud',$cour_prof_id], 'method'=>'POST','enctype'=>'multipart/form-data']) !!}
         
<div class="row"  >
         @if($issetclef=='1')
               <div class="col-11"> 
         <strong  > Auto-inscription (Étudiant)</strong> 
              </div>  
                <div class="col-lg-12 col-md-6"> 
                     
          <label for="Clef">Clef d'inscription :</label>

 
        
              </div> 
       
                <div class="col-lg-6 col-md-6"> 
      
                  @if(empty($false))
                  <input type="password" name='clef' class="form-control"/>
                @else    
                <input type="password" name='clef' class="form-control" style="border: 1px solid red;"/>
               <p style="color:red">clé incorrect</p>
                @endif          
                  </div>  
             
       <div class="col-lg-6 col-md-6">   
   
      {{Form::hidden('_method','PUT' ) }}
      {{Form::submit("M'inscrire",['class'=>'btn btn-success' ] ) }}
             
          </div>  
          @else
          <div class="col-lg-12 col-md-12">   
   
              {{Form::hidden('_method','PUT' ) }}
              {{Form::submit("M'inscrire",['class'=>'btn btn-success' ,'style'=>'    width:100%'] ) }}
                     
           </div>  
           @endif
          </div> 
{!! Form::close() !!}         
</div>    
  </div> 
    </div> 
    
    @if($issetclef=='1')
    <div class="col-lg-7 col-md-12">
      <img src="{{ asset('images/svg/undraw_security.svg') }}" class="img-fluid rounded-top" alt="">
      
    </div>
    @else 
    <div class="col-lg-7 col-md-12">
        <img src="{{ asset('images/svg/undraw_post2_19cj.svg') }}" class="img-fluid rounded-top" alt="">

      </div>
      @endif
 <div class="col-11">

  
     </div>  

      </div> 
        </div>   