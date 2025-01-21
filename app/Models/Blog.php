<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected   $table='blogs';
    protected $primaryKey = "id";
    public $image_path = "/uploads/article/";
    protected $guarded = array('id');
    public $imageprefix="large_";
    public $appends = ['publish_date'];

    public function getImagePath()
    {
        
      
            $imageLink = url($this->image_path.$this->image);
        
            if (!empty($this->image) && file_exists(public_path($this->image_path.$this->image))) {
                return $imageLink;
           
            }
        }
    }

