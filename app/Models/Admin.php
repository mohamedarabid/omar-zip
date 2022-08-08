<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Permission\Traits\HasRoles;

class Admin extends Authenticatable
{
    use HasFactory, HasRoles;
    use SoftDeletes;

    public static $counter=0;

    public function getFullNameAttribute()
    {
        return $this->user->first_name ?? '';
    }

    public function getCourseDisplayDataAttribute(){
        self::$counter++;


       return [
            'id'=>self::$counter,
            'teacher_name'=>$this->name,
            'book'=>$this->book_name,
            'place'=>$this->area_father_name.' - '.$this->area_name.' <br> '.$this->place_name,
        ];
    }
}
