<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Characters_Upload extends Model {

	protected $table = 'characters_uploads';

	protected $fillable = ['character', 'count'];

    public function upload_id()
    {
        return $this->belongsTo('App\Upload');
    }

}
