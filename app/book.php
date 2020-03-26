<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    //

	protected $guarded = [];

    public $timestamps = false;

  	public function author() {

  		return $this->belongsTo('App\Author');

  	}

  	public function getCover() {

  		if(substr($this->cover, 0,5) == "https") {

  			return $this->cover;

  		}

  		if ($this->cover) {

  			return asset($this->cover);

  		}

  		// default 

  		return 'https://via.placeholder.com/75x100.png?text=No Cover';


  	}


}
