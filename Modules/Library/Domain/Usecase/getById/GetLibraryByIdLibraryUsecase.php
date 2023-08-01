<?php

namespace Modules\Library\Domain\Usecase\getById;

use Exception;
use Modules\Library\Database\Persistence\LibraryPersistence;
use Modules\Library\Domain\Persistence\ILibraryPersistence;
use Modules\Library\Domain\Validation\LibraryValidation;

class GetLibraryByIdLibraryUsecase
{
    private ILibraryPersistence $libraryPersistence;
    private LibraryValidation $libraryValidation;

    public function __construct(LibraryPersistence     $libraryPersistence,
                                LibraryValidation      $libraryValidation)
    {
        $this->libraryPersistence = $libraryPersistence;
        $this->libraryValidation = $libraryValidation;
    }

    /**
     * @throws Exception
     */
    public function execute(GetLibraryByIdLibraryInputModel $libraryInputModel): GetLibraryByIdLibraryOutputModel
    {
        $library = $this->libraryPersistence->findById($libraryInputModel->libraryId);
        $this->libraryValidation->checkExists($library);

        return new GetLibraryByIdLibraryOutputModel($library);
    }
}
