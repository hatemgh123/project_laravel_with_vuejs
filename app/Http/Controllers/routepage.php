<?php

namespace App\Http\Controllers;
use App\Http\Middleware\CheckProf;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use  App\catcour;
use  App\inscetud;
use user;
class routepage extends Controller
{
    public function __construct()
    {/* $this->middleware(CheckProf::class); */
        $this->middleware('auth');
    }
    public function index()
    {
        $user=auth()->user();
    if ($user->can('isEtud')) {
    $listprof=DB::select("select name,id from users where user_type='prof'");
    $listcat=DB::select("select id ,name_cat_cour, user_id ,clef from catcours ");
    $inscetud=DB::select("select id,user_id ,cat_cour from inscetuds where user_id='".$user->id."'");

    return view('etud.index')->with('id',$user->id)
    ->with('listprof',$listprof)->with('listcat',$listcat)->with('inscetud',$inscetud);
    
    }else{
        $catcour=DB::select("select id ,name_cat_cour ,user_id ,clef from catcours where  user_id='".$user->id."'");
        $chap=DB::select("select chp.* from chaps chp , catcours c where c.id=chp.cour_id and c.user_id='".$user->id."'");
        $cours=DB::select("select cours.* from chaps chp , catcours c,cours where chp.id=cours.chap_id and c.id=chp.cour_id and c.user_id='".$user->id."'");
        
        return view('prof.index')->with('id',$user->id)->with('cours',$cours)->with('chap',$chap)->with('catcour',$catcour);
    }
 
  
    } 
    public function travaux(){
        $user=auth()->user();
        if($user->can('isProf')){
            $catcour=DB::select("select id ,name_cat_cour ,user_id ,clef from catcours where  user_id='".$user->id."'");

        return view('prof.travaux')->with('catcour',$catcour);

        }else{
            $catcour=DB::select("select catcours.* from catcours , inscetuds where  inscetuds.user_id='".$user->id."' and inscetuds.cat_cour=catcours.id");
            return view('etud.travaux')->with('catcour',$catcour);
        }
       
    }

    public function messagers(){
        $user=auth()->user();
        if($user->can('isProf')){
            $catcour=DB::select("select id ,name_cat_cour ,user_id ,clef from catcours where  user_id='".$user->id."'");

        return view('prof.messagers')->with('catcour',$catcour);

        }else{
            $catcour=DB::select("select catcours.* from catcours , inscetuds where  inscetuds.user_id='".$user->id."' and inscetuds.cat_cour=catcours.id");
            return view('etud.messagers')->with('catcour',$catcour);
        }
       
    }
    
    public function moncours(){
        $user=auth()->user();
        if ($user->can('isEtud')){
$catcour=DB::select("select catcours.* , inscetuds.id mon_id from catcours , inscetuds where  inscetuds.user_id='".$user->id."' and inscetuds.cat_cour=catcours.id");
$prof=DB::select("select users.name ,users.id from users");

    return view('etud.moncours')->with('catcour',$catcour)->with('prof',$prof);
    }else {

    return view('prof.index');
    }
   
    }
    public function travauxfaire($id_user,$cour_prof_id){
        $user=auth()->user();
        if ($user->can('isEtud')){
           
            $catcour=catcour::find($cour_prof_id);
            if(!empty($catcour->clef)){    

            $travaux=DB::select("select  travauxes.id,travauxes.url_pdf, CONCAT(DAY( travauxes.fin_date ) ,' ',  MONTHNAME(travauxes.fin_date)  ) as fin_date, travauxes.cour_id, travauxes.title  from travauxes , inscetuds c where travauxes.cour_id='".$cour_prof_id."' and c.cat_cour=travauxes.cour_id and c.user_id='".$user->id."'");
            $catcour=DB::select("select name_cat_cour from catcours where id='".$cour_prof_id."' ");
            $trvetud=DB::select("select trvetuds.* from trvetuds where id_user='".$user->id."' and id_cat='".$cour_prof_id."' ");

         return view('etud.untravuax')->with('trvetud',$trvetud)->with('catcour',$catcour)->with('travaux',$travaux)->with('cours_id',$cour_prof_id);
            }else return abort(404);
        }else{
            if($id_user==$user->id){
                $catcour=catcour::find($cour_prof_id);
                if(!empty($catcour)){
            $travaux=DB::select("select  travauxes.id,travauxes.url_pdf, CONCAT(DAY( travauxes.fin_date ) ,' ',  MONTHNAME(travauxes.fin_date)  ) as fin_date, travauxes.cour_id, travauxes.title  from travauxes , catcours c where travauxes.cour_id='".$cour_prof_id."' and c.id=travauxes.cour_id and c.user_id='".$user->id."'");
           
            return view('prof.untravuax')->with('travaux',$travaux)
            ->with('cours_id',$cour_prof_id);
        }else return abort(404);
            }else return abort(404);
            
        }
    }
    public function cat($id_user,$cour_prof_id)
    {
        $user=auth()->user();
    if ($user->can('isEtud')){
       
        $catcour=catcour::find($cour_prof_id);
        if(!empty($catcour->clef)){
        if($catcour->clef!='NULL')
        $issetclef=1;
        else
        $issetclef=0;

        $inscetud=inscetud::where('user_id',$user->id)->where('cat_cour',$cour_prof_id)->first();
        $chap=DB::select("select * from chaps  where cour_id='".$cour_prof_id."'");
        $cours=DB::select("select cours.* from cours , chaps where chaps.cour_id='".$cour_prof_id."' and  cours.chap_id=chaps.id ");
        $catcour=DB::select("select name_cat_cour from catcours where id='".$cour_prof_id."' ");
        
     return view('etud.cat')->with('chap',$chap)->with('cours',$cours)->with('catcour',$catcour)
     ->with('issetclef',$issetclef)->with('inscetuds',$inscetud)->with('cour_prof_id',$cour_prof_id);
        }else return abort(404);
    }else{
        if($id_user==$user->id){
            $catcour=catcour::find($cour_prof_id);
            if(!empty($catcour)){
/*         $catcour=DB::select("select id ,name_cat_cour ,user_id ,clef from catcours where  user_id='".$user->id."'"); */
        $chap=DB::select("select chp.cour_id , chp.name_chap, chp.id from chaps chp , catcours c where c.id=chp.cour_id  and chp.cour_id='".$cour_prof_id."' and c.user_id='".$user->id."'");
   
            $cours=DB::select("select cours.* from chaps chp , catcours c,cours where chp.id=cours.chap_id and chp.cour_id='".$cour_prof_id."' and c.id=chp.cour_id and c.user_id='".$user->id."'");
            /* ->with('catcour',$catcour)->with('id',$user->id); */
            return view('prof.cat')->with('cours',$cours)->with('chap',$chap)
            ->with('cours_id',$cour_prof_id);
       
        }else return abort(404);
        }else return abort(404);
        
    }
    }

    public function inscetud(Request $request, $cour_prof_id)
    {
        $user=auth()->user();
        if ($user->can('isEtud')){
            if(!empty($request->clef)){
                $catcour=catcour::find($cour_prof_id);
                if($catcour->clef!='NULL' && $request->clef==$catcour->clef ){
                    $inscetud=new inscetud();
            $inscetud->user_id=$user->id;
            $inscetud->cat_cour=$cour_prof_id;
            $inscetud->save(); 
                    return back();
                }else{
                $false=false;
                return redirect()->back()->with('false',$false);}
            }
            if(empty($request->clef)){
       $inscetud=new inscetud();
            $inscetud->user_id=$user->id;
            $inscetud->cat_cour=$cour_prof_id;
            $inscetud->save(); 
            return back();
            }

       
        
        }
    }
   


}
