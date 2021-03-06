<?php

namespace App\Services\Records;

use App\Models\Record;
use App\Models\User;
use App\Services\Records\DTO\RecordCreateDTO;
use App\Services\Records\DTO\RecordUpdateDTO;
use App\Services\Records\Handlers\RecordCreateHandler;
use App\Services\Records\Handlers\RecordDeleteHandler;
use App\Services\Records\Handlers\RecordUpdateHandler;
use App\Services\Records\Repositories\RecordRepositoryInterface;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;

class RecordService
{

    private RecordRepositoryInterface $repository;
    private RecordCreateHandler $createHandler;
    private RecordUpdateHandler $updateHandler;
    private RecordDeleteHandler $deleteHandler;

    public function __construct(
        RecordRepositoryInterface $repository,
        RecordCreateHandler $createHandler,
        RecordUpdateHandler $updateHandler,
        RecordDeleteHandler $deleteHandler
    ) {
        $this->repository = $repository;
        $this->createHandler = $createHandler;
        $this->updateHandler = $updateHandler;
        $this->deleteHandler = $deleteHandler;
    }

    /**
     * Списк всех записей для салона
     * @param User $user
     * @return Collection|null
     */
    public function getUserRecords(User $user): ?Collection
    {
        if (Auth::guest() || !$user->business) {
            return new Collection();
        }

        return $this->repository->findByBusinessId($user->business->id);
    }

    /**
     * Список записей для процедуры
     * @param int $procedure_id
     * @param Carbon|null $date_start
     * @param Carbon|null $date_end
     * @return Collection|null
     */
    public function getProcedureRecords(int $procedure_id, ?Carbon $date_start, ?Carbon $date_end): ?Collection
    {
        $date_start = $date_start ?? now();
        $date_end = $date_end ?? now()->addDays(Record::GET_RECORDS_FOR_DAYS);

        return $this->repository->findByProcedureId($procedure_id, $date_start, $date_end);
    }

    /**
     * Данные по записи
     * @param $record_id
     * @param User $user
     * @return Record|null
     */
    public function findRecordUser($record_id, User $user)
    {
        return $this->repository->findByClientIdOrFail($record_id, $user->id);
    }

    /**
     * Добавить запись
     * @param array $data
     * @param User $user
     * @return Record
     */
    public function createForUser(array $data, User $user): Record
    {
        $record = RecordCreateDTO::fromArray($data);
        return $this->createHandler->handle($record, $user);
    }

    /**
     * Обновить запись
     * @param array $data
     * @param int $record_id
     * @param User $user
     */
    public function updateForUser(array $data, int $record_id, User $user): void
    {
        $DTO = RecordUpdateDTO::fromArray($data);
        $this->updateHandler->handle($DTO, $record_id, $user);
    }

    /**
     * Удалить запись
     * @param int $record_id
     * @param User $user
     */
    public function deleteUserRecord(int $record_id, User $user): void
    {
        $this->deleteHandler->handle($record_id, $user);
    }
}
