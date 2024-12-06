<?php

namespace Tests\Feature;

use App\Models\Order;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Response;

class OrderTest extends TestCase
{
    use RefreshDatabase;

    public function testCreateOrderSuccess()
    {
        $response = $this->postJson('/api/orders', [
            'id' => 'A0000001',
            'name' => 'test_name',
            'address' => [
                'city' => 'taipei-city',
                'district' => 'da-an-district',
                'street' => 'fuxing-south-road'
            ],
            'price' => '2050',
            'currency' => 'TWD'
        ]);
        
        $response->assertOk();
        $this->assertDatabaseHas('orders_twd', [
            'id' => 'A0000001',
            'name' => 'test_name'
        ]);
    }

    public function testCreateOrderValidationError()
    {
        $response = $this->postJson('/api/orders', [
            'id' => 'A0000001',
            'name' => 'test_name',
            'address' => [
                'city' => 'taipei-city',
                'district' => 'da-an-district',
                'street' => 'fuxing-south-road'
            ],
            'price' => '2050',
        ]);
        
        $response->assertStatus(400);
    }

    public function testOrderQuery()
    {
        $order = new Order;
        $order->setTable('TWD');
        $order->id = 'A0000001';
        $order->name = 'Melody Holiday Inn';
        $order->address = json_encode([
            'city' => 'taipei-city',
            'district' => 'da-an-district',
            'street' => 'fuxing-south-road'
        ]);
        $order->price = floatval('2050');
        $order->currency = 'TWD';
        $order->save();
        $response = $this->get('/api/orders/A0000001?currency=TWD');
        $response->assertStatus(Response::HTTP_OK);
    }

    public function testOrderNotFound()
    {
        $response = $this->get('/api/orders/A0000001?currency=TWD');
        $response->assertStatus(Response::HTTP_NOT_FOUND);
    }
}