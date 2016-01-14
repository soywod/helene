<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
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
