<?php

namespace App\Repositories;

use App\Interfaces\CouponRepositoryInterface;
use App\Models\Discount;
use App\Models\Product;

class CouponRepository implements CouponRepositoryInterface
{
    public function getAllCoupon()
    {
        return Discount::query()->get();
    }

    public function createCoupon(array $params)
    {
        return Discount::create($params);
    }

    public function getCouponById($id)
    {
        $category = Discount::query()->where('id', $id)->first();
        return $category;
    }

    public function updateCoupon($id, array $params)
    {
        return Discount::whereId($id)->update($params);
    }

}
