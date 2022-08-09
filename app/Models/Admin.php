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

    public function getAdminDisplayDataAttribute(){
        self::$counter++;

        $status = '';
        if ($this->status == 'active'){
        $status =  __('Active') ;
        $status_label = 'success';
        }elseif ($this->status == 'deactive'){
        $status_label = 'danger';
            $status = __('Deactive') ;
        }
        $status = '<span class="label label-lg font-weight-bold label-light-'.$status_label.' label-inline">'.$status.'</span>';

    $actions = '
    <a href="'.route('admins.edit', $this->id).'" class="btn btn-sm btn-clean btn-icon mr-5" title="Edit details">	                                  
            <span class="svg-icon svg-icon-success svg-icon-2x">	      
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">	           
                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">	  
                        <rect x="0" y="0" width="24" height="24"></rect>	 
                        <path d="M6,2 L18,2 C19.6568542,2 21,3.34314575 21,5 L21,19 C21,20.6568542 19.6568542,22 18,22 L6,22 C4.34314575,22 3,20.6568542 3,19 L3,5 C3,3.34314575 4.34314575,2 6,2 Z M12,11 C13.1045695,11 14,10.1045695 14,9 C14,7.8954305 13.1045695,7 12,7 C10.8954305,7 10,7.8954305 10,9 C10,10.1045695 10.8954305,11 12,11 Z M7.00036205,16.4995035 C6.98863236,16.6619875 7.26484009,17 7.4041679,17 C11.463736,17 14.5228466,17 16.5815,17 C16.9988413,17 17.0053266,16.6221713 16.9988413,16.5 C16.8360465,13.4332455 14.6506758,12 11.9907452,12 C9.36772908,12 7.21569918,13.5165724 7.00036205,16.4995035 Z" fill="#000000"></path>
                                        </g>	                                    
                    </svg>	                              
              </span>	
      </a>

      <a href="'.route('dashboard.auth.edit-password', $this->id).'" class="btn btn-sm btn-clean btn-icon mr-5" title="edit password">	                                
            <span class="svg-icon svg-icon-primary  svg-icon-2x">	      
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">	           
                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">	  
                        <rect x="0" y="0" width="24" height="24"></rect>	 
                            <path d="M5,8.6862915 L5,5 L8.6862915,5 L11.5857864,2.10050506 L14.4852814,5 L19,5 L19,9.51471863 L21.4852814,12 L19,14.4852814 L19,19 L14.4852814,19 L11.5857864,21.8994949 L8.6862915,19 L5,19 L5,15.3137085 L1.6862915,12 L5,8.6862915 Z M12,15 C13.6568542,15 15,13.6568542 15,12 C15,10.3431458 13.6568542,9 12,9 C10.3431458,9 9,10.3431458 9,12 C9,13.6568542 10.3431458,15 12,15 Z" fill="#000000"></path>
                    </g>	                                    
                    </svg>	                              
              </span>	       
  </a>
    ';

    
        
    $counter = self::$counter;

    $image = ' <img class="rounded-circle" src="'.url('images/admin/' . $this->image).'"width="50" height="50">';

       return [
            'id'=>$counter,
            'first_name'=>$this->first_name,
            'last_name'=>$this->last_name,
            'type'=>$this->getRoleNames(),
            'email'=>$this->email,
            'image' => $image,
            'status' => $status,
            'actions' => $actions

        ];
    }
}
