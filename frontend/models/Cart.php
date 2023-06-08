<?php

namespace frontend\models;

use yii\base\Model;

class Cart extends Model
{
    public function addToCart($product, $qty = 1)
    {
        $qty = ($qty == '-1') ? -1 : 1;
        if (isset($_SESSION['cart'][$product->id])) {
            $_SESSION['cart'][$product->id]['qty'] += $qty;
        } else{
            $_SESSION['cart'][$product->id] = [
                'title' => $product->title,
                'price' => $product->price,
                'qty' => $qty,
                'img' => $product->img,
            ];
        }
        $_SESSION['cart.qty'] = isset($_SESSION['cart.qty']) ? $_SESSION['cart.qty'] + $qty : $qty;
        $_SESSION['cart.total'] = isset($_SESSION['cart.total']) ? $_SESSION['cart.total'] + $qty * $product->price : $qty * $product->price;

        if ($_SESSION['cart'][$product->id]['qty'] == 0) {
            unset($_SESSION['cart'][$product->id]);
        }
    }

    public function recalc($id)
    {
        if (!isset($_SESSION['cart'][$id])) {
            return;
        }
        $qtyMinus = $_SESSION['cart'][$id]['qty'];
        $sumMinus = $_SESSION['cart'][$id]['qty'] * $_SESSION['cart'][$id]['price'];
        $_SESSION['cart.qty'] -= $qtyMinus;
        $_SESSION['cart.total'] -= $sumMinus;
        unset($_SESSION['cart'][$id]);
    }
}