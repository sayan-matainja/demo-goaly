<?php

namespace Modules\Faq\Entities;

use Illuminate\Database\Eloquent\Model;

class FaqSetting extends Model
{
    protected $table ="faq_settings";
    protected $fillable = ['faq_question','faq_answer'];
}
