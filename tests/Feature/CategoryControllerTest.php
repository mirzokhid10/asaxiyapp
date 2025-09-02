<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class CategoryControllerTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
        $this->actingAs($this->user);
    }

    /** @test */
    public function test_it_can_create_a_category()
    {
        $admin = User::factory()->create([
            'role' => 'admin', // adjust if you use roles
        ]);

        $this->actingAs($admin, 'web'); // or 'admin' guard if you use multiple

        $response = $this->post(route('admin.category.store'), [
            'name' => 'New Category',
            'slug' => 'new-category',
            'image' => UploadedFile::fake()->image('category.jpg'),
            'status' => true,
        ]);

        $response->assertRedirect(route('admin.category.index'));

        $this->assertDatabaseHas('categories', [
            'name' => 'New Category',
            'slug' => 'new-category',
        ]);
    }

    /** @test */
    public function it_validates_fields_when_creating_category()
    {
        $response = $this->post(route('admin.category.store'), [])
            ->assertRedirect(); // optional
        $response = $this->followRedirects($response);
        $response->assertSessionHasErrors(['name', 'image', 'status']);

    }

     /** @test */
    public function it_can_update_a_category()
    {
        Storage::fake('public');
        $category = Category::factory()->create();

        $response = $this->put(route('admin.category.update', $category->id), [
            'name' => 'Updated Category',
            'status' => true,
        ]);

        $response->assertRedirect(route('admin.category.index'));

        $this->assertDatabaseHas('categories', [
            'id' => $category->id,
            'name' => 'Updated Category',
        ]);
    }

    /** @test */
    public function it_can_delete_a_category()
    {
        $category = Category::factory()->create();

        $response = $this->delete(route('admin.category.destroy', $category->id));

        $response->assertRedirect(route('admin.category.index'));
        $this->assertDatabaseMissing('categories', ['id' => $category->id]);
    }

    /** @test */
    public function it_can_toggle_category_status()
    {
        $category = Category::factory()->create(['status' => 1]);

        $response = $this->putJson(route('admin.category.change-status'), [
            'id' => $category->id,
            'status' => false,
        ]);

        $response->assertJson(['message' => 'Category Status Changed Successfully!']);

        $this->assertDatabaseHas('categories', [
            'id' => $category->id,
            'status' => 0,
        ]);
    }
}
