<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;
	protected $fillable = [
		'user_id', 'caption', 'image', 'publication_status',
	];

	public function user() {
		return $this->belongsTo(User::class);
	}
}
