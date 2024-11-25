<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $productID = $this->product->id ?? false;
        $skuRule = $productID ? "unique:products,sku, $productID" : 'unique:products,sku';

        return [
            'name' => 'required|max:50',
            'cost_price' => 'required|regex:/^\d{1,3}(?:\.\d{3})*,\d{2}$/',
            'sell_price' => 'required|regex:/^\d{1,3}(?:\.\d{3})*,\d{2}$/',
            'sku' => "$skuRule",
            'categories' => 'array',
            'categories.*' => 'numeric',
            'image' => 'image|max:500',
            'description' => 'required|max:300'
        ];
    }

    public function messages() {
        return [
            'name.required' => 'O campo <b>NOME</b> é obrigatório',
            'cost_price.required' => 'O campo <b>PREÇO DE CUSTO</b> é obrigatório',
            'sell_price.required' => 'O campo <b>PREÇO DE VENDA</b> é obrigatório',
            'description.required' => 'O campo <b>DESCRIÇÃO</b> é obrigatório',
            'name.max' => 'O campo <b>NOME</b> deve conter no máximo 50 dígitos',
            'cost_price.numeric' => 'O campo <b>PREÇO DE CUSTO</b> deve ser um valor numérico',
            'sell_price.numeric' => 'O campo <b>PREÇO DE VENDA</b> deve ser um valor numérico',
            'cost_price.regex' => 'O campo <b>PREÇO DE CUSTO</b> deve estar em formato monetário',
            'sell_price.regex' => 'O campo <b>PREÇO DE VENDA</b> deve estar em formato monetário',
            'sku.unique' => 'Já existe outro produto com esse <b>SKU</b>',
            'categories.*.numeric' => 'O campo <b>CATEGORIAS</b> deve conter apenas números',
            'image.image' => 'O campo <b>IMAGEM</b> não aceita arquivos que não sejam de imagem',
            'image.max' => 'O campo <b>IMAGEM</b> não pode receber arquivos com mais do que 500 kb',
            'description.max' => 'O campo <b>DESCRIÇÂO</b> deve conter no máximo 300 dígitos',
        ];
    }
}
