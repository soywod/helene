<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
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
