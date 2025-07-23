<?php
// 7.
namespace App\Infrastructure\Repositories;

use App\Domain\Repositories\CamperRepositoryInterface;

use App\Domain\Models\Camper;

class EloquentCamperRepository implements CamperRepositoryInterface{
    public function getAll() : array {
        // SELECT * FROM campers;
        return Camper::all()->toArray();
    }

    public function getById(int $documento): ?Camper{
        // SELECT * FROM camper WHERE id= $documento;
        return Camper::find($documento);
    }

    public function create(array $data): Camper{
        return Camper::create($data);
    }
    public function update(int $documento, array $data): bool{
        // SELECT * FROM campers WHERE id = $documento;
        $camper = Camper::find($documento);
        // UPDATE campers SET nombre= $data[x] ... WHERE id = $documento;
        return $camper ? $camper->update($data) : false;
    }

    public function delete(int $documento): bool{
        // SELECT * FROM campers WHERE id = $documento;
        $camper = Camper::find($documento);
        // DELETE FROM campers WHERE id = $documento;
        return $camper ? $camper->delete() : false;   
    }
}