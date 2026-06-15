<?php

namespace App\Notifications;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class UserUpdated extends Notification
{
    use Queueable;

    public function __construct(protected User $updatedUser, protected string $updatedByName)
    {
    }

    public function via($notifiable)
    {
        return ['database'];
    }

    public function toDatabase($notifiable)
    {
        return [
            'title' => 'User updated',
            'message' => "Người dùng {$this->updatedUser->name} đã được cập nhật bởi {$this->updatedByName}.",
            'user_id' => $this->updatedUser->id,
            'user_name' => $this->updatedUser->name,
            'updated_by' => $this->updatedByName,
        ];
    }
}
