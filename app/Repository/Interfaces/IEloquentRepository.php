<?php

namespace App\Repository\Interfaces;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;


interface IEloquentRepository{

    public function update($id, $attributes);
    public function save($attributes);
    public function sync($attributes);
    public function destroy($id): bool;
    public function find($id): Model;
    public function firstOrCreate($attributes): Model;
    public function where(...$where): Builder;
    public function with(...$with): Builder;
    public function getPaginated(int $count = 2);
    public function getPaginatedActive(int $count = 2);
    public function orderBy(string $string, string $string1);
    public function validate($attributes);
    public function all();
    public function count();
    public function create(array $data);
    public function delete();
    public function deleteById($id);
    public function deleteMultipleById(array $ids);
    public function first();
    public function get();
    public function getById($id);
    public function limit($limit);
    public function updateById($id, array $data);


}
