<?php

namespace App\Http\Requests;

use App\Models\EmailOrder;
use App\Models\Order;
use App\Models\VpsOrder;
use App\Models\WebOrder;

class UpdateOrder extends StoreOrder {

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
     * @param Order $order
     * @return bool|int
     */
    public function updateOrder(Order $order)
    {
        $data = [
            'customer_id' => $this->input('customer_id'),
            'date'        => $this->input('date'),
            'approved_by' => $this->get('approve') || $this->get('reject') ? auth()->id() : null,
            'status'      => 0
        ];

        if ($this->get('approve'))
            $data['status'] = 1;
        elseif ($this->get('reject'))
            $data['status'] = 2;

        return $order->update($data);
    }

    /**
     * Update VPS order
     */
    public function updateVpsOrder()
    {
        foreach ($this->input('vps') as $id => $values)
        {
            $term = $this->input('vps.' . $id . '.term');
            $price = $this->input('vps.' . $id . '.price');
            $is_trial = $this->input('vps.' . $id . '.is_trial');

            $data = [
                'name'                => $this->input('vps.' . $id . '.name'),
                'operating_system_id' => $this->input('vps.' . $id . '.operating_system_id'),
                'data_center_id'      => $this->input('vps.' . $id . '.data_center_id'),
                'term'                => $term ? $is_trial ? null : $term : null,
                'cpu'                 => $this->input('vps.' . $id . '.cpu'),
                'ram'                 => $this->input('vps.' . $id . '.ram'),
                'disk'                => $this->input('vps.' . $id . '.disk'),
                'traffic'             => $this->input('vps.' . $id . '.traffic'),
                'price'               => $price ? $is_trial ? 0 : $price : 0,
                'discount'            => $this->input('vps.' . $id . '.discount') ?: 0,
                'is_trial'            => $this->input('vps.' . $id . '.is_trial') ?: 0,
                'is_managed'          => $this->input('vps.' . $id . '.is_managed') ?: 0,
                'additional_ip'       => $this->input('vps.' . $id . '.additional_ip') ?: 0,
            ];

            VpsOrder::find($id)->update($data);
        }
    }

    /**
     * Update Web Order
     */
    public function updateWebOrder()
    {
        foreach ($this->input('web') as $id => $values)
        {
            $data = [
                'name'     => $this->input('web.' . $id . '.name'),
                'term'     => $this->input('web.' . $id . '.term') ?: null,
                'domain'   => $this->input('web.' . $id . '.domain'),
                'disk'     => $this->input('web.' . $id . '.disk'),
                'traffic'  => $this->input('web.' . $id . '.traffic'),
                'price'    => $this->input('web.' . $id . '.price') ?: null,
                'discount' => $this->input('web.' . $id . '.discount') ?: 0
            ];

            WebOrder::find($id)->update($data);
        }
    }

    /**
     * Update Email Order
     */
    public function updateEmailOrder()
    {
        foreach ($this->input('email') as $id => $values)
        {
            $data = [
                'name'     => $this->input('email.' . $id . '.name'),
                'term'     => $this->input('email.' . $id . '.term') ?: null,
                'domain'   => $this->input('email.' . $id . '.domain'),
                'disk'     => $this->input('email.' . $id . '.disk'),
                'traffic'  => $this->input('email.' . $id . '.traffic'),
                'price'    => $this->input('email.' . $id . '.price') ?: null,
                'discount' => $this->input('email.' . $id . '.discount') ?: 0
            ];

            EmailOrder::find($id)->create($data);
        }
    }

}
