<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	use \Dimsav\Translatable\Translatable;
    
    protected $guarded=[];
        public $translatedAttributes = ['name'];

}
