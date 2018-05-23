<?php
/*******************************************************************************
     Copyright (c) <Company Name> All rights reserved.

     FILE NAME: mSupplier.php
     MODULE NAME:  [2002] Supplier Master
     CREATED BY: MESPINOSA
     DATE CREATED: 2016.04.13
     REVISION HISTORY :

     VERSION     ROUND    DATE           PIC          DESCRIPTION
     100-00-01   1     2016.04.13     MESPINOSA       Initial Draft
*******************************************************************************/
?>
<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
* Supplier Model
*/
class mSupplier extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'code', 'name', 'address', 'telno', 'faxno', 
        'emailaddress', 'create_pg', 'create_user', 'create_date', 
        'update_pg', 'update_user', 'update_date'
    ];

    /**
    * Table name.
    */
    protected $table = 'msuppliers';
}