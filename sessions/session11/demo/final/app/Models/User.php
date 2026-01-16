<?php

use Laravel\Sanctum\HasApiTokens;
// otros use...

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    // ...
}
