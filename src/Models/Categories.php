<?php

namespace VarenykyFaq\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;

    protected $table = 'faq_categories';

    protected $fillable = [
        'name',
        'sort_order',
    ];

    public function items()
    {
        return $this->hasMany(Item::class, 'faq_category_id');
    }
}
