<?php

namespace Modules\Book\Http\Request;

use Illuminate\Foundation\Http\FormRequest;
use Modules\Book\Http\DTO\BookDTO;
use Modules\Label\Domain\Rule\UniqueLabelTitleRule;

class UpdateBookRequest extends FormRequest
{
    const TITLE = 'title';
    const PUBLISHER = 'publisher';
    const LABEL_ID = 'labelId';

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
            self::PUBLISHER => $this->getPublisherRules(),
            self::LABEL_ID => $this->getLabelIdRules(),
        ];
    }

    public function Data(): BookDTO
    {
        return new BookDTO(
            $this->input(self::TITLE),
            $this->input(self::PUBLISHER),
            $this->input(self::LABEL_ID),
        );
    }

    private function getTitleRules(): array
    {
        $this->uniqueLabelTitleRule->setId($this->route('id'));
        return ['required', 'string', $this->uniqueLabelTitleRule];
    }

    private function getPublisherRules(): array
    {
        return ['required', 'string'];
    }

    private function getLabelIdRules(): array
    {
        return ['required', 'integer'];
    }
}
