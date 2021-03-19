<?php

namespace App\Models\Stats\Character;

use Config;
use App\Models\Model;

class Opponents extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'character_id', 'stat_id', 'stat_level', 'count', 'current_count'
    ];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'opponent';

    /**********************************************************************************************

        RELATIONS

    **********************************************************************************************/

    public function stat()
    {
        return $this->belongsTo('App\Models\Stats\Character\Stat');
    }

}
