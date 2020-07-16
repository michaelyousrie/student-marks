<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class StudentCollection extends ResourceCollection
{
    private $pagination;

    public function __construct($resource)
    {
        $this->pagination = [
            'current_page'  => $resource->currentPage(),
            'next_page'     => $resource->path() . '?page=' . ((int)$resource->currentPage() + 1),
        ];

        $resource = $resource->getCollection();

        parent::__construct($resource);
    }

    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            "data"       => StudentResource::collection($this->collection),
            'pagination' => $this->pagination
        ];
    }
}
