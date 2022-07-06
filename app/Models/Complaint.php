<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
    use HasFactory;
    protected $fillable = ['complaint_reason','status','action','project_id','designer_id','client_id'];

    public function designer()
    {
        return $this->belongsTo(Designer::class);
    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
