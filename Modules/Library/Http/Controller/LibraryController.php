<?php

namespace Modules\Library\Http\Controller;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Modules\Library\Domain\Usecase\addBook\AddBookToLibraryUsecase;
use Modules\Library\Domain\Usecase\addBook\LibraryBookInputModel;
use Modules\Library\Http\Request\AddBookRequest;
use Modules\Library\Http\ViewModelMapper\AddBookViewModelMapper;

class LibraryController extends Controller
{
    private AddBookToLibraryUsecase $addBookToLibraryUsecase;

    public function __construct(AddBookToLibraryUsecase $addBookToLibraryUsecase)
    {
        $this->addBookToLibraryUsecase = $addBookToLibraryUsecase;
    }

    public function addBook(AddBookRequest $request): JsonResponse
    {
        $dto = $request->data();
        $inputModel = new LibraryBookInputModel($dto->bookId, $request->route('id'));
        $outputModel = $this->addBookToLibraryUsecase->execute($inputModel);

        return response()->json(AddBookViewModelMapper::prepareViewModel($outputModel));
    }
}
