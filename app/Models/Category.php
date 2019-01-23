<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
   protected $fillable = ['category_name', 'category_desc', 'url','category_parent_id','category_status', 'updated_by'];

    protected $table = 'categories';

             /**
     * Get the index name for the model.
     *
     * @return string
    */
    public function childs() {
        return $this->hasMany('App\Models\Category','category_parent_id','id') ;
    }

}
