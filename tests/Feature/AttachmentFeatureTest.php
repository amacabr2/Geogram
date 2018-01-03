<?php
/**
 * Created by PhpStorm.
 * User: antho
 * Date: 03/01/2018
 * Time: 10:17
 */

namespace Tests\Feature;


use App\Attachement;
use App\Post;
use App\User;
use App\Voyage;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Tests\TestCase;

class AttachmentFeatureTest extends TestCase {

    use WithoutMiddleware;

    protected function setUp() {
        parent::setUp();
        Artisan::call('migrate:refresh');
        $this->cleanDirectories();
    }

    public function tearDown() {
        parent::tearDown();
        $this->cleanDirectories();
    }

    public function testIncorrectDataAttachbleId() {
        $response = $this->callController(['attachable_id' => 3]);
        $response->assertJsonStructure(['attachable_id']);
        $response->assertStatus(422);
    }

    public function testIncorrectDataAttachbleType() {
        $response = $this->callController(['attachable_type' => 'POOO']);
        $response->assertJsonStructure(['attachable_type']);
        $response->assertStatus(422);
    }

    public function testCorrectData() {
        $response = $this->callController();
        $attachment = $response->json();
        $this->assertFileExists($this->getFileForAttachment($attachment));
        $response->assertJsonStructure(['id', 'url']);
        $this->assertContains('/uploads/', $attachment['url']);
        $response->assertStatus(200);
    }

//    public function testDeleteAttachmentDeleteFile() {
//        $response = $this->callController();
//        $attachment = $response->json();
//        $this->assertFileExists($this->getFileForAttachment($attachment));
//        Attachement::find($attachment['id'])->delete();
//        $this->assertFileNotExists($this->getFileForAttachment($attachment));
//    }
//
//    public function testDeletePostDeleteAllAttachments() {
//        $response = $this->callController();
//        $attachment = $response->json();
//        factory(Attachement::class, 3)->create();
//        $this->assertFileExists($this->getFileForAttachment($attachment));
//        $this->assertEquals(4, Attachement::count());
//        Post::first()->delete();
//        $this->assertFileNotExists($this->getFileForAttachment($attachment));
//        $this->assertEquals(3, Attachement::count());
//    }
//
//    public function testChangePostContentAttachmentsAreDeleted() {
//        $response = $this->callController();
//        $attachment = $response->json();
//        factory(Attachement::class, 3)->create();
//        $this->assertFileExists($this->getFileForAttachment($attachment));
//        $this->assertEquals(4, Attachement::count());
//        $post = Post::first();
//        $post->content = "<img src=\"#{$attachment['url']}\"/> balbalbabla";
//        $post->save();
//        $this->assertEquals(4, Attachement::count());
//        $post->content = "";
//        $post->save();
//        $this->assertEquals(3, Attachement::count());
//        $this->assertFileNotExists($this->getFileForAttachment($attachment));
//    }
//
//    public function testChangePostContentAttachmentsAreDeletedIfImageChanged() {
//        $response = $this->callController();
//        $attachment = $response->json();
//        factory(Attachement::class, 3)->create();
//        $this->assertFileExists($this->getFileForAttachment($attachment));
//        $this->assertEquals(4, Attachement::count());
//        $post = Post::first();
//        $post->content = "<img src=\"#{$attachment['url']}\"/> balbalbabla";
//        $post->save();
//        $this->assertEquals(4, Attachement::count());
//        $post->content = "<img src=\"azeeaze/eazeazeazeaz/azeezaze.jpg\"/>";
//        $post->save();
//        $this->assertEquals(3, Attachement::count());
//        $this->assertFileNotExists($this->getFileForAttachment($attachment));
//    }

    private function callController(array $data = []) {
        $path = dirname(__DIR__) . '/fixtures/demo.png';
        $file = new UploadedFile($path, 'demo.png', filesize($path), 'image/jpeg', null, true);

        $user = factory(User::class)->create();
        $voyage = factory(Voyage::class)->create();

        $post = Post::create([
            'title' => 'demo',
            'user_id' => $user->id,
            'content' => 'demo',
            'voyage_id' => $voyage->id
        ]);

        $default = [
            'name' => 'demo.jpg',
            'attachable_type' => Post::class,
            'attachable_id' => $post->id,
            'image' => $file
        ];

        return $this->post(route('attachments.store'), array_merge($default, $data));
    }

    private function getFileForAttachment($attachment) {
        return dirname(__DIR__) . '/fixtures/uploads/' . $attachment['name'];
    }

    private function cleanDirectories () {
        Storage::disk('public')->deleteDirectory('uploads');
    }
}