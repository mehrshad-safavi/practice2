<?php

namespace Modules\Library\Http\Request;

use Illuminate\Foundation\Http\FormRequest;
use Modules\Label\Domain\Rule\UniqueLabelTitleRule;
use Modules\Library\Http\DTO\AddBookDTO;

class AddBookRequest extends FormRequest
{
    const BOOK_ID = 'bookId';

    private UniqueLabelTitleRule $uniqueLabelTitleRule;

    public function __construct(UniqueLabelTitleRule $uniqueTicketSubjectTitleRule)
    {
        $this->uniqueLabelTitleRule = $uniqueTicketSubjectTitleRule;
        parent::__construct();
    }

    public function rules(): array
    {
        return [
            self::BOOK_ID => $this->getTitleRules(),
        ];
    }

    public function Data(): AddBookDTO
    {
        return new AddBookDTO(
            $this->input(self::BOOK_ID),
        );
    }

    private function getTitleRules(): array
    {
        return ['required', 'int', $this->uniqueLabelTitleRule];
    }
}
