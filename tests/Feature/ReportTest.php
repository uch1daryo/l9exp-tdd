<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Response;
use Tests\TestCase;

class ReportTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        $this->artisan('db:seed', ['--class' => 'TestDatabaseSeeder']);
    }

    public function testApiGetCustomersStatusCode()
    {
        $response = $this->get('api/customers');
        $response->assertStatus(200);
    }

    public function testApiPostCustomersStatusCode()
    {
        $params = [
            'name' => 'customer_name',
        ];
        $response = $this->postJson('api/customers', $params);
        $response->assertStatus(200);
    }

    public function testApiGetCustomersWithIdStatusCode()
    {
        $response = $this->get('api/customers/1');
        $response->assertStatus(200);
    }

    public function testApiPutCustomersWithIdStatusCode()
    {
        $response = $this->put('api/customers/1');
        $response->assertStatus(200);
    }

    public function testApiDeleteCustomersWithIdStatusCode()
    {
        $response = $this->delete('api/customers/1');
        $response->assertStatus(200);
    }

    public function testApiGetReportsStatusCode()
    {
        $response = $this->get('api/reports');
        $response->assertStatus(200);
    }

    public function testApiPostReportsStatusCode()
    {
        $response = $this->post('api/reports');
        $response->assertStatus(200);
    }

    public function testApiGetReportsWithIdStatusCode()
    {
        $response = $this->get('api/reports/1');
        $response->assertStatus(200);
    }

    public function testApiPutReportsWithIdStatusCode()
    {
        $response = $this->put('api/reports/1');
        $response->assertStatus(200);
    }

    public function testApiDeleteReportsWithIdStatusCode()
    {
        $response = $this->delete('api/reports/1');
        $response->assertStatus(200);
    }

    public function testApiGetCustomersJson()
    {
        $response = $this->get('api/customers');
        $this->assertThat($response->content(), $this->isJson());
    }

    public function testApiGetCustomersJsonFormat()
    {
        $response = $this->get('api/customers');
        $customers = $response->json();
        $customer = $customers[0];
        $this->assertSame(['id', 'name'], array_keys($customer));
    }

    public function testApiGetCustomersJsonCount()
    {
        $response = $this->get('api/customers');
        $response->assertJsonCount(2);
    }

    public function testApiPostCustomersJson()
    {
        $params = [
            'name' => '顧客名',
        ];
        $this->postJson('api/customers', $params);
        $this->assertDatabaseHas('customers', $params);
    }

    public function testApiPostCustomersWithoutName()
    {
        $params = [];
        $response = $this->postJson('api/customers', $params);
        $response->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);

    }

    public function testApiPostCustomersWithEmptyName()
    {
        $params = ['name' => ''];
        $response = $this->postJson('api/customers', $params);
        $response->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);

    }
}
