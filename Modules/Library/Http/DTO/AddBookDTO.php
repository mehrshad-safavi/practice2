<?php

namespace Modules\Library\Http\DTO;

class AddBookDTO
{
    public int $bookId;

    public function __construct(int $bookId)
    {
        $this->bookId = $bookId;
    }


}
