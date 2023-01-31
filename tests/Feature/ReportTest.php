<?php

namespace Tests\Feature;

use Tests\TestCase;

class ReportTest extends TestCase
{
    public function testApiGetCustomersStatusCode()
    {
        $response = $this->get('api/customers');
        $response->assertStatus(200);
    }

    public function testApiPostCustomersStatusCode()
    {
        $response = $this->post('api/customers');
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
}
