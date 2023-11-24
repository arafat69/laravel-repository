<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

abstract class Repository
{
    /**
     * Define relevant model
     *
     * @return Model|Builder
     */
    abstract public static function model();

    public static function query(): Builder
    {
        return static::model()::query();
    }

    public static function getAll()
    {
        return static::query()->get();
    }

    /**
     * @return Builder|Model|object|null
     */
    public static function first()
    {
        return static::query()->first();
    }

    /**
     * @return Builder|Builder[]|Collection|Model|null|mixed
     */
    public static function find($primaryKey)
    {
        return static::query()->find($primaryKey);
    }

    /**
     * @return Builder|Builder[]|Collection|Model|null|mixed
     */
    public static function findOrFail($primaryKey)
    {
        return static::query()->findOrFail($primaryKey);
    }

    public static function delete($primaryKey)
    {
        return static::query()->destroy($primaryKey);
    }

    /**
     * @return Builder|Model|mixed
     */
    public static function create(array $data)
    {
        return static::query()->create($data);
    }

    /**
     * @return bool
     */
    public static function update(Model $model, array $data)
    {
        return $model->update($data);
    }
}
