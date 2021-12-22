<?php

namespace App\Order\Requests;

use App\Handlers\ProductHandler;
use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        $validationRules = [
            'customerId' => 'required|integer|exists:customers,id',
            'items' => 'required|array',
            'items.*.productId' => 'required|integer|exists:products,id',
            'items.*.unitPrice' => 'required',
            'items.*.total' => 'required',
            'total' => 'required',
        ];

        $items = $this->offsetGet('items');
        if (is_array($items)) {
            foreach ($items as $key => $item) {
                $validationRules['items.' . $key . '.quantity'] = 'required|numeric|max:' . ProductHandler::getStock($item['productId']);
            }
        }

        return $validationRules;
    }

    public function messages(): array
    {
        return [
            'items.*.quantity.max' => __('There is not enough stock for this product'),
        ];
    }
}






