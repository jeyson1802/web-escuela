<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    
    protected $guarded = ['id','status'];
    protected $withCount = ['students','reviews'];

    const DRAFT = "draft";
    const REVISION = "revision";
    const PUBLISHED = "published";

    public function getRatingAttribute(){

        if($this->reviews_count)
            return round($this->reviews->avg('rating'), 1);

        return 5;
    }

    public function scopeCategory($query, $category){
        if($category){
          return  $query->where('category_id', $category);  
        }
        return $query;
    }

    
    public function scopeLevel($query, $level){
        if($level){
          return  $query->where('level_id', $level);  
        }
        return $query;
    }

    public function getRouteKeyName(){
        return 'slug';
    }

    public function reviews()
    {
        return $this->hasMany(Review::class );
    }
    
    public function requirements()
    {
        return $this->hasMany(Requirement::class);
    }
    
    public function goals()
    {
        return $this->hasMany(Goal::class);
    }
    
    public function audiences()
    {
        return $this->hasMany(Audience::class);
    }
    
    public function sections()
    {
        return $this->hasMany(Section::class);
    }
    
    public function level()
    {
        return $this->belongsTo(Level::class);
    }

    
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    
    public function price()
    {
        return $this->belongsTo(Price::class);
    }

    public function teacher()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function students()
    {
        return $this->belongsToMany(User::class);
    }
    
    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function lessons()
    {
        return $this->hasManyThrough(Lesson::class , Section::class);
    }
}
