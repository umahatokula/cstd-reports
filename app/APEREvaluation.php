<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class APEREvaluation extends Model
{
    protected $guarded = ['id'];

    public function aperForm()
    {
        return $this->belongsTo('\App\AperForm');
    }

    public function trainingNeeds()
    {
        return $this->hasMany('\App\APERTrainingNeed', 'aper_evaluation_id', 'id');
    }
}
