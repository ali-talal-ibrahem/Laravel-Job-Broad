<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Rfc4122\MaxTrait;

class Post extends Model
{
    use HasFactory;

    //Primary Key
    use HasUuids;
    protected $primaryKey = "id";
    protected $keyType = "string";
    public $incrementing = false;
    
    //

    protected $table = "post";
    protected $fillable = ["title" , "body" , "author" ,"published"];
    protected $guarded = ["id"];

    public function comments(){
        return $this->hasMany(Comment::class);
    }


    public function tags(){
        return $this->belongsToMany(Tag::class);
    }
}
