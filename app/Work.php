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
		'thumbnail',
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

	public function scopeGetDesc($query)
	{
		$work = $query->getModel();
		$desc = $work->title;

		$desc .= ' - ' . $work->getSize();
		$desc .= $work->box_price > 0 ? ' - ' . ucfirst(trans('front/work.box_price', ['price' => $work->box_price])) : '';
		$desc .= $work->unbox_price > 0 ? ' - ' . ucfirst(trans('front/work.unbox_price', ['price' => $work->unbox_price])) : '';
		$desc .= $work->sold ? ' - ' . ucfirst(trans('front/work.sold')) : '';

		return $desc;
	}

	public function scopeGetSize($query)
	{
		return $query->getModel()->width . ' x ' . $query->getModel()->height . ' cm';
	}
}
