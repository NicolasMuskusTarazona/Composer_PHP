<?php
// 3.

namespace App\Infrastructure\Repositories;

use App\Domain\Models\User;
use App\Domain\Repositories\UserRepositoryInterface;
use Exception;
use App\DTOs\UserDTO;

class EloquentUserRepository implements UserRepositoryInterface{
    public function create(UserDTO $dto): User{
        $data = $dto->toArry();
        $exists = User::where('email',$data['email'])->first();
        if($exists){
            // Mostar un eror
            throw new Exception('Error el usuario ya existe');
        }
        return User::create($data);
    }
}