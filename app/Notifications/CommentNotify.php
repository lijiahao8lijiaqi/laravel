<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class CommentNotify extends Notification
{
    use Queueable;
		protected $comment;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($comment)
    {
        $this->comment=$comment;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
		//这里 return 数据会记录到数据表 notifications 中 data 字段中
		return [
			'user_id'=>$this->comment->user->id,//谁发表的评论
			'user_icon'=>$this->comment->user->icon,//发表评论的用户头像
			'user_name'=>$this->comment->user->name,//发表评论的用户名
			'article_id'=>$this->comment->article->id,
			'article_title'=>$this->comment->article->title,
			'link'=>$this->comment->article->getLink('#comment' . $this->comment->id),
		];
    }
}
