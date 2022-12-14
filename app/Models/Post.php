<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Post
 * @package App\Models
 * @version September 27, 2019, 11:45 am -03
 *
 * @property string title
 * @property string summary
 * @property string slug
 * @property string content
 * @property integer user_id
 * @property integer post_category_id
 * @property string important_image
 * @property boolean publish
 * @property boolean signature_author
 */
class Post extends Model
{
    use SoftDeletes, Sluggable;

    public $table = 'posts';

    protected $dates = ['deleted_at'];


    public $fillable = [
        'title',
        'slug',
        'summary',
        'publication_date',
        'content',
        'user_id',
        'post_category_id',
        'important_image',
        'publish',
        'signature_author'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'title' => 'string',
        'summary' => 'string',
        'slug' => 'string',
        'content' => 'string',
        'user_id' => 'integer',
        'post_category_id' => 'integer',
        'publish' => 'boolean',
        'signature_author' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'title' => 'required|string|max:60',
        'slug' => 'string|max:191',
        'summary' => 'required|string|max:160',
        'publication_date' => 'required|date_format:Y-m-d H:i:s',
        'content' => 'required|string',
        'post_category_id' => 'required|numeric',
        'important_image' => 'required|mimes:jpg,jpeg,png,bmp,svg,gif',
        'publish' => 'boolean',
        'signature_author' => 'boolean',
        'galery.*' => 'mimes:jpg,jpeg,png,bmp,svg,gif'
    ];

    /**
     * Messages for validations
     *
     * @var array
     */
    public static $messages_es = [
        'title.required' => 'El campo t??tulo es obligatorio.',
        'title.max' => 'El campo t??tulo no debe contener m??s de 60 caracteres.',
        'summary.required' => 'El campo resumen es obligatorio.',
        'summary.max' => 'El campo resumen no debe contener m??s de 160 caracteres.',
        'content.required' => 'El campo contenido es obligatorio.',
        'publication_date.required' => 'El campo fecha de publicaci??n es obligatorio.',
        'publication_date.date_format' => 'El campo fecha de publicaci??n no tiene formato valido a??o-mes-dia hora:minutos:segundos.',
        'post_category_id.required' => 'El campo categor??a es obligatorio.',
        'post_category_id.numeric' => 'El campo categor??a debe ser n??merico.',
        'important_image.required' => 'El campo imagen destacada es obligatorio.',
        'important_image.mimes' => 'El campo imagen destacada debe ser un archivo de tipo: jpg, jpeg, png, bmp, svg, gif.',
        'publish.boolean' => 'El campo publicar debe ser verdadero o falso.',
        'signature_author.boolean' => 'El campo firmar debe ser verdadero o falso.',
        'galery.*.mimes' => 'El campo galer??a debe ser un archivo de tipo: jpg, jpeg, png, bmp, svg, gif.',
    ];

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title',
                'unique' => true,
                'onUpdate' => true,
            ]
        ];
    }

    public function category()
    {
        return $this->belongsTo('App\Models\PostCategory', 'post_category_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Models\PostTag', 'post_tag')->withTimestamps();
    }

    public function galeryImages()
    {
        return $this->hasMany('App\Models\PostGaleryImage');
    }

    public function isPublished()
    {
        return $this->publish === 1;
    }

    public function scopeSearch($query, $title)
    {
        return $query->where('title', 'Like', "%$title%")->where('publish', 1);
    }
}
