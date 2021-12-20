<?php 

namespace Adnane\SimpleUuid\Traits;
use Illuminate\Support\Str;

/**
 * by default, Eloquent assumes that 
 * the primary key on a model is an incrementing integer value. 
 * & Since we want to use UUID, we need to specify that 
 * the primary key is a string, and that it’s not an incrementing value. 
 * 
 * and the way to do that is simply by setting the $keyType to string, 
 * and $incrementing to false. Then we just need to override 
 * the boot function of the model to use UUID instead.
 * 
 * @author https://github.com/adnane-ka
 */
trait SimpleUuid
{
    /**
     * overridde function to indicate what to use
     */
    protected static function boot()
    {
        parent::boot();

        # bind to the creating event of any model using this trait 
        static::creating(function ($model) {
            if (empty($model->{$model->getKeyName()})) {
                
                # set to uuid instead of AI id 
                $model->{$model->getKeyName()} = Str::uuid()->toString();
            }
        });
    }
    
    /**
     * Get the value that indicated 
     * whether the primary keys are 
     * auto-incremented or not.
     *
     * @return boolean
     */
    public function getIncrementing()
    {
        return false;
    }
    
    /**
     * Get the primary key type.
     *
     * @return string
     */
    public function getKeyType()
    {
        return 'string';
    }
}
