<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Hashing\BcryptHasher;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use  App\catcour;
use  App\chap;
use  App\cours;
use App\inscetud;
use App\travaux;
use App\trvetud;
use App\user;
class prof_cour extends Controller
{ 
/* debut cat */
    public function store(Request $request)
    {
        $this->validate($request,[
            "cat_cour.name_cat_cour" => 'required',
        ]);
        if(!empty($request->cat_cour['clef']))
       $clef=$request->cat_cour['clef'];
        else
        $clef='NULL';
        $catcour=new catcour();
        $catcour->name_cat_cour=$request->cat_cour['name_cat_cour'];
        $catcour->clef=$clef;
        $catcour->user_id=$request->cat_cour['user_id'];
/*         catcour::create([
            'name_cat_cour' => $request->cat_cour['name_cat_cour'],
            'clef'=> $clef,
            'user_id'=>$request->cat_cour['user_id']
        ]); */

        $catcour->save();

        return $catcour->id;
            
    }
  
    public function modifycat(Request $request)
    {
        $this->validate($request,[
            "name_cat_cour" => 'required',
        ]);
       $catcour=catcour::find($request->id);
       $catcour->name_cat_cour=$request->name_cat_cour;
       $catcour->save();
        return (['message'=>'successfull']);
            
    }
    public function changerclef(Request $request)
    {
 
    $catcour=catcour::find($request->id);
    if($request->clef==null)
       $catcour->clef='NULL';
       $catcour->clef=$request->clef;
       $catcour->save(); 

    return $request;
            
    }
    public function deletecat(Request $request)
    {
        $catcour=catcour::find($request->id);

        $catcour->delete();
    return 'oki';
            
    }
    
/* fin cat */
/* debut chap */
    public function ajouterchap(Request $request)
    {
        $this->validate($request,[
            "new_chaps.name_chap" => 'required',
            "new_chaps.cour_id" => 'required'
        ]);
        $chap=new chap();
        $chap->name_chap=$request->new_chaps['name_chap'];
        $chap->cour_id=$request->new_chaps['cour_id'];
        $chap->save();

        return $chap->id;
            
    }
    public function modifychap(Request $request)
    {
        $this->validate($request,[
            "name_chap" => 'required',
        ]);
       $chap=chap::find($request->id);
       $chap->name_chap=$request->name_chap;
       $chap->save();
        return (['message'=>'successfull']);
            
    }
    public function  deletechap(Request $request)
    {
        $chap=chap::find($request->id);

        $chap->delete();
    return 'oki';
            
    }
    
   
/* fin chap */
/* debut cours */

public function ajoutercour(Request $request)
{
  /*   $this->validate($request,[
        "new_chaps.name_chap" => 'required',
        "new_chaps.cour_id" => 'required'
    ]); */
    $cours=new cours();
    $cours->title=$request->titre;
    $cours->body=$request->titre;
    $cours->chap_id=$request->chap_id;
    $cours->save();

    return $cours->id;
        
}
public function deletecour(Request $request)
{
    $cours=cours::find($request->id);
    storage::delete('public/images/pdf/'.$cours->url_pdf );
    $cours->delete();
return 'oki';
        
}
public function ajoutercourpdf(Request $request)
{
    if($request->hasfile('file'))
    { $file=$request->file('file');
        $filenameWithExtention= $file
        ->getClientOriginalName();
        $fileName=pathinfo($filenameWithExtention,PATHINFO_FILENAME);
        $extention= $file
        ->getClientOriginalExtension();
        $filenamestore=$fileName.'.'.$extention;
        $path= $file->storeAs('public/images/pdf', $filenamestore);


        $cours=new cours();
    $cours->url_pdf=$filenamestore;
    $cours->chap_id=$request->id;
    $cours->save();

return  ['id' =>$cours->id ,'file'=>$filenamestore];
    }


        
}
/* fin cours */
/* debut travaux */

public function ajoutertravaux(Request $request)
{
    if($request->hasfile('file'))
    { $file=$request->file('file');
        $filenameWithExtention= $file
        ->getClientOriginalName();
        $fileName=pathinfo($filenameWithExtention,PATHINFO_FILENAME);
        $extention= $file
        ->getClientOriginalExtension();
        $filenamestore=$fileName.'.'.$extention;
        $path= $file->storeAs('public/images/pdf', $filenamestore);


        $travaux=new travaux();
    $travaux->url_pdf=$filenamestore;
    $travaux->cour_id=$request->cour_id;
    if($request->title!='null')
    $travaux->title=$request->title;
    else
    $travaux->title='Exercice';
    if($request->fin_date!='null')
    $travaux->fin_date=$request->fin_date;
    
    $travaux->save();

return  ['id' =>$travaux->id ,'file'=>$filenamestore];
    }


        
}
public function deletetravaux(Request $request)
{
    $travaux=travaux::find($request->id);
    storage::delete('public/images/pdf/'.$travaux->url_pdf );
    $travaux->delete();
return 'oki';
        
}

/* fin travaux */
/* debut etud-travaux */

public function ajouteretudtravaux(Request $request)
{
   if($request->hasfile('file'))
    {   
    
        $file=$request->file('file');
        $filenameWithExtention= $file
        ->getClientOriginalName();
        $fileName=pathinfo($filenameWithExtention,PATHINFO_FILENAME);
        $extention= $file
        ->getClientOriginalExtension();
        $filenamestore=$fileName.'.'.$extention;
        $path= $file->storeAs('public/images/pdf', $filenamestore);
        if($request->type=='0'){
            $trvetud=new trvetud();
            $trvetud->url_trv=$filenamestore;
            $trvetud->id_user=$request->iduser;
            $trvetud->id_trv=$request->id;
            $trvetud->id_cat=$request->id_cat;
            $trvetud->save();
            return  ['id' =>$trvetud->id_trv ,'file'=>$filenamestore]; 
         }else{
            $trvetmod=trvetud::find($request->type);
            storage::delete('public/images/pdf/'.$trvetmod->url_trv);
            $trvetmod->url_trv=$filenamestore;
            $trvetmod->save();
            return  ['id' =>$trvetmod->id_trv ,'file'=>$filenamestore]; 
         }
 



    } 


        
}

/* fin etud-travaux */

/* debut etud supp cours */

public function deletemoncours(Request $request)
{
 $user=user::find($request->id_user);

if (Hash::check($request->password,$user->password)) {
    $inscetud=inscetud::find($request->id);
    $inscetud->delete();
    return 'oki';
} else return 'false password';


}
/* fin etud supp cours */
    public function test()
    {
        $cours=DB::select("select cours.* from chaps chp , catcours c,cours where chp.id=cours.chap_id and chp.cour_id='1' and c.id=chp.cour_id and c.user_id='2'");
       return $cours;
            
    }

    

}
