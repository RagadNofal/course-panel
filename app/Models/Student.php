<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Student extends Model
{
    use Translatable;

    // Specify the translation model explicitly
    public $translationModel = StudentTranslation::class;

    // Fields that are translated
    public $translatedAttributes = ['name'];

    // Fillable fields in the main students table
    protected $fillable = [
        'email',
        'password',
        'phone',
        'is_active',
    ];
public function courses()
{
    return $this->belongsToMany(Course::class, 'student_courses')
                ->using(StudentCourse::class)
                ->withPivot(['enrolled_at', 'progress'])
                ->withTimestamps();
}

    /**
     * Create or update translations from request input.
     */
    public function createTranslation(Request $request)
    {
        foreach (locales() as $key => $language) {
            foreach ($this->translatedAttributes as $attribute) {
                $inputName = $attribute . '_' . $key;
                if ($request->has($inputName) && !empty($request->input($inputName))) {
                    // Set the translated attribute for the given locale
                    $this->translateOrNew($key)->{$attribute} = $request->input($inputName);
                }
            }
        }
        $this->save();

        return $this;
    }

    /**
     * Scope for filtering/searching students by translated attributes or main attributes.
     */
    public function scopeFilter($query)
    {
        $request = request();
        $filter = $request->get('query', []);

        if (!empty($filter['generalSearch'])) {
            $searchTerm = '%' . $filter['generalSearch'] . '%';

            $query->whereTranslationLike('name', 'like', $searchTerm)
                  ->orWhere('email', 'like', $searchTerm)
                  ->orWhere('phone', 'like', $searchTerm);
        }

        return $query;
    }
}

