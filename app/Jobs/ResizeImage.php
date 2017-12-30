<?php

namespace App\Jobs;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Intervention\Image\ImageManager;

class ResizeImage implements ShouldQueue {

    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * @var string
     */
    private $file;

    /**
     * @var array
     */
    private $formats;

    /**
     * @var string
     */
    private $typeImage;

    /**
     * @var User
     */
    private $user;

    /**
     * Create a new job instance.
     *
     * @param string $file
     * @param string $typeImage
     * @param User $user
     */
    public function __construct(string $file, string $typeImage, User $user) {
        $this->file = $file;
        $this->formats = ($typeImage == 'avatar') ? [[150, 150], [500, 500]] : [[500, 280], [1000, 650], [2000, 1300]];;
        $this->typeImage = $typeImage;
        $this->user = $user;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle() {
        $filename = pathinfo($this->file, PATHINFO_FILENAME);

        foreach ($this->formats as $format) {
            $manager = new ImageManager(['driver' => 'gd']);
            $manager->make($this->file)
                ->fit($format[0], $format[1])
                ->save(public_path( "uploads/" . $this->user->id ."/{$this->typeImage}") . "/{$filename}_{$format[0]}x{$format[1]}.png");
        }

        if ($this->typeImage == "avatar") {
            $this->user->avatar = $filename;
        } else if ($this->typeImage == "couverture") {
            $this->user->couverture = $filename;
        }
        $this->user->save();
    }
}
