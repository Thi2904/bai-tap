<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Books extends Model
{
    use HasFactory;
    protected $fillable = ['isbn', 'name', 'publisher', 'num_page', 'title', 'author', 'img', 'price'];
}
