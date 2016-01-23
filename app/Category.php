<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'name',
		'slug',
	];

	/**
	 * Indicates if the model should be timestamped.
	 *
	 * @var bool
	 */
	public $timestamps = FALSE;

	/**
	 * Relation to multiple Works.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function works()
	{
		return $this->hasMany(Work::class);
	}
}
