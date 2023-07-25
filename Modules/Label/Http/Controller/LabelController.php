<?php

namespace Modules\Label\Http\Controller;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Modules\Label\Domain\Usecase\CreateLabel\CreateLabelInputModel;
use Modules\Label\Domain\Usecase\CreateLabel\CreateLabelUsecase;
use Modules\Label\Domain\Usecase\CreateLabel\ICreateLabelUsecase;
use Modules\Label\Http\Request\CreateLabelRequest;
use Modules\Label\Http\ViewModelMapper\CreateLabelViewModelMapper;

class LabelController extends Controller
{
    private ICreateLabelUsecase $createLabelUsecase;

    public function __construct(CreateLabelUsecase $createLabelUsecase)
    {
        $this->createLabelUsecase = $createLabelUsecase;
    }

    public function createLabel(CreateLabelRequest $request): JsonResponse
    {
        $dto = $request->Data();
        $inputModel = new CreateLabelInputModel($dto->title, $dto->color);
        $outPutModel = $this->createLabelUsecase->execute($inputModel);

        return response()->json(CreateLabelViewModelMapper::prepareViewModel($outPutModel));
    }
}
