<?php

namespace App\Repositories;

use App\Models\Faq\Categories;
use App\Models\NameModel;

class FaqCategoryRepository extends Repository
{
    /**
     * To initialize class objects/variable.
     *
     * @param  NameModel  $model
     */
    public function __construct(Categories $model)
    {
        $this->model = $model;
    }
}
