<?php

namespace repositories;

use models\Group;
use RedBeanPHP\R;
use RedBeanPHP\RedException\SQL;

class GroupRepository
{
    /**
     * @throws SQL
     */
    public function create(array $data): Group
    {
        $group = R::dispense('groups');
        $group->parent_id = $data['parent_id'] ?? null;
        $group->name = $data['name'];
        R::store($group);

        return $this->mapToModel($group);
    }

    public function getGroupList(): array
    {
        $groups = R::findAll('groups');
        $resultGroups = [];
        foreach ($groups as $group) {
            $resultGroups[] = $this->mapToModel($group);
        }
        return $resultGroups;
    }

    public function findById(int $id): Group
    {
        $group = R::load('groups', $id);
        if (!$group->id) {
            throw new \Exception('Group not found.');
        }
        return $this->mapToModel($group);
    }

    public function update(int $id, array $data): void
    {
        $group = R::load('groups', $id);
        $group->parent_id = $data['parent_id'] ?? null;
        $group->name = $data['name'];
        R::store($group);
    }

    public function delete(int $id): void
    {
        $group = R::load('groups', $id);
        if ($group->id) {
            R::trash($group);
        }
    }

    private function mapToModel(object $group): Group
    {
        return new Group(
            $group->id,
            $group->parent_id,
            $group->name
        );
    }
}