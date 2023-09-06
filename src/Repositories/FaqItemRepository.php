<?php

namespace VarenykyFaq\Repositories;

use VarenykyFaq\Models\Item;
use App\Models\NameModel;
use Varenyky\Repositories\Repository;
class FaqItemRepository extends Repository
{
    /**
     * To initialize class objects/variable.
     *
     * @param  NameModel  $model
     */
    public function __construct(Item $model)
    {
        $this->model = $model;
    }
}
