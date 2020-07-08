<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = [];

    public function subcategory(){

        return $this->hasMany(Category::class, 'parent_id');

    }

    public function product() {
        $this->hasMany(Model::class);
    }
}
