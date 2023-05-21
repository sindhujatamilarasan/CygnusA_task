<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class People extends Model
{
    use HasFactory;
    protected $table = 'people';
    protected $fillable = ['name','email','created_at','updated_at'];
    protected $primaryKey = 'person_id';


    public function contactData() {
        return $this->hasMany('App\Models\Contact', 'person_id', 'person_id');
    }
}
