<?php

namespace Modules\Library\Http\Controller;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Modules\Library\Domain\Usecase\addBook\AddBookToLibraryUsecase;
use Modules\Library\Domain\Usecase\getById\GetLibraryByIdLibraryInputModel;
use Modules\Library\Domain\Usecase\getById\GetLibraryByIdLibraryUsecase;
use Modules\Library\Domain\Usecase\addBook\LibraryBookInputModel;
use Modules\Library\Domain\Usecase\removeBook\IRemoveBookUsecase;
use Modules\Library\Domain\Usecase\removeBook\RemoveBookInputModel;
use Modules\Library\Domain\Usecase\removeBook\RemoveBookUsecase;
use Modules\Library\Http\Request\AddBookRequest;
use Modules\Library\Http\ViewModelMapper\AddBookViewModelMapper;
use Modules\Library\Http\ViewModelMapper\LibraryViewModelMapper;

class LibraryController extends Controller
{
    private AddBookToLibraryUsecase $addBookToLibraryUsecase;
    private GetLibraryByIdLibraryUsecase $getLibraryByIdLibraryUsecase;
    private IRemoveBookUsecase $removeBookUsecase;

    public function __construct(AddBookToLibraryUsecase $addBookToLibraryUsecase,
                                GetLibraryByIdLibraryUsecase $getLibraryByIdLibraryUsecase,
                                RemoveBookUsecase $removeBookUsecase)
    {
        $this->addBookToLibraryUsecase = $addBookToLibraryUsecase;
        $this->getLibraryByIdLibraryUsecase = $getLibraryByIdLibraryUsecase;
        $this->removeBookUsecase = $removeBookUsecase;
    }

    /**
     * @throws Exception
     */
    public function addBook(AddBookRequest $request): JsonResponse
    {
        $dto = $request->data();
        $inputModel = new LibraryBookInputModel($dto->bookId, $request->route('id'));
        $outputModel = $this->addBookToLibraryUsecase->execute($inputModel);

        return response()->json(AddBookViewModelMapper::prepareViewModel($outputModel));
    }

    /**
     * @throws Exception
     */
    public function show(Request $request): JsonResponse
    {
        $inputModel = new GetLibraryByIdLibraryInputModel($request->route('id'));
        $outputModel = $this->getLibraryByIdLibraryUsecase->execute($inputModel);

        return response()->json(LibraryViewModelMapper::prepareViewModel($outputModel));
    }

    /**
     * @throws Exception
     */
    public function delete(Request $request): JsonResponse
    {
        $inputModel = new RemoveBookInputModel($request->bookId, $request->route('id'));
        $this->removeBookUsecase->execute($inputModel);

        return response()->json(['message' => 'success']);
    }
}
