<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'day_order_num',
        'client_id',
        'shipping_info_id',
        'is_active',
        'comment'
    ];

    protected $attributes = [
        'is_active'     => true
    ];

    public function order_lines()
    {
        return $this->hasMany(Order_Line::class);
    }

    public function Order_status_histories()
    {
        return $this->hasMany(Order_status_history::class);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function shipping_information()
    {
        return $this->belongsTo(Shipping_information::class , 'shipping_info_id' );
    }

    public function getGetOrderCodeAttribute(){
        return $this->created_at->format('Ymd') . str_pad( $this->day_order_num ,3,'0',STR_PAD_LEFT)  ;
    }

    public function SetOrderCode(){
        $number =   0;
        try {
            $number =   Order::
                        where('created_at' , '>=' , strtotime("today"))
                        ->max( 'day_order_num');
        } catch (\Throwable $th) {
            $number = 0;
        }
        $this->day_order_num = $number + 1;
    }

    public function getGetTotalAttribute(){
        return $this->order_lines->sum('GetTotal');
        $total = 0;
        foreach( $this->order_lines as $order_line)
            $total += $order_line->GetTotal;
        return $total;
    }

    public function getGetStatusAttribute(){
        /** TODO
         * Se puede cambiar usando la relacion belongsTo
         */
        $actual_status_history = Order_status_history::find(
            $this->Order_status_histories->max('id')
        );
        $actual_status = Status::find($actual_status_history->status_id);
        return $actual_status;
    }

    ////////////////////////////////////////////////
    public function getGetNextStatusAttribute(){
        return Status::where('code', $this->GetStatus->next_code )->first();
    }

    public function getGetShippingInfoTextAttribute(){
        $text = "{$this->client}";

        return "preparacion de texto";
    }


}
