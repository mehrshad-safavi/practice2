<?php

namespace Modules\Book\Http\Controller;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Modules\Book\Domain\Usecase\CreateBook\CreateBookInputModel;
use Modules\Book\Domain\Usecase\CreateBook\CreateBookUsecase;
use Modules\Book\Domain\Usecase\CreateBook\ICreateBookUsecase;
use Modules\Book\Domain\Usecase\DeleteBook\DeleteBookInputModel;
use Modules\Book\Domain\Usecase\DeleteBook\DeleteBookUsecase;
use Modules\Book\Domain\Usecase\DeleteBook\IDeleteBookUsecase;
use Modules\Book\Domain\Usecase\GetAllBooks\GetAllBooksUsecase;
use Modules\Book\Domain\Usecase\GetAllBooks\IGetAllBooksUsecase;
use Modules\Book\Domain\Usecase\GetById\GetBookByIdInputModel;
use Modules\Book\Domain\Usecase\GetById\GetBookByIdUsecase;
use Modules\Book\Domain\Usecase\GetById\IGetBookByIdUsecase;
use Modules\Book\Domain\Usecase\UpdateBook\IUpdateBookUsecase;
use Modules\Book\Domain\Usecase\UpdateBook\UpdateBookInputModel;
use Modules\Book\Domain\Usecase\UpdateBook\UpdateBookUsecase;
use Modules\Book\Http\Request\CreateBookRequest;
use Modules\Book\Http\Request\UpdateBookRequest;
use Modules\Book\Http\ViewModelMapper\CreateBookViewModelMapper;
use Modules\Book\Http\ViewModelMapper\GetAllBooksViewModelMapper;
use Modules\Book\Http\ViewModelMapper\GetBookByIdViewModelMapper;
use Modules\Book\Http\ViewModelMapper\UpdateBookViewModelMapper;

class BookController extends Controller
{
    private ICreateBookUsecase $createBookUsecase;
    private IGetBookByIdUsecase $getBookByIdUsecase;
    private IGetAllBooksUsecase $getAllBooksUsecase;
    private IUpdateBookUsecase $updateBookUsecase;
    private IDeleteBookUsecase $deleteBookUsecase;

    public function __construct(CreateBookUsecase $createBookUsecase, GetBookByIdUsecase $getBookByIdUsecase,
                                GetAllBooksUsecase $getAllBooksUsecase, UpdateBookUsecase $updateBookUsecase,
                                DeleteBookUsecase $deleteBookUsecase)
    {
        $this->createBookUsecase = $createBookUsecase;
        $this->getBookByIdUsecase = $getBookByIdUsecase;
        $this->getAllBooksUsecase = $getAllBooksUsecase;
        $this->updateBookUsecase = $updateBookUsecase;
        $this->deleteBookUsecase = $deleteBookUsecase;
    }

    /**
     * @throws ValidationException
     */
    public function createBook(CreateBookRequest $request): JsonResponse
    {
        $dto = $request->Data();
        $inputModel = new CreateBookInputModel($dto->title, $dto->publisher, $dto->labelId);
        $outPutModel = $this->createBookUsecase->execute($inputModel);

        return response()->json(CreateBookViewModelMapper::prepareViewModel($outPutModel));
    }

    public function getById(Request $request): JsonResponse
    {
        $inputModel = new GetBookByIdInputModel($request->route('id'));
        $outputModel = $this->getBookByIdUsecase->execute($inputModel);

        return response()->json(GetBookByIdViewModelMapper::prepareViewModel($outputModel));
    }

    public function getAll(Request $request): JsonResponse
    {
        $outputModel = $this->getAllBooksUsecase->execute();

        return response()->json(GetAllBooksViewModelMapper::prepareViewModel($outputModel));
    }

    /**
     * @throws ValidationException
     */
    public function updateBook(UpdateBookRequest $request): JsonResponse
    {
        $dto = $request->Data();
        $inputModel = new UpdateBookInputModel($request->route('id'), $dto->title, $dto->publisher, $dto->labelId);
        $outputModel = $this->updateBookUsecase->execute($inputModel);

        return response()->json(UpdateBookViewModelMapper::prepareViewModel($outputModel));
    }

    public function deleteBook(Request $request): JsonResponse
    {
        $inputModel = new DeleteBookInputModel($request->route('id'));
        $this->deleteBookUsecase->execute($inputModel);

        return response()->json(['message' => 'success']);
    }
}
