<?php

namespace App\Traits;

trait HasTimestamps{

    public function createdAt(): String {
        return $this->created_at->format('d-m-Y');
    }

    public function updatedAt(): String {
        return $this->updated_at->format('d-m-Y');
    }
}