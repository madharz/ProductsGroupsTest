<?php

namespace controllers;

use config\Database;
use repositories\GroupRepository;

class GroupController
{
    private GroupRepository $repository;

    public function __construct()
    {
        new Database();
        $this->repository = new GroupRepository();
    }

    public function readList(): void
    {
        $groups = $this->repository->getGroupList();
        require __DIR__ . '/../views/groups/index.php';

    }

    public function create(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->repository->create($_POST);
            header('Location: /groups');
            exit;
        }
        require __DIR__ . '/../views/groups/create.php';
    }

    public function update(): void
    {
        $id = (int) ($_GET['id'] ?? 0);
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->repository->update($id, $_POST);
            header('Location: /groups');
            exit;
        }
        $group = $this->repository->findById($id);
        require_once __DIR__ . '/../views/groups/edit.php';
    }

    public function delete(): void
    {
        $id = (int) ($_GET['id'] ?? 0);
        try {
            $this->repository->findById($id);
            $this->repository->delete($id);
            header('Location: /products');
            exit;
        } catch (\Exception $e) {
            echo "Product not found or already deleted.";
        }
    }

}