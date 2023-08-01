<?php

namespace Modules\Library\Domain\Usecase\removeBook;

interface IRemoveBookUsecase
{
    public function execute(RemoveBookInputModel $removeBookInputModel): void;

}
