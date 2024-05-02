<?php

namespace App\Repository;

abstract class BaseRepository
{
    public function startDbTransaction()
    {
        return \DB::beginTransaction();
    }

    public function commitDbTransaction()
    {
        return \DB::commit();
    }

    public function rollbackDbTransaction()
    {
        return \DB::rollback();
    }
}
