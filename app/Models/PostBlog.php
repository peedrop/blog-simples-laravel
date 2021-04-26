<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostBlog extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'subtitle',
        'headline',
        'contents',
        'image_path',
        'user_id',
        'category_id',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function category() {
        return $this->belongsTo(CategoryBlog::class);
    }

    public function verifyEdit() {
        if($this->created_at == $this->updated_at)
            return "Postado";
        else
            return "Editado";
    }

    public static function getLastMonths() {
        $today = Carbon::today();
        $ago = Carbon::today()->modify("-11 month");
        $months = [];
        while($ago->timestamp <= $today->timestamp){
            $month['name'] = ucfirst($ago->monthName);
            $month['id'] = ucfirst($ago->month);
            array_unshift($months, $month);
            $ago->modify("+1 month");
        }
        return $months;
    }

    public static function insertUser($data) {
        $data['user_id'] = Auth::user()->id;
        return $data;
    }

    public static function saveImg($data, $name, $diretorio, $imgAntiga = '') {
        if(isset($data[$name]) && is_file($data[$name])){
            $imgName = $data[$name]->getClientOriginalName();
            $imgName = hash('sha256', $imgName . strval(time())) . '.' . $data[$name]->getClientOriginalExtension();
            PostBlog::deleteImg($imgAntiga, $diretorio);
            $data[$name]->storeAs($diretorio, $imgName);
            $data[$name] = $imgName;
        }else{
            unset($data[$name]);
        }

        return $data;
    }
    public static function deleteImg($imgName, $diretorio) {
        if($imgName != '' && $imgName != 'post_default.png'){
            Storage::delete($diretorio . $imgName);
        }
    }

    public static function search($search) {
        return PostBlog::query()
            ->where('title', 'LIKE', "%{$search}%")
            ->orWhere('subtitle', 'LIKE', "%{$search}%")
            ->orWhere('headline', 'LIKE', "%{$search}%")
            ->orWhere('contents', 'LIKE', "%{$search}%");
    }
}
