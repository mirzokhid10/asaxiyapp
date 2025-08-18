<?php

namespace Tests\Feature;

use App\Models\Brands;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class BrandFeatureTest extends TestCase
{

    use RefreshDatabase;

    /** @test */
    public function index_displays_brands()
    {
        $brand = Brands::factory()->create(['name' => 'Nike']);
        $response = $this->get(route('admin.brands.index'));
        $response->assertStatus(200);
        $response->assertSee('Nike');
    }

    /** @test */
    public function it_creates_a_brand()
    {
        Storage::fake('public');

        $file = UploadedFile::fake()->image('logo.jpg');

        $response = $this->post(route('admin.brands.store'), [
            'image' => $file,
            'name' => 'Adidas',
            'link' => 'https://adidas.com',
            'alt_text' => 'Adidas Logo',
            'status' => true,
        ]);

        $response->assertRedirect(route('admin.brands.index'));

        $this->assertDatabaseHas('brands', ['name' => 'Adidas']);
    }

    /** @test */
    public function it_requires_name_to_create_brand()
    {
        $file = UploadedFile::fake()->image('logo.jpg');

        $response = $this->post(route('admin.brands.store'), [
            'image' => $file,
            'status' => true,
        ]);

        $response->assertSessionHasErrors('name');
    }

    /** @test */
    public function it_updates_a_brand()
    {
        $brand = Brands::factory()->create(['name' => 'Old Brand']);

        $response = $this->put(route('admin.brands.update', $brand->id), [
            'name' => 'Updated Brand',
            'status' => true,
        ]);

        $response->assertRedirect(route('admin.brands.index'));
        $this->assertDatabaseHas('brands', ['name' => 'Updated Brand']);
    }

    /** @test */
    public function it_deletes_a_brand()
    {
        $brand = Brands::factory()->create();

        $response = $this->delete(route('admin.brands.destroy', $brand->id));
        $response->assertRedirect();

        $this->assertDatabaseMissing('brands', ['id' => $brand->id]);
    }

    /** @test */
    public function it_changes_status_via_ajax()
    {
        $brand = Brands::factory()->create(['status' => 0]);

        $response = $this->put(route('admin.brands.change-status'), [
            'id' => $brand->id,
            'status' => true,
        ]);

        $response->assertJson(['message' => 'Brand Status Changed Successfully!']);
        $this->assertDatabaseHas('brands', ['id' => $brand->id, 'status' => 1]);
    }
}