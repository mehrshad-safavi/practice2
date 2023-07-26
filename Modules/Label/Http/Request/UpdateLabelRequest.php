<?php

namespace Modules\Label\Http\Request;

use Illuminate\Foundation\Http\FormRequest;
use Modules\Label\Domain\Rule\UniqueLabelTitleRule;
use Modules\Label\Http\DTO\LabelDTO;

class UpdateLabelRequest extends FormRequest
{
    const TITLE = 'title';
    const COLOR = 'color';

    private UniqueLabelTitleRule $uniqueLabelTitleRule;

    public function __construct(UniqueLabelTitleRule $uniqueTicketSubjectTitleRule)
    {
        $this->uniqueLabelTitleRule = $uniqueTicketSubjectTitleRule;
        parent::__construct();
    }

    public function rules(): array
    {
        return [
            self::TITLE => $this->getTitleRules(),
            self::COLOR => $this->getColorRules(),
        ];
    }

    public function Data(): LabelDTO
    {
        return new LabelDTO(
            $this->input(self::TITLE),
            $this->input(self::COLOR) ?? null,
        );
    }

    private function getTitleRules(): array
    {
        $this->uniqueLabelTitleRule->setId($this->route('id'));
        return ['required', 'string', $this->uniqueLabelTitleRule];
    }

    private function getColorRules(): array
    {
        return ['nullable', 'string'];
    }
}
