<?php
namespace App\Repositories\Eloquent;

use App\Models\Product;
use App\Repositories\Contracts\ProductRepositoryInterfaces;
use Override;

class ProductRepository implements ProductRepositoryInterfaces
{
    protected $model;

    public function __construct(Product $product)
    {
        $this->model = $product;
    }

    #[Override]
    public function getAll()
    {
        return $this->model->with('category')->get();
    }

    #[Override]
    public function getById($id)
    {
        return $this->model->findOrFail($id);
    }

    #[Override]
    public function create(array $data)
    {
        return $this->model->create($data);
    }

    #[Override]
    public function update($id, array $data)
    {
        $item = $this->getById($id);
        
        $item->update($data);
        return $item;
    }

    #[Override]
    public function delete($id)
    {
        $item = $this->getById($id);

        return $item->delete();
    }
}