<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'category_id',
		'user_id',
		'title',
		'width',
		'height',
		'box_price',
		'unbox_price',
		'sold',
		'thumbnail'
	];

	/**
	 * Relation to one User.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function user()
	{
		return $this->belongsTo(User::class);
	}

	/**
	 * Relation to one Category.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function category()
	{
		return $this->belongsTo(Category::class);
	}
}
