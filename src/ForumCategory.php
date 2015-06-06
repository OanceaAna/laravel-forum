<?php namespace Taskforcedev\LaravelForum;

use Illuminate\Database\Eloquent\Model;

class ForumCategory extends Model
{
    public $table = 'forum_categories';

    public $fillable = ['name'];

    /**
     * Is model data valid.
     * @param array|object $data The data to validate.
     * @return boolean
     */
    public static function valid($data)
    {
        $rules = [
            'name' => ['required', 'min:3'],
        ];
        $validator = Validator::make($data, $rules);

        if ($validator->passes()) {
            return true;
        }
        return false;
    }
}
