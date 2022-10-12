<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class PageWebsite extends Entity
{
    protected $datamap = [
        'pageid' => 'Id',
        'pagename' => 'Page'
    ];
    protected $dates   = ['created_at', 'updated_at', 'deleted_at'];
    protected $casts   = [];
}
