<?php

namespace App\Repository\Interfaces;

interface RepositoryInterface
{
    public function all();

    public function find($primaryKey);

    public function create($data);

    public function update($primaryKey, $data);

    public function destroy($primaryKey);

    public function thenCreate($primaryKey,array $dataForUpdate, array $dataForSave);
}
