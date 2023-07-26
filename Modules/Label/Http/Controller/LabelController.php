<?php

namespace Modules\Label\Http\Controller;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Modules\Label\Domain\Usecase\CreateLabel\CreateLabelInputModel;
use Modules\Label\Domain\Usecase\CreateLabel\CreateLabelUsecase;
use Modules\Label\Domain\Usecase\CreateLabel\ICreateLabelUsecase;
use Modules\Label\Domain\Usecase\GetAllLabels\GetAllLabelsUsecase;
use Modules\Label\Domain\Usecase\GetAllLabels\IGetAllLabelsUsecase;
use Modules\Label\Domain\Usecase\GetById\GetByIdInputModel;
use Modules\Label\Domain\Usecase\GetById\GetByIdUsecase;
use Modules\Label\Domain\Usecase\GetById\IGetByIdUsecase;
use Modules\Label\Http\Request\CreateLabelRequest;
use Modules\Label\Http\ViewModelMapper\CreateLabelViewModelMapper;
use Modules\Label\Http\ViewModelMapper\GetAllLabelsViewModelMapper;
use Modules\Label\Http\ViewModelMapper\GetByIdViewModelMapper;

class LabelController extends Controller
{
    private ICreateLabelUsecase $createLabelUsecase;
    private IGetByIdUsecase $getByIdUsecase;
    private IGetAllLabelsUsecase $getAllLabelsUsecase;

    public function __construct(CreateLabelUsecase $createLabelUsecase, GetByIdUsecase $getByIdUsecase, GetAllLabelsUsecase $getAllLabelsUsecase)
    {
        $this->createLabelUsecase = $createLabelUsecase;
        $this->getByIdUsecase = $getByIdUsecase;
        $this->getAllLabelsUsecase = $getAllLabelsUsecase;
    }

    public function createLabel(CreateLabelRequest $request): JsonResponse
    {
        $dto = $request->Data();
        $inputModel = new CreateLabelInputModel($dto->title, $dto->color);
        $outPutModel = $this->createLabelUsecase->execute($inputModel);

        return response()->json(CreateLabelViewModelMapper::prepareViewModel($outPutModel));
    }

    public function getById(Request $request): JsonResponse
    {
        $inputModel = new GetByIdInputModel($request->route('id'));
        $outputModel = $this->getByIdUsecase->execute($inputModel);

        return response()->json(GetByIdViewModelMapper::prepareViewModel($outputModel));
    }

    public function getAll(Request $request): JsonResponse
    {
        $outputModel = $this->getAllLabelsUsecase->execute();

        return response()->json(GetAllLabelsViewModelMapper::prepareViewModel($outputModel));
    }
}
