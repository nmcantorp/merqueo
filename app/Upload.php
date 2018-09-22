<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Upload extends Model {

	public $timestamps = false;
	protected $table = 'uploads';

	protected $fillable = ['filename', 'user_creator'];

	protected $hidden = [];

	public function user(){
	    $this->belongsTo('App\User');
    }
}
