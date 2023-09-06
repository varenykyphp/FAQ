<?php

namespace VarenykyFaq\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $table = 'faq_items';

    protected $fillable = [
        'faq_category_id',
        'name',
        'body',
        'sort_order',
    ];
}
