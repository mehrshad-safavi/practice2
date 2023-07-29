<?php

namespace Modules\Book\Http\Controller;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Modules\Book\Domain\Usecase\CreateBook\CreateBookInputModel;
use Modules\Book\Domain\Usecase\CreateBook\CreateBookUsecase;
use Modules\Book\Domain\Usecase\CreateBook\ICreateBookUsecase;
use Modules\Book\Domain\Usecase\GetById\GetBookByIdInputModel;
use Modules\Book\Domain\Usecase\GetById\GetBookByIdUsecase;
use Modules\Book\Domain\Usecase\GetById\IGetBookByIdUsecase;
use Modules\Book\Http\Request\CreateBookRequest;
use Modules\Book\Http\ViewModelMapper\CreateBookViewModelMapper;
use Modules\Book\Http\ViewModelMapper\GetBookByIdViewModelMapper;

class BookController extends Controller
{
    private ICreateBookUsecase $createBookUsecase;
    private IGetBookByIdUsecase $getBookByIdUsecase;

    public function __construct(CreateBookUsecase $createBookUsecase, GetBookByIdUsecase $getBookByIdUsecase)
    {
        $this->createBookUsecase = $createBookUsecase;
        $this->getBookByIdUsecase = $getBookByIdUsecase;
    }

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
//
//    public function getAll(Request $request): JsonResponse
//    {
//        $outputModel = $this->getAllLabelsUsecase->execute();
//
//        return response()->json(GetAllLabelsViewModelMapper::prepareViewModel($outputModel));
//    }
//
//    public function updateLabel(UpdateLabelRequest $request): JsonResponse
//    {
//        $dto = $request->Data();
//        $inputModel = new UpdateLabelInputModel($request->route('id'), $dto->title, $dto->color);
//        $outputModel = $this->updateLabelUsecase->execute($inputModel);
//
//        return response()->json(UpdateLabelViewModelMapper::prepareViewModel($outputModel));
//    }
}
