<?php

namespace App\Model\admin;


use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class admin  extends Authenticatable
{
    use HasFactory, Notifiable;
}
