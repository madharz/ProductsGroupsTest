<?php

namespace controllers;

use config\Database;
use repositories\ProductRepository;

class ProductController
{
    private ProductRepository $repository;

    public function __construct()
    {
        new Database();
        $this->repository = new ProductRepository();
    }

    public function readList(): void
    {
        $products = $this->repository->getProductList();
        require __DIR__ . '/../views/products/index.php';
    }

    public function create(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->repository->create($_POST);
            header('Location: /products');
            exit;
        }
        require __DIR__ . '/../views/products/create.php';
    }

    public function update(): void
    {
        $id = ($_GET['id'] ?? 0);
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->repository->update($id, $_POST);
            header('Location: /groups');
            exit;
        }
        $group = $this->repository->findById($id);
        require_once __DIR__ . '/../views/products/edit.php';
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