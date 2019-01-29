<?php

if(!function_exists('setting')){
    function setting(){
        return App\Model\Setting::orderBy('id','des')->first();
    }
}

if(!function_exists('load_dep')){
    function load_dep($select=null,$dep_hide=null){
        $dapartments= App\Model\Department::selectRaw('dep_name_'.session('lang').' as text')
        ->selectRaw('id as id')
        ->selectRaw('parent as parent')
        ->get(['id','text','parent']);
        $dep_arr=[];
        foreach($dapartments as $departement){
            $list_att=[];
            $list_att=[];
            $list_att['icon']='';
            $list_att['li_attr']='';
            $list_att['a_attr']='';
            $list_att['childern']=[];
            if($select !==null and $select== $departement->id){
        
            $list_att['state']=[
               'opened'=>true,
                'selected'=>true,
                'disabled'=>false,
                              
            ];
        }
        if($dep_hide !==null and $dep_hide== $departement->id){
        
            $list_att['state']=[
               'opened'=>false,
                'selected'=>false,
                'disabled'=>true,  
                "hidden"=>true,                
            ];
        }

        $list_att['id']=$departement->id;
        $list_att['parent']=$departement->parent >0 ?$departement->parent:'#';
        $list_att['text']=$departement->text;
        array_push($dep_arr,$list_att);
        }
        return json_encode($dep_arr,JSON_UNESCAPED_UNICODE);
    }
}


if(!function_exists('country_logo')){
    function country_logo(){
        return App\Model\Country::orderBy('id','des')->first();
    }
}

if(!function_exists('lang')){
    function lang(){
        if(session()->has('lang')){
            return session('lang');
        }else{
       //    session().put('lang',setting()->main_lang);
         return 'rtl'; ;
        }   
    }
}

if(!function_exists('direction')){
    function direction(){
        if(session()->has('lang')){
            if( session('lang')=='ar'){
                return 'rtl'; 
            }else{
                return 'ltr';
            }
        }else{
            return 'ltr';
        }   
    }
}

if(!function_exists('dataTable')){
    function dataTable(){
     return[
        "sProcessing"=>trans('admin.sProcessing'),
        "sLengthMenu"=>trans('admin.sLengthMenu'),
        "sZeroRecords"=>trans('admin.sZeroRecords'),
        "sEmptyTable"=>trans('admin.sEmptyTable'),
        "sInfo"       =>trans('admin.sInfo'),
        "sInfoEmpty"=>trans('admin.sInfoEmpty'),
        "sInfoFiltered"=>trans('admin.sInfoFiltered'),
        "sInfoPostFix"=>trans('admin.sInfoPostFix'),
        "sSearch"=>trans('admin.sSearch'),
        "sUrl"=>trans('admin.sUrl'),
        "sInfoThousands"=>trans('admin.sInfoThousands'),
        "sLoadingRecords"=>trans('admin.sLoadingRecords'),
        "oPaginate"=>[
            "sFirst"=>trans('admin.sFirst'),
            "sLast"=>trans('admin.sLast'),
            "sNext"=>trans('admin.sNext'),
            "sPrevious"=>trans('admin.sPrevious'), 
        ],
        "oPaginate"=>[
            "sSortAscending"=>trans('admin.sSortAscending'),
            "sSortDescending"=>trans('admin.sSortDescending'),
            
        ]];
    }
}

//validate

if(!function_exists('v_image')){
    function v_image($ext=null){
    if($ext===null){
        return 'image|mimes:jpeg,jpg,png';
    }else{
        return 'image|mimes:'.$ext;
    }

    }}

//validate
