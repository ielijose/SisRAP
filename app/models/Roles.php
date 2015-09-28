<?php

use \Toddish\Verify\Models\Role as VerifyRole;

class Roles extends VerifyRole {

    protected $table = 'roles';
    public $timestamps = true;
    protected $softDelete = false;
    protected $guarded = array();

}