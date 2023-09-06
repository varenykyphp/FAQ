<?php

namespace App\Models\Faq;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $table = 'faq_items';

    protected $fillable = [
        'faq_category_id',
        'name_1',
        'name_2',
        'name_3',
        'body_1',
        'body_2',
        'body_3',
        'sort_order',
    ];
}
