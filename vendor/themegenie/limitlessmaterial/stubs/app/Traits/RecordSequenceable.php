<?php

namespace App\Traits;

trait RecordSequenceable
{
    public static function bootRecordSequenceable()
    {
        static::creating(function ($model) {
            $sequenceNumber = 1;
            $lastRecord = $model::orderBy('sequence_number', 'desc')->first();
            if ($lastRecord) {
                $sequenceNumber = $lastRecord->sequence_number ? $lastRecord->sequence_number + 1 : $sequenceNumber;
            }
            $model->sequence_number = $sequenceNumber;
        });
    }

    public function reArrangeSequence(int $sequence, array $parent = null): bool
    {
        $oldSequence = (int) $this->sequence_number;
        $newSequence = (int) $sequence;
        if ($oldSequence < $newSequence) {

            if (!is_null($parent)) {
                $parentKey = array_key_first($parent);
                $parentId  = $parent[$parentKey];
                $records = $this->where($parentKey, $parentId)
                    ->whereBetween('sequence_number', [$oldSequence + 1, $sequence])
                    ->orderBy('sequence_number', 'desc')->get();
            } else {
                $records = $this->whereBetween('sequence_number', [$oldSequence + 1, $sequence])
                    ->orderBy('sequence_number', 'desc')->get();
            }

            foreach ($records as $record) {
                $record->sequence_number = --$sequence;
                $record->save();
            }
        } elseif ($oldSequence > $newSequence) {

            if (!is_null($parent)) {
                $parentKey = array_key_first($parent);
                $parentId  = $parent[$parentKey];
                $records = $this->where($parentKey, $parentId)
                    ->whereBetween('sequence_number', [$sequence, $oldSequence - 1])
                    ->orderBy('sequence_number', 'asc')->get();
            } else {
                $records = $this->whereBetween('sequence_number', [$sequence, $oldSequence - 1])->orderBy('sequence_number', 'asc')->get();
            }

            foreach ($records as $record) {
                $record->sequence_number = ++$sequence;
                $record->save();
            }
        }

        $this->sequence_number = $newSequence;
        $this->save();

        return true;
    }

    public function reArrangeSequenceOnDelete($sequence, array $parent = null): bool
    {
        if (!is_null($parent)) {
            $parentKey = array_key_first($parent);
            $parentId  = $parent[$parentKey];
            $records = $this->where($parentKey, $parentId)
                ->where('sequence_number', '>', $sequence)
                ->orderBy('sequence_number', 'asc')->get();
        } else {
            $records = $this->where('sequence_number', '>', $sequence)
                ->orderBy('sequence_number', 'asc')->get();
        }

        foreach ($records as $record) {
            $record->sequence_number = $sequence++;
            $record->save();
        }

        return true;
    }
}
