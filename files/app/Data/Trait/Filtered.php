<?php

namespace App\Data\Trait;

trait Filtered
{
    public function filtered(): array
    {
        $data = $this->toArray();
        $this->filterNullItems($data);
        return $data;
    }

    protected function filterNullItems(array &$data): void
    {
        foreach ($data as $key => &$value) {
            if (is_array($value)) {
                $this->filterNullItems($value);
            } else {
                if ($value === null) {
                    unset($data[$key]);
                }
            }
        }
    }
}
