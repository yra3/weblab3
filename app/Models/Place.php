<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Place extends Model
{
    use HasFactory;
    use SoftDeletes;
    //protected $fillable = [];
    protected $guarded = [];
    protected $softDeletes = true;
    public function setType($value)
    {
        $this->attributes['type'] = strtolower($value);
    }
    public $timestamps = false;
    protected $attributes = [
        'type' => 'Место',
    ];
    public function getNameAndShortInfo()
    {
        return "{$this->name}  {$this->short_info}";
    }
}
