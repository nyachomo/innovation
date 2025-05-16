<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    //

    protected $table="settings";
    protected $fillable=[
       'company_name',
       'company_logo',
       'company_motto',
       'company_mission',
       'company_vission',
       'company_kra_pin',
       'company_website',
       'company_address',
       'company_facebook',
        'company_twitter',
        'company_instagram',
        'company_linkedin',
        'company_skype',
        'company_github',
       'company_details_status',
       'company_logo_status',
    ];
}
