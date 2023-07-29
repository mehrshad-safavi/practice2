<?php

namespace Modules\Book\Http\Controller;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Modules\Book\Domain\Usecase\CreateBook\CreateBookInputModel;
use Modules\Book\Domain\Usecase\CreateBook\CreateBookUsecase;
use Modules\Book\Domain\Usecase\CreateBook\ICreateBookUsecase;
use Modules\Book\Http\Request\CreateBookRequest;
use Modules\Book\Http\ViewModelMapper\CreateBookViewModelMapper;

class BookController extends Controller
{
    private ICreateBookUsecase $createBookUsecase;

    public function __construct(CreateBookUsecase $createBookUsecase,
    )
    {
        $this->createBookUsecase = $createBookUsecase;
    }

    public function createBook(CreateBookRequest $request): JsonResponse
    {
        $dto = $request->Data();
        $inputModel = new CreateBookInputModel($dto->title, $dto->publisher, $dto->labelId);
        $outPutModel = $this->createBookUsecase->execute($inputModel);

        return response()->json(CreateBookViewModelMapper::prepareViewModel($outPutModel));
    }

//    public function getById(Request $request): JsonResponse
//    {
//        $inputModel = new GetByIdInputModel($request->route('id'));
//        $outputModel = $this->getByIdUsecase->execute($inputModel);
//
//        return response()->json(GetByIdViewModelMapper::prepareViewModel($outputModel));
//    }
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
