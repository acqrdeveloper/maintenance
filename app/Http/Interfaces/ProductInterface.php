<?php
/**
 * Created by PhpStorm.
 * User: QuispeRoque
 * Date: 23/11/16
 * Time: 00:24
 */

namespace maintenance\Http\Interfaces;


use maintenance\Http\Requests\ProductRequest;

interface ProductInterface
{
    function index();
    function create();
    function store(ProductRequest $request);
    function show($id);
    function edit($id);
    function update($id,ProductRequest $request);
    function destroy($id);

}