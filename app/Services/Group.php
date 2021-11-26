<?php

namespace App\Services;

class Group
{
    public function GroupByEloquentData($datas, $column)
    {
        $arrayGroups = $this->GetGroup($datas, $column);

        foreach ($arrayGroups as $i => $group) {
            foreach ($datas as $data) {
                if ($data->type == $i) {
                    array_push($arrayGroups[$i], $data);
                }
            }
        }

        return $arrayGroups;
    }

    public function GetGroup($datas, $column)
    {
        $groups = [];

        foreach ($datas as $i => $data) {
            in_array($data->$column, $groups) ?: $groups[$data->$column] = [];
        }

        return $groups;
    }
}