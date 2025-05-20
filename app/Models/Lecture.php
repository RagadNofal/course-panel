<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Lecture extends Model
{
    use Translatable;

   
    public $translationModel = LectureTranslation::class;

   
    public $translatedAttributes = ['title'];

    
    protected $fillable = [
        'course_id',
        'video_url',
        'duration',
    ];

    public function createTranslation(Request $request)
    {
        foreach (locales() as $key => $language) {
            foreach ($this->translatedAttributes as $attribute) {
                $inputName = $attribute . '_' . $key;
                if ($request->has($inputName) && !empty($request->input($inputName))) {
                    $this->translateOrNew($key)->{$attribute} = $request->input($inputName);
                }
            }
        }

        $this->save();

        return $this;
    }

  
   public function course() {
    return $this->belongsTo(Course::class);
}
    
    public function scopeFilter($query)
    {
        $request = request();
        $filter = $request->get('query', []);

        if (!empty($filter['generalSearch'])) {
            $searchTerm = '%' . $filter['generalSearch'] . '%';

            $query->whereTranslationLike('title', 'like', $searchTerm);
        }

        return $query;
    }
}
