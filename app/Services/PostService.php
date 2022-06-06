<?php

namespace App\Services;

use App\Contracts\NotificationContract;
use App\Mail\NewPostAddedEmail;
use App\Models\Website;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class PostService implements NotificationContract
{
    public $website = null;

    public $postTitle = null;

    public $postDescription = null;

    public function setWebsite(string $website): PostService
    {
        $this->website = $website;

        return $this;
    }

    public function setPostTitle(string $title): PostService
    {
        $this->postTitle = $title;

        return $this;
    }

    public function setPostDescription(string $description): PostService
    {
        $this->postDescription = $description;

        return $this;
    }

    /**
     * Save a new post to the database;
     *
     * @param array $postRequest
     * @return mixed
     */
    public function createPost(array $postRequest)
    {
        $website = Website::findOrFail($postRequest->website_id);

        $post = $website->posts()->create([
            'title' => $postRequest->title,
            'description' => $postRequest->description
        ]);

        $this->setWebsite($website->name)
            ->setPostTitle($postRequest->title)
            ->setPostDescription($postRequest->description)
            ->sendNotification($website->subscribers()->get());

        return $post;
    }

    public function sendNotification($receivers)
    {
        throw_if(
            !$this->website || !$this->postTitle || !$this->postDescription,
            new \Exception("Meta information are missing on the Notification to send")
        );

        try {
            $subscriptionEmail = (new NewPostAddedEmail($this->website, $this->postTitle, $this->postDescription))
                ->onQueue('email');

            foreach ($receivers as $subscriber) {
                Mail::to($subscriber->email)->queue($subscriptionEmail);
            }
        } catch (\Exception $exception) {
            // Report the exception , or track it with a tracking service
            Log::error($exception->getMessage());
        }
    }
}
